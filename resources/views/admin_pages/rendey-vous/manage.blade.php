@extends('admin_pages.layouts.master')

@section('content')
        
    
<div class="card">
    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #84a9d9;font-size:30px">
            Liste des Rendey-vous
        </div> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-light table-hover'>
                <tr>
                    
                    <td>PATIENT</td>
                    <td>DATE PREND RDV</td>
                    <td>DATE CONSULTATION</td>
                    <td>ACTE</td>
                    <td>MAJ</td>
                </tr>
                @foreach ($data as $rdv)
                <tr>
                    
                    <td>{{$rdv->nom}} {{$rdv->prenom}} </td>
                    <td>{{$rdv->date_prend_rdv}}</td>
                    <td>{{$rdv->date_consu}}</td>
                    <td>{{$rdv->nom_acte}}</td>
                    <td>
                        <a href="" class="text-primary"><i class="fas fa-calendar"></i> ajout rdv</a> |
                        <a href="{{route('rdv.update',['id'=>$rdv->id])}}" class="text-info"><i class="fas fa-edit"></i> mod</a> | 
                        <a onclick="return confirm('Vous étes vraiment à supprimer ce enregistrement')" class="text-danger" href="{{route('patient.delete',['id'=>$rdv->id])}}"><i class="fas fa-trash"></i> sup</a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>

        </script>
@endsection