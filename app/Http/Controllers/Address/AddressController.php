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
        $validatedData = $request->validate([
            'name' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'address_extra' => 'nullable|sometimes|min:8|confirmed',
            'city' => 'nullable|sometimes|min:8',
            'zip' => 'nullable|sometimes|min:8',
            'region' => 'nullable|sometimes|min:8',
            'country' => 'nullable|sometimes|min:8',
            'phone' => 'nullable|sometimes|min:9'
        ]);

        $address = DB::table('addresses')->find($request->id);


        if(isset($validatedData['name'])) {
            $address->name = $validatedData['name'];
        }

        if(isset($validatedData['address'])) {
            $address->address = $validatedData['address'];
        }

        if(isset($validatedData['address_extra'])) {
            $address->address_extra = $validatedData['data_extra'];
        }
        if(isset($validatedData['city'])) {
            $address->city = $validatedData['city'];
        }
        if(isset($validatedData['zip'])) {
            $address->zip = $validatedData['zip'];
        }
        if(isset($validatedData['region'])) {
            $address->region = $validatedData['region'];
        }
        if(isset($validatedData['country'])) {
            $address->country = $validatedData['country'];
        }

        if(isset($validatedData['phone'])) {
            $address->phone = $validatedData['phone'];
        }

        $address->save();
        dd($address);
    }
}
