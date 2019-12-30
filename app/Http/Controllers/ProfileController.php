<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function display(Request $request) {
        
        $user = User::find($request->id);


        if($user) {

            $purchases = $user->purchases()->paginate(5);
            return view("profile.main",["user" => $user,"purchases" => $purchases]);
        }
        else {
            return view("msg",["message" => "Utilizador não encontrado."]);
        }
    }

    function contact(Request $request) {

        $contact = User::find($request->id);
        $user = Auth::user();

        if($contact) {

            return view("profile.contact",["contact" => $contact, "user" => $user]);
        }
        else {
            return view("msg",["message" => "Utilizador não encontrado."]);
        }

    }
}
