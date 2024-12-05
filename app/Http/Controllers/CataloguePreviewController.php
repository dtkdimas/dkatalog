<?php

/**
 * Class CataloguePreviewController
 * @package App\Http\Controllers
 *
 * This class is responsible for managing the catalogue preview
 * which is used to display the catalogue in the preview page
 */

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;

class CataloguePreviewController extends Controller
{
    /**
     * Display a listing of the catalogue preview resource
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // Get the catalogue by id
        $catalogue = Catalogue::findOrFail($id);

        // Get the products of the catalogue
        $products = $catalogue->products()->get();

        // Switch the view based on the catalogue size
        switch ($catalogue->size) {
            case '300x250':
                // Return the 300x250 view
                return view('cataloguePreview.300-250', compact('catalogue', 'products'));
            case '300x500':
                // Return the 300x500 view
                return view('cataloguePreview.300-500', compact('catalogue', 'products'));
            case '1388x250':
                // Return the 1388x250 view
                return view('cataloguePreview.1388-250', compact('catalogue', 'products'));
            default:
                // Return a message if the catalogue size is not found
                return 'catalogue size not found';
        }
    }
}
