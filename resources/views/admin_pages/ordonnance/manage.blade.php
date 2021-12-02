@extends('admin_pages.layouts.master')
@section('content')

<form action="{{route('ordonnance.insert')}}" method="post">
    @csrf
    @if ($errors->any())
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ordonnance</h4>
            <input type="hidden" value="{{$patients->id}}" name="pat_id">
            <h5 class="card-subtitle">Patient : {{$patients->nom}} {{$patients->prenom}}</h5>
            <div id="app" class="row">
                <div class="input-group mb-3" style="width: 400px">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Medecin : </span>
                    </div>
                    <select class="form-control" name="medecin" 
                    aria-label="Recipient's username" 
                    aria-describedby="basic-addon2" required>
                        <option selected disabled>Medecin affecté .... </option>
                        @foreach ($medecins as $medecin)
                        <option value="{{$medecin->id}}">{{$medecin->nom}} {{$medecin->prenom}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>

        <div class="card-body">
            
            @foreach ($medic as $item)
            <div class="form-check form-check-inline ml-3" style="width: 300px">
               <input class="form-check-input" type="checkbox" name='medicaments[]' value="{{$item->id}}">
                <label class="form-check-label" >{{$item->nom_medicament}}</label>
            </div>
            @endforeach

        </div>

        <div class="card-footer">
            <div class="mt-2">
                <button class="btn btn-success" type="submit"> Enregistrer</button>
            </div>
        </div>
    </div>
</form>
@endsection