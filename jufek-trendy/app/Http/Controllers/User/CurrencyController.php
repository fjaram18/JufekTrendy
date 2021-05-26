<?php
//Author: Federico Jaramillo

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\Currency;

class CurrencyController extends Controller
{
    public function index()
    {
        $data = [];
        $data["title"] = __('messages.currency_rate');
        
        $currency_rates = app(Currency::class);
        $data["responseBody"] = $currency_rates->getRates();

        return view('currency.index')->with("data", $data);
    }
}
