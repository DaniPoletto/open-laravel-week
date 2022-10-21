<?php

namespace App\Http\Controllers;

use App\Models\Export;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function index()
    {
        $exports = Export::paginate(15);
    }

    public function destroy(Export $export)
    {
        Storage::delete($export->filename);
        $export->delete();

        return "Deletado";
    }
}
