<?php

namespace App\Http\Controllers;

use App\Address;
use App\Mail\Recipe;
use App\Movement;
use App\Proposal;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    function pay(Request $request) {
        $user = Auth::User();
        $proposal = Proposal::find( $request->id);

        if($proposal) {
            $purchase = $proposal->purchase;

            if($purchase->user == $user) {

                return view('payment.confirm', ['purchase' => $purchase, 'proposal' => $proposal]);
               
            }

            return redirect(route('account'));

        }

        return redirect(route('account'));


    }

    function setAddress(Request $request) {
        $user = Auth::user();
        $addresses = $user->addresses;

        
        return view('payment.address', ['addresses' => $addresses]);
    }

    function process(Request $request) {

        $user = Auth::User();
        $address = Address::find($request->address);

        if($address->user != $user) {
            return redirect(route('account'));
        }

        $purchase_id = $request->session()->get('payment_purchase');
        $proposal_id = $request->session()->get('payment_proposal');

     

        DB::beginTransaction();

        $purchase = Purchase::find($purchase_id);

        
        $proposal = Proposal::find($proposal_id);

        if($purchase && $proposal) {

            //dd($proposal->description);
           
            $price = $proposal->price;
            $seller = $proposal->user;

            if($user->balance - $price > 0) {
                $user->balance -= $price;
                $seller->balance += $price;

                $user->save();

                $seller->save();
                DB::commit();

                $movement_seller = new Movement();

                $movement_seller->type = "sell";
                $movement_seller->state = "paid";
                $movement_seller->amount = $price;
                $movement_seller->user_id = $seller->id;
                $movement_seller->description = $purchase->title;

                $movement_seller->save();

                
                $movement_buyer = new Movement();

                $movement_buyer->type = "buy";
                $movement_buyer->state = "paid";
                $movement_buyer->amount = $price;
                $movement_buyer->user_id = $user->id;
                $movement_buyer->description = $purchase->title;

                $movement_buyer->save();

                $this->sendRecipe($user, $seller, $address , $purchase, $price);

                $purchase->delete();

                return view('msg', ['message' => "Pagamento efectuado com sucesso."]);




            } else {

                DB::rollBack();


                return view('msg', ['message' => "Sem fundos suficientes!"]);
                // Sem fundos

            }

            


            
        } else {
            return view('msg', ['message' => "Ocorreu um erro fatal no processamento do pagamento."]);
        }

        

        
    }

    function sendRecipe($user, $seller, $address, $purchase, $price) {
        Mail::to(Auth::user())->bcc($seller)->send(new Recipe($user, $seller, $address, $purchase, $price));
     
    }

    function sendInfo() {

    }

    function confirm(Request $request) {

        
        $user = Auth::User();
        $proposal = Proposal::find( $request->id);

        
        if($proposal) {
            $purchase = $proposal->purchase;

            if($purchase->user == $user) {


                $request->session()->forget(['payment_purchase', 'payment_proposal']);
  

                $request->session()->put('payment_purchase', $purchase->id);
                $request->session()->put('payment_proposal', $proposal->id);


                return redirect(route('paymentAddress'));
               
            }

            return redirect(route('account'));

        }

        return redirect(route('account'));


    }
}
