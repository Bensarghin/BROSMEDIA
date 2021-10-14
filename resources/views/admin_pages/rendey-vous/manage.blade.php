@extends('admin_pages.layouts.master')

@section('content')
        
    
<div class="card">
    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #84a9d9;font-size:30px">Liste des Rendey-vous</div> 
            <a type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <i class="mdi mdi-account-multiple-plus" data-toggle="tooltip" title=""
                data-original-title="mdi-account-multiple-plus"></i>Ajouter un Rendey-vous
            </a>
            @include('admin_pages.layouts.modal')
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-light table-hover'>
                <tr>
                    <td>DATE PREND RDV</td>
                    <td>PATIENT</td>
                    <td>ACTE</td>
                    <td>MAJ</td>
                </tr>
                @foreach ($data as $rdv)
                <tr>
                    <td>{{$rdv->date_prend_rdv}}</td>
                    <td>{{$rdv->nom}} {{$rdv->prenom}} </td>
                    <td>{{$rdv->nom_acte}}</td>
                    <td> 
                        <a href="{{route('rdv.update',['id'=>$rdv->id])}}" data-bs-toggle="modal" data-bs-target="{{route('rdv.update',['id'=>$rdv->id])}}#staticBackdrop"><img src="{{asset('sheet/assets/images/details.svg')}}" style="height:25px"></a> | 
                        <a href="{{route('rdv.update',['id'=>$rdv->id])}}" data-bs-toggle="modal" data-bs-target="{{route('rdv.update',['id'=>$rdv->id])}}#staticBackdrop"><img src="{{asset('sheet/assets/images/Edit.svg')}}" style="height:25px"></a> | 
                        <a onclick="return confirm('Vous étes vraiment à supprimer ce enregistrement')" href="{{route('patient.delete',['id'=>$rdv->id])}}"><img src="{{asset('sheet/assets/images/trash.svg')}}" style="height:25px"></a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>

        </script>
@endsection