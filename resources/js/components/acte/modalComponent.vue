<!-- Button trigger modal -->
<style>
.pure-material-textfield-outlined{
  width: 100% !important
}
</style>
<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Ajouter Nouveau Acte</h5>
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
            <button type="button" class="btn btn-primary" @click="addActe">Enregistrer</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        </div>
        </div>
    </div>
    </div>
</div>
</template>
<script>
export default {
    data(){
        return {
            nomActe:'',
            prix:'',
            description:''
        }
    },
    methods:{
        addActe(){
            axios.post('/acte/sendJson',
            {
                nomActe : this.nomActe,
                prix : this.prix,
                description : this.description
            })
            .then(response => this.$emit('table-filtrer',response))
            .catch(error => console.log(error))
        },
        // getActe(){
        //     axios
        //     .get('/acte/getActe')
        //     .then(response => ([
        //                         this.nomActe = response.data.nom_acte,
        //                         this.prix = response.data.prix,
        //                         this.description = response.data.description
        //                         ]))
        // }
    }
}
</script>