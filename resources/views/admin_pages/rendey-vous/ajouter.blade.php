@extends('admin_pages.layouts.master')
@section('content')
<style>
    .pure-material-textfield-outlined {
    width: 100% !important;
}
</style>
        <div class="card">
            <div class="card-header">
                <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #84a9d9;font-size:30px">
                    Ajouter un Rendez-vous
                </div>
                <div class="card-subtitle mt-2 text-muted">   
                    {{$patients->nom}} {{$patients->prenom}}
                </div>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="text-center border-bottom mb-5">
                        <h5>Rendez-vous</h5>
                    </div>
                    
                    {{-- date prend RDV --}}
                    <label class="pure-material-textfield-outlined">
                        <input type="date" placeholder=" " name="date_prend_rdv" required value="" >
                        <span>Date Prend RDV</span>
                    </label>
                    {{-- nom acte--}}
                    <label class="pure-material-textfield-outlined">
                        <span>Nom acte :</span>
                        <select name="acte_id" id="acte_id" class="form-control">
                            <option disabled selected>nom acte ...</option>
                            @foreach ($actes as $acte)
                            <option value="{{$acte->id}}">{{$acte->nom_acte}}</option>
                            @endforeach
                        </select>
                    </label>

                    <div class="text-center border-bottom mb-5">
                        <h5>Etat Rendez-vous</h5>
                    </div>
                    <input type="hidden" name="etat_id" value="">
                    {{-- nom medecin --}}
                    <label class="pure-material-textfield-outlined">
                        <span>Nom medecin :</span>
                        <select name="med_id" id="" class="form-control">
                            <option disabled selected>nom medecins ...</option>
                            @foreach ($medecins as $medecin)
                                <option value="{{$medecin->id}}">{{$medecin->nom}} {{$medecin->prenom}}</option>
                            @endforeach
                        </select>
                    </label>
                    {{-- date consultation --}}
                    <label class="pure-material-textfield-outlined">
                        <input type="date" placeholder=" " name="date_consu" required value="" >
                        <span>date consultation</span>
                    </label>
                    {{-- status --}}
                    <label class="pure-material-textfield-outlined">
                        <span>Status :</span>
                        <div class="form-check">
                            <input class="form-check-input" value="Différé" type="radio" name="status" id="status1" >
                            <label class="form-check-label" for="status1">
                              Différé
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Annuler" name="status" id="status2" >
                            <label class="form-check-label" for="status2">
                              Annuler
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Encore" name="status" id="status3" >
                            <label class="form-check-label" for="status3">
                              Encore
                            </label>
                          </div>
                    </label>
                    {{-- duree--}}
                    <label class="pure-material-textfield-outlined">
                        <input type="time" placeholder=" " name="heure_rdv" required value="">
                        <span>Heure RDV</span>
                    </label>
                <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
@endsection