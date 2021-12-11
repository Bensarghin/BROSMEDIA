@extends('admin_pages.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Banque</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="p-5 border">Total</h4>
                    <ul class="list-group">
                        <li class="list-group-item">Total Montant : {{$facturation->sum('montant')}} ,00DH</li>
                        <li class="list-group-item">Total Avance : {{$facturation->sum('avance')}} ,00DH</li>
                        <li class="list-group-item">Total Credit : {{$facturation->sum('montant') - $facturation->sum('avance')}} ,00DH</li>
                        <li class="list-group-item">Numéro de Credit : {{$fact_count->count()}} Patients</li>
                    </ul>
                </div>
                <div class="col-md-6"> 
                    <h4 class="p-5 border">Jour : {{date('d M Y h:m ')}}</h4>
                    <ul class="list-group">
                        <li class="list-group-item">Total Montant : {{$fact_jour->sum('montant')}} ,00DH</li>
                        <li class="list-group-item">Total Avance : {{$fact_jour->sum('avance')}} ,00DH</li>
                        <li class="list-group-item">Total Credit : {{$fact_jour->sum('montant') - $fact_jour->sum('avance')}} ,00DH</li>
                        <li class="list-group-item">Numéro de Credit : {{$fact_jour_count->count()}} Patients</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @if (($fact_mois->sum('avance')-$fact_dmois->sum('avance'))>=0)
                <i class="fas fa-angle-double-up text-success"></i>
                <span class="p-2">{{$fact_mois->sum('avance')-$fact_dmois->sum('avance')}} ,00DH | </span>
            @else
                <i class="fas fa-angle-double-down text-danger"></i>
                <span class="p-2">{{$fact_mois->sum('avance')-$fact_dmois->sum('avance')}} ,00DH | </span>
            @endif
            <span class="p-2">Dérnier mois : {{$fact_dmois->sum('avance')}} ,00DH</span>
            <span class="p-2">Ce mois : {{$fact_mois->sum('avance')}} ,00DH</span>
        </div>
    </div>
@endsection