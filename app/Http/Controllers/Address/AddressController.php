<?php

namespace App\Http\Controllers\Address;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class AddressController extends Controller
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(){
        return view('address.addressList');
    }

    public function add(){
        return view('address.add');
    }

    public function addAdress(Request $request){
        
        $address = new Address();
        
        $address->user_id = Auth::User()->id;

        $address->name = $request->name;
        $address->address = $request->address;
        $address->address_extra = $request->address_extra;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->region = $request->region;
        $address->country = $request->country;
        $address->phone = $request->phone;

        $address->save();  

        //dd($address);
    }
}
