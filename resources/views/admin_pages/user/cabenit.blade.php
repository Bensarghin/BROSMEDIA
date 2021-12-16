@extends('admin_pages.layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                @if (isset($cabinet))
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{asset('cabenit/'.$cabinet->logo)}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <div class="row"> 
                            <h5 class="col-sm-6 card-title"> {{$cabinet->nom_cabenit}}, {{$cabinet->ville}} </h5>
                            <div class="col-sm-6">
                              <a href="{{route('cabinet.edit')}}" class="card-title p-2"><i class="fas fa-edit"></i></a> 
                              <a href="{{route('cabinet.delete',['id'=>$cabinet->id])}}" class="card-title p-2"><i class="fas fa-times"></i></a>
                            </div>
                          </div>
                          <p class="card-text"> {{$cabinet->description}} </p>
                          <p class="card-text">
                            <small class="text-muted">
                              {{$cabinet->tele}} <br> 
                              {{$cabinet->adresse}}
                            </small>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                @else
                  @if($errors->any())
                      <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                      </div>
                  @endif
                <h5 class="card-title">Ajouter cabinet informations</h5>
                <form action="{{route('cabinet.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Logo</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input"  name="logo">
                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">nom cabinet:</label>
                        <input type="text" class="form-control" name="nom" value="{{old('nom')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">descritpion (optionnel):</label>
                        <input type="text" name="description" class="form-control" value="{{old('description')}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">tele :</label>
                        <input type="tel" name="tele" class="form-control" value="{{old('tele')}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">adresse :</label>
                        <input type="text" name="adresse" class="form-control" value="{{old('adresse')}}" >
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">ville :</label>
                      <input type="text" name="ville" class="form-control" value="{{old('ville')}}" >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Services titre :</label>
                      <input type="text" name="service_titre" class="form-control" value="{{old('service_titre')}}" >
                    </div>

                    <div class="row mb-4">
                      <div class="col">
                        <label for="exampleInputPassword1">ouvrir à :</label>
                        <input type="time" class="form-control" name="heure_ouver" value="{{old('heure_ouver')}}">
                      </div>
                      <div class="col">
                        <label for="exampleInputPassword1">fermé à :</label>
                        <input type="time" class="form-control" name="heure_ferme"  value="{{old('heure_ferme')}}">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form> 
                @endif
            </div>
        </div>
    </div>

@endsection