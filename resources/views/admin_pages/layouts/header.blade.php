<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cabinet Dentaire
    </title>
    <link href="{{asset('sheet/assets/css/all.min.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('sheet/assets/images/icoon.png')}}')}}" type="image/x-icon">
    <link href="{{asset('sheet/assets/css/animated.css')}}" rel="stylesheet">
    <link href="{{asset('sheet/assets/css/sidemenu.css')}}" rel="stylesheet">
    <link href="{{asset('sheet/assets/switcher/css/switcher.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('sheet/assets/switcher/demo.css')}}" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{asset('sheet/assets/images/op.png')}}')}}" type="image/x-icon" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="{{asset('sheet/assets/css/bootstrap.min.css')}}">
    <link href="{{asset('sheet/assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('sheet/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
</head>



<body class="app sidebar-mini" oncontextmenu="false">
    <div id="app">
        <div class="page-main is-expanded">
            <!--aside open-->
            <div class="app-sidebar__overlay active" data-toggle="sidebar"></div>
            <aside class="app-sidebar ps ps--active-y">
                <div class="app-sidebar__logo"> <a class="header-brand" href="index.php">
                        <img src="{{asset('sheet/assets/images/logo31.png')}}" class="header-brand-img desktop-lgo"
                            style="width: 130px;height: 130px;" alt="Covido logo">
                        <img src="{{asset('sheet/assets/images/logo31.png')}}" class="header-brand-img dark-logo"
                            style="width: 50px;height: 50px;" alt="Covido logo">
                        <img src="{{asset('sheet/assets/images/logo31.png')}}" class="header-brand-img mobile-logo"
                            style="width: 180px;height: 80px;" alt="Covido logo">
                    </a> </div>
                <div class="app-sidebar3">
                    <div class="app-sidebar__user active">
                        <div class="dropdown user-pro-body text-center">
                            <div class="user-pic">
                            </div>
                        </div>
                    </div>
                    <ul class="side-menu">
                        <li class="slide">
                            <a class="side-menu__item" href="{{route('admin.home')}}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-home"></i>
                                <span class="ml-4 side-menu__label">Acceuil</span> 
                            </a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="{{route('patient.manage')}}"> 
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-procedures"></i>
                                <span class="ml-4 side-menu__label">Patients</span> 
                            </a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="{{route('rdv.manage')}}"> 
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-calendar"></i> 
                                <span class="ml-4  side-menu__label">Rendey-vous</span> 
                            </a>
                         </li>
                         <li class="slide">
                            <a class="side-menu__item" href="{{route('medecin')}}"> 
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-stethoscope"></i> 
                                <span class="ml-4  side-menu__label">Medecins</span> 
                            </a>
                         </li>
                        <li class="slide">
                            <a class="side-menu__item" href="{{route('acte.manage')}}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-teeth-open"></i>
                                <span class="ml-4 side-menu__label">Actes</span> </a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="{{route('medicament.manage')}}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-pills"></i>
                                <span class="ml-4 side-menu__label">Médicaments</span> 
                            </a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="{{route('caisse')}}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="fas fa-wallet"></i>
                                <span class="ml-4 side-menu__label">Désponse</span> 
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="side-menu-item dropdown-toggle text-light" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span class="ml-4 side-menu__label">Settings</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="{{route('cabinet')}}">Cabinet</a></li>
                              <li><a class="dropdown-item" href="{{route('service')}}">Services</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 715px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 380px;"></div>
                </div>
            </aside>
            <!--aside closed-->
            <div class="app-content">
                <div class="side-app">
                    <!--app header-->
                    <div class="app-header header">
                        <div class="container-fluid">
                            <div class="d-flex">
                                <a class="header-brand" href="index.php"> 
                                    <img src="{{asset('sheet/assets/images/icoon.png')}}"
                                        class="header-brand-img desktop-lgo" alt="DentaireBros"> 
                                    <img src="{{asset('sheet/assets/images/icoon.png')}}" class="header-brand-img dark-logo"
                                        alt="DentaireBros"> 
                                    <img src="{{asset('sheet/assets/images/icoon.png')}}"
                                        style="width:40px;height: 40px;" class="header-brand-img mobile-logo"
                                        alt="DentaireBros">  
                                </a>
                                <div class="app-sidebar__toggle" data-toggle="sidebar"> 
                                    <a class="open-toggle" href="#">
                                        <svg class="header-icon mt-1" xmlns="http://www.w3.org/2000/svg" height="24"
                                            viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                                            <path d="M21 11.01L3 11v2h18zM3 16h12v2H3zM21 6H3v2.01L21 8z"></path>
                                        </svg>
                                    </a> 
                                </div>
                                <div class="mt-1">

                                </div><!-- SEARCH -->
                                <div class="d-flex order-lg-2 ml-auto">
                                    <div class="dropdown   header-fullscreen"> <a
                                            class="nav-link icon full-screen-link p-0" id="fullscreen-button"> <svg
                                                class="header-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%"
                                                width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                <path
                                                    d="M7,14 L5,14 L5,19 L10,19 L10,17 L7,17 L7,14 Z M5,10 L7,10 L7,7 L10,7 L10,5 L5,5 L5,10 Z M17,17 L14,17 L14,19 L19,19 L19,14 L17,14 L17,17 Z M14,5 L14,7 L17,7 L17,10 L19,10 L19,5 L14,5 Z">
                                                </path>
                                            </svg> </a> 
                                    </div>
                                    <div class="dropdown profile-dropdown"> <a href="#"
                                            class="nav-link pr-0 pl-2 leading-none" data-toggle="dropdown">
                                            <span class="avatar brround"><i class="fas fa-user-cog"></i> </span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated p-0">
                                            <a class="dropdown-item border-bottom" href="{{route('user.edit')}}">
                                                <i class="dropdown-icon mdi mdi-account-outline"></i> 
                                                Modifier Profile
                                            </a>
                                            <a class="dropdown-item border-bottom" href="{{ route('logout') }}" 
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"> 
                                            <i class="dropdown-icon mdi  mdi-logout"></i> 
                                                Déconnecter
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-12">