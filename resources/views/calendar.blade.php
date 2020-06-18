@extends('layouts.main')

@section('main')

@if(\Auth::user()->outlookLink == null && Auth::user()->status == '2')
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
<iframe src="@php echo($var[0]); @endphp" width="100%" height="100%">
@endif

@endsection