@auth

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand navbar_logo" href="/"><img src="image/logo_fablab.png" width="40px" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="appointment">Espace de rendez-vous <span
          class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="conversations">Mise en relation</a>
      <a class="nav-item nav-link active" href="calendar">Calendrier</a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->first_name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="account">Mon compte</a>
          <a class="dropdown-item" href="logout">Se déconnecter</a>
        </div>
      </li>
    </div>
  </div>
</nav>

@else

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand navbar_logo" href="/"><img src="image/logo_fablab.png" width="40px" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="dropdown-item" href="login">Se connecter</a>
      <a class="dropdown-item" href="register">S'inscrire</a>
    </div>
  </div>
</nav>

@endauth