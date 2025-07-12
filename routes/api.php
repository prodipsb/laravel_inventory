<?php 

use App\Http\Controllers\Api\ProductExportController;
use Illuminate\Support\Facades\Route;

Route::get('/products/export', [ProductExportController::class, 'export'])->name('products.export');