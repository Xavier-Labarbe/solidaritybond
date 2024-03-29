@extends('layouts.main')

@section('main')

<div class="welcomeCard  corp">
  <h5 class="welcomeTitle card-header">Nos services</h5>
  <div class="row no-gutters">
    <div class="col-md-4 column">
      <div class="card-body">
        <h5 class="welcommeTitle_small card-title">Vous nous conctactez</h5>
        <div class="welcomeImage">

          <a class="welcomeImage" href="conversations"><img src="image/contact.jpg"></a>
        </div>
      </div>

    </div>
    <div class="col-md-4 column">
      <div class="card-body">
        <h5 class="welcommeTitle_small card-title">Vous prototypez</h5>
        <div class="welcomeImage">

          <a class="welcomeImage" href="conversations"><img src="image/prototypage.png"></a>
        </div>
      </div>

    </div>
    <div class="col-md-4 column">
      <div class="card-body">
        <h5 class="welcommeTitle_small card-title">Vous produisez</h5>
        <div class="welcomeImage">
          <a href="appointment">
            <img style="	filter: invert(100%);" src="image/imprimante.png">
          </a>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="welcomeCard mb-3 corp">
  <div class="row no-gutters">
    <div class="col-md-8 secondcardbody">
      <div class="card-body">
        <h5 class="welcomeTitle card-title">Le Fablab de CESI Bordeaux</h5>
        <br />
        <p class="card-text description welcomeDescription">Il est indéniable que le besoin de protection faciale est
          important.
          Au moment où les stocks de masques devenaient un sujet de polémique,
          les fablab étaient déjà en train de prototyper de nombreuses versions de visière et de masque.
          <br />
          <br />
          C’est dans ce mouvement de cohésion et d’entraide que le CESI veut s’inscrire.
          En effet, les centres de formation CESI répartis partout en France possèdent un réseau de Fablab pouvant
          apporter une contribution à l’innovation pour la lutte contre le COVID-19.
          <br />
          <br />
          Lors de ce projet, nous nous intéresserons aux capacités du Fablab CESI Bordeaux.
          Celui-ci a lancé le projet COOP, permettant au grand public comme aux entreprises de faire réaliser
          gratuitement un prototype. </p>
      </div>
    </div>
    <div class="col-md-4">
      <img src="image/fablab.jpg" class="card-img imgfablab">
    </div>
  </div>
</div>

@endsection('main')
