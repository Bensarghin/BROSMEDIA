<template>
    
<div id="filter" class="mb-3">
    <div class="row">
        <div class="input-group col-sm-4">
            <select class="custom-select"  v-model="periode" id="inputGroupSelect04" aria-label="Example select with button addon">
              <option value="12/08/2022" selected>Ajourd'huit ...</option>
              <option value="12/08/2020">Ce semaine</option>
              <option value="12/08/2002">Ce mois</option>
              <option value="1">Tous</option>
            </select>
          </div>
        <div class="input-group col-sm-4">
            <select class="custom-select" v-model="sexe" id="inputGroupSelect04" aria-label="Example select with button addon">
              <option selected>Sexe ...</option>
              <option value="M">Masculins</option>
              <option value="F">Feminins</option>
              <option value="1">Tous</option>
            </select>
            <div class="input-group-append">
              <button class="btn btn-secondary" type="submit" @click="filtrer">Filter</button>
            </div>
          </div>
          <div class="input-group col-sm-4">
            <input type="text" class="form-control" placeholder="Nom et prenom ..." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <a href="#" class="input-group-append">
              <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
            </a>
          </div>
    </div>
</div>
</template>

<script>
export default {
  data(){
    return {
      sexe:'',
      periode:''

    }
  },
  methods: {
      filtrer(){
        axios
        .post('/getdata',
        {
          sexe:this.sexe,
          periode:this.periode
        })
        .then(response => this.$emit('table-filtrer',response))
        .catch(error=>(console.log(error)))
      }
    }
}
</script>