<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentClientController extends Controller
{
    public function index(Request $req)
    {
        return $this->validator($req);
    }

    protected function validator(Request $req)
    {
        echo "E";
        // \DB::table('appointments')->where('id', $req->appointment_id)->update(['status' => 0]);
        // return redirect('appointment');
    }
}