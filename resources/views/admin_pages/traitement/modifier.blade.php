@extends('admin_pages.layouts.master')

@section('content')
<div class="card-header">
    <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #84a9d9;font-size:30px">
    Modification de Traitement
    </div> 
</div>

<form action="{{route('patient.add')}}" method="POST">
    @csrf
    <center>
    {{-- nom --}}
    <label class="pure-material-textfield-outlined">
      <input type="text" placeholder=" " name="nomTrait" required value="{{isset($data->id)? $data->nom: ''}}" >
      <span>nom traitement</span>
    </label>

    {{-- type --}}
    <label class="pure-material-textfield-outlined">
      <input type="text" placeholder=" " name="type" required value="{{isset($data->id)? $data->prenom: ''}}" >
      <span>typeTrait</span>
    </label>
    <label class="pure-material-textfield-outlined">
        <textarea name="description" id="" cols="30" rows="10">
            
        </textarea>
        <span>description</span>
    </label>

      {{-- Resultat --}}
    <label class="pure-material-textfield-outlined">
        <input type="text" placeholder=" " name="Status" required value="{{isset($data->id)? $data->sexe: ''}}" >
        <span>Resultat</span>
    </label>
  </center>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection