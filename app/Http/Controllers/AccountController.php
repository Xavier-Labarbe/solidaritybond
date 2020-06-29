<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

use Auth;

use App\User;

class AccountController extends Controller
{
    public function index (Request $req)
    {
        if ($req->material != null){
            return $this->board($req);
        }else{
            return $this->validator($req);
        }
    }

    protected function validator(Request $req)
    {        
        $validate = Validator::make($req->all(), [
            'Name' => ['required', 'string', 'max:255'],
            'Firstname' => ['required', 'string', 'max:255'],
            'Address' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
            'Phone' => ['required', 'string', 'max:14'],
            'Newpassword' => $req->Newpassword != null ?'string|min:8|confirmed': ''
        ]);

        if ( !Hash::check($req->Password, Auth::user()->password) ) {
            $validate->errors()->add('Password', 'Your current password is incorrect.');
        }
        
        if ($validate->errors() != '[]'){
            return view('account')->withErrors($validate->errors());
        }
        else
        {
            $this->changeinfo($req);
            return back();
        }
    }

    public function changeinfo (Request $req)
    {       
        User::where('id', Auth::user()->id)
        ->update(['name'=>$req->Name, 'first_name'=>$req->Firstname, 'address' => $req->Address, 'email'=>$req->Email, 'phone'=>$req->Phone]);
        
        if ($req->Newpassword != null){
            User::where('id', Auth::user()->id)
            ->update(['password'=>Hash::make($req->Newpassword)]);
        }
    }
    
    public function board (Request $req){
        \DB::table('material')->insert(
            ['material' => $req->material, 'amount' => $req->amount]
        );
        return back();
    }
}
