@extends('admin_pages.layouts.master')
@section('content')

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;
    color: #84a9d9;font-size:30px">Liste de Patient</div> <button type="button" data-toggle="modal"
                                        data-target="#myModal1" class="btn btn-info"><i
                                            class="mdi mdi-account-multiple-plus" data-toggle="tooltip" title=""
                                            data-original-title="mdi-account-multiple-plus"></i>
                                        Ajouter un Patient</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id='exampleee' class='table table-bordered'>
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Telephone</th>
                                                    <th>Cin</th>

                                                    <th>Address</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Yousra Charif Tribak</td>
                                                    <td>0676554533</td>
                                                    <td>Lb843843</td>
                                                    <td>Salah dine Ayoubi</td>


                                                    <td class='text-center' style='
                                            width: 124px;
                                        '>
                                                        <a href='#' class='edit' data-id='' data-toggle='modal'
                                                            data-target='#myModal1' data-original-title='Edit'>
                                                            <img src='../assets/images/Edit.svg' style='height:25px'>
                                                        </a>
                                                        <a href='#' class='delete' data-id='" . $row["Numero"] . "'
                                                            data-toggle='tooltip' data-original-title='Delete'>
                                                            <img src='../assets/images/trash.svg' style='height:25px'>
                                                        </a>


                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End row-->
                </div>
            </div><!-- end app-content-->
        </div>

 @endsection