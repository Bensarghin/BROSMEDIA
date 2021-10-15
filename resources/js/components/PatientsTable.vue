<template>
    <table class="table table-striped table-bordered">
        <thead>
            <td>cin</td>
            <td>nom</td>
            <td>prenom</td>
            <td>sexe</td>
        </thead>
          <tr v-for="patient in data" :key="patient.id" >
            <td>{{patient.cin}}</td>
            <td>{{patient.nom}}</td>
            <td>{{patient.prenom}}</td>
            <td>{{patient.sexe}}</td>
        </tr>
    </table>    
    
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>