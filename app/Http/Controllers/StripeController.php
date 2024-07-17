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

    public function createPaymentIntent(Request $request)
    {
        $amount = $request->input('amount') * 100;
        $currency =  $request->input('currency');
        $paymentIntent = $this->stripeService->createPaymentIntent($amount,$currency);

        return response()->json($paymentIntent);
    }
}
