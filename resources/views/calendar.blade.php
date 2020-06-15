@extends('layouts.main')

@section('main')

@php
if(Auth::user()->outlookLink == null){
include('layouts/partials/_linkOutlook');
} else {
include('layouts/partials/_outlook');

}
@endphp

@endsection