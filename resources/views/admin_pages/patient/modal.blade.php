<!-- Button trigger modal -->
<style>
  .pure-material-textfield-outlined{
    width: 200px !important;
  }

</style>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form  action="{{route('patient.add')}}" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajouter Nouveau Patient</h5>
        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        <div>
          @csrf
          <center>
          {{-- cin --}}
          <label class="pure-material-textfield-outlined">
            <input type="text" placeholder=" " name="cin" required value="{{ isset($data->id) ? $data->cin : ''}}" >
            <span>cin</span>
          </label>
          {{-- nom --}}
          <label class="pure-material-textfield-outlined">
            <input type="text" placeholder=" " name="nom" required value="{{isset($data->id)? $data->nom: ''}}" >
            <span>nom</span>
          </label>
          {{-- prenom --}}
          <label class="pure-material-textfield-outlined">
            <input type="text" placeholder=" " name="prenom" required value="{{isset($data->id)? $data->prenom: ''}}" >
            <span>prenom</span>
          </label>
            {{-- sexe --}}
            <label class="pure-material-textfield-outlined">
              <div class="form-check">
                  <input class="form-check-input" value="M" type="radio" name="sexe" id="sexe1" >
                  <label class="form-check-label" for="sexe1">
                    Masculin
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" value="F" name="sexe" id="sexe2">
                  <label class="form-check-label" for="sexe2">
                    Feminin
                  </label>
                </div>
          </label>
            {{-- date naissance --}}
            <label class="pure-material-textfield-outlined">
              <input type="date" placeholder=" " name="date_nais" required value="{{isset($data->id)?  $data->date_nais: ''}}" >
              <span>dateNaissance</span>
            </label>
            {{-- telephone --}}
            <label class="pure-material-textfield-outlined">
              <input type="text" placeholder=" " name="tele" required value="{{isset($data->id)?  $data->tele : ''}}">
              <span>télephone</span>
          </label>
            {{-- Adresse--}}
            <label class="pure-material-textfield-outlined">
              <input type="text" placeholder=" " name="adresse" required value="{{isset($data->id)?  $data->adresse : ''}}">
              <span>Adresse</span>
          </label>
        </center>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
      </div>
    </form>
  </div>
</div>