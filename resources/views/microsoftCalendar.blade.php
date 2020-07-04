@extends('layouts.main')

@section('main')
<div class="card accountinfo">
<h1>Calendrier</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Organisateur</th>
      <th scope="col">sujet</th>
      <th scope="col">Début</th>
      <th scope="col">Fin</th>
    </tr>
  </thead>
  <tbody>
        @isset($events)
        @foreach($events as $event)
            <tr>
            <td>{{ $event->getOrganizer()->getEmailAddress()->getName() }}</td>
            <td>{{ $event->getSubject() }}</td>
            <td>{{ \Carbon\Carbon::parse($event->getStart()->getDateTime())->format('m/d/Y H:i') }}</td>
            <td>{{ \Carbon\Carbon::parse($event->getEnd()->getDateTime())->format('m/d/Y H:i') }}</td>
            </tr>
        @endforeach
        @endif
    </div>
  </tbody>
</table>
@endsection