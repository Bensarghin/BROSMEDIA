@extends('admin_pages.layouts.master')
@section('content')
<style>
    .pure-material-textfield-outlined{
        width: 100% !important
    }
</style>

        <div class="card">
            <div class="card-header">
                <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #06a3da;font-size:30px">
                    Modification de patient {{$data->cin}}
                </div> 
            </div>
            <div class="card-body">
                <form action="{{route('patient.update',['id'=>$data->id])}}" method="POST">
                    @csrf
                    {{-- cin --}}
                    <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder=" " name="cin" required value="{{ isset($data->id) ? $data->cin : ''}}" >
                    <span>cin</span>
                    </label>
                    {{-- nom --}}
                    <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder=" " name="nom" required value="{{isset($data->id)? $data->nom: ''}}" >
                    <span>nom</span>
                    </label>
                    {{-- prenom --}}
                    <label class="pure-material-textfield-outlined">
                    <input type="text" placeholder=" " name="prenom" required value="{{isset($data->id)? $data->prenom: ''}}" >
                    <span>prenom</span>
                    </label>
                    {{-- sexe --}}
                    <label class="pure-material-textfield-outlined">
                        <span>Sexe :</span>
                        <div class="form-check">
                            <input class="form-check-input" value="M" type="radio" name="sexe" id="sexe1" {{$data->sexe=='M'?'checked':''}}>
                            <label class="form-check-label" for="sexe1">
                              Masculin
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="F" name="sexe" id="sexe2" {{$data->sexe=='F'?'checked':''}}>
                            <label class="form-check-label" for="sexe2">
                              Feminin
                            </label>
                          </div>
                    </label>
                    {{-- date naissance --}}
                    <label class="pure-material-textfield-outlined">
                        <input type="date" placeholder=" " name="date_nais" required value="{{isset($data->id)?  $data->date_nais: ''}}" >
                        <span>dateNaissance</span>
                    </label>
                    {{-- telephone --}}
                    <label class="pure-material-textfield-outlined">
                        <input type="text" placeholder=" " name="tele" required value="{{isset($data->id)?  $data->tele : ''}}">
                        <span>télephone</span>
                    </label>
                    {{-- Adresse--}}
                    <label class="pure-material-textfield-outlined">
                        <input type="text" placeholder=" " name="adresse" required value="{{isset($data->id)?  $data->adresse : ''}}">
                        <span>Adresse</span>
                    </label>
                <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
@endsection