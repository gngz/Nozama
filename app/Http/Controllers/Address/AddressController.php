<?php

namespace App\Http\Controllers\Address;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
        $address = Address::all();
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



        redirect(route('addressList'));
    }


    public function edit(Request $request){
        $address = Address::find($request->id);


        // Verificar se a morada existe ou se é do user
        
        return view('address.edit',['data' => $address]);
        
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



        if($address){

            
            if($address->user != $user){

                
                return redirect(route('addressList'));
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

            return redirect(route('addressList'));


        } else {
            return redirect(route('addressList'));
        }

    }

    public function remove(Request $request) {
        $user = Auth::User();

        $address = Address::find($request->id);

        if($address) {

            
            if($address->user == $user) {
                $address->delete();
                return view('msg', ['message' => "Morada removida com sucesso."]);
            }

        } 

        return redirect(route('addressList'));

    }

    public function setMain(Request $request){
        $user = Auth::User();

        $address = Address::find($request->id);

        if($address) {
            
            if($address->user == $user) {

                $this->unsetMain();
                $address->is_main = true;

                $address->save();
                
                return redirect(route('addressList'));
            }

        } 

        return redirect(route('addressList'));
    }

    public function unsetMain() {
        $user = Auth::User();

        $addresses = $user->addresses;

        $addresses->filter(function($address) {
            if($address->is_main) {
                $address->is_main = false;
                $address->save();
            }
        });
    }

}
