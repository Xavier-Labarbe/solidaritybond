<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

class AccountController extends Controller
{
    public function index (Request $req)
    {
        User::where('id', Auth::user()->id)
        ->update(['name'=>$req->Name, 'first_name'=>$req->Firstname, 'address' => $req->Address, 'email'=>$req->Email, 'phone'=>$req->Phone,]);
        //manque mot de passe
        return view('account');
    }
}
