<template>
<div class="card mb-4">
    <div class="card-header">
        <filter-component @table-filtrer="refresh"></filter-component>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
                <table class="table table-bordered bg-default text-dark">sdhkjsh
                    <tr>
                        <td>cin</td>
                        <td>nom</td>
                        <td>prenom</td>
                        <td>Heure RDV</td>
                        <td>Status RDV</td>
                        <td></td>
                    </tr>
                    <tr v-for="jointure in data" :key="jointure.id">
                        <td>{{jointure.cin}}</td>
                        <td>{{jointure.nom}}</td>
                        <td>{{jointure.prenom}}</td>
                        <td>{{jointure.heure_rdv}}</td>
                        <td>
                            <span class="text-info">{{jointure.status}}</span> | <a class="text-info" @click="modStatus(jointure)"><i class="fas fa-toggle-on"></i> Mod</a>
                        </td>
                        <td @click="fillCards(jointure)">
                            <a><i class="fas fa-hand-pointer"></i> Select</a>
                        </td>
                    </tr>
                </table> 
            </div>
            <div class="col-sm-4">
                <div class="card text-dark bg-default mb-2">
                    <div class="card-header bg-light"><i class="fas fa-id-badge"></i> Contact</div>
                    <div class="card-body">
                        <p v-html="adresse"></p>
                        <p v-html="tele"></p>
                    </div>
                </div>
                <div class="card text-dark bg-default mb-2">
                    <div class="card-header bg-light">
                        <i class="fas fa-teeth-open"></i>
                        <span v-text="motif"></span>
                    </div>
                    <div class="card-body" v-text="detail"></div>
                </div>
                <div class="card text-dark bg-default mb-2">
                    <div class="card-header bg-light">Paiement</div>
                    <div class="card-body">Statistiques</div>
                </div>
            </div>
        </div>   
    </div>
</div>
</template>

<script>
    
     export default {
         data () {
            return {
            data: {},
            motif:'Consultaion',
            detail:'selectionner un patient',
            adresse: 'selectionner un patient',
            tele:'',
            status:''

            }
        },
        
        created () {
            this.getData();
        },
        methods:{
            getData(){
                axios
                .get('/home/JsonData')
                .then(response => (this.data = response.data))
            },
            refresh (response){
                this.data = response.data
            },
            fillCards(jointure){
                this.adresse = '<i class="fas fa-map-marker-alt"></i>'+' '+jointure.adresse,
                this.tele = '<i class="fas fa-phone-square-alt"></i> '+' '+jointure.tele,
                this.motif = jointure.motif,
                this.detail = jointure.detail
            },
            modStatus(jointure){
                
                if(jointure.status=='Différé'){
                this.status='Encore'
                }
                else{
                    if(jointure.status=='Encore'){
                        this.status='Annuler'
                    }
                    else{
                        this.status='Différé'
                    }
                }
                axios
                .post('/home/status',{
                    status:this.status,
                    etat_id:jointure.etat_rdvs_id
                })
                .then(response => (this.data = response.data))
                .then(data=>{
                    this.getData();
                })
            }
        }
    }
</script>