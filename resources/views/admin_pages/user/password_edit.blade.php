
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Changer mot de passe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('user.edit_psw')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Mot de paase actual</label>
                <input type="password" name="old_psw" class="form-control" id="exampleInputEmail1" placeholder=" ********* ">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nouveau mot de paase</label>
                <input type="password" name="new_psw" class="form-control" id="exampleInputPassword1" placeholder=" ********* ">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirmer mot de paase</label>
                <input type="password" name="confirm_psw" class="form-control" id="exampleInputPassword1" placeholder=" ********* ">
              </div>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Sortie</button>
        </div>
      </div>
    </div>
  </div>