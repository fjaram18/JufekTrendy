<?php
//Autor: Katherin Valencia

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="user"){
                return redirect()->route('home.index');
            }

            return $next($request);

        });
    }

    public function menu()
    {
        $data = []; 
        $data["routes"] = [
            ["route" => "order.create", "tittle" => __('messages.create_order')],
            ["route" => "order.list", "tittle" => __('messages.list_orders')],
        ];

        return view('admin.admin_menu')->with("data", $data);
    }

    public function show($id)
    {
        try {

            $data = []; 
            $order = Order::findOrFail($id);
            $data["order"] = $order;
    
            return view('admin.order.show')->with("data", $data);

        } catch (Exception $e){

            return redirect()->route('home.index');

        }

    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function list()
    {
        $data = []; 
        $data["orders"] = Order::all();

        return view('admin.order.list')->with("data",$data);
    }

    public function save(Request $request)
    {
        Order::validate($request);
        
        return back()->with('success', 'Order successfully created');
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.order.list')->with('success', 'Order successfully deleted');
    }
}
