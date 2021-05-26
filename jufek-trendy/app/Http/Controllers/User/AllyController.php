<?php
//Author: Federico Jaramillo

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class AllyController extends Controller
{
    public function index()
    {
        $data = [];
        $data["title"] = __('messages.allied_products');

        $response = Http::get('http://seedshop.ga/public/api/seed', [
            'limit' => 10,
        ]);

        $responseBody = json_decode($response->getBody());

        $data["responseBody"] = $responseBody;

        return view('ally.index')->with("data", $data);
    }
}
