@extends('layouts.main')

@section('main')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Prise de rendez-vous</div>

                <div class="card-body">
                    <form method="POST" action="{{  route('appointment') }}">
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
                <div class="form-group row mb-0 ">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Soumettre le rendez-vous
                        </button>
                    </div>
                </div>
                </form>
                @error('goodEntrie')
                    <div class="alert alert-success goodentriealert" role="alert">
                        {{ $errors->first('goodEntrie') }}
                    </div>
                @enderror
            </div>
 
            {{--<div class="col-md-10">
                <div class="card">
                    <div class="card-header">Vos rendez-vous</div>
                     @php
  
                $appointments = \DB::table('appointments')->where([['id_from',
                '=',Auth::user()->id],['date','>=',]])get();
                foreach ($appointments as $appointment) {
                echo "<div class=\"modal\" tabindex=\"-1\" role=\"dialog\">
                    <div class=\"modal-dialog\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h5 class=\"modal-title\">Modal title</h5>
                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                            </div>
                            <div class=\"modal-body\">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-secondary\"
                                    data-dismiss=\"modal\">Close</button>
                                <button type=\"button\" class=\"btn btn-primary\">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>";
                }

                @endphp --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection('main')