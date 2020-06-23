<?php

namespace App\Http\Controllers;

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
        $var = \DB::table('appointments')->where([
            ['place', '=', $req->place],
            ['date', '=',  $req->date],
            // ['hour', '',  $req->hour],
        ])->get();

        echo $var;
        $validate = Validator::make($req->all(), [
            'client' => ['required', 'string', 'max:255'],
            'reason' => ['required', 'string', 'max:255'],
            'place' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:10'],
            'hour' => ['required', 'string', 'max:5'],
        ]);
        // if ($var != "[]") {
        //     echo "coucou";
        //     $validate->errors()->add('hour', 'L\'heure pour la date selectionnée est déjà reservée pour ce lieu.');
        //     return view('appointment')->withErrors($validate->errors());
        // }
        $this->addAppointment($req);
    }

    protected function addAppointment(Request $req)
    {
        \DB::table('appointments')->insert(
            ['from_id' => Auth::user()->id, 'to_id' => $req->client, 'context' => $req->reason, 'place' => $req->place, 'date' => $req->date, 'hour' => $req->hour, 'duration' => $req->duration]
        );
    }
}