@extends('admin_pages.layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web; color: #06a3da;font-size:30px">
            Liste des Medecins
        </div> 
        <div>
            <a href="{{route('medecin.create')}}" class="btn btn-success" 
            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Ajouter Medecin <i class="fas fa-plus"></i>
            </a>
            @include('admin_pages.medecin.create')
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id='exampleee' class='table table-striped table-light bg-light'>
                <tr> 
                    <td>CIN</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Spécialité</td>
                    <td>Gender</td>
                    <td>Né le</td>
                    <td>Télé</td>
                    <td>Adress</td>
                    <td>Action</td>
                </tr>
                @foreach ($data as $medecin)
                <tr>
                    <td>{{$medecin->cin}}</td>
                    <td>{{$medecin->nom}}</td>
                    <td>{{$medecin->prenom}}</td>
                    <td>{{$medecin->special}}</td>
                    <td>{{$medecin->sexe}}</td>
                    <td>{{$medecin->date_nais}}</td>
                    <td>{{$medecin->tele}}</td>
                    <td>{{Str::limit($medecin->adresse, 20)}}</td>
                    <td>
                        <a href="{{route('medecin.edit' , ['id' => $medecin->id])}}" class="text-info"><i class="fas fa-edit"></i> </a> | 
                        <a onclick="return confirm('Vous étes vraiment à supprimer ce enregistrement')" class="text-danger" href="{{route('medecin.delete',['medecin' => $medecin])}}"><i class="fas fa-trash"></i> </a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection