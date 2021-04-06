<?php
//Autor: Katherin Valencia and Juan Camilo Echeverri

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
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
            ["route" => "admin.order.create", "tittle" => __('messages.create_orders')],
            ["route" => "admin.order.list", "tittle" => __('messages.list_orders')],
        ];

        $data["title"] = __('messages.menu_orders');

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
        $data = []; //to be sent to the view
        $data["users"] = User::all();

        return view('admin.order.create')->with("data",$data);
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
        Order::create($request->only(['order_date', 'total', 'shipping_date', 'order_state', 'payment_type', 'user_id']));
        
        return back()->with('success', __('messages.order_succes'));
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        return redirect()->route('admin.order.list')->with('eliminate',  __('messages.order_delete'));
    }
}
