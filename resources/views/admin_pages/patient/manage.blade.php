@extends('admin_pages.layouts.master')

@section('content')
        
    
<div class="card">
    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #84a9d9;font-size:30px">Liste de Patient</div> 
            <a type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <i class="mdi mdi-account-multiple-plus" data-toggle="tooltip" title=""
                data-original-title="mdi-account-multiple-plus"></i>Ajouter un Patient
            </a>
            @include('admin_pages.layouts.modal')
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id='exampleee' class='table table-light'>
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
                    <td>
                        <a href=""><img src="{{asset('sheet/assets/images/Edit.svg')}}" style="height:25px"></a> | 
                        <a href=""><img src="{{asset('sheet/assets/images/trash.svg')}}" style="height:25px"></a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
@endsection