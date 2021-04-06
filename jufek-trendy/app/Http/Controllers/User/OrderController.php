<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customization;
use App\Models\Item;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class OrderController extends Controller
{
    public function show($id)
    {
        try {

            $data = [];
            $order = Order::findOrFail($id);
            $data["order"] = $order;

            return view('order.show')->with("data", $data);
        } catch (Exception $e) {

            return redirect()->route('home.index');
        }
    }

    public function list()
    {
        $data = [];
        $data["orders"] = Order::all();

        return view('order.list')->with("data", $data);
    }

    public function save(Request $request)
    {
        try {
            $products = Product::all();
            $productsInCart = array();
            $total = 0;

            $customization = $request->session()->get("customization"); //obtenemos id de la personalización guardada en sesion
            if ($customization) {
                $id = $customization;
                $customization = Customization::where('id', '=', $id)->with('product')->get();
                $total = ($customization[0]->getPrice()) + ($customization[0]->product->getPrice());
            }

            $ids = $request->session()->get("products"); //obtenemos ids de productos guardados en session
            if ($ids) {
                foreach ($products as $product) {
                    if (in_array($product->getId(), array_keys($ids))) {
                        $productsInCart[$product->getId()] = $product;
                        $total = $total + $product->getPrice() * intval($ids[$product->getId()]);
                    }
                }
            }

            $user_id = Auth::user()->getId(); //obtenemos id del usuario

            $order_date = Carbon::now()->toDateTimeString();
            $shipping_date = Carbon::now()->addDay()->toDateTimeString();
            $order_state = 'Active';
            $payment_type = 'Default';

            $request = new Request([
                'order_date' => $order_date, 
                'total' => $total, 
                'shipping_date' => $shipping_date, 
                'order_state' => $order_state, 
                'payment_type' => $payment_type, 
                'user_id' => $user_id
            ]);

            Order::validate($request); //creamos la orden
            $order_id = DB::table('orders')->insertGetId(
                $request->only(['order_date', 'total', 'shipping_date', 'order_state', 'payment_type', 'user_id'])
            );

            if($customization[0]) { //agregamos el producto con perzonalización a la orden
                $request = new Request([
                    'amount' => 1, 
                    'subtotal' => ($customization[0]->getPrice()) + ($customization[0]->product->getPrice()), 
                    'order_id' => $order_id, 
                    'product_id' => $customization[0]->product->getId(), 
                    'customization_id' => $customization[0]->getId(), 
                ]);

                Item::validate($request);
                Item::create($request->only(['amount', 'subtotal', 'order_id', 'product_id', 'customization_id']));
            }
            
            if ($ids) { //agregamos el resto de productos a la orden
                foreach ($productsInCart as $product) {
                    $request = new Request([
                        'amount' => intval($ids[$product->getId()]),
                        'subtotal' => $product->getPrice() * intval($ids[$product->getId()]),
                        'order_id' => $order_id, 
                        'product_id' => $product->getId(),
                        'customization_id' => null,
                    ]);
                    Item::validate($request);
                    Item::create($request->only(['amount', 'subtotal', 'order_id', 'product_id', 'customization_id']));
                }
            }

            return redirect()->route('cart.removeAll');

        } catch (Exception $e) {
            return redirect()->route('home.index');
        }
    }
}
