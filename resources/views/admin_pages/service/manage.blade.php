@extends('admin_pages.layouts.master')
@section('content')
<style>
    .pure-material-textfield-outlined{
        width: 100% !important
}
</style>
<div class="card">
    <div id="app" class="container-fluid">
        <div class="card-body">
        <service-manage-component></service-manage-component>
    </div>
</div>
@endsection