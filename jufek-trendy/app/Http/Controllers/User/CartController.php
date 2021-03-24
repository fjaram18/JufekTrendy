<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller

{
    public function index(Request $request)
    {
        $data = []; //to be sent to the view

        $products = Product::all();
        $listProducts = array();
        $listProductsInCart = array();
        $priceTotal = 0;
        foreach ($products as $product) { //indizamos la lista de productos
            $listProducts[$product->getId()] = $product;
        }
        $ids = $request->session()->get("products"); //obtenemos ids de productos guardados en session
        if ($ids) {
            foreach ($listProducts as $key => $product) {
                if (in_array($key, array_keys($ids))) {
                    $listProductsInCart[$key] = $product;
                    $priceTotal = $priceTotal + $product->getPrice();
                }
            }
        }

        $data["title"] = "Shopping Cart";
        $data["products"] = $listProducts;
        $data["productsInCart"] = $listProductsInCart;
        $data["totalPrice"] = $priceTotal;
        return view('cart.index')->with("data", $data);
    }

    public function add($id, Request $request)
    {
        $products = $request->session()->get("products");
        $products[$id] = $id;
        $request->session()->put('products', $products);

        return back();
    }

    public function delete($id, Request $request)
    {
        $products = $request->session()->get("products");
        unset($products[$id]);
        $request->session()->put('products', $products);

        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }
}
