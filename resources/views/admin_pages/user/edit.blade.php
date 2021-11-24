@extends('admin_pages.layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title">Modifer login</h5>
            </div>
            <div class="card-body">
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
                <a href="" class="btn btn-link">Change mot de pass <i class="fas fa-key"></i></a>
            </div>
        </div>
    </div>

@endsection