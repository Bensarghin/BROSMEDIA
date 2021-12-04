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
            Saisie de traitement 
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('traitement.insert',['id'=>$etat_id])}}" method="POST">
            @csrf
            <center>
                {{-- Motif --}}
                <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder=" " name="nomTrait" required value="" >
                    <span>Nom traitement : </span>
                </label>
                {{-- Duree --}}
                <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder=" " name="typeTrait" required value="" >
                    <span>Type traitement : </span>
                </label>
                {{-- Details --}}
                <label class="pure-material-textfield-outlined">
                    <textarea name="description" cols="30" rows="6"></textarea>
                    <span>Description : </span>
                </label>
                {{-- Status --}}
                <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder=" " name="status" required value="" >
                    <span>Status : </span>
                </label>
            </center>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection