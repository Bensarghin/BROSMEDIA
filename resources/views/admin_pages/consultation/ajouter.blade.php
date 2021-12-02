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
                <input type="hidden" name="pat_id" value="{{$pat_id}}">
            {{-- Motif --}}
            <label class="pure-material-textfield-outlined">
                <input type="text" placeholder=" " name="motif" required value="" >
                <span>Motif : </span>   
            </label>
            {{-- Duree --}}
            <label class="pure-material-textfield-outlined">
                <div class="input-group"> 
                    <div class="input-group-prepend">
                        <span class="input-group-text">Durée : </span>
                    </div>
                    <input type="number" name="duree" class="form-control" value="" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text">Heures</span>
                    </div>
                </div>
            </label>
            {{-- Details --}}
            <label class="pure-material-textfield-outlined">
                <textarea name="detail" cols="30" rows="6"></textarea>
                <span>Détails (optionel): </span>
            </label>
        </center>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection