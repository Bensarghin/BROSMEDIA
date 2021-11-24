@extends('admin_pages.layouts.master')
@section('content')

<form action="{{route('ordonnance.insert')}}" method="post">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Patient : {{$patients->nom}} {{$patients->prenom}}</h3>
        </div>
        <div class="card-body">
            <div class="d-flex bd-highlight">
                <h5 class="card-text me-auto p-2 bd-highlight">
                    Total ordonnances : 
                    <span class="badge bg-secondary">
                        {{$patients->ordonnance->count()}}
                    </span> 
                </h5> 
                <a class="p-2" href="{{route('ord.manage',['id'=>$patients->id])}}">Neuveau <i class="fas fa-plus"></i></a>
            </div>
            <ul class="list-group mt-5">
                <li class="list-group-item"><h4>List ordonnances </h4> </li>
            @foreach ($patients->ordonnance as $item)
                <li class="list-group-item"> 
                    <a href="{{route('ordonnance.show', ['ordonnance' => $item])}}"> 
                        <span class="p-2 border"> {{$item->id}} </span> 
                        <span class="p-2"> Créé à : {{$item->created_at}} </span>
                        <span class="p-2"><i class="fas fa-stethoscope"></i> Affecter à : {{$item->medecin->nom}}  {{$item->medecin->prenom}}</span>
                    </a>
                    <a href="{{route('ordonnance.delete',['ordonnance'=> $item])}}" class="ml-5"><i class="fas fa-times fa-xl"></i></a></li>
            @endforeach
            </ul>

        </div>
    </div>
</form>
@endsection