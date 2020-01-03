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
        $user = Auth::User();
        return view('address.addressList',['address' => $address, 'user'=> $user]);
    }

    public function add(Request $request){
        return view('address.add');
    }

    public function addAdress(Request $request){
        $request->validate([
            'name' => 'required|string|max:30',
            'address' => 'required|string',
            'address_extra' => 'nullable|string',
            'phone' => 'required|numeric|min:9',
            'city' => 'required|sometimes|string|max:40',
            'region' => 'required|string',
            'zip' => 'required|string',
            'country' => 'required|string|max:58',
        ]);

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

    public function edit(Request $request){
        $address = DB::table('addresses')->get();

        foreach($address as $key => $data){
            if($data->id == $request->id)
                return view('address.edit',['data' => $data]);
        }
    }

    public function editAddress(Request $request){
        $request->validate([
            'name' => 'nullable|string|max:30',
            'address' => 'nullable|string',
            'address_extra' => 'nullable|string',
            'phone' => 'nullable|numeric|min:9',
            'city' => 'nullable|string|max:40',
            'region' => 'nullable|string',
            'zip' => 'nullable|string',
            'country' => 'nullable|string|max:58',
        ]);

        $user = Auth::User();

        $address = Address::find($request->id);

        //dd($address);

        if($address){

            if($address->id != $request->id){
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

            if($address->id == $request->id){
                    return redirect ("/account/address");
            }

        } else {
            return redirect('/account/address');
        }

    }

    public function isMain(Request $request){
        $user = Auth::User();

        $address = Address::find($request->id);

        dd($request);

        if($address){

            if($user->id != $request->id){
                return redirect ("/account/address");
            }

            $address->is_main = true;

            $address->save();

            if($address->id == $request->id){
                    return redirect ("/account/address");
            }

        } else {
            return redirect('/account/address');
        }
    }

}
