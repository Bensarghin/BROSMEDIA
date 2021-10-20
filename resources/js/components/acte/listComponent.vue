<template>
<div>
    <!-- //@table-filtrer="refresh" -->
    <acte-search-component @table-filtrer="refresh"></acte-search-component>
    <acte-modal-component @table-filtrer="refresh"></acte-modal-component>
    <div class="card text-dark bg-light mb-3" v-for="acte in actes" :key="acte.id" @table-filtrer="refresh">
        <div class="card-header">
            {{acte.nom_acte}}
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">{{acte.prix}},00 DH</h6>
            <p class="card-text">{{acte.description}}</p>
            <a href="" class="card-link" @click="getActe(acte.id)"><i class="fas fa-edit"></i> Modifier</a>
            <a href="#" class="card-link" @click="deleteActe(acte.id)"  @acte-deleleted="refresh"><i class="fas fa-trash"></i> Supprimer</a>
        </div>
    </div>
</div>
</template>
<script>
export default {
        data () {
            return {

                 actes: {}

            }
        },
        
        created () {
            axios
            .get('/acte/getJson')
            .then(response => (this.actes = response.data))
        },

        methods:{
            refresh (response){
                this.actes = response.data
            },
            deleteActe(Acteid){
                if(confirm('vous vouley vraiment supprimer ce enregistrement !?'))
                axios
                .post('/acte/delete',{
                        id:Acteid
                })
                .then(response => this.$emit('acte-deleleted',response))
        }
            
        }
}
</script>