<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Catalogue;
use App\Models\CatalogueStatistics;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

/**
 * Class CatalogueController
 * @package App\Http\Controllers
 *
 * This controller is responsible for managing the Catalogue resource.
 */
class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Catalogue::with(['brand', 'catalogueStatistics'])
                ->withCount('products')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('brand', function ($row) {
                    return '<a href="' . route('brands.show', $row->brand->id) . '">' . $row->brand->brand_name . '</a>';
                })
                ->addColumn('impression', function ($row) {
                    return $row->catalogueStatistics ? $row->catalogueStatistics->sum('impression') : '-';
                })
                ->addColumn('ctr', function ($row) {
                    return $row->catalogueStatistics ? number_format($row->catalogueStatistics->avg('ctr'), 1) . '%'  : '-';
                })
                ->addColumn('total_product', function ($row) {
                    return $row->products_count;
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('catalogues.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a>
                    <form action="' . route('catalogues.destroy', $row->id) . '" method="POST" class="d-inline" onsubmit="return confirm(\'Are you sure you want to delete ' . $row->catalogue_name . '?\');">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>';
                })
                ->rawColumns(['brand', 'action'])
                ->make(true);
        }

        return view('catalogues.index');
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('catalogues.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'catalogue_name' => 'required|unique:catalogues,catalogue_name|max:255',
            'size' => 'required|in:300x250,300x500,1388x250',
            'catalogue_banner' => 'required|url',
            'catalogue_url' => 'required|url',
        ]);

        Catalogue::create([
            'brand_id' => $request->brand_id,
            'catalogue_name' => $request->catalogue_name,
            'size' => $request->size,
            'catalogue_banner' => $request->catalogue_banner,
            'catalogue_url' => $request->catalogue_url,
        ]);

        CatalogueStatistics::create([
            'catalogue_id' => Catalogue::latest()->first()->id,
            'date' => now(),
            'impression' => 0,
            'click' => 0,
            'ctr' => 0,
        ]);

        return redirect()->route('catalogues.index')->with('success', 'Catalogue ' . $request->catalogue_name . ' created successfully');
    }

    /**
     * Display the specified resource.
     * 
     * @param Request $request
     * @param Catalogue $catalogue
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Catalogue $catalogue)
    {
        if ($request->ajax()) {
            // Fetch products associated with the catalogue
            $products = $catalogue->products()->with('productStatistics')->get();

            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('thumbnail', function ($product) {
                    return '<img src="' .  $product->thumbnail . '" width="60" height="45" />';
                })
                ->addColumn('product_name', function ($product) {
                    return $product->product_name;
                })
                ->addColumn('original_price', function ($product) {
                    return 'Rp ' . number_format($product->original_price, 0, ',', '.');
                })
                ->addColumn('discounted_price', function ($product) {
                    return $product->discounted_price ? 'Rp ' . number_format($product->discounted_price, 0, ',', '.') : '-';
                })
                ->addColumn('product_url', function ($product) {
                    return '<a href="' . $product->product_url . '" target="_blank">' . $product->product_url . '</a>';
                })
                ->addColumn('click', function ($product) {
                    return $product->productStatistics->sum('click');
                })
                ->addColumn('action', function ($product) use ($catalogue) {
                    return '<a href="' . route('catalogues.productStatistics', [$catalogue->id, $product->id]) . '" class="btn btn-success btn-sm">Statistik</a>
                        <a href="' . route('catalogues.products.edit', [$catalogue->id, $product->id]) . '" class="btn btn-warning btn-sm">Edit</a>
                        <form action="' . route('catalogues.products.destroy', [$catalogue->id, $product->id]) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure you want to delete ' . $product->product_name . '?\');">
                            ' . csrf_field() . method_field("DELETE") . '
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>';
                })
                ->rawColumns(['thumbnail', 'product_url', 'action'])
                ->make(true);
        }

        $catalogueStatistics = $catalogue->catalogueStatistics->first();
        return view('catalogues.show', compact('catalogue', 'catalogueStatistics'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param Catalogue $catalogue
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalogue $catalogue)
    {
        $brands = Brand::all();
        return view('catalogues.edit', compact('catalogue', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Request $request
     * @param Catalogue $catalogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalogue $catalogue)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'catalogue_name' => 'required|unique:catalogues,catalogue_name,' . $catalogue->id . '|max:255',
            'size' => 'required|in:300x250,300x500,1388x250',
            'catalogue_banner' => 'required|url',
            'catalogue_url' => 'required|url',
        ]);

        $catalogue->update([
            'brand_id' => $request->brand_id,
            'catalogue_name' => $request->catalogue_name,
            'size' => $request->size,
            'catalogue_banner' => $request->catalogue_banner,
            'catalogue_url' => $request->catalogue_url,
        ]);

        return redirect()->route('catalogues.index')->with('success', 'Catalogue ' . $catalogue->catalogue_name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param Catalogue $catalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalogue $catalogue)
    {
        $catalogue->delete();

        return redirect()->route('catalogues.index')->with('success', 'Catalogue ' . $catalogue->catalogue_name . ' deleted successfully');
    }
}
