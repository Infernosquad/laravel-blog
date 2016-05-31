<?php

namespace App\Http\Controllers;

use Payum\LaravelPackage\Controller\PayumController;
use Payum\Core\Request\GetHumanStatus;
use Symfony\Component\HttpFoundation\Request;

class PaymentController extends PayumController
{
    public function preparePayment()
    {
        $storage = $this->getPayum()->getStorage('App\Payment');

        $payment = $storage->create();
        $payment->setNumber(uniqid());
        $payment->setCurrencyCode('USD');
        $payment->setTotalAmount(123); // 1.23 EUR
        $payment->setDescription('A description');
        $payment->setClientId('id');
        $payment->setClientEmail('foo@example.com');
        $payment->setDetails(array());
        $storage->update($payment);

        $captureToken = $this->getPayum()->getTokenFactory()->createCaptureToken('paypal', $payment, 'payment_done');

        return \Redirect::to($captureToken->getTargetUrl());
    }

    public function done()
    {
        $payum_token = \Input::get('payum_token');

        /** @var Request $request */
        $request = \App::make('request');

        $request->attributes->set('payum_token', $payum_token);

        $token = $this->getPayum()->getHttpRequestVerifier()->verify($request);
        $gateway = $this->getPayum()->getGateway($token->getGatewayName());

        $gateway->execute($status = new GetHumanStatus($token));

        return redirect()->route('article.index')->with('message','Payment has been successful!');
    }
}

