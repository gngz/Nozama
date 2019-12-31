<?php

namespace App\Http\Controllers;

use App\Proposal;
use App\Purchase;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    function make(Request $request) {

        $purchase = Purchase::find($request->id);

        //dd($purchase);

        return view('proposal.make',['purchase' => $purchase]);
    }

    function addProposal(Request $request) {
        $request->validate([
            'price' => 'required|numeric',
            'condition' => 'required|string',
            'description' => ['required','string', 
                function ($attribute, $value, $fail) {
                    if ($value === '<p><br></p>') {
                        $fail(trans('validation.required'));
                    }
                } 
            ]
        ]);

        $user = Auth::User();
        $purchase = Purchase::find($request->id);

        $proposal = new Proposal();

        $proposal->description = $request->description;
        $proposal->price = $request->price;
        $proposal->purchase_id = $purchase->id;
        $proposal->user_id = $user->id;

        $proposal->save();
        
        if($request->hasFile('imageUpload'))
        {
 
            $files = $request->file('imageUpload');
            foreach ($files as $file) {
               $path =  $file->store('images');
               $image = new Image;
               
               $image->path = $path;
               $image->proposal_id = $proposal->id;
               $image->save();
            }
        }


       



       

    }
}
