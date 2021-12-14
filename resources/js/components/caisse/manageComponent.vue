<template>
    <div>
        <!-- detail modal -->
        <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mois détails</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <tr>
                        <td>Date</td>
                        <td>Revenue</td>
                        <td>Déponse</td>
                        <td>TTC</td>
                        <td>Source</td>
                        <td></td>
                    </tr>
                    <tr v-for="detail in details" :key="detail.id">
                        <td>{{detail.date_fact}}</td>
                        <td>{{detail.revenue}} DH</td>
                        <td>{{detail.depence}} DH</td>
                        <td>{{detail.TTC}} DH</td>
                        <td>{{detail.source}}</td>
                        <td>
                            <a @click="edit(detail)" data-toggle="modal" data-target="#caisse_modal" class="text-info"><i class="far fa-edit"></i></a> | 
                            <a href="" class="text-danger"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
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
                <h5 class="modal-title" id="exampleModalLabel">{{head}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <input type="text" v-model="date_fact" onfocus="(this.type='date')" class="form-control" required placeholder="Date Facturation :">
                </div>
                <div class="input-group mb-3">
                    <input type="number" v-model="revenue" class="form-control" required placeholder="Revenue">
                    <div class="input-group-append">
                        <span class="input-group-text">DH</span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <input type="number"  v-model="depence" class="form-control" required placeholder="Dépense">
                    <div class="input-group-append">
                        <span class="input-group-text">DH</span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <input type="number"  v-model="ttc" class="form-control"  required placeholder="TTC :">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
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
                    <a href="" class="btn btn-outline-success" @click="add"  data-toggle="modal" data-target="#caisse_modal">
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
                    <td>{{caisse.month}}</td>
                    <td>{{caisse.revenue}} ,00DH</td>
                    <td>{{caisse.depence}} ,00DH</td>
                    <td>
                        <i class="fas fa-chart-line text-success"></i> 
                        {{caisse.revenue - caisse.depence}},00DH</td>
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
export default {
    data() {
        return  {
            caisses:[],
            details:[],
            years:[],
            year:2021,
            date_fact:'',
            revenue:null,
            depence:null,
            ttc:null,
            source:'',
            description:'',
            head:'Neuveau dépense',
        }
    },
    created(){
        this.getData();
        this.getYears()},
    methods:{
        getData(){
            axios
            .get('/admin/caisse/getJson',{
                year:this.year
            })
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
            .post('/admin/caisse/filtrer',{
                year:this.year
            })
            .then(response => (this.caisses = response.data))
        },
        Enregistrer(){
            // insert new record
            if(this.head=='Neuveau dépense'){
            axios
            .post('/admin/caisse/addCaisses',{
                date_fact   : this.date_fact,
                depence     : this.depence,
                revenue     : this.revenue,
                ttc         : this.ttc,
                source      : this.source,
                description : this.description

            })
            .then(this.getData())
            }
            // update new record
            else{
            axios
            .post('/admin/caisse/updateCaisse',{
                date_fact   : this.date_fact,
                depence     : this.depence,
                revenue     : this.revenue,
                ttc         : this.ttc,
                source      : this.source,
                description : this.description

            })
            .then(this.getData())
            }
        },
        edit(detail) {
            this.head='Modifier dépense',
            this.date_fact=detail.date_fact,
            this.revenue=detail.revenue,
            this.depence=detail.depence,
            this.ttc=detail.TTC,
            this.source=detail.source,
            this.description=detail.description
       },
       add(){
           
            this.head='Neuveau dépense',
            this.date_fact='',
            this.revenue='',
            this.depence='',
            this.ttc=''
            this.source='',
            this.description=''
       }
    }
}
</script>