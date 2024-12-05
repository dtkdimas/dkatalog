<?php

namespace App\Http\Controllers;

use App\Exports\ProductStatisticsExport;
use App\Models\Catalogue;
use App\Models\Product;
use App\Models\ProductStatistics;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

/**
 * Class ProductStatisticsController
 * 
 * This controller is responsible for managing the product statistics resource.
 * It provides the following methods:
 * - trackClick: to track a click for a given product
 * - exportPdf: to export the statistics for a given product to a PDF file
 * - exportExcel: to export the statistics for a given product to an Excel file
 * - index: to display a listing of the resource.
 */
class ProductStatisticsController extends Controller
{
    /**
     * Track a click for a given product.
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function trackClick(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $this->updateProductStatistics($validated['product_id']);

        return response()->json(['success' => true, 'message' => 'Product click tracked']);
    }

    /**
     * Private function to update statistics for a given product.
     * 
     * @param int $productId
     */
    private function updateProductStatistics($productId)
    {
        $statistic = ProductStatistics::firstOrCreate(
            [
                'product_id' => $productId,
                'date' => now()->toDateString(),
            ],
            ['click' => 0]
        );

        $statistic->increment('click');
    }

    /**
     * Export the statistics for a given product to a PDF file.
     * 
     * @param Request $request
     * @param Catalogue $catalogue
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function exportPdf(Request $request, Catalogue $catalogue, Product $product)
    {
        $statistics = $product->productStatistics();

        if (!empty($request->start_date) && !empty($request->end_date)) {
            $statistics->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $statisticsData = $statistics->get();

        $pdf = Pdf::loadView('productStatistics.pdf', compact('statisticsData', 'product'));

        return $pdf->download('productStatistics_' . $statisticsData[0]->product->product_name . '_' . now()->format('d-m-Y') . '.pdf');
    }

    /**
     * Export the statistics for a given product to an Excel file.
     * 
     * @param Request $request
     * @param Catalogue $catalogue
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportExcel(Request $request, Catalogue $catalogue, Product $product)
    {
        $statistics = $product->productStatistics();

        if (!empty($request->start_date) && !empty($request->end_date)) {
            $statistics->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $statisticsData = $statistics->get();

        return Excel::download(new ProductStatisticsExport($statisticsData, $product), 'productStatistics_' . $statisticsData[0]->product->product_name . '_' . now()->format('d-m-Y') . '.xlsx');
    }

    /**
     * Display a listing of the resource.
     * 
     * @param Request $request
     * @param Catalogue $catalogue
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Catalogue $catalogue, Product $product)
    {
        if ($request->ajax()) {
            $data = $product->productStatistics();

            if (!empty($request->start_date) && !empty($request->end_date)) {
                $data->whereBetween('date', [$request->start_date, $request->end_date]);
            }

            return DataTables::of($data->get())
                ->addIndexColumn()
                ->addColumn('date', function ($row) {
                    return date('d-m-Y', strtotime($row->date));
                })
                ->addColumn('click', function ($row) {
                    return $row->click;
                })
                ->make(true);
        }

        return view('productStatistics.index', compact('product', 'catalogue'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(productStatistics $productStatistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(productStatistics $productStatistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, productStatistics $productStatistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(productStatistics $productStatistics)
    {
        //
    }
}
