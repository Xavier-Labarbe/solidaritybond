@extends('layouts.main')

@section('main')
<div class="row no-gutters">
    <div class="card helpcalendarcardfirstline">
        <div class="card-body">
            <h5 class="card-title">Etape 1 - Ouvrir outlook</h5>
            <p class="card-text">Ouvrez dans votre navigateur <a href="http://www.outlook.com">outlook</a> et connectez vous
                à
                votre compte.</p>
        </div>
    </div>

    <div class="card helpcalendarcardfirstline">
        <div class="card-body">
            <h5 class="card-title">Etape 2 - Accèder au règlage</h5>
            <p class="card-text">Cliquez sur l'icone "règlage" en haut à droite de votre fenetre outlook. Puis rechercher
                "calendar"
            </p>
        </div>
    </div>

    <div class="card helpcalendarcardfirstline">
        <div class="card-body">
            <h5 class="card-title">Etape 3 - Accèder au règlage</h5>
            <p class="card-text">Cliquez sur "publier un calendrier". Puis, rendez vous dans la section "publier un calendrier" et selectionez le calendriez que vous voulez avoir sur notre site.         </p>
        </div>
    </div>
</div>

<div class="row no-gutters">
    <div class="card helpcalendarcardsecondline col-md-5">
        <div class="card-body">
            <h5 class="card-title">Etape 4 - Calendrier</h5>
            <p class="card-text">Ensuite, cliquez sur les autorisations et sélectionnez "Peut voi lorsque je suis occupé(e)". Cliquez alors sur publier.
            </p>
        </div>
    </div>

    <div class="card helpcalendarcardsecondline col-md-5">
        <div class="card-body">
            <h5 class="card-title">Etape Final</h5>
            <p class="card-text">Pour finir, copier le lien HTML qui apparait et coller le à cette <a href="calendar">adresse</a>
            </p>
        </div>
    </div>
</div>

@endsection