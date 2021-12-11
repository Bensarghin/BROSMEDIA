@extends('admin_pages.layouts.master')
@section('content')
<style>
    .pure-material-textfield-outlined {
    width: 100% !important;
}
</style>
        <div class="card">
            <div class="card-header">
                <div class="card-title" style="font-family:Titillium Web;margin-bottom: -30px;color: #06a3da;font-size:30px">
                    Modification de Rendez-vous
                </div> 
                <div class="card-subtitle mt-2 text-muted">   
                    Patient : {{$data->nom}} {{$data->prenom}}
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('rdv.update',['id'=>$data->rdv_id])}}" method="POST">
                    @csrf
                    <div class="text-center border-bottom mb-5">
                        <h5>Rendez-vous</h5>
                    </div>
                    
                    {{-- date prend RDV --}}
                    <label class="pure-material-textfield-outlined">
                        <input type="date" placeholder=" " name="date_prend_rdv" required value="{{ isset($data->id) ? $data->date_prend_rdv : ''}}" >
                        <span>Date Prend RDV</span>
                    </label>
                    {{-- nom acte--}}
                    <label class="pure-material-textfield-outlined">
                        <span>Nom acte :</span>
                        <select name="acte_id" id="acte_id" class="form-control">
                            @foreach ($actes as $acte)
                                <option value="{{$acte->id}}" {{$data->nom_acte==$acte->nom_acte? 'selected' : ''}}>{{$acte->nom_acte}}</option>
                            @endforeach
                        </select>
                    </label>
                    {{-- nom medecin --}}
                    <label class="pure-material-textfield-outlined">
                        <span>Nom medecin :</span>
                        <select name="med_id" id="" class="form-control">
                            <option disabled>nom medecins ...</option>
                            @foreach ($medecins as $medecin)
                                <option value="{{$medecin->id}}" {{$data->nom.$data->prenom==$medecin->nom.$medecin->prenom? 'selected' : ''}}>{{$medecin->nom}} {{$medecin->prenom}}</option>
                            @endforeach
                        </select>
                    </label>
                    <input type="hidden" name="etat_id" value="{{$data->etat_id}}">

                    {{-- date consultation --}}
                    <label class="pure-material-textfield-outlined">
                        <input type="date" placeholder=" " name="date_consu" required value="{{isset($data->id)?  $data->date_consu : ''}}" >
                        <span>date consultation</span>
                    </label>
                    {{-- status --}}
                    <label class="pure-material-textfield-outlined">
                        <span>Status :</span>
                        <div class="form-check">
                            <input class="form-check-input" value="Différé" type="radio" name="status" id="status1" {{$data->status=='Différé'?'checked':''}}>
                            <label class="form-check-label" for="status1">
                              Différé
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Annuler" name="status" id="status2" {{$data->status=='Annuler'?'checked':''}}>
                            <label class="form-check-label" for="status2">
                              Annuler
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="Encore" name="status" id="status3" {{$data->status=='Encore'?'checked':''}}>
                            <label class="form-check-label" for="status3">
                              Encore
                            </label>
                          </div>
                    </label>
                    {{-- duree--}}
                    <label class="pure-material-textfield-outlined">
                        <input type="time" placeholder=" " name="heure_rdv" required value="{{isset($data->id)?  $data->heure_rdv : ''}}">
                        <span>Heure RDV</span>
                    </label>
                <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
@endsection