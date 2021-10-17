<template>
<div>
    <acte-search-component @table-filtrer="refresh"></acte-search-component>
    <div class="card text-dark bg-light mb-3" v-for="acte in actes" :key="acte.id">
        <div class="card-header">
            {{acte.nom_acte}}
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">{{acte.prix}},00 DH</h6>
            <p class="card-text">{{acte.description}}</p>
            <a href="#" class="card-link"><i class="fas fa-edit"></i> Modifier</a>
            <a href="#" class="card-link"><i class="fas fa-trash"></i> Supprimer</a>
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
            }
        }
}
</script>