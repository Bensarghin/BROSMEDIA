@extends('admin_pages.layouts.master')

@section('content')
<style>
    .pure-material-textfield-outlined{
        width: 100% !important;
    }
    .card-title{
        
        font-family:Titillium Web;
        color: #06a3da;
        font-size:30px;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="card-title">
            Patient : {{$data->rdv->patient->nom}} {{$data->rdv->patient->prenom}}
        </div>
        <div class="card-subtitle">
            <h5>CIN : {{$data->rdv->patient->cin}} </h5>
        </div>
        
        <div class="card-title">
            Modification de consultation 
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('Consultation.update',['id'=>$id])}}" method="POST">
            @csrf
            <input type="hidden" name="pat_id" value="{{$data->rdv->patient->id}}">
            <center>
            {{-- Motif --}}
            <label class="pure-material-textfield-outlined">
                <input type="text" placeholder="" name="motif" required value="{{$data->motif}}" >
                <span>Motif : </span>
            </label>
            {{-- Duree --}}
            <label class="pure-material-textfield-outlined">
                <div class="input-group mr-auto"  style="width: 400px !important"> 
                    <div class="input-group-prepend">
                        <span class="input-group-text">Durée : </span>
                    </div>
                    <input type="time" name="duree" class="form-control" value="{{$data->duree}}" style="height: 45px;">
                    <div class="input-group-append">
                        <span class="input-group-text">Heures</span>
                    </div>
                </div>
            </label>
            {{-- Details --}}
            <label class="pure-material-textfield-outlined">
                <textarea name="detail" cols="30" rows="6">{{$data->detail}}</textarea>
                <span>Détails : </span>
            </label>
        </center>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection