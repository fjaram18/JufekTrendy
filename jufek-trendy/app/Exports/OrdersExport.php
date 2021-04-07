<?php
//Author: Federico Jaramillo

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user_id = Auth::user()->getId();
        return Order::where('user_id', '=', $user_id)->get();
    }
}
