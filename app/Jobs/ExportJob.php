<?php

namespace App\Jobs;

use App\Exports\BeerExport;
use Illuminate\Bus\Queueable;
use App\Services\PunkapiService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Maatwebsite\Excel\Facades\Excel;

class ExportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    private $service;
    protected $filename;
    public function __construct(
        $data,
        $filename
    ) {
        $this->service = new PunkapiService();
        $this->data = $data; 
        $this->filename = $filename; 
    }

    public function handle()
    {
        $beers = $this->service->getBeers(
            isset($this->data["beer_name"])? $this->data["beer_name"]: null, 
            isset($this->data["food"])? $this->data["food"]: null, 
            isset($this->data["malt"])? $this->data["malt"]: null, 
            isset($this->data["ibu_gt"])? $this->data["ibu_gt"]: null
        );

        // colletc transforma array em collection
        $filteredBeers = array_map(function($value) {
            return collect($value)
                ->only(['name', 'tagline', 'first_brewed', 'description'])
                ->toArray();
        }, $beers);

        Excel::store(
            new BeerExport($filteredBeers), 
            $this->filename
        );
    }
}
