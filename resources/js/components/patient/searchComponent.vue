<template>
    <div>
        <div class="input-group col-sm-4">
            <input type="text" class="form-control" @keyup="search" v-model="nomPrenom" placeholder="Nom de patient ..." aria-label="Recipient's username" aria-describedby="basic-addon2">
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
            nomPrenom:''
        }
    },
    methods:{
        search(){
        axios
        .post('/patient/getJson',
        {
          nomPrenom:this.nomPrenom
        })
        .then(response => this.$emit('table-filtrer',response))
        .catch(error=>(console.log(error)))
      },
    }
}
</script>