<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Jobs\ExportJob;
use App\Mail\ExportEmail;
use App\Exports\BeerExport;
use App\Jobs\SendExportEmailJob;
use App\Jobs\StoreExportDataJob;
use App\Services\PunkapiService;
use App\Http\Requests\BeerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $filename = "cervejas-".now()->format("Y-m-d - H_i").".xlsx";

        ExportJob::withChain([
            new SendExportEmailJob($filename),
            new StoreExportDataJob(auth()->user(), $filename)
        ])->dispatch($request->validated(), $filename);

        return 'relatorio criado';
    }
}
