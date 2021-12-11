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
            Patient : {{$data->patient->nom}} {{$data->patient->prenom}}
        </div>
        <div class="card-subtitle">
            <h5>CIN : {{$data->patient->cin}} </h5>
        </div>
        
        <div class="card-title">
            Saisie de consultation 
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('Consultation.insert',['id'=>$data->id])}}" method="POST">
            @csrf
            <center>
                <input type="hidden" name="pat_id" value="{{$data->patient->id}}">
            {{-- Motif --}}
                <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder=" " name="motif" required value="" >
                    <span>Motif : </span>   
                </label>
                {{-- Duree --}}
                <label class="pure-material-textfield-outlined">
                    <div class="input-group mr-auto"  style="width: 400px !important"> 
                        <div class="input-group-prepend">
                            <span class="input-group-text">Durée : </span>
                        </div>
                        <input type="time" name="duree" class="form-control" value="" style="height: 45px;">
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