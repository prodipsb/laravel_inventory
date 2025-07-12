<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductExportController extends Controller
{
public function export(Request $request)
{
    $query = Product::with('category');

    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhereHas('category', fn($q2) => $q2->where('name', 'like', "%{$search}%"));
        });
    }


    $products = $query->get();

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
