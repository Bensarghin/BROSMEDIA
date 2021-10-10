@extends('admin_pages.layouts.master')

@section('content')

<div class="container-fluid">
    @section('title', 'gérer les patients')
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