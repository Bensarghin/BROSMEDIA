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
            Patient : {{$data->nom}} {{$data->prenom}}
        </div>
        <div class="card-subtitle">
            <h5>CIN : {{$data->cin}} </h5>
        </div>
        
        <div class="card-title">
            Saisie de caissier 
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('fact.insert')}}" method="POST">
            @csrf
            <center>
                <input type="hidden" name="pat_id" value="{{$data->id}}">
                {{-- Motif --}}
                <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder="" name="motif" required value="" >
                    <span>Motif : </span>
                </label>
                {{-- Duree --}}
                <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder="" name="montant" required value="" >
                    <span>Montant : </span>
                </label>
                {{-- Status --}}
                <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder="" name="avance">
                    <span>Avance (optionnel): </span>
                </label>
            </center>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection