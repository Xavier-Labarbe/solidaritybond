@extends('layouts.main')

@section('main')

@php $var = \DB::table('appointments')->where('to_id', Auth::user()->id)->get(); @endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Vos évènements</div>
                <div> @php $var @endphp </div>
            </div>
        </div>
    </div>
</div>

@endsection('main')