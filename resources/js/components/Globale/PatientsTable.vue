<template>
<div class="card mb-4">
    <div class="card-header">   
        <h4 class="s-attend mb-3 mt-3">
                Salle d'attend <i class="fas fa-couch"></i> :
                <span class="ml-4" v-text="currentDateTime()"> </span>
        </h4>

        <filter-component @table-filtrer="refresh"></filter-component>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
                <table class="table table-bordered bg-default text-dark">
                    <tr>
                        <td>cin</td>
                        <td>nom</td>
                        <td>prenom</td>
                        <td>Heure RDV</td>
                        <td>Passé</td>
                        <td></td>
                    </tr>
                    <tr v-for="jointure in data" :key="jointure.id">
                        <td>{{jointure.cin}}</td>
                        <td>{{jointure.nom}}</td>
                        <td>{{jointure.prenom}}</td>
                        <td>{{jointure.heure_rdv}}</td>
                        <td @click="passPat(jointure)">
                            <a class="btn btn-success btn-sm" v-if="jointure.status=='Passé'"><i class="fas fa-toggle-on"></i></a>
                            <a class="btn btn-danger btn-sm" v-else><i class="fas fa-toggle-off"></i></a>
                        </td>
                        <td @click="fillCards(jointure)" >
                            <a><i class="fas fa-hand-pointer"></i> Select</a>
                        </td>
                    </tr>
                </table> 
            </div>
            <div class="col-sm-4">
                <div class="card text-dark bg-default mb-2">
                    <div class="card-header bg-light"><i class="fas fa-id-badge"></i> Contact</div>
                    <div class="card-body">
                        <p v-html="date_prend_rdv"></p>
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
            date_prend_rdv:'',
            tele:'',
            status:'',
            passe:'Passé',

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
                this.date_prend_rdv= '<i class="fas fa-history"></i> Date prend RDV:'+' '+jointure.date_prend_rdv,
                this.motif = jointure.nom_acte,
                this.detail = jointure.description
            },
            passPat(jointure){
                
                if(jointure.status=='Passé'){
                    this.passe='Encore'
                }
                else{
                    this.passe='Passé'
                }
                axios
                .post('/home/status',{
                    status:this.passe,
                    etat_id:jointure.etat_rdvs_id
                })
                .then(response => (this.data = response.data))
                .then(data=>{
                    this.getData();
                })
            },
             currentDateTime() {
                const current = new Date();
                const date = current.getFullYear()+'-'+(current.getMonth()+1)+'-'+current.getDate();
                const time = current.getHours() + ":" + current.getMinutes() + ":" + current.getSeconds();
                const dateTime = date + ' ' + time;
            
            return dateTime;
    }
        }
    }
</script>