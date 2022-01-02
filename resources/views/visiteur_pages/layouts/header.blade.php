<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/grin/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Dec 2021 14:03:55 GMT -->
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/animate.min.css')}}">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/meanmenu.css')}}">

<link rel="stylesheet" href="{{'vsheet/assets/css/boxicons.min.css'}}">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/flaticon.css')}}">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/odometer.min.css')}}">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/nice-select.min.css')}}">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/owl.carousel.min.css')}}">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/owl.theme.default.min.css')}}">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/magnific-popup.min.css')}}">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/style.css')}}">

<link rel="stylesheet" href="{{asset('vsheet/assets/css/responsive.css')}}">
<title>{{isset($cabinet->nom_cabinet)?$cabinet->nom_cabinet:'cabinet'}}</title>
<link rel="icon" type="image/png" href="{{asset('vsheet/assets/images/favicon.png')}}">
</head>
<body>

{{-- <div class="preloader"><div class="loader"><div class="sbl-half-circle-spin"></div></div></div> --}}


<div class="top-header-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <ul class="top-header-information">
                    <li><i class='bx bxs-map'></i>{{isset($cabinet->adresse)?$cabinet->adresse:''}}</li>
                    <li><i class='bx bx-envelope-open'></i>
                        <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#1f6c6a6f6f706d6b5f786d7671317c7072"><span class="__cf_email__" data-cfemail="6f1c1a1f1f001d1b2f081d0601410c0002">[email&#160;protected]</span></a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-12">
                <ul class="top-header-optional">
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                        <i class='bx bxl-facebook'></i>
                        </a>
                        <a href="https://twitter.com/?lang=en" target="_blank">
                        <i class='bx bxl-twitter'></i>
                        </a>
                        <a href="https://www.linkedin.com/" target="_blank">
                        <i class='bx bxl-linkedin'></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank">
                        <i class='bx bxl-instagram'></i>
                        </a>
                    </li>
                    <li class="languages-list">
                        <a href="https://www.instagram.com/" target="_blank">
                            Fançais
                        </a> |
                        <a href="https://www.instagram.com/" target="_blank">
                            عربي
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="middle-header-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12">
                <div class="middle-header">
                    <h1><a href="index.html">{{isset($cabinet->nom_cabenit)?$cabinet->nom_cabenit:''}}</a></h1>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <ul class="middle-header-content">
                    <li>
                        <i class="flaticon-emergency-call"></i>Télé :<span>
                        <a href="tel:088123654987">{{isset($cabinet->tele)?$cabinet->tele:''}}</a></span>
                    </li>
                    <li>
                        <i class="flaticon-wall-clock"></i>Temps d'ouvrir :<span>
                            {{isset($cabinet->heure_ouver)?$cabinet->heure_ouver:'00:00'}} à {{isset($cabinet->heure_ferme)?$cabinet->heure_ferme:'00:00'}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                    @if ($cabinet)    
                    <img src="{{asset('cabenit/'.$cabinet->logo)}}" width="90" height="90" alt="logo">
                    @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('visiteur.home')}}" class="nav-link active"> Acceuil </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('visiteur.home')}}#services" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('rdv.form')}}" class="nav-link">Rendez-vous</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link">Contact Nous</a>
                        </li>
                        <li class="nav-item">
                            <a href="about-us.html" class="nav-link">Qui sommes-nous ?</a>
                        </li>
                    </ul>
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <div class="navbar-btn">
                                <a href="{{route('rdv.form')}}" class="default-btn">Prend Rendez-vous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>
            <div class="container">
                <div class="option-inner">
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <div class="search-btn">
                                <a class="#" href="#searchmodal" data-bs-toggle="modal" data-bs-target="#searchmodal">
                                <i class="flaticon-search"></i>
                            </a>
                            </div>
                        </div>
                        <div class="option-item">
                            <div class="navbar-btn">
                                <a href="appointment.html" class="default-btn">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>