@extends('admin_pages.layouts.master')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="cal-div col-sm-3">
            <div id="color-calendar"></div>
        </div>
        <div class="col-sm-9 dashboards">
            <div class="row">
                <div class="alert alert-success col-sm-4"><h3> total facturations <span class="badge bg-secondary">15</span></h3></div>
                <div class="alert alert-secondary col-sm-4"><h3> les nouveau rendey-vous <span class="badge bg-secondary">10</span></h3></div>
                <div class="alert alert-info col-sm-4"><h3> total les patient<span class="badge bg-secondary">6</span></h3></div>
            </div> 
            <h5> filter: jour / semaine /mois : barre de rechreche</h5>
            <div>
                list des consultaions resrver
            </div>
            <div>
                list des traitements reserver
            </div>
        </div>
    </div>
</div>
@endsection