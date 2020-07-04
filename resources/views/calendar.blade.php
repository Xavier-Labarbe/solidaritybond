@extends('layouts.main')

@section('main')

<div class="jumbotron accountinfo">
    <h1>Calendrier Outlook</h1>
    <p class="lead">Bienvenue ! Vous pouvez maintenant vous connecter ou acceder aux services d'outlook.</p>
    @if(isset($userName))
      <h4>Vous etes connecté en tant que {{ $userName }} !</h4>
      <h5>Vous etes connecté avec l'email {{ $userEmail }}</h5>
      <p>Vous avez maintenant accès aux options suivantes : </p>
        <a href="/microsoftCalendar" class="btn btn-primary">Calendrier</a>
        <a href="/appointment" class="btn btn-primary">Prendre un rendez-vous</a>
        <a href="/signout" class="btn btn-danger">Deconnexion</a>
    @else
      <a href="/signin" class="btn btn-primary btn-large">Connexion a Microsoft Outlook</a>
    @endif
  </div>
@endsection