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
                    <input type="text" v-model="nomMedic" placeholder="" name="nom_Medic" required value="">
                    <span>Nom medicament :</span>
                </label>
                <label class="pure-material-textfield-outlined">
                    <textarea placeholder=" " v-model="utilisation" name="utilisation" rows="5" required></textarea>
                    <span>Notice utilisation :</span>
                </label>
            </center>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" @click="enregistrer()"  class="btn btn-primary" >Enregistrer</button>
            <button type="button" class="btn btn-danger" id="Annuler" data-bs-dismiss="modal">Annuler</button>
        </div>
        </div>
    </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #06a3da;font-size:30px">
                Liste des medicaments
            </div> 
            <a type="button" @click="addMedic()" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                AJOUTER UN MEDICAMENT <i class="fas fa-folder-plus"></i> 
            </a>
        </div>
        <div class="card-body">
            <medicament-search-component @table-filtrer="refresh"></medicament-search-component>
            <table class="table table-bordered">
                <tr>
                    <td>Nom Medicament : </td>
                    <td>Notice Utilisation :</td>
                    <td>Actions</td>
                </tr>
                <tr v-for="medic in medicaments" :key="medic.id" @table-filtrer="refresh">
                    <td>{{medic.nom_medicament.substring(0, 60)}}</td>
                    <td> {{medic.notice_utilisation.substring(0, 60)}}</td>
                    <td>
                        <a href="" class="card-link" @click="getMedic(medic)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-edit" style="color: rgb(87 122 168);font-size: 18px;"></i> 
                        </a>
                        <a href="#" class="card-link" @click="deleteMedic(medic.id)">
                            <i class="fas fa-trash" style="color: #522525;font-size: 18px;"></i> 
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
   
</div>
</template>
<style scoped>
 
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
export default {
        data () {
            return {
                medicaments: {},
                medic_id:'',
                nomMedic:'',
                utilisation:'',
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
                    .get('/admin/medicament/getJson')
                    .then(response => (this.medicaments = response.data))
            },
            refresh (response){
                this.medicaments = response.data
            },

            // Query methods
            deleteMedic(Medid){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        axios
                        .post('/admin/medicament/delete',{
                                id:Medid
                        })
                        .then(response => (this.medicaments = response.data))
                        .then(data=>{
                            Swal.fire({
                                
                                position: 'center',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500});
                                
                                this.fetchData();

                                })
                                .catch(error=>{alert('ce acte est relié par un rdv!')})

                                }
                            })
            },
            //edit method to fetch data to modal before updated
            getMedic(medic){
                this.utilisation=medic.notice_utilisation,
                this.nomMedic=medic.nom_medicament,
                this.medic_id=medic.id,
                this.msg='Modifier un Medicaments',
                this.edit=true
            },
            addMedic(){
                this.utilisation='',
                this.nomMedic='',
                this.msg='Ajouter un Acte'
                this.edit=false
            },
            enregistrer(){
                // insert request
                if(!this.edit){
                axios.post('/admin/medicament/sendJson',
                {
                    nomMedic : this.nomMedic,
                    utilisation : this.utilisation,
                })
                .then(response =>(this.medicaments = response.data))
                .then(data=>{
                     Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500});
                        this.fetchData();
                        document.getElementById("Annuler").click();
                })
                .catch(error => console.log(error))
                }
                // update request
                else{
                axios.post('/admin/medicament/updateJson',
                {
                    nomMedic : this.nomMedic,
                    utilisation : this.utilisation,
                    id:this.medic_id
                })
                .then(response =>(this.medicaments = response.data))
                .then(data=>{
                     Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
})
                    this.fetchData();
                        document.getElementById("Annuler").click();

                })
                .catch(error => console.log(error))
                }
        },
            
        }
}
</script>