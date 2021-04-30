<?php
//Author: Federico Jaramillo

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Exception;

class CustomizationController extends Controller
{
    public function show($id)
    {
        try {
            $data = [];
            $data["title"] = "Customizations";
            $product = Product::where('id', '=', $id)->with('customizations')->get();
            $data["product"] = $product;

            return view('customization.show')->with("data", $data);
        } catch (Exception $e) {
            return redirect()->route('home.index');
        }
    }

    public function list()
    {


            $data = [];
            $data["title"] = "Customizable products";
            $products = Product::has('customizations')->get();
            $data["products"] = $products;

            return view('customization.list')->with("data", $data);
    }
}
