<!-- Button trigger modal -->
<style>
.pure-material-textfield-outlined{
  width: 100% !important
}
</style>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajouter Nouveau Acte</h5>
        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        <form action="{{route('patient.add')}}" method="POST">
            @csrf
            <center>
              {{-- Nom acte--}}
              <label class="pure-material-textfield-outlined">
                <input type="text" placeholder=" " name="nom_acte" required value="{{isset($data->id)?  $data->adresse : ''}}">
                <span>Nom acte :</span>
              </label>
              <label class="pure-material-textfield-outlined">
                <input type="text" placeholder=" " name="prix" required value="{{isset($data->id)?  $data->adresse : ''}}">
                <span>Prix :</span>
              </label>
              <label class="pure-material-textfield-outlined">
                <textarea placeholder=" " name="description" rows="5" required>
                </textarea>
                <span>Description :</span>
              </label>
          </center>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>