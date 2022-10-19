<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BeerExport implements FromCollection, WithHeadings
{
    private $reportData;
    public function __construct(
        $reportData
    ) {
        $this->reportData = $reportData;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //transforma array em collection
        return collect($this->reportData);
    }

    public function headings(): array
    {
        // return array_keys($this->reportData[0]);
        return array_keys($this->collection()->first());
    }
}
