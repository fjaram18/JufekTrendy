<?php

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
            $data["product"] = $product;
    
            return view('product.show')->with("data", $data);

        } catch (Exception $e){

            return redirect()->route('home.index');

        }

    }

    public function list()
    {
        $data = []; 
        $data["products"] = Product::all();

        return view('product.list')->with("data",$data);
    }
}
