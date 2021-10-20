<template>
<div class="card mb-4">
    <div class="card-header">
        <filter-component @table-filtrer="refresh"></filter-component>
    </div>
    <div class="card-body">
        <table class="table table-striped table-light bg-light">
            <thead>
                <tr>
                    <td>cin</td>
                    <td>nom</td>
                    <td>prenom</td>
                    <td>sexe</td>
                    <td>Heure RDV</td>
                    <td>Status RDV</td>
                    <td></td>
                </tr>
            </thead>
            <tr v-for="patient in data" :key="patient.id">
                <td>{{patient.cin}}</td>
                <td>{{patient.nom}}</td>
                <td>{{patient.prenom}}</td>
                <td>{{patient.sexe}}</td>
                <td>12 : 00</td>
                <td>
                    <span class="text-warning">Différé</span> | <a class="text-info"><i class="fas fa-edit"></i> Modifier</a>
                </td>
                <td>
                    <a href="#" class="text-primary"><i class="fas fa-info"></i> Contact</a> | 
                    <a href="#" class="text-success"><i class="fas fa-info"></i> Traitements</a>
                </td>
            </tr>
        </table>    
    </div>
</div>
</template>

<script>
    
     export default {
         data () {
            return {
            data: {}
            }
        },
        
        created () {
            axios
            .get('/patient/getJson')
            .then(response => (this.data = response.data))
        },
        methods:{
            refresh (response){
                this.data = response.data
            }
        }
    }
</script>