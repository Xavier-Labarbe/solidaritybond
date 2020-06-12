<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="{{ URL::asset('style/welcome.css') }}" rel="stylesheet">
        <!-- <link href="/style/welcome.css"> -->
        <title>Laravel</title>

        <!-- Fonts -->
    </head>

    <body>

        @include('layouts/partials/_navbar')
        <div class="card">
          <h5 class="card-header">Nos services</h5>
          <div class="row no-gutters">
            <div class="col-md-4 column">
              <div class="card-body">
                <h5 class="card-title">Vous nous conctactez</h5>
                <img src="picture/contact.jpg">
              </div>
            </div>
            <div class="col-md-4 column">
              <div class="card-body">
                <h5 class="card-title">Vous prototypez</h5>
                <img src="picture/prototypage.png">
              </div>
            </div>
            <div class="col-md-4 column">
              <div class="card-body">
                <h5 class="card-title">Nous imprimons</h5>
                <img src="picture/imprimante.png">
              </div>
            </div>
          </div>
        </div>
        
        <div class="card mb-3">
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
                <img src="picture/fablab.jpg" class="card-img imgfablab">
              </div>
            </div>
          </div>

    </body>
</html>
