@extends('admin_pages.layouts.master')

@section('content')
        
    
<div class="card">
    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #84a9d9;font-size:30px">
        Liste de Patient
        </div> 
        <a type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Ajouter un Patient  <i class="fas fa-folder-plus"></i>
        </a>
        @include('admin_pages.patient.modal')
    </div>
    <div class="card-body">
        <form action="{{route('patient.search')}}" class="input-group col-sm-4 mb-3" method="POST">
            @csrf
            <input type="text" class="form-control" placeholder="Nom de patient ..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="nomPrenom">
            <button class="input-group-append" type="submit" style="border:1px solid #f4f5fb">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-search" style="padding:3px"></i></span>
            </button>
        </form>
        <div>
            {{$data->links()}}
        </div>
        <div class="table-responsive">
            <table id='exampleee' class='table table-striped table-light bg-light'>
                <tr>                      
                    <td>CIN</td>
                    <td>NOM</td>
                    <td>PRENOM</td>
                    <td>SEXE</td>
                    <td>DATE NAIS</td>
                    <td>TELE</td>
                    <td>MAJ</td>
        
                </tr>
                @foreach ($data as $patient)
                <tr>
                    <td>{{$patient->cin}}</td>
                    <td>{{$patient->nom}}</td>
                    <td>{{$patient->prenom}}</td>
                    <td>{{$patient->sexe}}</td>
                    <td>{{$patient->date_nais}}</td>
                    <td>{{$patient->tele}}</td>
                    <td>
                        <a href="{{route('patient.update',['id'=>$patient->id])}}"><img src="{{asset('sheet/assets/images/Edit.svg')}}" style="height:25px"> Mod</a> | 
                        <a onclick="return confirm('Vous étes vraiment à supprimer ce enregistrement')" href="{{route('patient.delete',['id'=>$patient->id])}}"><img src="{{asset('sheet/assets/images/trash.svg')}}" style="height:25px"> Supp</a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="card-footer">
        
    </div>
        <script>
        </script>
@endsection