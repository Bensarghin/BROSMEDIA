                         </div>  
                        </div>
                    </div>
                </div>
            </div>
             <!--End row-->
        </div>
    </div><!-- end app-content-->
</div>
        <!--Footer-->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center"> Copyright © 2021 <a href="#"> Brosmedia
                        </a>. </div>
                </div>
            </div>
        </footer> <!-- End Footer-->
    </div>



    <script src="//code.jquery.com/jquery-3.5.1.js"></script>

                                        <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
                                        <script src="//code.jquery.com/jquery-3.5.1.js"></script>
                                        <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                                        <script
                                            src="//cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
                                        <script
                                            src="//cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
                                        <script
                                            src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                                        <script
                                            src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                                        <script
                                            src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                                        <script
                                            src="//cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
                                        <script
                                            src="//cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
                                        <script>

                                            $(document).ready(function () {
                                                $('#exampleee').DataTable({
                                                    dom: 'Bfrtip',
                                                    "searching": true,
                                                    "paging": true,
                                                    "order": [
                                                        [0, "asc"]
                                                    ],
                                                    "ordering": true,
                                                    "columnDefs": [{
                                                        "targets": [3],
                                                        "orderable": false
                                                    }],
                                                    buttons: [
                                                        'copy', 'csv', 'excel', 'pdf', 'print'
                                                    ]
                                                });
                                            });
                                        </script>




    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('sheet/assets/js/circle-progress.min.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/rating/jquery.rating-stars.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/sidemenu/sidemenu.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/echarts/echarts.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/peitychart/peitychart.init.js')}}"></script>
    <script src="{{asset('sheet/assets/js/apexcharts.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/morris/raphael-min.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/morris/morris.js')}}"></script>
    <script src="{{asset('sheet/assets/plugins/chart/chart.bundle.js')}}"></script>
    <script src="{{asset('sheet/assets/js/index1.js')}}"></script>
    <script src="{{asset('sheet/assets/js/loader.js')}}"></script>
    <script src="{{asset('sheet/assets/js/custom.js')}}"></script>
    <script src="{{asset('sheet/assets/switcher/js/switcher.js')}}"></script><svg id="SvgjsSvg1001" width="2" height="0"
        xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
        xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        

        {{-- laravel js --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>