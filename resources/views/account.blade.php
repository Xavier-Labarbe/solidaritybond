@extends('layouts.main')

    @section('main')

    <div class="card accountinfo">
        <form method="POST" action="{{  route('account') }}">
            @csrf
            <div class="row no-gutters">
                <div class="accountinput form-group">
                    <label>Nom</label>
                    <input name="Name" class="accountinput form-control" value="{{ Auth::user()->name }}">
                    @error('Name')
                        <div class="text-danger">
                            <small>{{ $errors->first('Name') }}</small>
                        </div>
                    @enderror
                </div>

                <div class="accountinput form-group">
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
                <div class="accountinput2 form-group">
                    <label>Adresse</label>
                    <input name="Address" class="form-control" value="{{ Auth::user()->address }}">
                    @error('Address')
                        <div class="text-danger">
                            <small>{{ $errors->first('Address') }}</small>
                        </div>
                    @enderror
                </div>

                <div class="accountinput2 form-group">
                    <label>Adresse Email</label>
                    <input name="Email" type="email" class="form-control" value="{{ Auth::user()->email }}">
                    @error('Email')
                        <div class="text-danger">
                            <small>{{ $errors->first('Email') }}</small>
                        </div>
                    @enderror
                </div>

                <div class="accountinput2 form-group">
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
                <div class="accountinput form-group">
                    <label>Nouveau mot de passe</label>
                    <input type="password" name="Newpassword" class="form-control">
                </div>

                <div class="accountinput form-group">
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
                    <input name="material" type="hidden" value="1">
                    <label>Quantité de plastique restante : </label>
                    @php 
                    $var = 0;
                    $id = \DB::table('material')->where('material', '1')->max('id');
                    $plastics = \DB::table('material')->where('id', $id)->get();
                    foreach ($plastics as $plastic) {
                        $var = $plastic->amount;
                    }
                    @endphp
                    <input name="amount" type="number" class="form-control" required value="{{  $var }}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirmer</button>
            </form>
            <div id="PlasticAmount-div" class="diagramdiv"></div>
                {!! \Lava::render('AreaChart', 'PlasticAmount', 'PlasticAmount-div') !!}

            <form class="form-inline" method="POST" action="{{  route('account') }}">
                @csrf
                <div class="form-group mx-sm-3 mb-2">
                    <input name="material" type="hidden" value="2">
                    <label>Quantité de papier carton restante : </label>
                    @php 
                    $var2 = 0;
                    $id = \DB::table('material')->where('material', '2')->max('id');
                    $papers = \DB::table('material')->where('id', $id)->get();
                    foreach ($papers as $paper) {
                        $var2 = $paper->amount;
                    }
                    @endphp
                    <input name="amount" type="number" class="form-control" required value="{{  $var2 }}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirmer</button>
            </form>
            <div id="PaperAmount-div" class="diagramdiv"></div>
                {!! \Lava::render('AreaChart', 'PaperAmount', 'PaperAmount-div') !!}

            <form class="form-inline" method="POST" action="{{  route('account') }}">
                @csrf
                <div class="form-group mx-sm-3 mb-2">
                    <input name="material" type="hidden" value="3">
                    <label>Quantité de plexyglass restante : </label>
                    @php 
                    $var3 = 0;
                    $id = \DB::table('material')->where('material', '3')->max('id');
                    $plexyglasss = \DB::table('material')->where('id', $id)->get();
                    foreach ($plexyglasss as $plexyglass) {
                        $var3 = $plexyglass->amount;
                    }
                    @endphp
                    <input name="amount" type="number" class="form-control" required value="{{  $var3 }}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirmer</button>
            </form>
            <div id="PlexyglassAmount-div" class="diagramdiv"></div>
                {!! \Lava::render('AreaChart', 'PlexyglassAmount', 'PlexyglassAmount-div') !!}

            <form class="form-inline" method="POST" action="{{  route('account') }}">
                @csrf
                <div class="form-group mx-sm-3 mb-2">
                    <input name="material" type="hidden" value="4">
                    <label>Quantité de MDF restante : </label>
                    @php 
                    $var4 = 0;
                    $id = \DB::table('material')->where('material', '4')->max('id');
                    $MDFs = \DB::table('material')->where('id', $id)->get();
                    foreach ($MDFs as $MDF) {
                        $var4 = $MDF->amount;
                    }
                    @endphp
                    <input name="amount" type="number" class="form-control" required value="{{  $var4 }}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirmer</button>
            </form>
            <div id="MDFAmount-div" class="diagramdiv"></div>
                {!! \Lava::render('AreaChart', 'MDFAmount', 'MDFAmount-div') !!}


        <div id="apointementstates-div"></div>
            {!! \Lava::render('DonutChart', 'apointementstates', 'apointementstates-div') !!}
        </div>
    </div>

    @endif


    @endsection('main')
