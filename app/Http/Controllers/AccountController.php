<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Auth;

use App\User;

class AccountController extends Controller
{
    public function index (Request $req)
    {
        return $this->validator($req);
        //return view('account');
    }

    protected function validator(Request $data)
    {
         $validate = Validator::make($data->all(), [
            'Name' => ['required', 'string', 'max:255'],
            'Firstname' => ['required', 'string', 'max:255'],
            'Address' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'Phone' => ['required', 'string', 'max:14'],
            'Newpassword' => ['string', 'min:8', 'confirmed']
        ]);

        if ($validate->fails()){
            return view('account')->withErrors($validate->errors());
        }
        else
        {
            echo 'ok';
            //return $this->changeinfo($req);
        }
    }

    public function changeinfo (Request $req)
    {
        //crypter mot de passe
        
        User::where('id', Auth::user()->id)
        ->update(['name'=>$req->Name, 'first_name'=>$req->Firstname, 'address' => $req->Address, 'email'=>$req->Email, 'phone'=>$req->Phone,]);
        
        //return view('account');
    }
}
