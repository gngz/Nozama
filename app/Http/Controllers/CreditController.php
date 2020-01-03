<?php

namespace App\Http\Controllers;

use App\Credit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;

class CreditController extends Controller
{

    function confirm(Request $request) {

        $amount = $request->value;
        $total = ( $this->calculateTotal($amount) ); 
        $fees = $total - $amount;

        if($amount < 0.5) {
            return view('msg', ['message' => "Tem adicionar pelo menos 0.50€ em créditos."]);
        }

        

        $credit = Array(
            'amount' => $amount,
            'fees' => $fees,
            'total' => $total
        );

        $user = Auth::User();


        $checkout = \Stripe\Checkout\Session::create([
            'customer_email' => $user->email,
            'payment_method_types' => ['card'],
            'locale' => 'pt',
            'client_reference_id' => $user->id,
            'payment_intent_data' => [
                'description' => 'Carregamento de fundos na plataforma Nozama.',
                'receipt_email' => $user->email,
                'statement_descriptor' => 'Carregamento Nozama',

            ],
            'line_items' => [[
                  'name' => 'Nozama Credit',
                  'description' => 'Carregamento de fundos na plataforma Nozama.',
                  'amount' => $total * 100,
                  'currency' => 'eur',
                  'quantity' => 1,
                ]
            ],
            'success_url' => url('/credit/success/').'/{CHECKOUT_SESSION_ID}',
            'cancel_url' => url('/credit/cancel'),
            'mode' => 'payment',
          ]);

          $db_credit = new Credit();

          $db_credit->stripe_id = $checkout->payment_intent;
          $db_credit->type = 'credit';
          $db_credit->user_id = $user->id;
          $db_credit->amount = $amount;

          $db_credit->save();



          return view('credit.confirm', ['credit'=> $credit, 'checkout_session' => $checkout->id ]);

    }

    function calculateTotal($amount) {
        return round(($amount + 0.25) / (1- 0.029 ),2);
    }


    function view(Request $request) {

        $user = Auth::User();

        $credits = $user->credits()->paginate(10);

        return view('credit.view',['user' => $user, 'credits' => $credits , 'controller' => $this]);
    }


    function success(Request $request) {
    
        $session = \Stripe\Checkout\Session::retrieve(
            $request->id
        );
       
        $payment = \Stripe\PaymentIntent::retrieve(
           $session->payment_intent
        );

        $balance = \Stripe\BalanceTransaction::retrieve(
            $payment->charges->data[0]->balance_transaction
        );


        if($payment->status = 'succeeded') {
            $user_id =  $session->client_reference_id;
            $user = User::find($user_id);
            $charge = $balance->net / 100;

            $stripe_id = $payment->id;
            
            $db_credit = Credit::all()->filter(function($credit) use ($stripe_id) {
                return $credit->stripe_id == $stripe_id;
            })->first();

            if($db_credit) {
                if($db_credit->state == 'paid') {
                    return redirect('/credit/cancel');
                } else {

                    DB::transaction(function () use($user, $charge) { 

                
                        $user->balance = $user->balance + $charge;
                        $user->save();
        
                    });

                    $db_credit->state = "paid";

                    $db_credit->save();
        
                    return view('credit.success', ['user' => $user,"charge" => $charge , "amount"=> $payment->amount / 100]);

                }

            } else {
                return redirect('/credit/cancel');
            }


        } else {

            return redirect('/credit/cancel');

        }

  

    }

    static function printType($type) {
        if($type == 'credit' )
            return 'Crédito';

        if($type == 'buy' )
            return 'Compra';

        if($type == 'sell' )
            return 'Venda';

    }


}
