@extends('admin_pages.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="content-header">
        <div class="content-title">
            <h5>Gérer les patients</h5>
            <span></span>
        </div>
        <div class="ajoute-btn">
            <a href="" class="btn btn-outline-secondary">Ajouter patient</a>
        </div>
    </div>

    <div class="filter">
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
                <div class="input-group">
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
    <table class="table table-dark table-striped table-bordered text-center">
        <tr>
            <td>CIN</td>
            <td>NOM</td>
            <td>PRENOM</td>
            <td>NAISSANCE</td>
            <td>SEXE</td>
            <td>TELPHONE</td>
            <td>ADRESSE</td>
            <td>MAJ</td>
            
        </tr>
        @foreach ($data as $patient)
        <tr>
            <td>{{$patient->cin}}</td>
            <td>{{$patient->nom}}</td>
            <td>{{$patient->prenom}}</td>
            <td>{{$patient->date_nais}}</td>
            <td>{{$patient->sexe}}</td>
            <td>{{$patient->tele}}</td>
            <td>{{$patient->adresse}}</td>
            <td><a href=""><i class="far fa-edit"></i> MODIFIER</a> | <a href=""><i class="far fa-trash-alt"></i> SUPPRIMER</a></td>
            
        </tr>
        @endforeach
    </table>

</div>
@endsection