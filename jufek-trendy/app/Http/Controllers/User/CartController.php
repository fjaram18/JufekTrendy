<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customization;

class CartController extends Controller

{
    public function index(Request $request)
    {
        $data = []; //to be sent to the view

        $products = Product::all();
        $listProductsInCart = array();
        $listAmountsInCart = array();
        $priceTotal = 0;
        $customization = $request->session()->get("customization");
        if($customization) {
            $id = $customization;
            $customization = Customization::findOrFail($id);
            $priceTotal = ($customization->getPrice()) + ($customization->product->getPrice());
        }
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
        $data["customization"] = $customization;
        return view('cart.index')->with("data", $data);
    }

    public function add($id, Request $request)
    {
        $products = $request->session()->get("products");
        $products[$id] = $request->input('amount');
        $request->session()->put('products', $products);

        $totalAmount = array_sum($products);
        $request->session()->put('amount', $totalAmount);
        if($request->session()->get("customization")) {
            $request->session()->increment("amount");
        }

        return back();
    }

    public function delete($id, Request $request)
    {
        $products = $request->session()->get("products");
        unset($products[$id]);
        $request->session()->put('products', $products);
        $totalAmount = array_sum($products);
        $request->session()->put('amount', $totalAmount);
        if($request->session()->get("customization")) {
            $request->session()->increment("amount");
        }

        return back();
    }

    public function addCustomization($id, Request $request)
    {
        //Check if there is a personalized product on car, since it can only have 1 per order
        if($request->session()->get("customization")) {
            return redirect()->route('home.index');
        }

        $request->session()->put("customization", $id);
        $request->session()->increment("amount");
        
        return redirect()->route('cart.index');
    }

    public function deleteCustomization(Request $request)
    {
        $request->session()->forget('customization');
        $request->session()->decrement("amount");

        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('products');
        $request->session()->forget('amount');
        $request->session()->forget('customization');
        return redirect()->route('home.index');
    }
}
