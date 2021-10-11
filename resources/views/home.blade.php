@extends('admin_pages.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="cal-div col-sm-3">
            <div id="color-calendar"></div>
        </div>
        <div class="col-sm-9 dashboards">
            <div class="row">
                <div class="alert alert-success col-sm-4"><h3> total facturations <span class="badge bg-secondary">60.000 DH</span></h3></div>
                <div class="alert alert-secondary col-sm-4"><h3> les nouveau rendey-vous <span class="badge bg-secondary">10</span></h3></div>
                <div class="alert alert-info col-sm-4"><h3> total les patient<span class="badge bg-secondary">{{$patCount}}</span></h3></div>
            </div> 

            {{-- filtarge --}}
            <div class="filter">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline">
                        <div class="input-group">
                            <select name="date" class="form-control">
                                <option value="">Ajourd'hui</option>
                                <option value="1">Ce semaine</option>
                                <option value="1">Ce mois</option>
                                <option value="">Tous</option>
                            </select>
                            <select name="sexe" class="form-control">
                                <option value="">Filter le sexe ---</option>
                                <option value="1">Masculin</option>
                                <option value="1">Feminin</option>
                            </select>
                            <input type="text" class="form-control" placeholder="Taper CIN..." aria-label="Username" aria-describedby="basic-addon1">
                            <a class="input-group-prepend" href="#">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                            </a>
                        </div>
                      </form>
                </nav>
            </div>
            {{-- end filtrage --}}

            <table class="table table-light text-center">
                <tr>
                    <td>PATIENT</td>
                    <td></td>
                    <td></td>
                    <td>Rendey-vous</td>
                    <td>Traitement</td>
                    
                </tr>
                @foreach ($patients as $patient)
                <tr>
                    <td>{{$patient->cin}}</td>
                    <td>{{$patient->nom}} {{$patient->prenom}}</td>
                    <td><a href=""><i class="fas fa-info"></i> Detail</a></td>
                    <td><a href=""><i class="far fa-calendar-alt"></i> 12 / 08 /2021 12:00</a></td>
                    <td><a href=""><i class="fas fa-procedures"></i> Juste consultation</a></td>
                    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection