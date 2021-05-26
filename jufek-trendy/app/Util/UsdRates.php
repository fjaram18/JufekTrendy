<?php

namespace App\Util;

use App\Interfaces\Currency;
use Illuminate\Support\Facades\Http;

class UsdRates implements Currency
{

    public function getRates()
    {
        $response = Http::get('https://openexchangerates.org/api/latest.json', [ 
            'app_id' => '7be685da88b7413c88503af248b93b6b',
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }
}
