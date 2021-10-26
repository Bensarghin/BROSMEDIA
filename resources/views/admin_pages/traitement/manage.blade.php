@extends('admin_pages.layouts.master')

@section('content')
        
    
<div class="card">
    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web; color: #84a9d9;font-size:30px">
            Liste des traitements
        </div> 
    </div>
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Patients</li>
                <li class="breadcrumb-item"><a href="#">Sans Traitements</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">avec Traitements</a></li>
            </ol>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Patients</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('traitement.manage')}}">Sans Consultations</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('consultation')}}">avec Consultations</a></li>
            </ol>
        </nav>
        <form action="{{route('rdv.search')}}" class="input-group col-sm-4 mb-3" method="POST">
            @csrf
            <input type="text" class="form-control" placeholder="Nom de patient ..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="nomPrenom">
            <button class="input-group-append" type="submit" style="border:1px solid #f4f5fb">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-search" style="padding:3px"></i></span>
            </button>
        </form>

        {{-- links to table  --}}

        <div class="table-responsive">
            <div>
                {{-- {{$data->links()}} --}}
            </div>
            <table class='table table-striped table-light bg-light'>
                <tr>
                    <td>PATIENT</td>
                    <td>DATE PREND RDV</td>
                    <td>DATE CONSULTATION</td>
                    <td>HEURE RDV</td>
                    <td>STATUS RDV</td>
                    <td>MOTIF CONSULTATION</td>
                    <td>MAJ</td>
                </tr>
                @foreach ($data as $rdv)
                <tr>
                    <td>{{$rdv->nom}} {{$rdv->prenom}} </td>
                    <td>{{isset($rdv->date_prend_rdv)?$rdv->date_prend_rdv:'aucun rdv'}}</td>
                    <td>{{isset($rdv->date_consu)?$rdv->date_consu:'aucun rdv'}}</td>
                    <td>{{isset($rdv->heure_rdv)?$rdv->heure_rdv:'aucun rdv'}}</td>
                    <td>{{isset($rdv->status)?$rdv->status:'aucun rdv'}}</td>
                    <td>{{isset($rdv->motif)?$rdv->motif:'aucun rdv'}}</td>
                    <td>
                        @if (!isset($rdv->motif))
                            <a href="{{route('rdv.insert', $rdv->id)}}" class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="ajouter Rdv"><i class="far fa-calendar-plus"></i> </a> 
                        @else
                            <a href="{{route('rdv.update',['id'=>$rdv->rdv_id])}}" class="text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="modifier rdv"><i class="fas fa-edit"></i></a>  |
                            <a onclick="return confirm('Vous étes vraiment à supprimer ce enregistrement')" class="text-danger" href="{{route('rdv.delete',['id'=>$rdv->rdv_id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer rdv"><i class="fas fa-trash"></i></a>
                        @endif
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            document.querySelector(".first").addEventListener('click', function(){
                Swal.fire("Our First Alert");
                });
        </script>
@endsection