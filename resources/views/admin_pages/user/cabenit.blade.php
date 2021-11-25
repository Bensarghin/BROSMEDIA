@extends('admin_pages.layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                @if (isset($cabinet))
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{asset('storage/cabenit/'.$cabinet->logo)}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <div class="row"> 
                            <h5 class="col-sm-6 card-title"> {{$cabinet->nom_cabenit}}, {{$cabinet->ville}} </h5>
                            <a href="" class="col-sm-6 card-title"><i class="fas fa-edit"></i></a>
                          </div>
                          <p class="card-text"> {{$cabinet->description}} </p>
                          <p class="card-text"><small class="text-muted">{{$cabinet->tele}} <br> {{$cabinet->adresse}}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                @else
                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" name="nom" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">descritpion :</label>
                        <input type="text" name="description" class="form-control" value="" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">tele :</label>
                        <input type="text" name="tele" class="form-control" value="" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">adresse :</label>
                        <input type="adresse" name="adresse" class="form-control" value="" >
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">ville :</label>
                      <input type="adresse" name="ville" class="form-control" value="" >
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form> 
                @endif
            </div>
        </div>
    </div>

@endsection