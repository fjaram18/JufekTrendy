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

    public function list()
    {
        $data = []; 
        $data["orders"] = Order::all();

        return view('order.list')->with("data",$data);
    }
}