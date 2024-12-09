<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Product;
use App\Models\ProductStatistics;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 *
 * This controller is responsible for managing the Product resource.
 * It provides the following methods:
 * - index: Display a listing of the resource.
 * - create: Show the form for creating a new resource.
 * - store: Store a newly created resource in storage.
 * - show: Display the specified resource.
 * - edit: Show the form for editing the specified resource.
 * - update: Update the specified resource in storage.
 * - destroy: Remove the specified resource from storage.
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     *
     * @param int $catalogueId The ID of the catalogue that the product belongs to.
     */
    public function create($catalogueId)
    {
        $catalogue = Catalogue::findOrFail($catalogueId);

        return view('products.create', compact('catalogue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request The request instance.
     * @param Catalogue $catalogue The catalogue instance.
     */
    public function store(Request $request, Catalogue $catalogue)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'thumbnail' => 'required|url',
            'product_url' => 'required|url',
            'original_price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:original_price',
        ]);

        $catalogue->products()->create([
            'product_name' => $validated['product_name'],
            'thumbnail' => $validated['thumbnail'],
            'product_url' => $validated['product_url'],
            'original_price' => $validated['original_price'],
            'discounted_price' => $validated['discounted_price'],
        ]);

        ProductStatistics::create([
            'product_id' => Product::latest()->first()->id,
            'date' => now(),
            'click' => 0,
        ]);

        return redirect()->route('catalogues.show', $catalogue->id)
            ->with('success', 'Product ' . $validated['product_name'] . ' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product The product instance.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Catalogue $catalogue The catalogue instance.
     * @param Product $product The product instance.
     */
    public function edit(Catalogue $catalogue, Product $product)
    {
        return view('products.edit', compact('catalogue', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request The request instance.
     * @param Catalogue $catalogue The catalogue instance.
     * @param Product $product The product instance.
     */
    public function update(Request $request, Catalogue $catalogue, Product $product)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'thumbnail' => 'nullable|url',
            'product_url' => 'required|url',
            'original_price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:original_price',
        ]);

        $product->update([
            'product_name' => $validated['product_name'],
            'thumbnail' => $validated['thumbnail'],
            'product_url' => $validated['product_url'],
            'original_price' => $validated['original_price'],
            'discounted_price' => $validated['discounted_price'],
        ]);

        return redirect()->route('catalogues.show', $product->catalogue->id)
            ->with('success', 'Product ' . $product->product_name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Catalogue $catalogue The catalogue instance.
     * @param Product $product The product instance.
     */
    public function destroy(Catalogue $catalogue, Product $product)
    {
        $catalogue = $product->catalogue;
        $product->delete();

        return redirect()->route('catalogues.show', $catalogue->id)
            ->with('success', 'Product ' . $product->product_name . ' deleted successfully');
    }
}
