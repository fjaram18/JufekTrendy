<?php
//Author: Federico Jaramillo

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customization;
use App\Models\Item;
use App\Models\Product;

use App\Exports\OrdersExport;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Exception;
use PDF;

class OrderController extends Controller
{
    public function show($id)
    {
        try {
            $data = [];
            $order = Order::where('id', '=', $id)->with(['items', 'items.product', 'items.customization'])->get();
            $data["order"] = $order;
            $data["title"] = __('messages.order');

            return view('order.show')->with("data", $data);
        } catch (Exception $e) {
            return redirect()->route('home.index');
        }
    }

    public function list()
    {
        $user_id = Auth::user()->getId();
        $data = [];
        $data["title"] = __('messages.my_order');
        $data["orders"] = Order::where('user_id', '=', $user_id)->get();

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
            
            $order = new Order(); //creamos la orden
            $order->setDate($order_date);
            $order->setTotal($total);
            $order->setShippindDate($shipping_date);
            $order->setState('Active');
            $order->setPayment('Default');
            $order->setUserId($user_id);
            $order->save();

            if ($customization) { //agregamos el producto perzonalizado a la orden
                $item = new Item();
                $item->setAmount(1);
                $item->setSubtotal(($customization[0]->getPrice()) + ($customization[0]->product->getPrice()));
                $item->setOrderId($order->getId());
                $item->setProductId($customization[0]->product->getId());
                $item->setCustomizationId($customization[0]->getId());
                $item->save();
            }

            if ($ids) { //agregamos el resto de productos a la orden
                foreach ($productsInCart as $product) {
                    $item = new Item();
                    $item->setAmount(intval($ids[$product->getId()]));
                    $item->setSubtotal($product->getPrice() * intval($ids[$product->getId()]));
                    $item->setOrderId($order->getId());
                    $item->setProductId($product->getId());
                    $item->save();
                }
            }
            return redirect()->route('cart.removeAll');
        } catch (Exception $e) {
            return redirect()->route('home.index');
        }
    }

    public function cancel($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->setState("Cancelled");
            $order->save();

            return back();
        } catch (Exception $e) {
            return redirect()->route('home.index');
        }
    }

    public function createPDF($id)
    {
        $data = [];
        $order = Order::where('id', '=', $id)->with(['items', 'items.product', 'items.customization'])->get();
        $data["order"] = $order;
        $data["title"] = __('messages.order');

        view()->share("data", $data);

        $pdf = PDF::loadView('order.downloadPDF', $data);

        return $pdf->download("order.pdf");
    }

    public function downloadPDF($id)
    {
        try {
            $data = [];
            $order = Order::where('id', '=', $id)->with(['items', 'items.product', 'items.customization'])->get();
            $data["order"] = $order;
            $data["title"] = __('messages.order');

            return view('order.downloadPDF')->with("data", $data);
        } catch (Exception $e) {
            return redirect()->route('home.index');
        }
    }
    public function export()
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }
}
