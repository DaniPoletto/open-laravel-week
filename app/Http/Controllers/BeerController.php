<?php

namespace App\Http\Controllers;

use App\Exports\BeerExport;
use App\Services\PunkapiService;
use App\Http\Requests\BeerRequest;
use Maatwebsite\Excel\Facades\Excel;

class BeerController extends Controller
{
    public function index(BeerRequest $request, PunkapiService $service) 
    {
        $params = $request->validated();
        return $service->getBeers(
            isset($params["beer_name"])? $params["beer_name"]: null, 
            isset($params["food"])? $params["food"]: null, 
            isset($params["malt"])? $params["malt"]: null, 
            isset($params["ibu_gt"])? $params["ibu_gt"]: null
        );
    }

    public function export(BeerRequest $request, PunkapiService $service)
    {
        $params = $request->validated();
        $beers = $service->getBeers(
            isset($params["beer_name"])? $params["beer_name"]: null, 
            isset($params["food"])? $params["food"]: null, 
            isset($params["malt"])? $params["malt"]: null, 
            isset($params["ibu_gt"])? $params["ibu_gt"]: null
        );

        // colletc transforma array em collection
        $filteredBeers = collect($beers)->map(function($value, $key) {
            return collect($value)->only(['name', 'tagline', 'first_brewed', 'description'])
            ->toArray();
        });

        Excel::store(new BeerExport($filteredBeers), 'olw-report.xlsx');

        return 'relatorio criado';
    }
}