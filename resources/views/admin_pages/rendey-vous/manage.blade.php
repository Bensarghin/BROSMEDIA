@extends('admin_pages.layouts.master')

@section('content')
        
    
<div class="card">
    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web; color: #06a3da;font-size:30px">
            Liste des Rendey-vous
        </div> 
    </div>
    <div class="card-body">
        <div class="rdv-patient mb-5"> 
            <a class="mr-3 border-bottom" href="{{route('rdv.manage')}}">
                List des patients sans RDV </h1>
            </a>
            
            <a class="border-bottom" href="{{route('rdv.filter')}}">
                List des patients avec RDV 
            </a>
            <span class="badge bg-dark text-white"><i class="fas fa-layer-group"></i> {{$data->count()}}</span>
        </div>
        <form action="{{route('rdv.search')}}" class="input-group col-sm-4 mb-3" method="POST">
            @csrf
            <input type="text" class="form-control" placeholder="Nom de patient ..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="nomPrenom">
            <button class="input-group-append" type="submit" style="border:1px solid #f4f5fb">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-search" style="padding:3px"></i></span>
            </button>
        </form>
        <div class="table-responsive">
            <div>
                {{$data->links()}}
            </div>
            <table class='table table-striped table-light bg-light'>
                <tr>
                    <td>PATIENT</td>
                    <td>DATE PREND RDV</td>
                    <td>DATE CONSULTATION</td>
                    <td>HEURE RDV</td>
                    <td>STATUS</td>
                    <td>ACTE</td>
                    <td>MAJ</td>
                </tr>
                @foreach ($data as $rdv)
                <tr>
                    <td>{{$rdv->rdv->patient->nom}} {{$rdv->rdv->patient->prenom}} </td>
                    <td>{{$rdv->rdv->date_prend_rdv}}</td>
                    <td>{{$rdv->date_consu}}</td>
                    <td>{{$rdv->heure_rdv}}</td>
                    <td>{{$rdv->status}}</td>
                    <td>{{$rdv->rdv->acte->nom_acte}}</td>
                    <td>
                        @if (!isset($rdv->date_prend_rdv))
                            <a href="{{route('rdv.insert', $rdv->rdv->id)}}" class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="ajouter Rdv"><i class="far fa-calendar-plus"></i> </a> 
                        @else
                            <a href="{{route('rdv.update',['id'=>$rdv->rdv->id])}}" class="text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="modifier rdv"><i class="fas fa-edit"></i></a>  |
                            <a onclick="return confirm('Vous étes vraiment à supprimer ce enregistrement')" class="text-danger" href="{{route('rdv.delete',['id'=>$rdv->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer rdv"><i class="fas fa-trash"></i></a>
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
            $(document).ready(function(){
                var loc = window.location.pathname;
                $('.rdv-patient').find('.border-bottom').each(function() {
                    $(this).toggleClass('rdv', $(this).attr('href') == loc);
                });
            });
        </script>
@endsection