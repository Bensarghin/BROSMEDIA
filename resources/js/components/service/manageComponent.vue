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
            <div class="modal-body" id="hna_khadamin">
                
                <form @submit="enregistrer()" enctype="multipart/form-data" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="logo" @change="selectFile">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>

                    <label class="pure-material-textfield-outlined">
                        <input type="text" v-model="nomservice" placeholder=" " name="nom_service" required value="">
                        <span>Nom service :</span>
                    </label>
                    <label class="pure-material-textfield-outlined">
                        <textarea placeholder=" " v-model="description" name="description" rows="5" required>
                        </textarea>
                        <span>Description :</span>
                    </label>

                    <button type="button" class="btn btn-primary" >Enregistrer</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="Annuler" data-bs-dismiss="modal">Annuler</button>
            </div>
            </div>
        </div>
    </div>

    <div class="card-header">
        <div class="card-title" style="font-family:Titillium Web;font-size:20px">
            Liste des services
        </div> 
        <a type="button" @click="addService()" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            AJOUTER UN SERVICE <i class="fas fa-folder-plus"></i> 
        </a>
    </div>
    <div class="row">
        <div class="col-sm-4" v-for="service in services" :key="service.id" @table-filtrer="refresh">
            <div class="card">
                <img class="card-img-top" :src="'/cabenit/arton23179_1638112683.jpg'" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">{{service.nom_service}}</h4>
                    <p class="card-text">{{service.description}} {{service.description}} {{service.description}} {{service.description}}</p>
                    <a href="" class="card-link" @click="getservice(service)" 
                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fas fa-edit" style="color: rgb(87 122 168);font-size: 18px;"></i> </a>
                    <a href="#" class="card-link" @click="deleteservice(service.id)"><i class="fas fa-trash" style="color: #522525;    font-size: 18px;"></i> </a>
                </div>
            </div>
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

                services: {},
                service_id:'',
                image:'',
                nomservice:'',
                description:'',
                msg:'Ajouter un service',
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
                    .get('/admin/service/getJson')
                    .then(response => (this.services = response.data))
            },
            refresh (response){
                this.services = response.data
            },
            selectFile(event) {
            // `files` is always an array because the file input may be in multiple mode
                this.image = event.target.files[0];
            },

            // Query methods

            // delete
            deleteservice(serviceid){
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
                .post('/admin/service/delete',{
                        id:serviceid
                })
                .then(response => (this.services = response.data))
                .then(data=>{
               Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500})
                    this.fetchData();
                })
                .catch(error=>{
                    alert('ce service est relié par un rdv!')
                })}
            })
            },

            //edit method to fetch data to modal before updated
            getservice(service){
                this.prix=service.prix,
                this.description=service.description,
                this.nomservice=service.nom_service,
                this.service_id=service.id,
                this.msg='Modifier un service',
                this.edit=true
            },
            addService(){
                this.prix='',
                this.description='',
                this.nomservice='',
                this.msg='Ajouter un service'
                this.edit=false
            },
            enregistrer(){
                // insert request
                if(!this.edit){
                axios.post('/admin/service/sendJson',
                {
                    nomservice : this.nomservice,
                    image : this.image,
                    description : this.description,
                })
                .then(response =>(this.services = response.data))
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
                // update request
                else{
                axios.post('/admin/service/updateJson',
                {
                    nomservice : this.nomservice,
                    image : this.image,
                    description : this.description,
                    id:this.service_id
                })
                .then(response =>(this.services = response.data))
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