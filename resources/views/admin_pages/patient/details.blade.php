@extends('admin_pages.layouts.master')
@section('content')

<div class="card">
  <div class="card-header">
    <div  style="font-family:Titillium Web;margin-bottom: -30px;color: #06a3da;font-size:30px">
      <div class="card-title">
        {{$patient->nom}} {{$patient->prenom}}
      </div>
      <div class="card-subtitle">
        <h5>CIN : {{$patient->cin}} </h5>
      </div>
    </div>
  </div>
  <div class="card-body">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <!-- contact link -->
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="home" aria-selected="true">Contact</button>
      </li>
      <!-- rendez-vous link -->
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="rdv-tab" data-bs-toggle="tab" data-bs-target="#rdv" type="button" role="tab" aria-controls="rdv" aria-selected="false">Rendez-vous</button>
      </li>
      <!-- consultation link -->
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="Consultation-tab" data-bs-toggle="tab" data-bs-target="#Consultation" type="button" role="tab" aria-controls="Consultation" aria-selected="false">Consultation</button>
      </li>
      <!-- traitement link -->
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="traitement-tab" data-bs-toggle="tab" data-bs-target="#traitement" type="button" role="tab" aria-controls="traitement" aria-selected="false">Traitements</button>
      </li>
      <!-- facturation link -->
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="facturation-tab" data-bs-toggle="tab" data-bs-target="#facturation" type="button" role="tab" aria-controls="facturation" aria-selected="false">Facturation</button>
      </li>
    </ul>

    <!-- ================================================================================ -->

    <div class="tab-content" id="myTabContent">
      <!-- contact section -->
      <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <h4 class="mt-4 ml-4">Date de naissance : <span class="text-info"> {{$patient->date_nais}} </span></h4>
        <ul class="list-group">
          <li class="list-group-item"><span class="text-primary">Telephone </span><i class="fas fa-phone-square-alt"></i> : {{$patient->tele}}</li>
          <li class="list-group-item"><span class="text-primary">Adresse </span><i class="fas fa-map-marker-alt"></i> : {{$patient->adresse}}</li>
          <li class="list-group-item"><span class="text-primary">Gender  </span><i class="fas fa-venus-mars"></i> : {{$patient->sexe}}</li>
        </ul>
      </div>
      <!-- rendez-vous section -->
      <div class="tab-pane fade" id="rdv" role="tabpanel" aria-labelledby="rdv-tab">
        @if ($patient->rdv->count() < 1)
        <div class="mt-4"> 
          <span class="mt-4 text-danger">
            Pas de rendez-vous 
          </span> | 
          <a class="text-info" href="{{route('rdv.insert',['id'=>$patient->id])}}">ajouter rendez-vous</a>
        </div>
        @else
          <h4 class="mt-4 ml-4"> Liste de rendez-vous</h4>
          <table class="table table-bordered">
            <tr>
              <td>Date prend RDV</td>
              <td>Nom acte</td>
              <td>Consulation</td>
              <td>Heure RDV</td>
              <td>Medecin affecté</td>
              <td>Salle d'attend</td>
              <td>Consultation</td>
              <td>Traitement</td>
            </tr>
            @foreach ($patient->rdv as $rdvs)
            <tr>
              <td>{{$rdvs->date_prend_rdv}}</td>
              <td>{{$rdvs->acte->nom_acte}}</td>
              <td>{{$rdvs->etat_rdv->date_consu}}</td>
              <td>{{$rdvs->etat_rdv->heure_rdv}}</td>
              <td>{{$rdvs->medecin->nom}} {{$rdvs->medecin->prenom}}</td>
              <td>{{$rdvs->etat_rdv->status}}</td>
              <td><a href="{{route('consultation.ajouter',['id' => $rdvs->id ])}}"><i class="fas fa-plus-square"></i></a></td>
              <td><a href="{{route('traitement.ajouter',['id'=> $rdvs->id ])}}"><i class="fas fa-plus-square"></i></a></td>
            </tr>
            @endforeach
          </table>
        @endif
          
      </div>
      <!-- consulation section -->
      <div class="tab-pane fade" id="Consultation" role="tabpanel" aria-labelledby="Consultation-tab">
        @if ( $data->count() < 1  )
        <div class="mt-4"> 
          <span class="mt-4 text-danger">
            Pas de consultation 
          </span> 
        </div>
        @else
        <h4 class="mt-4 ml-4"> Liste des consultation</h4>
          <table class="table table-bordered">
            <tr>
              <td>Motif</td>
              <td>Duree</td>
              <td>Detail Cons</td>
              <td>Modifier</td>
              <td>Supprimer</td>
            </tr>
            @foreach ( $data as $consult )
            <tr>
              <td>{{$consult->motif}}</td>
              <td>{{$consult->duree}}</td>
              <td>{{Str::limit($consult->detail,30)}}</td>
              <td><a href="{{route('Consultation.modifier',['id' => $consult->id])}}" class="text-primary"><i class="fas fa-edit"></i></a></td>
              <td><a href="{{route('Consultation.delete',['id' => $consult->id])}}" class="sweet_delete text-danger"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
          </table>
        @endif
      </div>
      <!-- traitements section -->
      <div class="tab-pane fade" id="traitement" role="tabpanel" aria-labelledby="traitement-tab">
        @if ($traitements->count() < 1)
        <div class="mt-4"> 
          <span class="mt-4 text-danger">
            Pas de traitements 
          </span>
        </div>
        @else
          <h4 class="mt-4 ml-4"> Liste des traitements</h4>
          <table class="table table-bordered">
            <tr>
              <td>Nom traitements</td>
              <td>Type traitements</td>
              <td>Description</td>
              <td>Résulat</td>
              <td>Modifier</td>
              <td>Supprimer</td>
            </tr>
            @foreach ($traitements as $trait)
            <tr>
              <td>{{$trait->nomTrait}}</td>
              <td>{{$trait->typeTrait}}</td>
              <td>{{Str::limit($trait->description, 30)}}</td>
              <td>{{$trait->status}}</td>
              <td><a href="{{route('traitement.modifier',['id' => $trait->id])}}" class="text-primary"><i class="fas fa-edit"></i></a></td>
              <td><a href="{{route('traitement.delete',['id' => $trait->id])}}" class="text-danger"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
          </table>
        @endif
      </div>
      <!-- facturation section -->
      <div class="tab-pane fade" id="facturation" role="tabpanel" aria-labelledby="facturation-tab">
        @if ($patient->facturation->count() < 1)
        <div class="mt-4"> 
          <span class="text-danger">
            Pas de payements
          </span> | 
          <a href="{{route('fact.ajouter',['id'=>$patient->id])}}" class="text-info">ajouter </a>
        </div>
        @else
        <div class="row mt-4 mb-4">
          <div class="col-sm-4"><h4> Cassier </h4></div>
          <div class="col-sm-8">
            <a href="{{route('fact.ajouter',['id'=>$patient->id])}}" class="mybtn">ajouter <i class="fas fa-folder-plus"></i></a>
          </div>
          
        </div>
          <table class="table table-bordered">
            <tr>
              <td>Motif</td>
              <td>Montant</td>
              <td>Avance</td>
              <td>Date payement</td>
              <td>Reste</td>
              <td>Modifier</td>
              <td>Supprimer</td>
            </tr>
            @foreach ($patient->facturation as $fact)
            <tr>
              <td>{{$fact->motif}} </td>
              <td>{{$fact->montant}}</td>
              <td>{{$fact->avance}}</td>
              <td>{{$fact->date_pay}}</td>
              <td>{{$fact->montant - $fact->avance}}</td>
              <td><a href="{{route('fact.modifier',['id' => $fact->id])}}" class="text-primary"><i class="fas fa-edit"></i></a></td>
              <td><a href="{{route('fact.delete',['id' => $fact->id])}}" class="text-danger sweet_delete"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach 
            <tr class="bg-secondary">
              <td><b>Total : </b></td>
              <td><b> {{$patient->facturation->sum('montant')}} : DH </b></td>
              <td><b> {{$patient->facturation->sum('avance')}} : DH </b></td>
              <td></td>
              <td><b>{{$patient->facturation->sum('montant') - $patient->facturation->sum('avance')}} : DH </b></td>
              <td  colspan="2"></td>
            </tr>
          </table>

        @endif
      </div>
    </div>
  </div>
  <div class="card-footer">
    Total rdvs  : {{$patient->rdv->count()}} | Total consulations : {{$patient->facturation->count()}} | Total Traitements : {{$traitements->count()}} | Facturation : {{$patient->facturation->sum('montant')}}, 00 DH
  </div>
</div>
@endsection