@extends('layouts.app')

@section('content')
    <div id="messagerie">
        <Messagerie :user="{{Auth::user()->id }}"></Messagerie>
    </div>
@endsection
