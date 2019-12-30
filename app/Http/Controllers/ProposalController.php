<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    function make(Request $request) {

        $purchase = Purchase::find($request->id);

        //dd($purchase);

        return view('proposal.make',['purchase' => $purchase]);
    }
}
