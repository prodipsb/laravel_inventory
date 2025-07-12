<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Response;

class ProductExportController extends Controller
{
    public function export()
    {
        $products = Product::with('category')->get();

        $csvData = "ID,Name,Category,Price\n";

        foreach ($products as $product) {
            $csvData .= "{$product->id},\"{$product->name}\",\"{$product->category->name}\",{$product->price}\n";
        }

        $filename = 'products_export_' . now()->format('Ymd_His') . '.csv';

        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}
