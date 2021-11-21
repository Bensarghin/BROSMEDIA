@extends('admin_pages.layouts.master')
@section('content')

<form action="{{route('ordonnance.insert')}}" method="post">
    @csrf
    <div class="card" id="DivIdToPrint">
        <div class="card-header">
            <h4 class="card-title">Ordonnance</h4>
            <input type="hidden" value="{{$ord->patient->id}}" name="pat_id">
            {{-- <input type="hidden" value="{{$patients->med_id}}" name="med_id"> --}}
            <h5 class="card-subtitle">Patient : {{$ord->patient->nom}} {{$ord->patient->prenom}}</h5>
            {{-- <h5 class="card-subtitle">Medecin affecté: {{$ord->patients->nom_med}} {{$patients->prenom_med}}</h5> --}}
        </div>

        <div class="card-body">
            
            @foreach ($ord->medicament as $item)
            <ul class="list-group">
                <li class="list-group-item">
                    <h3 class="card-title">{{$item->nom_medicament}}</h3>
                    <p class="card-subtitle">{{$item->notice_utilisation}}</p>
                </li>
            </ul>
            @endforeach

        </div>

        <div class="card-footer">
            <div class="mt-2">
                <a id="imprimer" class="btn btn-secondary">Imprimer</a>
            </div>
        </div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#imprimer").click(function(){
    $('#DivIdToPrint').print();
  });
});
</script>
@endsection

