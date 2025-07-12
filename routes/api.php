<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductExportController;

Route::get('/products/export', [ProductExportController::class, 'export'])->name('products.export');
