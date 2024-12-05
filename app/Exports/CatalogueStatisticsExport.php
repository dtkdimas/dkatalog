<?php

namespace App\Exports;

use App\Models\CatalogueStatistics;
use App\Models\Catalogue; // pastikan model Catalogue diimport
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CatalogueStatisticsExport implements FromView
{
    protected $statistics;
    protected $catalogue;

    public function __construct($statistics, Catalogue $catalogue)
    {
        $this->statistics = $statistics;
        $this->catalogue = $catalogue;
    }

    public function view(): View
    {
        return view('catalogueStatistics.excel', [
            'statistics' => $this->statistics,
            'catalogue' => $this->catalogue
        ]);
    }
}
