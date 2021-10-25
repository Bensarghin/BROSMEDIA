<template>
<div>
        <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel" v-text="msg">{{msg}}</h5>
            <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <form>
                <center>
                <label class="pure-material-textfield-outlined">
                    <input type="text" v-model="nomActe" placeholder=" " name="nom_acte" required value="">
                    <span>Nom acte :</span>
                </label>
                <label class="pure-material-textfield-outlined">
                    <input type="number" v-model="prix" placeholder=" " name="prix" required value="">
                    <span>Prix :</span>
                </label>
                <label class="pure-material-textfield-outlined">
                    <textarea placeholder=" " v-model="description" name="description" rows="5" required>
                    </textarea>
                    <span>Description :</span>
                </label>
            </center>
            <button type="button" @click="enregistrer()" class="btn btn-primary" >Enregistrer</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        </div>
        </div>
    </div>
    </div>

    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #84a9d9;font-size:30px">
            Liste des actes
        </div> 
        <a type="button" @click="addActe()" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            AJOUTER UN ACTE <i class="fas fa-folder-plus"></i> 
        </a>
    </div>
    <acte-search-component @table-filtrer="refresh"></acte-search-component>
    <div class="card text-dark bg-light mb-3" v-for="acte in actes" :key="acte.id" @table-filtrer="refresh">
        <div class="card-header">
            {{acte.nom_acte}}
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">{{acte.prix}},00 DH</h6>
            <p class="card-text">{{acte.description}}</p>
            <a href="" class="card-link" @click="getActe(acte)" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-edit"></i> Modifier</a>
            <a href="#" class="card-link" @click="deleteActe(acte.id)"><i class="fas fa-trash"></i> Supprimer</a>
        </div>
    </div>
</div>
</template>
<style scoped>
 
</style>
<script>
export default {
        data () {
            return {
                actes: {},
                acte_id:'',
                prix:'',
                nomActe:'',
                description:'',
                msg:'Ajouter un acte',
                edit:false

            }
        },
        
        created () {
            this.fetchData();
        },

        methods:{
            //call this method when page is loaded
            fetchData(){
                axios
                    .get('/acte/getJson')
                    .then(response => (this.actes = response.data))
            },
            refresh (response){
                this.actes = response.data
            },

            // Query methods
            deleteActe(Acteid){
                if(confirm('vous vouley vraiment supprimer ce enregistrement !?'))
                axios
                .post('/acte/delete',{
                        id:Acteid
                })
                .then(response => (this.actes = response.data))
                .then(data=>{
                    alert("votre enregistrement est bien supprimer");
                    this.fetchData();
                })
                .catch(error=>{
                    alert('ce acte est relié par un rdv!')
                })
            },
            //edit method to fetch data to modal before updated
            getActe(acte){
                this.prix=acte.prix,
                this.description=acte.description,
                this.nomActe=acte.nom_acte,
                this.acte_id=acte.id,
                this.msg='Modifier un acte',
                this.edit=true
            },
            addActe(){
                this.prix='',
                this.description='',
                this.nomActe='',
                this.msg='Ajouter un acte'
                this.edit=false
            },
            enregistrer(){
                // insert request
                if(this.edit===false){
                axios.post('/acte/sendJson',
                {
                    nomActe : this.nomActe,
                    prix : this.prix,
                    description : this.description,
                })
                .then(response =>(this.actes = response.data))
                .then(data=>{
                    this.fetchData();
                })
                .catch(error => console.log(error))
                }
                // update request
                else{
                axios.post('/acte/updateJson',
                {
                    nomActe : this.nomActe,
                    prix : this.prix,
                    description : this.description,
                    id:this.acte_id
                })
                .then(response =>(this.actes = response.data))
                .then(data=>{
                    this.fetchData();
                })
                .catch(error => console.log(error))
                }
        },
            
        }
}
</script>