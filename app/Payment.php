<?php

namespace App;

use Payum\LaravelPackage\Model\Payment as BasePayment;

class Payment extends BasePayment
{
    protected $table = 'payments';
}
