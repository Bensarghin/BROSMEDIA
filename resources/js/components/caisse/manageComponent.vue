<template>
    <div>
        <!-- detail modal -->
        <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mois détails</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-light">
                    <tr>
                        <td>Date</td>
                        <td>Taux</td>
                        <td>Source</td>
                        <td>Description</td>
                        <td>Action</td>
                    </tr>
                    <tr v-for="detail in details" :key="detail.id">
                        <td v-if="detail.type=='revenue'">{{detail.date_fact}}</td>
                        <td v-if="detail.type=='revenue'">{{detail.taux}} DH</td>
                        <td v-if="detail.type=='revenue'">{{detail.source}}</td>
                        <td v-if="detail.type=='revenue'">{{detail.description}}</td>

                        <td v-if="detail.type=='depense'" style="background:rgb(106 4 15 / 19%)">{{detail.date_fact}}</td>
                        <td v-if="detail.type=='depense'" style="background:rgb(106 4 15 / 19%)">{{detail.taux}} DH</td>
                        <td v-if="detail.type=='depense'" style="background:rgb(106 4 15 / 19%)">{{detail.source}}</td>
                        <td v-if="detail.type=='depense'" style="background:rgb(106 4 15 / 19%)">{{detail.description}}</td>

                        <td v-if="detail.type=='revenue'">
                            <a @click="getcaisse(detail)" data-toggle="modal" class="text-secondary" data-target="#caisse_modal"><i class="text-info fas fa-pen-square"></i></a> | 
                            <a @click="deleteCaisse(detail.id)" class="text-danger"><i class="fas fa-times"></i></a>
                        </td>
                        <td v-if="detail.type=='depense'" style="background:rgb(106 4 15 / 19%)">
                            <a @click="getcaisse(detail)" data-toggle="modal" class="text-secondary" data-target="#caisse_modal"><i class="text-info fas fa-pen-square"></i></a> | 
                            <a @click="deleteCaisse(detail.id)" class="text-danger"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" id="annuler" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
            </div>
        </div>
        </div>

        <!-- caisse modal -->
        <div class="modal fade" id="caisse_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{head}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" v-model="caisse_id">
                <div class="form-group">
                    <input type="text" v-model="date_fact" onfocus="(this.type='date')" class="form-control" required placeholder="Date Facturation :">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <input type="number"  v-model="taux" class="form-control"  required placeholder="Taux :">
                    <div class="input-group-append">
                        <span class="input-group-text">DH</span>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" v-model="source" class="form-control" id="exampleInputPassword1" required placeholder="Source :">
                </div>
                 <div class="form-group">
                    <textarea name=""  v-model="description" required placeholder="description" class="form-control" cols="30" rows="5"></textarea>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="Enregistrer()">Enregistrer</button>
                <button type="button" id="annuler2" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
            </div>
        </div>
        </div>
         <!-- banque manage -->

        <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"> 
                    <h4 class="text-muted mt-2">Caisse</h4> 
                </div>
                <div class="col-md-6"> 
                    <a href="" class="btn btn-outline-primary" @click="add('revenue')"  data-toggle="modal" data-target="#caisse_modal">
                        Ajouter revenue <i class="fas fa-plus"></i>
                    </a>
                    <a href="" class="btn btn-outline-success" @click="add('depense')"  data-toggle="modal" data-target="#caisse_modal">
                        Ajouter dépense <i class="fas fa-plus"></i>
                    </a> 
                </div>
            </div>
        </div>
        <div class="card-body">
            <select name="" @change="filterByYear()" v-model="year" class="form-control mb-4" style="width:200px">
                <option disabled selected>Année</option>
                <option :value="year.year" v-for="year in years" :key="year.year">{{year.year}}</option>
            </select>
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Mois</td>
                    <td>Revenue</td>
                    <td>Dépense</td>
                    <td>Marge bénéf.</td>
                    <td>Détails</td>
                </tr>
                <tr v-for="caisse in caisses" :key="caisse.id">
                    <td>{{ caisse.month | getMonthName}}</td>
                    <td>{{caisse.taux_revenue}} ,00DH</td>
                    <td>{{caisse.taux_depense}} ,00DH</td>
                    <td>
                        <i class="fas fa-chart-line text-success"></i> 
                        {{caisse.taux_revenue - caisse.taux_depense}},00DH
                    </td>
                    <td>
                        <a href="" @click="getDetails(caisse.month)" class="text-primary" data-toggle="modal" data-target="#modal_detail"><i class="fas fa-info-circle fa-lg"></i></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</template>
<script>
import moment from 'moment';
export default {
    data() {
        return  {
            caisses:{},
            details:[],
            caisse_id:'',
            years:[],
            year:2021,
            date_fact:'',
            taux:null,
            source:'',
            description:'',
            edit:false,
            type:'revenue',
            head:'Neuveau dépense',
        }
    },
    created(){
        this.getData();
        this.getYears()},
    methods:{
        isMonth(value) {
            return moment(value).format("MMMM")
        },
        getData(){
            axios
            .get('/admin/caisse/getJson/'+this.year)
            .then(response => (this.caisses = response.data))
        },
        getDetails(caisse_month){
            axios
            .post('/admin/caisse/getCaisses',{
                month:caisse_month,
                year:this.year

            })
            .then(response => (this.details = response.data))
        },
        getYears(){
            axios
            .get('/admin/caisse/years')
            .then(response => (this.years = response.data))
        },
        filterByYear(){
            axios
            .get('/admin/caisse/getJson/'+this.year)
            .then(response => (this.caisses = response.data))
        },
        Enregistrer(){
            // insert new record
            if(this.edit == false){
            axios
            .post('/admin/caisse/addCaisse',{
                date_fact   : this.date_fact,
                type     : this.type,
                taux         : this.taux,
                source      : this.source,
                description : this.description

            })
            .then(this.getData(),
                this.getYears());
            document.getElementById("annuler2").click();
            }
            // update new record
            else{
            axios
            .post('/admin/caisse/updateCaisse',{
                caisse_id   : this.caisse_id,
                date_fact   : this.date_fact,
                taux        : this.taux,
                source      : this.source,
                description : this.description

            })
            .then(this.getData());
            document.getElementById("annuler").click();
            document.getElementById("annuler2").click();
            }
        },
        getcaisse(detail) {
            this.head='Modifier '+detail.type,
            this.edit = true,
            this.date_fact=detail.date_fact,
            this.taux=detail.taux,
            this.source=detail.source,
            this.description=detail.description,
            this.caisse_id = detail.id
       },
       add(type){
            this.edit = false,
            this.type = type,
            this.head='Neuveau '+type;
            this.date_fact='',
            this.taux=''
            this.source='',
            this.description=''
       },
       deleteCaisse(id){
                document.getElementById('annuler').click();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            axios
                            .get('/admin/caisse/destroy/'+id)
                    .then(this.getData())
                    .then(data=>{
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500})
                                this.getData();
                            })
                        }
                    })
            },










    }
}
</script>