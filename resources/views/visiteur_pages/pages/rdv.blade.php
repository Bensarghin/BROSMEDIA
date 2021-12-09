@extends('visiteur_pages.layouts.master')
@section('content')

    <div class="modal fade fade-scale searchmodal" id="searchmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-bs-dismiss="modal">
    <i class='bx bx-x'></i>
    </button>
    </div>
    <div class="modal-body">
    <form class="modal-search-form">
    <input type="search" class="search-field" placeholder="Search...">
    <button type="submit"><i class='bx bx-search-alt'></i></button>
    </form>
    </div>
    </div>
    </div>
    </div>


    <div class="page-banner-area">
    <div class="container">
    <div class="page-banner-content">
    <h2>Rendez-vous</h2>
    <ul class="pages-list">
    <li><a href="index.html">Home</a></li>
    <li>Rendez-vous</li>
    </ul>
    </div>
    </div>
    </div>


    <section class="features-area-two pt-100 pb-70">
        <h4 class="text-center"> Prend Rendez-vous</h4>
        @if ($errors->any())
            <div class="alert alert-danger m-auto mt-4" style="width: 400px !important">
               @foreach ($errors->all() as $error)
                   <li>{{$error}}</li>
               @endforeach 
            </div>
        @endif
        @if(Session::has('message'))
            <div class="alert alert-info m-auto mt-4" style="width: 400px !important">
                <p>
                    {{Session::get('message')}}
                </p>
            </div>
        @endif

    </section>

    <section class="appointment-area bg-image ptb-100">
    <div class="container">
        <div class="appointment-form">
            <h4><i class="flaticon-calendar"></i> Saisie Votre informations</h4>
            <form action="{{route('rdv.saisie')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" value="{{old('cin')}}" class="form-control" name="cin" placeholder="CIN">
                </div>
                <div class="form-group">
                    <input type="text" value="{{old('nom')}}"  class="form-control" name="nom" placeholder="Nom">
                </div>
                <div class="form-group">
                    <input type="text"  value="{{old('prenom')}}" class="form-control" name="prenom" placeholder="Prenom">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="date_nais" 
                    placeholder="Date Naissance" onfocus="(this.type='date')">
                </div>

                <div class="form-check form-check-inline m-2">
                    <input class="form-check-input" type="radio" id="inlineRadio1" name="sexe" value="M">
                    <label class="form-check-label" for="inlineRadio1">Masculin</label>
                </div>
                <div class="form-check form-check-inline m-2">
                    <input class="form-check-input" type="radio" id="inlineRadio2" name="sexe" value="F">
                    <label class="form-check-label" for="inlineRadio2">Feminin</label>
                </div>
                  
                <div class="form-group">
                    <input type="text" class="form-control" name="tele" placeholder="Numéro">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="adresse" placeholder="Adress">
                </div>
                <div class="form-group">
                    <select name="acte" id="" class="form-control">
                        <option disabled selected>Choisie l'acte</option>
                        @foreach ($actes as $acte)
                            <option value="{{$acte->id}}">{{$acte->nom_acte}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="default-btn">Suivant</button>
            </form>
        </div>
    </div>
    </section>


    <div class="go-top">
    <i class='bx bx-up-arrow-alt'></i>
    </div>

    
@endsection