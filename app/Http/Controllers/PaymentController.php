<?php

namespace App\Http\Controllers;

// app/Http/Controllers/PaymentController.php
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Product Name',
                        ],
                        'unit_amount' => 1000, // Amount in cents
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => url('/checkout/success'),
            'cancel_url' => url('/checkout/cancel'),
        ]);

        return redirect($session->url);
    }
}
