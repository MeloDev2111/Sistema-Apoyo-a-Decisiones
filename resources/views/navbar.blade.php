<!DOCTYPE html>
<html>
<head class="site-head">
  <meta charset="utf-8">
  <meta name="viewuport" content="width=device-width, initial-scale=1">

  <!-- Boostrap Css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>

  <title>@yield("titulo")Meta SAC</title>
  <link rel="icon" href="{{asset('images/logo_Meta.png')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <script lang="JavaScript" src="{{asset('js/IncidenciasController.js')}}" defer></script>

</head>

<body>
  <header class="site-header">
    <nav id="nav" style="max-width:100%" class="navbar navbar-expand-md navbar-dark bg-dark container fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="">
          <img src="{{asset('images/logo_Meta.png')}}" alt="" width="36" height="24" class="d-inline-block align-text-top">
          Meta CORP
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-Link dropdown-toggle" href="#" id="navbarDropdownIncidencias" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">Incidencias</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownIncidencias">
                <li><a class="dropdown-item" href="">Registrar Incidencia</a></li>
                <li><a class="dropdown-item" href="">Monitorear Incidencia</a></li>
              </ul>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            
            <li class="nav-item dropdown">
              <a href="{{ route('register') }}" class="nav-Link" 
                id="navbarDropdownRegister" role="button">
                Register
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-Link dropdown-toggle" href="#" id="navbarDropdownUser" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>

              <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                <li><a class="dropdown-item" href="{{ route('profile.show') }}" id="navbarDropdownEditProfile">
                  {{ __('Profile') }}</a></li>
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item"  href="{{ route('logout') }}" id="navbarDropdownLogOut" 
                      onclick="event.preventDefault();this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </a>
                  </form>
                </li>
              </ul>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main id="main" class="site-main" class="container p-0">
    @yield("contenido")
  </main>

  <div class="site-bootstrap">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"></script>
  </div>

</body>
</html>