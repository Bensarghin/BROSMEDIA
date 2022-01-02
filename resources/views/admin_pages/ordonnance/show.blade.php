@extends('admin_pages.layouts.master')
@section('content')
<style>
.card-header .row-row .colum{
    display: inline-flex;
    margin: 15px;
    padding: 15px;
    max-width: 250px;
    vertical-align: middle;
    border-style: none;
}
.card-body h6{
    margin: 15px;
    font-size: 17px;
    color: #2e3849;
}
.card-body p{
    
    margin: 15px;
    color: #2e3849;
}
img {
    max-width: 100%;
    vertical-align: middle;
    border-style: none;
}

.margin-div{
    margin-top: 80px;
}
</style>
<form action="{{route('ordonnance.insert')}}" method="post">
    @csrf
    
    <input type="hidden" value="{{$ord->patient->id}}" name="pat_id">
    <input type="hidden" value="{{$ord->patient->med_id}}" name="med_id">
    <div class="card">
        <div id="DivIdToPrint">
                
            <div class="card-header">
                <div class="row-row">
                    <div class="colum p-4">
                         {{ isset($cabinet->nom_cabenit)?'Cabinet : '.$cabinet->nom_cabenit:''}} <br>
                        Medecin : {{ $ord->medecin->nom}} {{$ord->medecin->prenom}} <br>
                    </div>
                    <div class="colum">
                        @if(isset($cabinet))
                        <img src="{{asset('cabenit/'.$cabinet->logo)}}" alt="" width="80" height="80">
                        @else
                            <a class="text-danger" href="{{route('cabinet')}}">Ajouter information de  votre cabinet ...</a>
                        @endif
                    </div>
                    <div class="colum p-4">
                        {{isset($cabinet->adresse)?$cabinet->adresse:''}}<br>
                        {{isset($cabinet->tele)?$cabinet->tele:''}}
                    </div>
                </div>
            </div>
            

            <div class="card-body">
                <h6>{{isset($cabinet->ville)?$cabinet->ville:''}} le : {{Date('d M Y')}}</h6>
                <p>
                    Mlle / Mr : {{$ord->patient->nom}} {{$ord->patient->prenom}}<br>
                    Né le : {{$ord->patient->date_nais}} / {{ (Date('Y') - \Carbon\Carbon::parse($ord->patient->date_nais)->format('Y')).' ans'}}<br>
                </p>
                <div class="margin-div"></div>

                <ol class="list-group list-group-flush">
                @foreach ($ord->medicament as $item)
                    <li class="list-group-item">
                        <h3 class="card-title">{{$item->nom_medicament}}</h3>
                        <p class="card-subtitle">{{$item->notice_utilisation}}</p>
                    </li> 
                @endforeach
                </ol>

            </div>
        </div>
        <div class="card-footer">
            <div class="mt-2">
                <a onclick="jQuery.print()" class="print-link btn btn-secondary">Imprimer</a>
            </div>
        </div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/jQuery.print.js')}}"></script>
<script>
jQuery(function($) { 'use strict';
            try {
                var original = document.getElementById('canvasExample');
                original.getContext('2d').fillRect(20, 20, 120, 120);
            } catch (err) {
                console.warn(err)
            }
            // $("#DivIdToPrint").find('.print-link').on('click', function() {
            //     //Print ele2 with default options
            //     $.print("#DivIdToPrint");
            // });

            $('.print-link').on('click', function() {
                //Print DivIdToPrint with custom options
                $("#DivIdToPrint").print({
                    //Use Global styles
                    globalStyles : false,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    header: null,               // prefix to html
                    footer: null,
                    pageTitle: "",
                    
                    //Custom stylesheet
                    //stylesheet : "{{asset('sheet/assets/plugins/bootstrap/css/bootstrap.css')}}",
                    stylesheet : "{{asset('css/ordonnance.css'), asset('sheet/assets/plugins/bootstrap/css/bootstrap.css')}}",
                });
            });
        });
</script>
@endsection

