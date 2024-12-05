<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Catalogue;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

/**
 * Class BrandController
 * @package App\Http\Controllers
 *
 * This controller is responsible for managing the Brand resource.
 */
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     *
     * This function is responsible for displaying a list of all Brand resources.
     * If the request is an AJAX request, it will return a JSON response
     * containing the list of Brands.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Brand::withCount('catalogues')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('brand_name', function ($row) {
                    return '<a href="' . route('brands.show', $row->id) . '">' . $row->brand_name . '</a>';
                })
                ->addColumn('catalogue_count', function ($row) {
                    return $row->catalogues_count;
                })
                ->addColumn('create_catalogue', function ($row) {
                    return '<a href="' . route('catalogues.create', ['brand_id' => $row->id]) . '" class="btn btn-primary btn-sm">Create Catalogue</a>';
                })
                ->addColumn('action', function ($row) {
                    $editButton = '<a href="' . route('brands.edit', $row->id) . '" class="edit btn btn-warning btn-sm">Edit</a>';
                    $deleteButton = '
                        <form action="' . route('brands.destroy', $row->id) . '" method="POST" class="d-inline" onsubmit="return confirm(\'Are you sure want to delete ' . $row->brand_name . '?\')">
                            ' . method_field('DELETE') . csrf_field() . '
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>';
                    return $editButton . ' ' . $deleteButton;
                })
                ->rawColumns(['brand_name', 'create_catalogue', 'action'])
                ->make(true);
        }


        // Jika bukan AJAX request, tampilkan view biasa
        return view('brands.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     *
     * This function is responsible for displaying the form for creating a new
     * Brand resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\Response
     *
     * This function is responsible for storing a new Brand resource in the
     * database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
        ]);

        $brand = Brand::create([
            'brand_name' => $request->brand_name,
        ]);

        return redirect()->route('brands.index')->with('success', 'Brand ' . $brand->brand_name . ' created successfully');
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     *
     * This function is responsible for displaying the specified Brand resource.
     * If the request is an AJAX request, it will return a JSON response
     * containing the list of Catalogues associated with the Brand.
     */
    public function show(Request $request, Brand $brand)
    {
        if ($request->ajax()) {
            $catalogues = $brand->catalogues()
                ->with(['catalogueStatistics'])
                ->withCount('products')
                ->get();

            return datatables()->of($catalogues)
                ->addIndexColumn()
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
                    $actionBtn = '<a href="' . route('catalogues.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a>
                    <form action="' . route('catalogues.destroy', $row->id) . '" method="POST" class="d-inline" onsubmit="return confirm(\'Are you sure you want to delete ' . $row->catalogue_name . '?\');">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     *
     * This function is responsible for displaying the form for editing the
     * specified Brand resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     *
     * This function is responsible for updating the specified Brand resource in
     * the database.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name,' . $brand->id . '|max:255',
        ]);

        $brand->update([
            'brand_name' => $request->brand_name,
        ]);

        return redirect()->route('brands.index')->with('success', 'Brand ' . $brand->brand_name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     *
     * This function is responsible for deleting the specified Brand resource from
     * the database.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand' . $brand->brand_name . ' deleted successfully');
    }
}
