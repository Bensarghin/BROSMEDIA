@extends('admin_pages.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Ordonnance</h4>
        <h5 class="card-subtitle">Patient : {{$patients->nom_pat}} {{$patients->prenom_pat}}</h5>
        <h5 class="card-subtitle">Medecin affecté: {{$patients->nom_med}} {{$patients->prenom_med}}</h5>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h3>Medicament 3</h3>
                <p>Notice de utilisation detallier</p>
                <a href="" class="text-info"><i class="fas fa-edit"></i></a> | <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
            </li>
        </ul>
    </div>
    <div class="card-footer">
        <a href="" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Neuveau medicament</a> 
        | <a href=""  class="btn btn-secondary">Imprimer</a>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel" v-text="msg">stock medicaments</h5>
            <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <form action="{{route('ord.ajouter')}}" method="POST">
              <select name="medic_id" class="form-control">
                <option disabled selected>Selectionner un medicament ...</option>
                    @foreach ($medic as $item)
                        <option value="{{$item->id}}">{{$item->nom_medicament}}</option>
                    @endforeach
                <button type="submit"  class="btn btn-primary" >Ajouter</button>
              </select>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="Annuler" data-bs-dismiss="modal">Annuler</button>
        </div>
        </div>
    </div>
    </div>
@endsection