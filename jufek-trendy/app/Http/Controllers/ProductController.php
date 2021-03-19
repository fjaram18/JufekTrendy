<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{

    public function create()
    {
        return view('product.create');
    }

    public function list() 
    {
        $data = []; //to be sent to the view
        $data["products"] = Product::all()->sortBy('id');
        return view('product.list')->with("data", $data);
    }

    public function show($id)
    {
        try {

            $data = []; //to be sent to the view
            $product = Product::findOrFail($id);
            $data["product"] = $product;
    
            return view('product.show')->with("data", $data);

        } catch (Exception $e){

            return redirect()->route('home.index');

        }


    }

    public function save(Request $request)
    {
        Product::validate($request);
        Product::create($request->only(["name", "size", "stock", "price", "image", "description"]));

        return back()->with('success', 'Elemento creado satisfactoriamente');

    }

    public function delete($id)
    {

        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.list')->with('eliminate', 'Producto eliminado');
    }
}
