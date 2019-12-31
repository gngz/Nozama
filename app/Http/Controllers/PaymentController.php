<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function payment(Request $request) {

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $proposal = Proposal::find($request->id);

        $images = $proposal->images;

        $imgs = null;

        foreach ($images as $image) {
            $imgs[] = url('/storage/'. $image->path);
         
        }

     

        dd($imgs);

        if($proposal) {
            
            $stripe_session = \Stripe\Checkout\Session::create([
                'customer_email' => $proposal->user->email,
                'payment_method_types' => ['card'],
                'line_items' => [[
                  'name' => $proposal->purchase->title,
                  'images' => $imgs,
                  'amount' => floatval($proposal->price)*100,
                  'currency' => 'eur',
                  'quantity' => 1,
                ]],
                'success_url' => url('/payment/sucess').'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => url('/payment/cancel'),
              ]);

              return view("payment.payment",['stripe_session' => $stripe_session->id]);

        }
    }
}
