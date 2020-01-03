<?php

namespace App\Http\Controllers;

use App\Proposal;
use App\Purchase;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{

    function view(Request $request) {
        $user = Auth::User();
        $proposal = Proposal::find($request->id);
       
        
        if($proposal) {
            $purchase = $proposal->purchase;
            $images = $proposal->images();
            if($user->id == $proposal->user->id or $user->id == $purchase->user->id) {
                return view('proposal.view',['purchase' => $purchase,'proposal' => $proposal , 'images' => $images, 'user' => $user]);
            }
            
        } else {
            return redirect('/');
        }
       


    }

    function delete(Request $request) {

        $user = Auth::User();

        $proposal = Proposal::find($request->id);

        if($proposal) {
            if($proposal->user->id == $user->id) {
                $proposal->delete();
                return view('msg', ['message' => "Proposta removida com sucesso"]);
            } 

            
        }

        return redirect("/");

        
    }

    function main(Request $request) {
        
        $user = Auth::User();

        $proposals = $user->proposals()->orderBy('id','DESC')->paginate(10);

 
        return view("proposal.main",['proposals' => $proposals]);
    } 


    function make(Request $request) {

        $user = Auth::User();

        $purchase = Purchase::find($request->id);

        if($user == $purchase->user)
            return redirect('/');

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
        $proposal->state = $request->condition;
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

        return redirect(route("viewProposal",$proposal->id));


    }
}
