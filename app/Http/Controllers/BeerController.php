<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Inertia\Inertia;
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
        $filters = $request->validated();
        $beers = $service->getBeers(
            isset($filters["beer_name"])? $filters["beer_name"]: null, 
            isset($filters["food"])? $filters["food"]: null, 
            isset($filters["malt"])? $filters["malt"]: null, 
            isset($filters["ibu_gt"])? $filters["ibu_gt"]: null
        );
        $meals = Meal::all();

        return Inertia::render('Beers', [
            'beers' => $beers,
            'meals' => $meals,
            'filters' => $filters
        ]);
    }

    public function export(BeerRequest $request, PunkapiService $service)
    {
        $filename = "cervejas-".now()->format("Y-m-d - H_i").".xlsx";

        ExportJob::withChain([
            new SendExportEmailJob($filename),
            new StoreExportDataJob(auth()->user(), $filename)
        ])->dispatch($request->validated(), $filename);

        return redirect()->back()
            ->with('success', 'Seu arquivo foi enviado para processamento e em breve estará em seu email');
    }
}
