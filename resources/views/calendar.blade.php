@extends('layouts.main')

@section('main')
<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        <div class="card-header">


            <div class="">

            </div>
        </div>
        <div class="card-body">
            <div class="col-md-6 offset-md-4">

            </div>
        </div>
</div>

<div class="card text-center">
    <div class="card-header">
        <a>Pour avoir accès à votre calendrier outlook, veuillez rentrez votre lien de publication outlook.</a><a
            href="helpCalendar"> Vous ne savez pas ou il se trouve ?</a>
    </div>
    <div class="card-body">
        <label for="address" class="col-md-4 col-form-label">Rentrez le lien de
            publication
            outlook</label>
        <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link"
            value="{{ old('link') }}" required autocomplete="link" autofocus>
        <button type="submit" class="btn btn-primary">
            Valider
        </button>
    </div>
</div>

<!--<iframe
    src="https://outlook.office365.com/owa/calendar/7d6f149280e848deb9f8af369d0d1c6e@viacesi.fr/77b9d884082a4ee5afee07b59f64cf2612933681607805664711/calendar.html"
    width="100%" height="100%"> https://outlook.office.com/mail/options/calendar/SharedCalendars/publishedCalendars-->

@endsection('main')