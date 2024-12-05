<?php
// app/Exports/ProductStatisticsExport.php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductStatisticsExport implements FromView
{
    protected $statistics;
    protected $product;

    public function __construct($statistics, $product)
    {
        $this->statistics = $statistics;
        $this->product = $product;
    }

    public function view(): View
    {
        return view('productStatistics.excel', [
            'statistics' => $this->statistics,
            'product' => $this->product
        ]);
    }
}
