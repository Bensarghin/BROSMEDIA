@extends('admin_pages.layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Modifier cabinet informations</h5>
                <form action="{{route('cabinet.update')}}" method="POST" enctype="multipart/form-data">
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
                        <label for="exampleInputEmail1">nom :</label>
                        <input type="text" class="form-control" name="nom" value="{{$cabinet->nom_cabenit}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">description :</label>
                        <input type="text" name="description" class="form-control" value="{{$cabinet->description}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">tele :</label>
                        <input type="text" name="tele" class="form-control" value="{{$cabinet->tele}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">adresse :</label>
                        <input type="adresse" name="adresse" class="form-control" value="{{$cabinet->adresse}}" >
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">ville :</label>
                      <input type="adresse" name="ville" class="form-control" value="{{$cabinet->ville}}" >
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form> 
            </div>
        </div>
    </div>

@endsection