# Hubspot API (luan-tavares/hubspot)

Biblioteca PHP 8.4 que expõe a API do HubSpot como um **builder fluente orientado a schemas JSON**. Cada recurso (contatos, empresas, negócios, engagements, CRM customizado, etc.) é uma classe PHP gerada a partir de um schema em `src/schemas/*.json`, e cada chamada segue sempre o mesmo ciclo de vida:

```
configurar a requisição  →  disparar a action (chamada HTTP)  →  trabalhar a resposta
```

Este README documenta exatamente essas três etapas. Para conhecer a arquitetura interna (Builder, Request, Response, Handlers, Schemas), há um agente do Claude Code configurado em `.claude/agents/hubspot-expert.md` — invoque-o quando for mexer no funcionamento interno do pacote.

## Índice

- [Instalação](#instalação)
- [Autenticação](#autenticação)
- [Conceitos básicos](#conceitos-básicos)
- [1. Pré-chamada — configurando a requisição](#1-pré-chamada--configurando-a-requisição)
- [2. Chamada — executando a action](#2-chamada--executando-a-action)
- [3. Pós-chamada — trabalhando a resposta](#3-pós-chamada--trabalhando-a-resposta)
- [Paginação e importação em massa](#paginação-e-importação-em-massa)
- [Tratamento de erros](#tratamento-de-erros)
- [Exemplo completo](#exemplo-completo)
- [Recursos disponíveis](#recursos-disponíveis)
- [Adicionando ou alterando endpoints](#adicionando-ou-alterando-endpoints)

## Instalação

```bash
composer require luan-tavares/hubspot
```

Requer PHP `^8.4`.

## Autenticação

Existem dois mecanismos, e apenas **um** deve ser usado por chamada (definir um remove o outro automaticamente):

- **OAuth (recomendado)** — token privado da conta HubSpot.
- **API Key legada** (`hapikey`) — usada por alguns endpoints antigos (ex. Developer API de Webhooks).

Pode ser configurado **globalmente** (uma vez, no bootstrap da aplicação) ou **por chamada**:

```php
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;

// Global — vale para todas as chamadas seguintes no processo
Hubspot::setGlobalOAuth($token);
Hubspot::setGlobalApikey($apikey);

// Por chamada — sobrepõe o global apenas nesta cadeia
ContactHubspot::oAuth($token)->getAll();
ContactHubspot::apikey($apikey)->getAll();
```

## Conceitos básicos

- **Resource**: uma classe como `ContactHubspot`, `CompanyHubspot`, `DealHubspot` (em `src/Resources/V1..V4`). Representa um recurso da API do HubSpot.
- **Action**: um método de "chamada" do resource, definido no schema JSON (`getAll`, `get`, `create`, `update`, `delete`, `search`, `batchCreate`, etc.). É o único tipo de método que efetivamente **dispara uma requisição HTTP**.
- **Métodos de configuração**: qualquer outro método encadeável (`limit()`, `properties()`, `oAuth()`, `withRequestTries()`...) apenas ajusta a requisição e devolve `$this`/uma nova instância — nada é enviado até uma action ser chamada.
- Todos os métodos podem ser chamados de forma **estática** (`ContactHubspot::limit(10)->getAll()`) ou em **instância** (`(new ContactHubspot)->limit(10)->getAll()`) — o resultado é o mesmo.

## 1. Pré-chamada — configurando a requisição

Antes de chamar uma action, encadeie quantos métodos de configuração forem necessários. Eles são organizados em 5 categorias:

### 1.1 Query string (parâmetros da URL)

| Método | Descrição |
|---|---|
| `query(string $query, ?string $value)` | Adiciona um parâmetro de query arbitrário |
| `q(string $query)` | Busca textual (`?q=`) |
| `properties(string ...$properties)` | Propriedades a retornar |
| `propertiesWithHistory(string ...$properties)` | Propriedades com histórico de valores |
| `associations(string ...$associations)` | Associações a incluir na resposta |
| `limit(int $limit)` | Tamanho da página |
| `maxLimit()` | Usa o limite máximo permitido (`HubspotConfig::MAX_LIMIT`, 100) |
| `after(?string $after)` / `before(string $before)` | Cursor de paginação |
| `offset(string\|int $id)` / `vidOffset(...)` / `timeOffset(...)` | Offsets legados (APIs v1) |
| `archived()` | Inclui registros arquivados |
| `idProperty(string $propertyUnique)` / `byEmail()` | Identifica o registro por uma propriedade única (ex. e-mail) em vez do ID |
| `includeForeignIds()` | Inclui IDs de outros sistemas |
| `format(string $fileFormat)` | Formato de arquivo (Files API) |
| `sort(string ...$arguments)` | Ordenação |
| `setCount(int $count)` | Contagem (APIs v1) |
| `withProperties()` / `withEmails()` / `withVids()` / `withListIds()` / `listIds()` | Filtros específicos de Lists/Contacts v1 |
| `formTypes(string ...$arguments)` | Filtro de tipos de formulário |
| `withListFilters()` | Inclui filtros da lista na resposta |
| `enrollObjectsUpdateList()` | Habilita matrícula em workflows ao atualizar listas |

### 1.2 Headers

| Método | Descrição |
|---|---|
| `oAuth(string $token)` | Define `Authorization: Bearer {token}` e remove a API key, caso definida |

### 1.3 cURL (transporte)

| Método | Descrição |
|---|---|
| `setTimeout(int $timeout)` | Timeout da requisição em segundos (padrão: `HubspotConfig::TIMEOUT`, 10s) |
| `withHeaders()` | Inclui os headers da resposta HTTP no retorno |
| `withProgressBar()` | Mostra barra de progresso (útil em scripts CLI de importação) |

### 1.4 Comportamento da requisição (retry / exceptions)

| Método | Descrição |
|---|---|
| `withRequestTries()` | Ativa até `HubspotConfig::MAX_REQUESTS_TRIES` (4) tentativas automáticas em erros transitórios (429, 500, 502, 503, 520), com `sleep()` entre elas |
| `defineRequestTries(int $tries)` | Define um número específico de tentativas (1 a 4) |
| `withRequestException()` | Lança `HubspotApiException` quando a resposta vier com erro |
| `notWithRequestException()` | (padrão) Não lança exceção — trate o erro manualmente via `->error()` |

### 1.5 Formato da resposta

| Método | Descrição |
|---|---|
| `withObjectResponse()` | Converte o corpo da resposta em objeto tipado (`src/Objects/*`), quando a action tiver um `object` definido no schema |
| `notWithObjectResponse()` | (padrão) Mantém a resposta como `stdClass`/array dinâmico |
| `isErrorIfPropertyNotExists()` | (padrão) Acessar uma propriedade inexistente na resposta lança exceção |
| `isNullIfPropertyNotExists()` | Acessar uma propriedade inexistente na resposta retorna `null` em vez de lançar exceção |

### 1.6 Comportamento padrão via interfaces comportamentais (classes filhas)

Todos os métodos de configuração acima podem ser fixados como **padrão de um resource**, direto na classe filha, sem precisar encadear nada toda vez que for chamá-lo. O construtor de `Hubspot` (`src/Hubspot.php`) aplica isso automaticamente, via Reflection, antes de qualquer action ser disparada. Existem 3 mecanismos, do mais simples ao mais livre:

**a) Interfaces marcadoras (`LTL\Hubspot\Concerns\*`)**

São interfaces vazias (sem métodos) — existem só para o construtor detectar, via `getInterfaceNames()`, o que a classe filha "assinou", e chamar o método de configuração correspondente automaticamente:

| Interface implementada | Equivale a chamar sempre |
|---|---|
| `WithRequestException` | `->withRequestException()` |
| `WithRequestTries` | `->withRequestTries()` |
| `WithHeaders` | `->withHeaders()` |
| `WithMaxLimit` | `->maxLimit()` |
| `WithListFilters` | `->withListFilters()` |
| `WithEnrollUpdateList` | `->enrollObjectsUpdateList()` |
| `WithObjectResponse` | `->withObjectResponse()` |
| `WithPropertyNullIfNotExists` | `->isNullIfPropertyNotExists()` |

```php
use LTL\Hubspot\Concerns\WithObjectResponse;
use LTL\Hubspot\Concerns\WithRequestException;
use LTL\Hubspot\Hubspot;

class ContactHubspot extends Hubspot implements WithRequestException, WithObjectResponse
{
    protected string $resource = "contacts-v3";
    protected int $version = 3;
}

// já nasce com exception habilitada e resposta tipada em toda chamada:
ContactHubspot::get($id); // equivalente a ->withRequestException()->withObjectResponse()->get($id)
```

Isso define apenas o **padrão** — ainda dá pra sobrepor pontualmente numa chamada específica encadeando o método contrário (`ContactHubspot::notWithObjectResponse()->get($id)`).

**b) Propriedades protegidas `$associations` / `$propertiesWithHistory`**

Se a classe filha declarar essas duas propriedades com valor, o construtor chama automaticamente `associations(...)` / `propertiesWithHistory(...)` com esses valores em toda instância:

```php
class DealHubspot extends Hubspot
{
    protected string $resource = "deals-v3";
    protected int $version = 3;

    protected array $associations = ['contacts', 'companies'];
    protected array $propertiesWithHistory = ['dealstage'];
}

DealHubspot::getAll(); // já sai com associations=contacts,companies&propertiesWithHistory=dealstage
```

**c) Hook `init()`**

`protected function init(): void {}` é chamado por último no construtor — um template method vazio, pronto para ser sobrescrito na classe filha com qualquer configuração customizada que não se encaixe nos dois casos acima (qualquer método fluente pode ser usado aqui, já que `$this` é o resource completo):

```php
class TicketHubspot extends Hubspot
{
    protected string $resource = "tickets-v3";
    protected int $version = 3;

    protected function init(): void
    {
        $this->maxLimit()->properties('subject', 'hs_pipeline_stage');
    }
}
```

> Os três mecanismos existem para você não repetir a mesma cadeia de configuração toda vez que for usar um resource — declare o comportamento uma vez na classe e ele vira o padrão em todas as chamadas, estáticas ou não.

```php
use LTL\Hubspot\Resources\V3\ContactHubspot;

$builder = ContactHubspot::maxLimit()
    ->properties('firstname', 'lastname', 'email')
    ->associations('companies')
    ->withRequestTries()
    ->withRequestException()
    ->withObjectResponse();

// nada foi enviado ainda — só na próxima etapa
```

## 2. Chamada — executando a action

Actions são os métodos que **realmente disparam a requisição HTTP**, definidos no schema do recurso (`src/schemas/contacts-v3.json`, por exemplo). Os parâmetros seguem a ordem: parâmetros de rota (`{id}` na URL) → parâmetros de query especiais → corpo da requisição (quando o método aceitar `array` ou um `Body\*` do pacote `luan-tavares/hubspot-request-body`).

```php
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;
use LTL\HubspotRequestBody\Resources\HubspotSearchBody;

// GET (lista, paginada)
$contacts = ContactHubspot::maxLimit()->properties('email')->getAll();

// GET (um registro)
$contact = ContactHubspot::get($contactId);
$contact = ContactHubspot::byEmail()->get($email); // ou ->idProperty('email')

// POST (criar) — aceita array puro ou um Body builder
$created = ContactHubspot::create([
    'properties' => ['email' => 'ana@exemplo.com', 'firstname' => 'Ana'],
]);

// PATCH (atualizar parcialmente)
ContactHubspot::update($contactId, ['properties' => ['firstname' => 'Ana Paula']]);

// DELETE
ContactHubspot::delete($contactId);

// Busca (search) — normalmente aceita um Body builder dedicado
$requestBody = HubspotSearchBody::filterContains('company', 'Acme')->sortDesc('hs_updated');
$results = ContactHubspot::search($requestBody);

// Operações em lote (batch*)
ContactHubspot::batchCreate($requestBody);
ContactHubspot::batchRead($requestBody);
ContactHubspot::batchUpdate($requestBody);
ContactHubspot::batchDelete($requestBody);
```

### Actions especiais (Handlers)

Algumas actions não fazem uma única chamada HTTP — elas orquestram múltiplas chamadas e ficam marcadas no schema como `"handler": "..."`. As mais comuns:

- **`createOrUpdate($requestBody, $idHubspot = null)`** — se `$idHubspot` for informado tenta `update`; se receber 404 ou erro de duplicidade, tenta descobrir o ID correto (a partir da mensagem de erro do HubSpot) e reencaminha, ou cai para `create`.
- **`createOrUpdateByEmail($requestBody, $idHubspot = null)`** — mesma lógica, mas identificando o contato pelo e-mail.
- **`importAll(callable $fn)`** — pagina automaticamente por todo o recurso (usa `getAll()` + `after()` internamente) e invoca `$fn($pagina)` a cada página, até acabar o cursor.

```php
ContactHubspot::createOrUpdate($requestBody, $contactId);

ContactHubspot::maxLimit()->importAll(function ($page) {
    foreach ($page as $contact) {
        // processa cada contato da página
    }
});
```

## 3. Pós-chamada — trabalhando a resposta

O retorno de **toda** action é sempre uma instância do próprio Resource (ex. `ContactHubspot`), agora "carregada" com a resposta da API. Ela expõe:

### Dados brutos

| Método | Retorno |
|---|---|
| `->data()` | `object\|array\|null` — o corpo decodificado (objeto tipado se `withObjectResponse()` estiver ativo) |
| `->toArray()` | `array` — o JSON bruto decodificado como array associativo |
| `->toJson()` | `string` — o JSON bruto da resposta, como veio da API |
| `->getAfter()` | `string\|int\|null` — cursor da próxima página, quando a action for paginável |
| `->headers()` | `array\|null` — headers HTTP da resposta (requer `withHeaders()` na configuração) |

### Status e erros

| Método | Retorno |
|---|---|
| `->status()` | `int` — código HTTP |
| `->error()` | `bool` — houve erro (status ≥ 400) |
| `->isServerError()` | `bool` — erro 5xx |
| `->isNotFoundError()` | `bool` — 404 |
| `->isTooManyRequestsError()` | `bool` — 429 |
| `->isMultiStatus()` | `bool` — 207 (resultado parcial, comum em batch) |
| `->invalidEmailError()` | `bool` — e-mail inválido/rejeitado |
| `->empty()` | `bool` — coleção retornada sem itens |

```php
$response = ContactHubspot::get($id);

if ($response->error()) {
    // trate manualmente (a menos que withRequestException() esteja ativo,
    // caso em que uma HubspotApiException já teria sido lançada)
    logger()->warning("Hubspot {$response->status()}: {$response->toJson()}");
} else {
    $email = $response->data()->properties->email;
}
```

### Iterando coleções (`getAll`, `search`, `batch*`)

Quando a action retorna uma lista (schema com `iteratorIndex`), o próprio Resource é iterável, contável e navegável por índice:

```php
$contacts = ContactHubspot::maxLimit()->getAll();

foreach ($contacts as $contact) {
    echo $contact->properties->email, "\n";
}

count($contacts);          // total de itens da página atual
$contacts->empty();        // true se a página veio vazia
$contacts['results'];       // acesso via array (ArrayAccess sobre toArray())

// Helpers funcionais (EnumerableInterface)
$emails   = $contacts->map(fn ($c) => $c->properties->email);
$validos  = $contacts->filter(fn ($c) => !empty($c->properties->email));
$contacts->each(function ($c) { /* ... */ });
$contacts->reduce(fn ($acc, $c) => $acc + 1, 0);
```

## Paginação e importação em massa

Actions paginadas expõem `->getAfter()`. O padrão manual:

```php
$after = null;

do {
    $page = ContactHubspot::maxLimit()->after($after)->getAll();

    foreach ($page as $contact) {
        // processa
    }

    $after = $page->getAfter();
} while ($after !== null);
```

Ou use o handler pronto `importAll`, que faz exatamente esse laço:

```php
ContactHubspot::maxLimit()->importAll(function ($page) {
    foreach ($page as $contact) {
        // processa
    }
});
```

## Tratamento de erros

- Por padrão (`notWithRequestException()`), erros de API **não** lançam exceção — verifique `->error()` manualmente.
- Ative `->withRequestException()` (ou implemente a interface `WithRequestException` no resource) para que qualquer resposta com erro lance `LTL\Hubspot\Exceptions\HubspotApiException`.
- Falhas de rede/timeout lançam `HubspotCurlException` (ou `HubspotClientTimeoutException` em timeout).
- Combine com `->withRequestTries()` / `->defineRequestTries($n)` para tentar novamente automaticamente em erros transitórios (429/500/502/503/520) antes de desistir.

```php
try {
    $created = ContactHubspot::withRequestException()->withRequestTries()->create($dados);
} catch (\LTL\Hubspot\Exceptions\HubspotApiException $e) {
    // erro definitivo da API (após esgotar as tentativas, se configuradas)
} catch (\LTL\Hubspot\Exceptions\HubspotCurlException $e) {
    // erro de transporte/rede
}
```

## Exemplo completo

```php
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\HubspotRequestBody\Resources\HubspotSearchBody;

// bootstrap — uma vez só
Hubspot::setGlobalOAuth($_ENV['HUBSPOT_OAUTH']);

// 1) pré-chamada: configura a requisição
$builder = ContactHubspot::maxLimit()
    ->properties('firstname', 'lastname', 'email')
    ->withRequestTries()
    ->withRequestException();

// 2) chamada: dispara a action
$requestBody = HubspotSearchBody::filterContains('company', 'Acme')->sortDesc('hs_updated');
$contacts = $builder->search($requestBody);

// 3) pós-chamada: trabalha a resposta
if (!$contacts->empty()) {
    $emails = $contacts->map(fn ($c) => $c->properties->email);
}
```

## Recursos disponíveis

Todos os recursos ficam em `src/Resources/V1` a `V4` (Contacts, Companies, Deals, Tickets, Products, Line Items, Quotes, Pipelines, Owners, Users, Lists, Files, Forms, Webhooks, HubDB, CMS Domains/Source Code, CRM Objects/Schemas customizados, Engagements — calls/emails/meetings/notes/tasks/communications, Associations, Conversations, Timeline Extensions, Workflows, Imports, Custom Channels, Site Search, Account, OAuth, Dispositions, entre outros). A lista de actions de cada recurso corresponde 1:1 ao respectivo arquivo em `src/schemas/*.json` — é a fonte da verdade mais atualizada.

Exemplos completos e testados de cada recurso estão em `examples-hubspot-api/`.

## Adicionando ou alterando endpoints

Os resources em `src/Resources/**` e os PHPDocs de `src/Hubspot.php` são **gerados**, não escritos à mão:

1. Edite (ou crie) o schema em `src/schemas/<recurso>-v<versao>.json`, seguindo o formato de `contacts-v3.json`.
2. Rode `php bin/resource` para (re)gerar as classes de recurso.
3. Se você alterou algum componente de configuração (`src/Core/Request/Components/*`), rode `php bin/documentation` para atualizar os PHPDocs de `Hubspot.php`/`HubspotInterface.php`.

Para dúvidas sobre a arquitetura interna (Builder, Request, Response, Handlers), use o agente `hubspot-expert` configurado neste repositório (`.claude/agents/hubspot-expert.md`).
