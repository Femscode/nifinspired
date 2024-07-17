<?php

namespace App\Services;

use Exception;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function createPaymentIntent($amount, $currency = 'usd')
    {
        try {
            return PaymentIntent::create([
                'amount' => $amount,
                'currency' => $currency,
            ]);
        } catch (ApiErrorException $e) {
           
            return response()->json([
                'error' => 'There was an error creating the payment intent.',
                'message' => $e->getMessage()
            ], 500);
        }
       
    }
}
