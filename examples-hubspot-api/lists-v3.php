<?php



require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Concerns\WithListFilters;
use LTL\Hubspot\Concerns\WithRequestException;
use LTL\Hubspot\Resources\V3\ListHubspot;

$resource = new class extends ListHubspot implements WithRequestException, WithListFilters {};




//$a = $resource->updateNamed(15592, '[Vendas 2023] Não Clientes (Deal Stage "Negócio Perdido")');


$a = $resource->search(5);

dd($a->toArray());
