@extends('layouts.main')

    @section('main')
    <div class="card accountinfo">
        <form method="POST" action="{{  route('account') }}">
            @csrf
            <div class="form-group">
                <label>Nom</label>
                <input name="Name" class="form-control" value="{{ Auth::user()->name }}">
                @error('Name')
                    <div class="text-danger">
                        <small>{{ $errors->first('Name') }}</small>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Prénom</label>
                <input name="Firstname" class="form-control" value="{{ Auth::user()->first_name }}">
                @error('Firstname')
                    <div class="text-danger">
                        <small>{{ $errors->first('Firstname') }}</small>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Adresse</label>
                <input name="Address" class="form-control" value="{{ Auth::user()->address }}">
                @error('Address')
                    <div class="text-danger">
                        <small>{{ $errors->first('Address') }}</small>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Adresse Email</label>
                <input name="Email" type="email" class="form-control" value="{{ Auth::user()->email }}">
                @error('Email')
                    <div class="text-danger">
                        <small>{{ $errors->first('Email') }}</small>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Téléphone</label>
                <input name="Phone" class="form-control" value="{{ Auth::user()->phone }}">
                @error('Phone')
                    <div class="text-danger">
                        <small>{{ $errors->first('Phone') }}</small>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nouveau mot de passe</label>
                <input type="password" name="Newpassword" class="form-control">
            </div>

            <div class="form-group">
                <label>Confirmer le nouveau mot de passe</label>
                <input type="password" name="Newpassword_confirmation" class="form-control">
                @error('Newpassword')
                    <div class="text-danger">
                        <small>{{ $errors->first('Newpassword') }}</small>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Veuillez taper votre mot de passe avant de sauvegarder</label>
                <input type="password" name="Password" class="form-control">
                @error('Password')
                    <div class="text-danger">
                        <small>{{ $errors->first('Password') }}</small>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </form>
    </div>
    <div class="card accountmessage">
        <h5 class="card-header">Messages non lus</h5>
        <div>afficher les messages</div>
    </div>

    @endsection('main')
