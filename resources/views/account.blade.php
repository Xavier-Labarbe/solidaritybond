@extends('layouts.main')

    @section('main')

    <a> Cette page est réservé pour le compte de {{ Auth::user()->name }} </a>

    @endsection('main')
