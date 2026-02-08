<?php

namespace App\Http\Controllers;

use App\Services\StripeService;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    protected $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function oldcreatePaymentIntent(Request $request)
    {
        $amount = $request->input('amount') * 100;
        $currency =  $request->input('currency');
        $paymentIntent = $this->stripeService->createPaymentIntent($amount, $currency);
        return response()->json(['clientSecret' => $paymentIntent->client_secret]);
        return response()->json($paymentIntent);
    }

    public function createPaymentIntent(Request $request)
    {
        $amount = $request->input('amount') * 100;
        $currency =  $request->input('currency');
        $email = $request->input('email');
        $orderId =  uniqid('order_');
        // $orderId = $request->input('order_id');
        //hardcoded currency to gbp for now, can be changed to dynamic later
        $currency = 'gbp';

        $paymentIntent = $this->stripeService->createPaymentIntent($amount, $currency, [
            'metadata' => [
                'order_id' => $orderId,
                'user_email' => $email,
            ],
        ]);

        return response()->json(['clientSecret' => $paymentIntent->client_secret]);
    }
}
