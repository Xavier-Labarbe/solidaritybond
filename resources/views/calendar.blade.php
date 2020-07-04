@extends('layouts.main')

@section('main')

{{--@if(\Auth::user()->outlookLink == null && Auth::user()->status == '2')
<!--include('layouts/partials/_linkOutlook');-->

<div class="card-body">

    <form method="POST" action="">
        {{csrf_field()}}

        <div class="card text-center">
            <div class="card-header">
                <a>Pour avoir accès à votre calendrier outlook, veuillez rentrez votre lien de publication
                    outlook.</a><a href="helpCalendar"> Vous ne savez pas ou il se trouve ?</a>
            </div>
            <div class="card-body">
                <label class="col-md-4 col-form-label">Rentrez le lien de
                    publication
                    outlook</label>
                <textarea id="link" type="text" class="form-control" name="link" required autocomplete="link"
                    autofocus></textarea>
                <button type="submit" class="btn btn-primary">
                    Envoyez
                </button>
            </div>
        </div>
    </form>
</div>

@else
@php $var = \DB::table('users')->where('status', '2')->pluck('outlookLink'); @endphp
@if($var[0] != null)
<iframe src="{{ $var[0] }}" class="iframecalendar">
@else
<div class="card text-center">
    <div class="card-body">
        <label class="col-md-4 col-form-label">Le fablab manager n'a pas encore rentré son calendrier</label>
    </div>
</div>
@endif
@endif--}}
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