<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();


        return view('account.main',["user" => $user]);
    }

    public function edit() {
        $user = Auth::user();
        return view('account.edit',["user" => $user]);
    }

    public function editForm(Request $request) {
        $validatedData = $request->validate([
            'name' => 'nullable|max:255',
            'email' => 'nullable|sometimes|string|email|max:255|unique:users',
            'password' => 'nullable|sometimes|min:8|confirmed',
            'old_password' => 'nullable|sometimes|min:8'
        ]);

        $user = Auth::user();


        if(isset($validatedData['name'])) {
            $user->name = $validatedData['name'];
        }

        if(isset($validatedData['email'])) {
            $user->email = $validatedData['email'];
        }

        if(isset($validatedData['password']) && isset($validatedData['old_password'])) {

            if(Hash::check($validatedData['old_password'], $user->password)) {
                $validatedData['valid'] = "true";
            } else {
                $validatedData['valid'] = "false";
            }
        }

        $user->save();
        
        return view('msg',['message' => "Conta modificada com sucesso!"]);
    }
}
