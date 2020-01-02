<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $name = explode(' ',$data['name']);

        $firstname = $name[0];
        $lastname = null;

        if(count($name) > 1) {
            $lastname = end($name);
        }


        $account = \Stripe\Account::create([
            'country' => 'PT',
            'type' => 'custom',
            'email' => $data['email'],
            'country' => 'PT',
            'default_currency' => 'eur',
            'business_type' => 'individual',
            'individual' => [
                'first_name' => $firstname,
                'last_name' => $lastname,
                'email' => $data['email'],

            ],
            'requested_capabilities' => ['card_payments', 'transfers'],
        ]);




        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'stripe_id' => $account->id,
            'password' => Hash::make($data['password']),
            
        ]);

        

    }
}
