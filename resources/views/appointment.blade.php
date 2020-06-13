@extends('layouts.main')

@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Prise de rendez-vous</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <!-- Personne avec qui prendre le rdv -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Avec qui voulez-vous
                                prendre RDV </label>

                            <div class="col-md-6">
                                <select name="person" class="col-md-7 col-form-label text-md-right" id="person">
                                    <option selected="true" disabled="disabled">Fablab-Manager</option>
                                    <option value="Elea">Elea</option>
                                </select>

                            </div>
                        </div>

                        <!-- motif du rdv -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Motif du
                                rendez-vous</label>

                            <div class="col-md-6">
                                <input id="object" type="object"
                                    class="form-control @error('object') is-invalid @enderror" name="object" required
                                    autocomplete="current-object">
                            </div>
                        </div>

                        <!-- Lieu du rendez-vous -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Lieu du
                                rendez-vous</label>

                            <div class="col-md-6">
                                <input id="object" type="object"
                                    class="form-control @error('object') is-invalid @enderror" name="object" required
                                    autocomplete="current-object">
                            </div>
                        </div>

                        <!-- Date du rendez-vous -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Date du
                                rendez-vous</label>

                            <div class="col-md-6">
                                <input type="date" id="start" name="trip-start" value="" min="" max="">
                            </div>
                        </div>

                        <!-- Heure du rendez-vous -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Heure du
                                rendez-vous</label>

                            <div class="col-md-6">
                                <input type="time" id="appt" name="appt" min="08:00" max="19:00" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Soumettre le rendez-vous
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('main')