<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\CatalogueController;
use App\Http\Controllers\CatalogueStatisticsController;
use App\Http\Controllers\ProductStatisticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * @group User
 */
Route::get('/user', function (Request $request) {
    /**
     * Get the authenticated User
     *
     * @authenticated
     * @response {
     *   "id": 1,
     *   "name": "John Doe",
     *   "email": "john@example.com",
     *   "email_verified_at": "2022-01-01T00:00:00.000000Z",
     *   "created_at": "2022-01-01T00:00:00.000000Z",
     *   "updated_at": "2022-01-01T00:00:00.000000Z"
     * }
     */
    return $request->user();
})->middleware('auth:sanctum');

/**
 * @group Catalogues
 */
Route::get('/catalogues', [CatalogueController::class, 'index']);
/**
 * @response {
 *   "data": [
 *     {
 *       "id": 1,
 *       "name": "Catalogue 1",
 *       "brand_id": 1,
 *       "created_at": "2022-01-01T00:00:00.000000Z",
 *       "updated_at": "2022-01-01T00:00:00.000000Z"
 *     }
 *   ]
 * }
 */
Route::get('/catalogues/{id}', [CatalogueController::class, 'show']);
/**
 * @response {
 *   "id": 1,
 *   "name": "Catalogue 1",
 *   "brand_id": 1,
 *   "created_at": "2022-01-01T00:00:00.000000Z",
 *   "updated_at": "2022-01-01T00:00:00.000000Z"
 * }
 */

/**
 * @group Catalogue Statistics
 */
Route::post('/catalogue/impression', [CatalogueStatisticsController::class, 'trackImpression']);
/**
 * @response {
 *   "message": "Impression tracked"
 * }
 */
Route::post('/catalogue/click', [CatalogueStatisticsController::class, 'trackClick']);
/**
 * @response {
 *   "message": "Click tracked"
 * }
 */

/**
 * @group Product Statistics
 */
Route::post('/product/click', [ProductStatisticsController::class, 'trackClick']);
/**
 * @response {
 *   "message": "Click tracked"
 * }
 */
