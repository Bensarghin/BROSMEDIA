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
                <h4 class="card-title">Ordonnance</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="card-subtitle mt-5">Patient : {{$ord->patient->nom}} {{$ord->patient->prenom}}</h5>
                        <h5 class="card-subtitle mt-5">Medecin affecté: {{$ord->patient->nom_med}} {{$ord->patient->prenom_med}}</h5>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{asset('img/cabinet.png')}}" alt="" width="100" height="100">
                    </div>
                </div>
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
                    mediaPrint : false,
                    
                    //Custom stylesheet
                    stylesheet : "{{asset('sheet/assets/css/style.css')}}",
                });
            });
        });
</script>
@endsection

