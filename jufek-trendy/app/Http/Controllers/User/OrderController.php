<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

        } catch (Exception $e){

            return redirect()->route('home.index');

        }

    }

    public function list()
    {
        $data = []; 
        $data["orders"] = Order::all();

        return view('order.list')->with("data",$data);
    }
}
