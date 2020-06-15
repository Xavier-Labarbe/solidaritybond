@extends('layouts.main')

    @section('main')
    <div class="card accountinfo">
        <form method="POST" action="{{  route('account') }}">
            @csrf
            <div class="form-group">
              <label>Nom</label>
              <input name="Name" class="form-control" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label>Prénom</label>
                <input name="Firstname" class="form-control" value="{{ Auth::user()->first_name }}">
            </div>
            <div class="form-group">
                <label>Adresse</label>
                <input name="Address" class="form-control" value="{{ Auth::user()->address }}">
            </div>
            <div class="form-group">
                <label>Adresse Email</label>
                <input name="Email" type="email" class="form-control" value="{{ Auth::user()->email }}">
            </div>
            <div class="form-group">
                <label>Téléphone</label>
                <input name="Phone" class="form-control" value="{{ Auth::user()->phone }}">
            </div>
            <div class="form-group">
                <label>Mot de passe (NE MARCHE PAS)</label>
                <input name="Password" class="form-control" value="{{ Auth::user()->password }}">
            </div>
            <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </form>
    </div>

    <div class="card accountmessage">
        <h5 class="card-header">Messages non lus</h5>
        <div>afficher les messages</div>
    </div>

    @endsection('main')
