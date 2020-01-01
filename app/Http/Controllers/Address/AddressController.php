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
    public function index(Request $request){
        $address = DB::table('addresses')->get();
        return view('address.addressList',['address' => $address]);
    }

    public function add(Request $request){
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

        return redirect('/account/address/');
    }

    /* public function edit(){
        $address = DB::table('addresses')->get();
        foreach($address as $key => $data){
            $user = Auth::User();
            if($user->id == $data->user_id){
                return view('address.edit',['data' => $data]);
            }
        }
    } */

    public function edit(Request $request){
        $address = DB::table('addresses')->get();

        foreach($address as $key => $data){
            if($data->id == $request->id)
            return view('address.edit',['data' => $data]);
        }
    }

    public function editAddress(Request $request){
        $user = Auth::User();

        $address = Address::find();

        dd($address);

        if($user->id != $request->id){
            return redirect ("/account/address");
        }

        $address->name = $request->name;
        $address->address = $request->address;
        $address->address_extra = $request->address_extra;
        $address->phone = $request->phone;
        $address->city = $request->city;
        $address->region = $request->region;
        $address->country = $request->country;
        $address->zip = $request->zip;

        $address->save();

        return redirect ("/account/address");
    }

    public function isMain(Request $request){
        dd($request);
    }

}
