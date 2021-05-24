<?php

namespace App\Http\Controllers;
use Http;

class CurrencyController extends Controller
{
    public function index()
    {
        $resEuro = Http::get('https://api.currencyscoop.com/v1/latest/?base=EUR&api_key=893eb7e43a1218c907541e60ce39885a');
        $euro = $resEuro->json();

        $resDolar = Http::get('https://trm-colombia.vercel.app/?date=2021-05-23');
        $dolar = $resDolar->json();

        $resPesosmxn = Http::get('https://api.currencyscoop.com/v1/latest/?base=MXN&api_key=893eb7e43a1218c907541e60ce39885a');
        $mxn = $resPesosmxn->json();

        return view('currency.index', compact('dolar','euro','mxn'));
    }
}