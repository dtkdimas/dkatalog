<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CataloguePreviewController;
use App\Http\Controllers\CatalogueStatisticsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStatisticsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth('web')->check()) {
        return redirect()->intended('/dashboard');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('catalogues/{catalogue}/live', [CataloguePreviewController::class, 'index'])->name('live');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('can:manage brands')->group(function () {
        Route::resource('brands', BrandController::class);
    });

    Route::middleware('can:manage catalogues')->group(function () {
        Route::resource('catalogues', CatalogueController::class);

        Route::prefix('catalogues/{catalogue}')->as('catalogues.')->group(function () {
            Route::get('/statistics', [CatalogueStatisticsController::class, 'index'])->name('catalogueStatistics');
            Route::get('/statistics/export-pdf', [CatalogueStatisticsController::class, 'exportPdf'])->name('catalogueStatistics.export-pdf');
            Route::get('/statistics/export-excel', [CatalogueStatisticsController::class, 'exportExcel'])->name('catalogueStatistics.export-excel');
            Route::get('/preview', [CataloguePreviewController::class, 'index'])->name('preview');

            Route::middleware('can:manage products')->group(function () {
                Route::resource('products', ProductController::class);

                Route::get('products/{product}/statistics', [ProductStatisticsController::class, 'index'])->name('productStatistics');
                Route::get('products/{product}/statistics/export-pdf', [ProductStatisticsController::class, 'exportPdf'])->name('productStatistics.export-pdf');
                Route::get('products/{product}/statistics/export-excel', [ProductStatisticsController::class, 'exportExcel'])->name('productStatistics.export-excel');
            });
        });
    });

    Route::middleware('can:manage users')->group(function () {
        Route::resource('users', UserController::class);
    });
});

require __DIR__ . '/auth.php';
