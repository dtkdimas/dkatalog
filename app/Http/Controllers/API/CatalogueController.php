<?php

namespace App\Http\Controllers\API;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogueResource;

/**
 * Class CatalogueController
 * @package App\Http\Controllers\API
 */
class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogues = Catalogue::with('products')->get();

        return new CatalogueResource(true, 'List of catalogues', $catalogues);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalogue = Catalogue::with('products')->find($id);

        if (!$catalogue) {
            return response()->json([
                'success' => false,
                'message' => 'Catalogue not found',
                'data'    => null
            ], 404);
        }


        return new CatalogueResource(true, 'Detail of catalogue', $catalogue);
    }
}
