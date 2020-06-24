<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index(Request $req)
    {
        return $this->validator($req);
    }

    protected function validator(Request $req)
    {
        echo "coucou";
        // \DB::table('appointments')->where('id', $req->appointment_id)->update(['status' => 0]);
        // return redirect('appointment');
    }
}