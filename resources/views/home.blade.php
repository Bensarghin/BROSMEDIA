@extends('admin_pages.layouts.master')
@section('content')

{{-- card for statistics --}}
<div class="today"></div>
<div class="col-md-12 col-lg-12">
    <div class="row">
        <div class="col-md">
            <div class="card bg-gradient-info overflow-hidden text-white" style="height: 179px;">
                {{-- Rendy vous --}}
                <div class="card-body pb-0">
                    <p class=" mb-1 ">Total Rendez-vous</p>
                    <h2 class="mb-1 font-weight-bold fs-30">
                        {{$total_rdv}}
                    </h2>
                </div>
                <div class="chart-wrapper overflow-hidden">
                    <div class="chartjs-size-monitor"
                        style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div
                                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                            </div>
                        </div>
                        <div class="chartjs-size-monitor-shrink"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                            </div>
                        </div>
                    </div> <canvas id="area-chart1"
                        class="area-chart chart-dropshadow-dark chartjs-render-monitor" height="140"
                        width="528" style="display: block; height: 70px; width: 264px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            {{-- Patients --}}
            <div class="card bg-gradient-danger overflow-hidden text-white" style="height: 179px;">
                <div class="card-body pb-0">
                    <p class=" mb-1 ">Total Patients</p>
                    <h2 class="mb-1 font-weight-bold fs-30">
                        {{$total_pat}}
                    </h2>
                </div>
                <div class="chart-wrapper overflow-hidden">
                    <div class="chartjs-size-monitor"
                        style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div
                                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                            </div>
                        </div>
                        <div class="chartjs-size-monitor-shrink"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                            </div>
                        </div>
                    </div> <canvas id="area-chart3"
                        class="area-chart chart-dropshadow-dark chartjs-render-monitor" height="140"
                        width="528" style="display: block; height: 70px; width: 264px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card bg-gradient-info overflow-hidden text-white" style="height: 179px;">
                {{-- Gains --}}
                <div class="card-body pb-0">
                    <p class=" mb-1 ">Total Gains </p>
                    <h2 class="mb-1 font-weight-bold fs-30">
                        60.4545 DH
                    </h2>
                </div>
                <div class="chart-wrapper overflow-hidden">
                    <div class="chartjs-size-monitor"
                        style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div
                                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                            </div>
                        </div>
                        <div class="chartjs-size-monitor-shrink"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                            </div>
                        </div>
                    </div> <canvas id="area-chart2"
                        class="area-chart chart-dropshadow-dark chartjs-render-monitor" height="140"
                        width="528" style="display: block; height: 70px; width: 264px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card bg-gradient-danger overflow-hidden text-white" style="height: 179px;">
                {{-- Traitement --}}
                <div class="card-body pb-0">
                    <p class=" mb-1 ">Total Traitements</p>
                    <h2 class="mb-1 font-weight-bold fs-30">
                        {{$total_trait}}
                    </h2>
                </div>
                <div class="chart-wrapper overflow-hidden">
                    <div class="chartjs-size-monitor"
                        style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div
                                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                            </div>
                        </div>
                        <div class="chartjs-size-monitor-shrink"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                            </div>
                        </div>
                    </div> <canvas id="area-chart2"
                        class="area-chart chart-dropshadow-dark chartjs-render-monitor" height="140"
                        width="528" style="display: block; height: 70px; width: 264px;"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>
<div id="app">
    <patients-table></patients-table>
</div>
@endsection