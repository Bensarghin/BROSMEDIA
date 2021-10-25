@extends('admin_pages.layouts.master')

@section('content')
        
    
<div class="card">
    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web; color: #84a9d9;font-size:30px">
            Liste des Rendey-vous
        </div> 
    </div>
    <div class="card-body">
        <div class="rdv-patient mb-5"> 
            <a class="mr-3" href="{{route('rdv.manage')}}">
                List des patients sans RDV
            </a>
            <a class="" href="{{route('rdv.filter',['id'=> 1])}}">
                List des patients avec RDV
            </a>
        </div>
        <form action="{{route('patient.search')}}" class="input-group col-sm-4 mb-3" method="POST">
            @csrf
            <input type="text" class="form-control" placeholder="Nom de patient ..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="nomPrenom">
            <button class="input-group-append" type="submit" style="border:1px solid #f4f5fb">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-search" style="padding:3px"></i></span>
            </button>
        </form>
        <div class="table-responsive">
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
                    <td>{{$rdv->nom}} {{$rdv->prenom}} </td>
                    <td>{{isset($rdv->date_prend_rdv)?$rdv->date_prend_rdv:'pas de rendez-vous'}}</td>
                    <td>{{isset($rdv->date_consu)?$rdv->date_consu:'pas de rendez-vous'}}</td>
                    <td>{{isset($rdv->heure_rdv)?$rdv->heure_rdv:'pas de rendez-vous'}}</td>
                    <td>{{isset($rdv->status)?$rdv->status:'pas de rendez-vous'}}</td>
                    <td>{{isset($rdv->nom_acte)?$rdv->nom_acte:'pas de rendez-vous'}}</td>
                    <td>
                        @if (!isset($rdv->date_prend_rdv))
                            <a href="{{route('rdv.insert', $rdv->id)}}" class="text-primary"><i class="far fa-calendar-plus"></i></a> |
                        @endif
                        <a href="{{route('rdv.update',['id'=>$rdv->id])}}" class="text-info"><i class="fas fa-edit"></i></a> | 
                        <a onclick="return confirm('Vous étes vraiment à supprimer ce enregistrement')" class="text-danger" href="{{route('patient.delete',['id'=>$rdv->id])}}"><i class="fas fa-trash"></i></a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>

        </script>
@endsection