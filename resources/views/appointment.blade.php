@extends('layouts.main')

    @section('main')

    <a> Cette page est réservé pour les rendez vous avec la chomeuse de {{ Auth::user()->name }} </a>

    @endsection('main')
