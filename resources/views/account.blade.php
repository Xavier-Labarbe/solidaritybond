@extends('layouts.main')

    @section('main')

    <div class="card accountinfo">
       <form method="POST" action="{{  route('account') }}">
            @csrf
            <div class="row no-gutters">
                <div class="col-md-6 form-group">
                    <label>Nom</label>
                    <input name="Name" class="accountinput form-control" value="{{ Auth::user()->name }}">
                    @error('Name')
                        <div class="text-danger">
                            <small>{{ $errors->first('Name') }}</small>
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label>Prénom</label>
                    <input name="Firstname" class="form-control" value="{{ Auth::user()->first_name }}">
                    @error('Firstname')
                        <div class="text-danger">
                                <small>{{ $errors->first('Firstname') }}</small>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-md-4 form-group">
                    <label>Adresse</label>
                    <input name="Address" class="accountinput form-control" value="{{ Auth::user()->address }}">
                    @error('Address')
                        <div class="text-danger">
                            <small>{{ $errors->first('Address') }}</small>
                        </div>
                    @enderror
                </div>

                <div class="col-md-4 form-group">
                    <label>Adresse Email</label>
                    <input name="Email" type="email" class="accountinput form-control" value="{{ Auth::user()->email }}">
                    @error('Email')
                        <div class="text-danger">
                            <small>{{ $errors->first('Email') }}</small>
                        </div>
                    @enderror
                </div>

                <div class="col-md-4 form-group">
                    <label>Téléphone</label>
                    <input name="Phone" class="form-control" value="{{ Auth::user()->phone }}">
                    @error('Phone')
                        <div class="text-danger">
                            <small>{{ $errors->first('Phone') }}</small>
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="row no-gutters">
                <div class="col-md-6 form-group">
                    <label>Nouveau mot de passe</label>
                    <input type="password" name="Newpassword" class="accountinput form-control">
                </div>

                <div class="col-md-6 form-group">
                    <label>Confirmer le nouveau mot de passe</label>
                    <input type="password" name="Newpassword_confirmation" class="form-control">
                    @error('Newpassword')
                        <div class="text-danger">
                            <small>{{ $errors->first('Newpassword') }}</small>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="accountpassword">
                <div class="form-group">
                    <strong>Veuillez taper votre mot de passe actuel avant de sauvegarder</strong>
                    <input type="password" name="Password" class="form-control">
                    @error('Password')
                        <div class="text-danger">
                            <small>{{ $errors->first('Password') }}</small>
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </div>
        </form>
    </div>

    @if(\Auth::user()->status == '2')
    <div class="card accountinfo">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{  route('account') }}">
                @csrf
                <div class="form-group mx-sm-3 mb-2">
                    <label>Quantité de plastique restante en mètre : </label>
                    @php 
                    $id = \DB::table('material')->where('material', '1')->max('id');
                    $plastics = \DB::table('material')->where('id', $id)->get();
                    foreach ($plastics as $plastic) {
                        $var = $plastic->amount;
                    }
                    @endphp
                    <input name="plastic" type="number" class="form-control" required value="{{  $var }}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirmer</button>
            </form>
            <div id="PlasticAmount-div"></div>
                {!! \Lava::render('AreaChart', 'PlasticAmount', 'PlasticAmount-div') !!}
            </div>


        <div id="apointementstates-div"></div>
            {!! \Lava::render('DonutChart', 'apointementstates', 'apointementstates-div') !!}
        </div>
    </div>

    @endif


    @endsection('main')
