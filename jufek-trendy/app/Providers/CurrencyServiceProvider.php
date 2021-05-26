<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Currency;
use App\Util\EuroRates;
use App\Util\UsdRates;

class CurrencyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Currency::class, function () {
            return new UsdRates();
        });
    }
}
