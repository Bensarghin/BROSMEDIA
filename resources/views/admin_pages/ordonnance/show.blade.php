@extends('admin_pages.layouts.master')
@section('content')
<style>
    #DivIdToPrint{
        -webkit-print-color-adjust:exact;
    }
</style>

<form action="{{route('ordonnance.insert')}}" method="post">
    @csrf
    
    <input type="hidden" value="{{$ord->patient->id}}" name="pat_id">
    <input type="hidden" value="{{$ord->patient->med_id}}" name="med_id">
    <div class="card">
        <div id="DivIdToPrint">
            <div class="card-header">

                <h4 class="card-title">
                    {{$cabinet->nom_cabenit}} <br>
                    
                    {{$ord->medecin->nom}} {{$ord->medecin->prenom}}
                </h4>
                <p>{{$cabinet->tele}}<br>{{$cabinet->adresse}}</p>
                <h5 class="card-subtitle mt-5">
                </h5>
                
                <div class="row">
                    <div class="col-sm-6">
                        {{--   --}}
                        <h5 class="card-subtitle mt-5">Mme / Ms : {{$ord->patient->nom}} {{$ord->patient->prenom}}</h5>
                        <h5 class="card-subtitle mt-5">age : {{ Date('Y') - (\Carbon\Carbon::parse($ord->patient->date_nais)->format('Y'))}} </h5>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{asset('storage/cabenit/'.$cabinet->logo)}}" alt="" width="100" height="100">
                    </div>
                </div>

            <div class="card-body">
                @foreach ($ord->medicament as $item)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h3 class="card-title">{{$item->nom_medicament}}</h3>
                        <p class="card-subtitle">{{$item->notice_utilisation}}</p>
                    </li>
                </ul>
                @endforeach

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
                    mediaPrint : true,
                    
                    //Custom stylesheet
                    stylesheet : "{{asset('sheet/assets/plugins/bootstrap/css/bootstrap.css')}}",
                    //stylesheet : "{{asset('sheet/assets/css/style.css')}}",
                });
            });
        });
</script>
@endsection

