@extends('layouts.main')

    @section('main')
    <link href="{{ URL::asset('style/welcome.css') }}" rel="stylesheet">

    <div class="card corp">
        <h5 class="card-header">Nos services</h5>
        <div class="row no-gutters">
          <div class="col-md-4 column">
            <div class="card-body">
              <h5 class="card-title">Vous nous conctactez</h5>
              <img src="image/contact.jpg">
            </div>
          </div>
          <div class="col-md-4 column">
            <div class="card-body">
              <h5 class="card-title">Vous prototypez</h5>
              <img src="image/prototypage.png">
            </div>
          </div>
          <div class="col-md-4 column">
            <div class="card-body">
              <h5 class="card-title">Nous imprimons</h5>
              <img src="image/imprimante.png">
            </div>
          </div>
        </div>
      </div>
      
      <div class="card mb-3 corp">
          <div class="row no-gutters">
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Le Fablab de CESI Bordeaux</h5>
                <br />
                <p class="card-text description">Il est indéniable que le besoin de protection faciale est important. 
                  Au moment où régnait un épais brouillard quant au stock de masques de la part du gouvernement, 
                  les fablab étaient déjà en train de prototyper de nombreuses versions de visière et de masque. 
                  <br />
                  C’est dans ce mouvement de cohésion et d’entraide que le CESI veut s’inscrire. 
                  En effet, les centres de formation CESI répartis partout en France possèdent un réseau de Fablab pouvant apporter une contribution à l’innovation pour la lutte contre le COVID-19.  
                  <br />
                  Lors de ce projet, nous nous intéresserons aux capacités du Fablab CESI Bordeaux. 
                  Celui-ci a lancé le projet COOP, permettant au grand public comme aux entreprises de faire réaliser gratuitement un prototype.   </p>
              </div>
            </div>
            <div class="col-md-4">
              <img src="image/fablab.jpg" class="card-img imgfablab">
            </div>
          </div>
        </div>

    @endsection('main')
