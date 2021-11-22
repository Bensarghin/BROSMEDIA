@extends('admin_pages.layouts.master')
@section('content')

<form action="{{route('ordonnance.insert')}}" method="post">
    @csrf
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ordonnance</h4>
            <input type="hidden" value="{{$patients->pat_id}}" name="pat_id">
            <input type="hidden" value="{{$patients->med_id}}" name="med_id">
            <h5 class="card-subtitle">Patient : {{$patients->nom_pat}} {{$patients->prenom_pat}}</h5>
            <h5 class="card-subtitle">Medecin affecté: {{$patients->nom_med}} {{$patients->prenom_med}}</h5>
        </div>

        <div class="card-body">
            
            @foreach ($medic as $item)
            <div class="form-check form-check-inline ml-3" style="width: 300px">
               <input class="form-check-input" type="checkbox" name='medic_id[]' value="{{$item->id}}">
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