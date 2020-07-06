<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use App\TokenStore\TokenCache;
use DateTime;
use DateInterval;

class AppointmentController extends Controller
{

    public function choose()
    {
        if (Auth::user()->status == 1) {
            return view('appointmentClient');
        }
        if (Auth::user()->status == 2) {
            return view('appointmentFablab');
        }
    }


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

        $validate->errors()->add('goodEntrie', 'Le rendez-vous a bien été envoyé !');
        return view('appointmentFablab')->withErrors($validate->errors());
    }

    protected function addAppointment(Request $req)
    {
        \DB::table('appointments')->insert(
            ['from_id' => Auth::user()->id, 'to_id' => $req->client, 'context' => $req->reason, 'place' => $req->place, 'date' => $req->date, 'hour' => $req->hour, 'duration' => $req->duration, 'status' => "1"]
        );
    }

    public function postsMicrosoft($req)
    {
        //echo $req->date,'T',$req->hour;
        //echo '2020-07-03T20:00:00';
        $viewData = $this->loadViewData();

        // Get the access token from the cache
        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();

        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        $fullDate = new DateTime($req->date . $req->hour);
        $tabDuration = explode(':', $req->duration);
        $fullDate->add(new DateInterval('PT' . $tabDuration[0] . 'H' . $tabDuration[1] . 'M'));
        $completeDate = $fullDate->format('Y-m-d') . "T" . $fullDate->format('H:i:s');

        $data = [
            'Subject' => $req->first_name . " " . $req->context,
            'Start' => [
                'DateTime' => $req->date . 'T' . $req->hour,
                'TimeZone' => 'Europe/Paris',
            ],
            'End' => [
                'DateTime' => $completeDate,
                'TimeZone' => 'Europe/Paris',
            ],
            "location" => [
                "DisplayName" => $req->place,
            ]
        ];


        $url = '/me/events';

        $events = $graph->createRequest('POST', $url)
            ->attachBody($data)
            ->setReturnType(Model\Event::class)
            ->execute();
    }

    public function accept(Request $req)
    {
        \DB::table('appointments')->where('id', $req->id)->update(['status' => 0]);
        $viewData = $this->loadViewData();

        $this->postsMicrosoft($req);
        return redirect('/appointment');
    }

    public function deny(Request $req)
    {
        \DB::table('appointments')->where('id', $req->id)->update(['status' => 2]);
        return redirect('/appointment');
    }



    public function delete(Request $req)
    {

        $viewData = $this->loadViewData();

        // Get the access token from the cache
        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();

        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        $queryParams = array(
            '$id' => $req->id
        );

        // $urll = '/me/events';
        $url = '/me/events?' . http_build_query($queryParams);

        $events = $graph->createRequest('DELETE', $url)
            ->setReturnType(Model\Event::class)
            ->execute();

        return redirect('/appointment');
    }
}