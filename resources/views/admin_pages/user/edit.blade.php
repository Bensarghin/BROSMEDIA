@extends('admin_pages.layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title">Modifer login</h5>
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @else
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Votre mot de passe a été changer avec success.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                @endif
                <form action="{{route('user.update')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name :</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email :</label>
                        <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" >
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Change mot de pass <i class="fas fa-key"></i></a>
            </div>
            @include('admin_pages.user.password_edit')
        </div>
    </div>

@endsection