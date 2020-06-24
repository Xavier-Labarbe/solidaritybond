@extends('layouts.main')

@section('main')

@php $userAppointments = \DB::table('appointments')->where('to_id', Auth::user()->id)->get(); @endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div style="padding-bottom:3rem">
                <div class="card">
                    <div class="card-header">Vos propositions de rendez-vous</div>
                    <div> @php
                        use Carbon\Carbon;
                        $dt = Carbon::now();
                        $dt->toDateString();

                        $appointments =
                        \DB::table('appointments')->join('users','appointments.from_id','=','users.id')->where([['to_id','=',Auth::user()->id],['appointments.status','=',1]])
                        ->orderBy('date')->whereDate('date','>=',$dt)->get();
                        foreach ($appointments as $appointment) {
                        $originalDate = $appointment->date;
                        $newDate = date("jS F, Y", strtotime($originalDate));
                        // $newDate = date("d-m-Y", strtotime($originalDate));
                        $newDuration = date("H\hi",strtotime($appointment->duration));


                        if($appointment->status='1'){
                        $status = "<i class=\"fas fa-hourglass-half\"></i>";
                        }if($appointment->status='0'){
                        $status ="<i class=\"fas fa-check\"></i>";
                        }

                        echo
                        "<li class=\"list-group-item\">
                            <div class=\"calendar_container\">
                                <div style=\"text-align-last: center;width: 27rem;\">
                                    <h4 style=\"margin-bottom: 0\">$newDate</h4>
                                </div>
                                <div style=\"width:12rem;margin-right:1rem;display:flex;align-items:baseline\">
                                    <h4 style=\"margin-right:1rem;margin-bottom: 0\">
                                        ".date("H\hi",strtotime($appointment->hour))."</h4>
                                    <i class=\"fas fa-business-time\"></i>
                                    <h6 style=\"margin-bottom: 0;margin-left:0.5rem\">$newDuration</h6>

                                </div>

                                <div class=\" card\" style=\"width: 45rem;\">
                                    <div class=\"card-body\" style=\"display: flex; align-items: center;
                                        justify-content: space-between;\">
                                        <div>
                                            <h5 class=\"card-title\">$appointment->first_name $appointment->name</h5>
                                            <h6 class=\"card-subtitle mb-2 text-muted\">$appointment->place , le
                                                $newDate</h6>
                                            <p class=\"card-text\">$appointment->context</p>

                                            <a href=\"#\" class=\"card-link\">Détails</a>
                                            <a href=\"conversations/$appointment->to_id\"
                                                class=\"card-link\">Conversation</a>
                                        </div>
                                        <form method=\"POST\" action=\"appointmentClient\">

                                            <input style=\"display:none\" name=\"appointment_id\"
                                                value=". \DB::table('appointments')->where('place',$appointment->place)->whereDate('date','=',$appointment->date)->whereDate('hour','=',$appointment->hour)->get() ." />
                                            <button class=\"acceptAppointment_button \">
                                                <div class=\"appointmentButton far fa-calendar-check \"></div>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </li>";

                        }

                        @endphp </div>


                </div>
            </div>

            <div>
                <div class="card">
                    <div class="card-header">Vos évènements à venir</div>
                    <div> @php
                        $dt = Carbon::now();
                        $dt->toDateString();

                        $appointments =
                        \DB::table('appointments')->join('users','appointments.from_id','=','users.id')->where([['to_id','=',Auth::user()->id],['appointments.status','=',0]])
                        ->orderBy('date')->whereDate('date','>=',$dt)->get();
                        foreach ($appointments as $appointment) {
                        $originalDate = $appointment->date;
                        $newDate = date("jS F, Y", strtotime($originalDate));
                        // $newDate = date("d-m-Y", strtotime($originalDate));
                        $newDuration = date("H\hi",strtotime($appointment->duration));


                        if($appointment->status='1'){
                        $status = "<i class=\"fas fa-hourglass-half\"></i>";
                        }if($appointment->status='0'){
                        $status ="<i class=\"fas fa-check\"></i>";
                        }

                        echo
                        "<li class=\"list-group-item\">
                            <div class=\"calendar_container\">
                                <div style=\"text-align-last: center;width: 27rem;\">
                                    <h4 style=\"margin-bottom: 0\">$newDate</h4>
                                </div>
                                <div style=\"width:12rem;margin-right:1rem;display:flex;align-items:baseline\">
                                    <h4 style=\"margin-right:1rem;margin-bottom: 0\">
                                        ".date("H\hi",strtotime($appointment->hour))."</h4>
                                    <i class=\"fas fa-business-time\"></i>
                                    <h6 style=\"margin-bottom: 0;margin-left:0.5rem\">$newDuration</h6>

                                </div>

                                <div class=\" card\" style=\"width: 45rem;\">
                                    <div class=\"card-body\" style=\"display: flex; align-items: center;
                                        justify-content: space-between;\">
                                        <div>
                                            <h5 class=\"card-title\">$appointment->first_name $appointment->name</h5>
                                            <h6 class=\"card-subtitle mb-2 text-muted\">$appointment->place , le
                                                $newDate</h6>
                                            <p class=\"card-text\">$appointment->context</p>

                                            <a href=\"#\" class=\"card-link\">Détails</a>
                                            <a href=\"conversations/$appointment->from_id\"
                                                class=\"card-link\">Conversation</a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </li>";

                        }

                        @endphp </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection('main')