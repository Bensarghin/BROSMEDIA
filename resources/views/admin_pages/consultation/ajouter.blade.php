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
            Patient : {{$data->nom}} {{$data->prenom}}
        </div>
        <div class="card-subtitle">
            <h5>CIN : {{$data->cin}} </h5>
        </div>
        
        <div class="card-title">
            Saisie de consultation 
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('Consultation.insert',['id'=>$etat_id])}}" method="POST">
            @csrf
            <center>
            {{-- Motif --}}
            <label class="pure-material-textfield-outlined">
            <input type="text" placeholder=" " name="motif" required value="" >
            <span>Motif : </span>
            </label>
            {{-- Duree --}}
            <label class="pure-material-textfield-outlined">
            <input type="number" placeholder=" " name="duree" required value="" >
            <span>Durée : </span>
            </label>
            {{-- Details --}}
            <label class="pure-material-textfield-outlined">
            <textarea name="detail" cols="30" rows="6"></textarea>
            <span>Détails : </span>
            </label>
        </center>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection