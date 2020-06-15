@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="messagerie" data-base="{{ route('conversations', [], false) }}">
            <Messagerie :user="{{Auth::user()->id }}"></Messagerie>
        </div>
    </div>
@endsection
