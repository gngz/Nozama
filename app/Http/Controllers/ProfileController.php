<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    function sendMail(Request $request) {

        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => ['required','string', 
                function ($attribute, $value, $fail) {
                    if ($value === '<p><br></p>') {
                        $fail(trans('validation.required'));
                    }
                } 
            ],
        ]);

        $message = $request->message;
        $subject = $request->subject;
        $user = Auth::User();
        $to = User::find($request->id);
        
        Mail::to($to)->send(new Contact($message,$user,$subject));
        
        return view("msg", ["message" => "Mensagem enviada com sucesso!"]);

    }

    function remove(Request $request) {
        $is_admin = Auth::user()->role == 'admin';
        $user = User::find($request->id);

    
        if($is_admin) {

            if($user) {
                if($user != Auth::user()) {
                    $user->delete();
                    return view('msg', ['message' => "Utilizador removido com sucesso."]);
                }
            }
            return redirect(route('viewProfile', $request->id));
        } else {
            return redirect(route('account'));
        }

    }
}
