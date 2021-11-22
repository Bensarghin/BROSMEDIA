@extends('admin_pages.layouts.master')
@section('content')
    
    <div class="card">
        <div class="card-body">
            <form class="container" action="" method="POST">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Name :</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email :</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection