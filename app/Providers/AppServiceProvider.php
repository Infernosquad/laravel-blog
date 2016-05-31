<?php

namespace App\Providers;

use Config;
use Illuminate\Support\ServiceProvider;
use App\Payment;
use Payum\Core\PayumBuilder;
use Payum\LaravelPackage\Storage\EloquentStorage;
use Payum\LaravelPackage\Model\Token;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving('payum.builder', function(PayumBuilder $payumBuilder) {


            $payumBuilder
                ->setTokenStorage(new EloquentStorage(Token::class))
                ->addStorage(Payment::class, new EloquentStorage(Payment::class))
                ->addGateway('paypal', [
                    'factory'   => 'paypal_express_checkout',
                    'username'  => Config::get('services.paypal.username'),
                    'password'  => Config::get('services.paypal.password'),
                    'signature' => Config::get('services.paypal.signature'),
                    'sandbox'   => true
                ]);
        });
    }
}
