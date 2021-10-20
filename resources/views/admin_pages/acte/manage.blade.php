@extends('admin_pages.layouts.master')

@section('content')
        
<div class="card">
    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #84a9d9;font-size:30px">
            Liste des actes
        </div> 
        <a type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            AJOUTER UN ACTE <i class="fas fa-folder-plus"></i> 
        </a>
    </div>
    <div id="app" class="container-fluid">
        <div class="card-body">
            <acte-list-component></acte-list-component>
        </div>
    </div>
@endsection