<template>
    <div>
        <div class="input-group col-sm-4 mb-3">
            <input type="text" class="form-control" v-model="nomActe" @keyup="search" placeholder="Nom d'acte ..." aria-label="Recipient's username" aria-describedby="basic-addon2">
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
            nomActe:'',
        }
    },
    methods:{
      search(){
        axios
        .post('/acte/getJson',
        {
          nomActe:this.nomActe
        })
        .then(response => this.$emit('table-filtrer',response))
        .catch(error=>(console.log(error)))
      }
    }
}
</script>