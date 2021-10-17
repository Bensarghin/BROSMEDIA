<template>
    <div>
    <filter-component @table-filtrer="refresh"></filter-component>
        <table class="table table-light bg-light">
            <thead class="table-light">
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
                <td>Différé | <a>Modifier</a></td>
                <td>
                    <a href="#">Contact</a>
                    <a href="#">Contact</a>
                </td>
            </tr>
        </table>    
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
            .get('/getdata')
            .then(response => (this.data = response.data))
        },
        methods:{
            refresh (response){
                this.data = response.data
            }
        }
    }
</script>