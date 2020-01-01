<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    function success(Request $request) {
    
        $session = \Stripe\Checkout\Session::retrieve(
            $request->id
        );
       
        $payment = \Stripe\PaymentIntent::retrieve(
           $session->payment_intent
        );


        if($payment->status = 'succeeded') {
            $proposal_id =  $session->client_reference_id;
            $proposal = Proposal::find($proposal_id);

            $user = $proposal->user;

            $user->balance = $user->balance + ($payment->amount/100);
            $user->save();

        } else {

        }

  

    }

    function payment(Request $request) {

        $user = Auth::User();




        $proposal = Proposal::find($request->id);


        if($proposal) {

            if($user->id != $proposal->purchase->user->id)
                return redirect('/');


            $images = $proposal->images;

            $imgs = null;

            foreach ($images as $image) {
                $imgs[] = url('/storage/'. $image->path);
            
            }
            
            $stripe_session = \Stripe\Checkout\Session::create([
                'customer_email' => $proposal->user->email,
                'payment_method_types' => ['card'],
                'client_reference_id' => $proposal->id,
                'locale' => 'pt',
                'line_items' => [[
                  'name' => $proposal->purchase->title,
                  'images' => $imgs,
                  'amount' => floatval($proposal->price)*100,
                  'currency' => 'eur',
                  'quantity' => 1,
                ]],
                'success_url' => url('/payment/success/').'/{CHECKOUT_SESSION_ID}',
                'cancel_url' => url('/payment/cancel'),
              ]);

              return view("payment.payment",['stripe_session' => $stripe_session->id]);

        } else {
            return redirect('/');
        }
    }
}
