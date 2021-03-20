<?php
//Autor: Katherin Valencia

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function show($id)
    {
        $data = []; 
        $data["orders"] = Order::all();

        return view('order.show')->with("data",$data);
    }

    public function create($id)
    {
        $order = Order::findOrFail($id);

        return view('order.create')->with("data",$order);
    }

    public function list()
    {
        $data = []; 
        $data["orders"] = Order::all();

        return view('order.list')->with("data",$data);
    }

    public function save(Request $request)
    {
        Order::validate($request);
        
        return back()->with('success', 'Order successfully created');
    }

    public function destroy($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();

        return back()->with('success', 'Order successfully deleted');
        return redirect()->route('order.list');
    }
}
