<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BrosMedia</title>

    <link rel="stylesheet" href="{{asset('admin_as/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_as/css/main.css')}}">
    {{-- font awesome css --}}
    <link rel="stylesheet" href="{{asset('admin_as/css/all.min.css')}}">
    {{-- calendar css --}}
    <link rel="stylesheet" href="{{asset('admin_as/dist/css/theme-basic.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin_as/dist/css/theme-glass.css')}}" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="btn btn-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
      <i class="fas fa-bars"></i>
    </a>              
    <a class="navbar-brand" href="#">BROSMEDIA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Rendey-vous</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('patient.manage')}}">Patients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Medecins</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Actes</a>
        </li>
        <li class="nav-item dropdown d-flex">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Modifier identity</a></li>
                <li><a class="dropdown-item" href="#">Mot de pass</a></li>
                <li><a class="dropdown-item" href="#">Déconnecter</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
          
{{-- left sidebar --}}
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel"><img src="{{asset('admin_as/img/logo2.png')}}" alt="" width="190" height="80"></h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="#">Accueil</a></li>
        <li class="list-group-item"><a href="#">A propos de nous</a></li>
        <li class="list-group-item"><a href="#">Contact</a></li>
        <div class="list-unstyled">
          <p><i class="fas fa-phone"></i>06075454564</p>
          <p><i class="fas fa-envelope"></i>brosMedia306@gmail</p>
          <p><i class="fas fa-map"></i>Rue Med 5, Reda</p>
        </div>
      </ul>
    </div>
    
    <div class="offcanvas-footer">
      <div class="left-sidebar-footer">
        <a href="#">Déconnecter</a>
      </div>
    </div>
  </div>

  <div class="page-content">
  {{-- content of pages --}}
