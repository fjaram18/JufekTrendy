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
        $listProductsInCart = array();
        $listAmountsInCart = array();
        $priceTotal = 0;
        $ids = $request->session()->get("products"); //obtenemos ids de productos guardados en session
        if ($ids) {
            foreach ($products as $product) {
                if (in_array($product->getId(), array_keys($ids))) {
                    $listProductsInCart[$product->getId()] = $product;
                    $listAmountsInCart[$product->getId()] = $ids[$product->getId()];
                    $priceTotal = $priceTotal + $product->getPrice() * intval($ids[$product->getId()]);
                }
            }
        }
        $data["title"] = "Shopping Cart";
        $data["products"] = $products;
        $data["productsInCart"] = $listProductsInCart;
        $data["amountInCart"] = $listAmountsInCart;
        $data["totalPrice"] = $priceTotal;
        return view('cart.index')->with("data", $data);
    }

    public function add($id, Request $request)
    {
        
        $request->validate([
            "amount" => "required|numeric|integer|gt:0"
        ]);

        $products = $request->session()->get("products");
        $products[$id] = $request->input('amount');
        $request->session()->put('products', $products);

        $totalAmount = array_sum($products);
        $request->session()->put('amount', $totalAmount);

        return back();
    }

    public function delete($id, Request $request)
    {
        $products = $request->session()->get("products");
        unset($products[$id]);
        $request->session()->put('products', $products);

        $totalAmount = array_sum($products);
        $request->session()->put('amount', $totalAmount);

        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('products');
        $request->session()->forget('amount');
        return back();
    }
}
