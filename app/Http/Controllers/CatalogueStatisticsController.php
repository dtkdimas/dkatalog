<?php

namespace App\Http\Controllers;

use App\Exports\CatalogueStatisticsExport;
use App\Models\Catalogue;
use App\Models\CatalogueStatistics;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\PDF;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class CatalogueStatisticsController
 * 
 * This controller handles the statistics for catalogues, allowing tracking of impressions and clicks,
 * as well as exporting statistics to PDF and Excel formats.
 */
class CatalogueStatisticsController extends Controller
{
    /**
     * Track an impression for a given catalogue.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function trackImpression(Request $request)
    {
        try {
            $validated = $request->validate([
                'catalogue_id' => 'required|exists:catalogues,id',
            ]);

            $this->updateStatistics($validated['catalogue_id'], 'impression');

            return response()->json(['success' => true, 'message' => 'Impression tracked']);
        } catch (\Exception $e) {
            Log::error('Error tracking impression: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Track a click for a given catalogue.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function trackClick(Request $request)
    {
        try {
            $validated = $request->validate([
                'catalogue_id' => 'required|exists:catalogues,id',
            ]);

            $this->updateStatistics($validated['catalogue_id'], 'click');

            return response()->json(['success' => true, 'message' => 'Click tracked']);
        } catch (\Exception $e) {
            Log::error('Error tracking click: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Export statistics to PDF for a specific catalogue.
     *
     * @param Catalogue $catalogue
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function exportPdf(Catalogue $catalogue, Request $request)
    {
        $query = $catalogue->catalogueStatistics();

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $statistics = $query->get();
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $pdf = FacadePdf::loadView('catalogueStatistics.pdf', compact('catalogue', 'statistics', 'start_date', 'end_date'));

        return $pdf->download('catalogueStatistics_' . $catalogue->catalogue_name . '_' . now()->format('d-m-Y') . '.pdf');
    }

    /**
     * Private function to update statistics for a given catalogue.
     *
     * @param int $catalogueId
     * @param string $type ('impression' or 'click')
     */
    private function updateStatistics($catalogueId, $type)
    {
        $statistic = CatalogueStatistics::firstOrCreate(
            [
                'catalogue_id' => $catalogueId,
                'date' => now()->toDateString(),
            ],
            ['impression' => 0, 'click' => 0, 'ctr' => 0]
        );

        $statistic->increment($type);

        if ($statistic->impression > 0) {
            $statistic->ctr = ($statistic->click / $statistic->impression) * 100;
            $statistic->save();
        }
    }

    /**
     * Export statistics to Excel for a specific catalogue.
     *
     * @param Catalogue $catalogue
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportExcel(Catalogue $catalogue, Request $request)
    {
        $statistics = $catalogue->catalogueStatistics();

        if (!empty($request->start_date) && !empty($request->end_date)) {
            $statistics->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $statisticsData = $statistics->get();

        return Excel::download(new CatalogueStatisticsExport($statisticsData, $catalogue), 'catalogueStatistics_' . $catalogue->catalogue_name . '_' . now()->format('d-m-Y') . '.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Catalogue $catalogue
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, Catalogue $catalogue)
    {
        if ($request->ajax()) {
            try {
                $query = $catalogue->catalogueStatistics();

                if (!empty($request->start_date) && !empty($request->end_date)) {
                    $query->whereBetween('date', [$request->start_date, $request->end_date]);
                }

                $data = $query->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('date', function ($row) {
                        return $row->date;
                    })
                    ->addColumn('impression', function ($row) {
                        return $row->impression ?: 0;
                    })
                    ->addColumn('click', function ($row) {
                        return $row->click ?: 0;
                    })
                    ->addColumn('ctr', function ($row) {
                        return $row->ctr . '%';
                    })
                    ->make(true);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Something went wrong!'], 500);
            }
        }

        return view('catalogueStatistics.index', compact('catalogue'));
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
    public function show(CatalogueStatistics $catalogueStatistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatalogueStatistics $catalogueStatistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatalogueStatistics $catalogueStatistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatalogueStatistics $catalogueStatistics)
    {
        //
    }
}
