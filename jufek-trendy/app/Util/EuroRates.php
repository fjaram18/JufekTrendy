<?php

namespace App\Util;

use App\Interfaces\Currency;
use Illuminate\Support\Facades\Http;

class EuroRates implements Currency
{

    public function getRates()
    {
        $response = Http::get('http://data.fixer.io/api/latest', [ 
            'access_key' => '839eaf95cea833805b460cac3d91b6c1',
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }
}
