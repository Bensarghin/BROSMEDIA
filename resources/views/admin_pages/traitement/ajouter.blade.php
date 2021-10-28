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
        <div class="card-header">
            <div class="card-title">
                Patient : {{$data->nom}} {{$data->prenom}}
            </div>
            <div class="card-subtitle">
                <h5>CIN : {{$data->cin}} </h5>
            </div>
            
            <div class="card-title">
                Saisie de traitement 
            </div>
        </div>
     
    </div>

    <div class="card-body">
        <form action="{{route('traitement.insert',['id'=>$etat_id])}}" method="POST">
            @csrf
            <center>
            {{-- nom --}}
            <label class="pure-material-textfield-outlined">
            <input type="text" placeholder=" " name="nomTrait" required value="" >
            <span>Nom Traitement : </span>
            </label>
            {{-- type --}}
            <label class="pure-material-textfield-outlined">
            <input type="text" placeholder=" " name="type" required value="" >
            <span>Type Traitement : </span>
            </label>
            {{-- description --}}
            <label class="pure-material-textfield-outlined">
            <textarea name="description" cols="30" rows="6">

            </textarea>
            <span>Description : </span>
            </label>
            {{-- status --}}
            <label class="pure-material-textfield-outlined">
                <input type="text" placeholder=" " name="status" required value="" >
                <span>Resultat : </span>
            </label>
        </center>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection