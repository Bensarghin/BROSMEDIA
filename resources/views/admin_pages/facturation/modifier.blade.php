@extends('admin_pages.layouts.master')

@section('content')
<style>
    .pure-material-textfield-outlined{
        width: 100% !important;
    }
    .card-title{
        
        font-family:Titillium Web;
        color: #84a9d9;
        font-size:30px;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="card-title">
            Patient : {{$data->patient->nom}} {{$data->patient->prenom}}
        </div>
        <div class="card-subtitle">
            <h5>CIN : {{$data->patient->cin}} </h5>
        </div>
        
        <div class="card-title">
            Saisie de caissier 
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('fact.update',['id'=>$data->id])}}" method="POST">
            @csrf
            <center>
                <input type="hidden" name="pat_id" value="{{$data->patient->id}}">
                {{-- Motif --}}
                <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder="" name="motif" required value="{{$data->motif}}">
                    <span>Motif : </span>
                </label>
                {{-- Duree --}}
                <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder="" name="montant" required value="{{$data->montant}}" >
                    <span>Montant : </span>
                </label>
                {{-- Status --}}
                <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder="" name="avance" required value="{{$data->avance}}" >
                    <span>Avance : </span>
                </label>
            </center>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection