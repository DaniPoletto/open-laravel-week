<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(Request $request, PunkapiService $service) 
    {
        $params = $request->all();
        return $service->getBeers(
            isset($params["beer_name"])? $params["beer_name"]: null, 
            isset($params["food"])? $params["food"]: null, 
            isset($params["malt"])? $params["malt"]: null, 
            isset($params["ibu_gt"])? $params["ibu_gt"]: null
        );
    }
}
