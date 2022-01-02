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
            <table class='table table-bordered text-muted bg-light'>
                <tr>
                    <td>PATIENT</td>
                    <td>DATE PREND RDV</td>
                    <td>ACTE</td>
                    <td>DATE CONSULTATION</td>
                    <td>HEURE RDV</td>
                    <td>STATUS</td>
                    <td>MAJ</td> 
                </tr>
                @foreach ($data as $patient)
                    @if($patient->rdv->count() > 0)
                        @foreach($patient->rdv as $rdv )
                        <tr>
                            <td>{{$patient->nom}} {{$patient->prenom}} </td>
                            <td>{{$rdv->date_prend_rdv}}</td>
                            <td>{{$rdv->acte->nom_acte}}</td>
                                @if($rdv->etat_rdv)
                                    <td>{{$rdv->etat_rdv->date_consu}}</td>
                                    <td>{{$rdv->etat_rdv->heure_rdv}}</td>
                                    <td>{{$rdv->etat_rdv->status}}</td>
                                    <td> 
                                        <a href="{{route('rdv.update',['id'=>$rdv->id])}}" class="text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="modifier rdv"><i class="fas fa-edit"></i></a>  |
                                        <a onclick="return confirm('Vous étes vraiment à supprimer ce enregistrement')" class="text-danger" href="{{route('rdv.delete',['id'=>$rdv->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer rdv"><i class="fas fa-trash"></i></a>
                                    </td>
                                @else
                                    <td colspan="3"> Pas Etat rendez-vous</td>                        
                                    <td>
                                        <a href="{{route('rdv.insert', $patient->id)}}" class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="ajouter Rdv"><i class="far fa-calendar-plus"></i> </a>
                                    </td>
                                @endif
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td>{{$patient->nom}} {{$patient->prenom}}</td>
                        <td colspan="2">Pas rendez-vous</td>
                        <td colspan="3">Pas Etat rendez-vous</td>
                        <td>
                            <a href="{{route('rdv.insert', $patient->id)}}" class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="ajouter Rdv"><i class="far fa-calendar-plus"></i> </a>
                        </td>
                    </tr>
                    @endif
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