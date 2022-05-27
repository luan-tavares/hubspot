<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CompanyHubspot;

class Teste
{
    private int $memory = 0;

    
    public function __construct()
    {
        $this->importStudentDeals();
    }

    private function importStudentDeals()
    {
        $hubspotListBuilder = CompanyHubspot::properties('name')
            ->limit(100);

        $this->memory = memory_get_peak_usage();

        $after = 0;
        
        while (true) {
            $hubspotList = $hubspotListBuilder->after($after)->getAll();
            $after = $hubspotList->after;
            
            $this->resolveHubspotGetAll($hubspotList, $after);

            if (is_null($after)) {
                break;
            }
        }
    }

    private function resolveHubspotGetAll(CompanyHubspot $hubspotList, int|string $after)
    {
        $hubspotList->each(function ($object) use ($after) {
            $this->memory = memory_get_peak_usage() - $this->memory;
            dump(memory_get_peak_usage());
        });
    }
}

new Teste;
