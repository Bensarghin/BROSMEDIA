<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajouter Nouveau Patient</h5>
        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        <form action="{{route('patient.add')}}" method="POST">
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
              <input type="text" placeholder=" " name="sexe" required value="{{isset($data->id)? $data->sexe: ''}}" >
              <span>sexe</span>
          </label>
            {{-- date naissance --}}
            <label class="pure-material-textfield-outlined">
              <input type="date" placeholder=" " name="date_nais" required value="{{isset($data->id)?  $data->date_nais: ''}}" >
              <span>dateNaissance</span>
          </label>
            {{-- telephone --}}
            <label class="pure-material-textfield-outlined">
              <input type="text" placeholder=" " name="tele" required value="{{isset($data->id)?  $data->tele : ''}}">
              <span>t??lephone</span>
          </label>
            {{-- Adresse--}}
            <label class="pure-material-textfield-outlined">
              <input type="text" placeholder=" " name="adresse" required value="{{isset($data->id)?  $data->adresse : ''}}">
              <span>Adresse</span>
          </label>
        </center>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>