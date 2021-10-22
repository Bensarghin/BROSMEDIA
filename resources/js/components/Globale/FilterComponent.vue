<template>
    
<div id="filter">
    <div class="row">
        <div class="input-group col-sm-4">
            <select class="custom-select"  v-model="periode" id="inputGroupSelect04" aria-label="Example select with button addon">
              <option value="" disabled> Délai ...</option>
              <option :value="currentDateTime()" :selected="true">Aujourd'huit ...</option>
              <option value="12/08/2020">Ce semaine</option>
              <option value="12/08/2002">Ce mois</option>
              <option value="%">Tous</option>
            </select>
          </div>
        <div class="input-group col-sm-4">
            <select class="custom-select" v-model="status" id="inputGroupSelect04">
              <option value="" selected disabled>Status ...</option>
              <option value="Différé">Différé</option>
              <option value="Annuler">Annuler</option>
              <option value="Encore">Encore</option>
              <option value="%">Tous</option>
            </select>
            <div class="input-group-append">
              <button class="btn btn-secondary" type="submit" @click="filtrer">Filter</button>
            </div>
          </div>
          <div class="input-group col-sm-4">
            <input type="text" class="form-control" v-model="nomPrenom" @keyup="search" placeholder="Nom et prenom ..." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div href="#" class="input-group-append"  >
              <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
            </div>
          </div>
    </div>
</div>
</template>

<script>
export default {
  data(){
    return {
      status:'',
      periode:'',
      nomPrenom:''

    }
  },
  methods: {
      filtrer(){
        axios
        .post('/home/getJson',
        {
          status:this.status,
          periode:this.periode,
          // nomPrenom:this.nomPrenom
        })
        .then(response => this.$emit('table-filtrer',response))
        .catch(error=>(console.log(error)))
      },
      search(){
        axios
        .post('/home/getJson',
        {
          nomPrenom:this.nomPrenom
        })
        .then(response => this.$emit('table-filtrer',response))
        .catch(error=>(console.log(error)))
      },
      currentDateTime() {
        const current = new Date();
        const date = current.getFullYear()+'-'+(current.getMonth()+1)+'-'+current.getDate();
        const time = current.getHours() + ":" + current.getMinutes() + ":" + current.getSeconds();
        const dateTime = date ;
      
      return dateTime;
    }

    }
}
</script>