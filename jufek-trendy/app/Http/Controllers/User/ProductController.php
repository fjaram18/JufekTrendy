<?php
//Author: Federico Jaramillo

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    public function show($id)
    {
        try {
            $data = [];
            $product = Product::findOrFail($id);
            $data["title"] = $product->getName();
            $data["product"] = $product;
    
            return view('product.show')->with("data", $data);
        } catch (Exception $e) {
            return redirect()->route('home.index');
        }
    }

    public function list()
    {
        $data = [];
        $data["title"] = "Avaible Products";
        $products = Product::where('stock', '>', 0)->simplePaginate(6);
        $data["products"] = $products;

        return view('product.list')->with("data", $data);
    }
}
