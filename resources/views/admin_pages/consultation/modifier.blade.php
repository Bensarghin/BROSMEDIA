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
<<<<<<< HEAD
            <h5>Date pour consultation : {{$data->date_consu}} </h5>
=======
>>>>>>> c600510afe539969ce921302ff32d488d656dcb0
        </div>
        
        <div class="card-title">
            Modification de consultation 
        </div>
    </div>

    <div class="card-body">
<<<<<<< HEAD
        <form action="{{route('Consultation.update',['id'=>$data->consu_id])}}" method="POST">
=======
        <form action="{{route('Consultation.update',['id'=>$id])}}" method="POST">
>>>>>>> c600510afe539969ce921302ff32d488d656dcb0
            @csrf
            <center>
            {{-- Motif --}}
            <label class="pure-material-textfield-outlined">
<<<<<<< HEAD
            <input type="text" placeholder=" " name="motif" required value="{{isset($data)?$data->motif:''}}" >
            <span>Motif : </span>
            </label>
            {{-- Duree --}}
            <label class="pure-material-textfield-outlined">
                <div class="input-group"> 
                    <div class="input-group-prepend">
                        <span class="input-group-text">Durée : </span>
                    </div>
                    <input type="number" name="duree" class="form-control" value="{{isset($data)?$data->duree:''}}" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text">Heures</span>
                    </div>
                </div>
            </label>
            {{-- Details --}}
            <label class="pure-material-textfield-outlined">
            <textarea name="detail" cols="30" rows="6">{{isset($data)?$data->detail:''}}</textarea>
            <span>Détails : </span>
=======
                <input type="text" placeholder="" name="motif" required value="{{$data->motif}}" >
                <span>Motif : </span>
            </label>
            {{-- Duree --}}
            <label class="pure-material-textfield-outlined">
                <input type="number" placeholder=" " name="duree" required value="{{$data->duree}}" >
                <span>Durée : </span>
            </label>
            {{-- Details --}}
            <label class="pure-material-textfield-outlined">
                <textarea name="detail" cols="30" rows="6">{{$data->detail}}</textarea>
                <span>Détails : </span>
>>>>>>> c600510afe539969ce921302ff32d488d656dcb0
            </label>
        </center>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection