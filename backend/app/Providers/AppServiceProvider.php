<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function () {
            return new Gateway(
              [

                'environment' => ('sandbox'),
                'merchantId' => ('jk4yxsc6fst874ky'),
                'publicKey' => ('9cdq6vc8b3y7k94j'),
                'privateKey' => ('357ea61ac46565e179a25972b59c16e4'),


              ]
            );
        });
    }
}
