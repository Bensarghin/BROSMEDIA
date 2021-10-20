<template>
        <a href="#" class="card-link" @click="deleteActe(acte.id)"  @table-filtrer="refresh"><i class="fas fa-trash"></i> Supprimer</a>
</template>
<script>
export default {
    methods:{
        deleteActe(Acteid){
            if(confirm('vous vouley vraiment supprimer ce enregistrement !?'))
            axios
            .post('/acte/delete',{
                    id:Acteid
            })
            .then(response => this.$emit('acte-deleleted',response))
        },
    }
}
</script>