<template>
    <div>
        <!-- detail modal -->
        <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <td>Jour</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Enregistrer</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
            </div>
        </div>
        </div>

        <!-- caisse modal -->
        <div class="modal fade" id="caisse_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Neuveau dépense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <input type="text" onfocus="(this.type='date')" class="form-control" id="exampleInputPassword1" placeholder="Date Facturation :">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Revenue">
                    <div class="input-group-append">
                        <span class="input-group-text">.00DH</span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" class="form-control" placeholder="Dépense">
                    <div class="input-group-append">
                        <span class="input-group-text">.00DH</span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" class="form-control"  placeholder="TTC">
                    <div class="input-group-append">
                        <span class="input-group-text">.00DH</span>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Source :">
                </div>
                 <div class="form-group">
                    <textarea name="" placeholder="description" class="form-control" cols="30" rows="5"></textarea>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Enregistrer</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

            </div>
            </div>
        </div>
        </div>
         <!-- jhgjhg -->

        <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"> <h4 class="text-muted mt-2">Caisse</h4> </div>
                <div class="col-md-6"> <a href="" class="btn btn-outline-success"  data-toggle="modal" data-target="#caisse_modal">Ajouter dépense <i class="fas fa-plus"></i></a> </div>
            </div>
        </div>
        <div class="card-body">
            <select name="" class="form-control mb-4" style="width:200px">
                <option disabled selected>Année</option>
                <option value="">2010</option>
                <option value="">2009</option>
            </select>
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Mois</td>
                    <td>Revenue</td>
                    <td>Dépense</td>
                    <td>Marge bénéf.</td>
                    <td>Action</td>
                </tr>
                <tr>
                    <td>12 déc 2021</td>
                    <td>1200 ,00DH</td>
                    <td>1200 ,00DH</td>
                    <td><i class="fas fa-chart-line text-success"></i> 12 ,00DH </td>
                    <td>
                        <a href="" class="text-secondary" data-toggle="modal" data-target="#modal_detail"><i class="fas fa-info-circle"></i></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</template>