<template>
    <div>
        <div class="input-group col-sm-4 mb-3">
            <input type="text" class="form-control" v-model="nomMedic" @keyup="search" placeholder="Nom medicament ..." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <a href="#" class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
            </a>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            nomMedic:'',
        }
    },
    methods:{
      search(){
        axios
        .post('/Medicament/getJson',
        {
          nomMedic:this.nomMedic
        })
        .then(response => this.$emit('table-filtrer',response))
        .catch(error=>(console.log(error)))
      }
    }
}
</script>