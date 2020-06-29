@extends('layouts.main')

@section('main')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div style="margin-bottom:2rem" class="apointmentCard">
                <div class="card-header appointmentText">Prise de rendez-vous</div>

                <div style="padding:0%;padding-top: 1.25rem;" class="card-body appointmentText__form">
                    <form method="POST" action="appointment">
                        @csrf

                        <!-- Personne avec qui prendre le rdv -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Avec qui voulez-vous
                                prendre RDV </label>

                            <div class="col-md-6">
                                <select name="client" class="col-md-7 col-form-label text-md-right" id="person">
                                    @php
                                    $users = \DB::table('users')->get();
                                    foreach ($users as $user) {
                                    if($user->id != auth::user()->id){
                                    echo "<option selected=\"true\" value=$user->id>$user->first_name $user->name
                                    </option>";
                                    }
                                    }
                                    @endphp
                                </select>

                            </div>
                        </div>

                        <!-- motif du rdv -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Motif du
                                rendez-vous</label>

                            <div class="col-md-6">
                                <input id="object" type="object"
                                    class="form-control @error('object') is-invalid @enderror" name="reason" required
                                    autocomplete="current-object">
                            </div>
                        </div>

                        <!-- Lieu du rendez-vous -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Lieu du
                                rendez-vous</label>

                            <div class="col-md-6">
                                <input id="object" type="object"
                                    class="form-control @error('object') is-invalid @enderror" name="place" required
                                    autocomplete="current-object">
                            </div>
                        </div>

                        <!-- Date du rendez-vous -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Date du
                                rendez-vous</label>

                            <div class="col-md-6">
                                <input type="date" id="start" name="date" value="" min="" max="">
                            </div>
                        </div>

                        <!-- Heure du rendez-vous -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Heure du
                                rendez-vous</label>

                            <div class="col-md-6">
                                <input type="time" id="appt" name="hour" min="08:00" max="19:00" required>
                                @error('hour')
                                <div class="text-danger">
                                    <small>{{ $errors->first('hour') }}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Durée du
                                rendez-vous</label>


                            <div class="col-md-6">
                                <select name="duration" class="col-md-3 col-form-label text-md-right" id="duration">
                                    <option value="00:15">15 mn</option>
                                    <option value="00:30">30 mn</option>
                                    <option value="00:45">45 mn</option>
                                    <option value="1:00">1 h</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div style="text-align: center ;padding-bottom:1.25rem">
                    <button type="submit" class="btn btn-primary">
                        Soumettre le rendez-vous
                    </button>
                </div>

                </form>
                @error('goodEntrie')
                <div class="alert alert-success goodentriealert" role="alert">
                    {{ $errors->first('goodEntrie') }}
                </div>
                @enderror
            </div>

            <div class="col-md-20">
                <div class="apointmentCard">
                    <div class="card-header appointmentText">Vos rendez-vous</div>
                    <ul class="list-group">
                        @php

                        use Carbon\Carbon;
                        $dt = Carbon::now();
                        $dt->toDateString();

                        $appointments =
                        \DB::table('appointments')->where('from_id','=',Auth::user()->id)
                        ->orderBy('date')->whereDate('date','>=',$dt)->get();




                        foreach ($appointments as $appointment) {

                        $userInfos=
                        \DB::table('appointments')->join('users','appointments.to_id','=','users.id')->select('name','first_name','users.id')->get();

                        $first_name;
                        $name;
                        $id;

                        foreach ($userInfos as $value) {
                        $first_name=$value->first_name;
                        $name=$value->name;
                        $id=$value->id;
                        }

                        $originalDate = $appointment->date;
                        $newDate = date("jS F, Y", strtotime($originalDate));
                        // $newDate = date("d-m-Y", strtotime($originalDate));
                        $newDuration = date("H\hi",strtotime($appointment->duration));


                        if($appointment->status==1){
                        $status = "<i class=\"fas fa-hourglass-half\"></i>";
                        }if($appointment->status==0){
                        $status ="<i class=\"fas fa-check\"></i>";
                        }
                        if($appointment->status==2){
                        $status ="<i class=\"fas fa-times\"></i>";
                        }

                        echo
                        "<li class=\"list-group-item apointmentCard\">
                            <div class=\"calendar_container appointmentText\">
                                <div style=\"text-align-last: center;width: 27rem;\">
                                    <h4 style=\"margin-bottom: 0\">$newDate</h4>
                                </div>
                                <div style=\"width:12rem;margin-right:1rem;display:flex;align-items:baseline\">
                                    <h4 style=\"margin-right:1rem;margin-bottom: 0\">
                                        ".date("H\hi",strtotime($appointment->hour))."</h4>
                                    <i class=\"fas fa-business-time\"></i>
                                    <h6 style=\"margin-bottom: 0;margin-left:0.5rem\">$newDuration</h6>

                                </div>

                                <div class=\" apointmentCardLight\" style=\"width: 45rem;\">
                                    <div class=\"card-body\">
                                        <div style=\" display: flex; align-items: baseline; justify-content:
                                            space-between;\">
                                            <h5 class=\"card-title\">$first_name $name</h5>
                                            $status
                                        </div>
                                        <h6 class=\"card-subtitle mb-2 text-muted\">$appointment->place , le
                                            $newDate</h6>
                                        <p style=\"font-size:0.8rem\"class=\"card-text\">$appointment->context</p>
                                        <a href=\"#\" style=\"font-size:0.8rem\"class=\"card-link\">Modifier</a>
                                        <a href=\"#\" style=\"font-size:0.8rem\"class=\"card-link\">Détails</a>
                                        <a href=\"conversations/$appointment->to_id\"style=\"font-size:0.8rem\"
                                            class=\"card-link\">Conversation</a>

                                    </div>
                                </div>
                            </div>
                        </li>";

                        }

                        @endphp
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br>
@endsection('main')