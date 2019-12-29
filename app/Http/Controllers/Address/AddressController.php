<?php

namespace App\Http\Controllers\Address;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        $address = DB::table('addresses')->get();
        return view('address.addressList',['address' => $address]);
    }

    public function add(){
        return view('address.add');
    }

    public function addAdress(Request $request){
        // validação para introdução de valores na base de dados
       /*  $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'address' => 'required|string',
            'address_extra' => 'nullable|numeric',
            'city' => 'nullable|numeric',
            'zip' => 'required|numeric',
            'region' => 'required|numeric',
            'country' => 'required|numeric',
            'phone' => 'nullable|numeric',
        ]); */

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
    }
}
