@extends('admin_pages.layouts.master')
@section('content')

<div class="card">
  <div class="card-header">
    <div  style="font-family:Titillium Web;margin-bottom: -30px;color: #84a9d9;font-size:30px">
      <div class="card-title">
        {{isset($patients)?$patients->nom:'pas rendez-vous'}} {{isset($patients)?$patients->prenom:''}}
      </div>
      <div class="card-subtitle">
        <h5>CIN : {{isset($patients)?$patients->cin:''}} </h5>
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
        <h4 class="mt-4 ml-4">Date de naissance : <span class="text-info"> {{isset($patients)?$patients->date_nais:$patients->date_nais}} </span></h4>
        <ul class="list-group">
          <li class="list-group-item"><span class="text-primary">Telephone </span><i class="fas fa-phone-square-alt"></i> : {{isset($patients)?$patients->tele:''}}</li>
          <li class="list-group-item"><span class="text-primary">Adresse </span><i class="fas fa-map-marker-alt"></i> : {{isset($patients)?$patients->adresse:''}}</li>
          <li class="list-group-item"><span class="text-primary">Gender  </span><i class="fas fa-venus-mars"></i> : {{isset($patients)?$patients->sexe:''}}</li>
        </ul>
      </div>
      <!-- rendez-vous section -->
      <div class="tab-pane fade" id="rdv" role="tabpanel" aria-labelledby="rdv-tab">
        @if ($rdvs->count() < 1)
        <div class="mt-4"> 
          <span class="mt-4 text-danger">
            Pas de rendez-vous 
          </span> | 
          <a class="text-info" href="{{route('consultation.ajouter',['id'=>$patients->id])}}">Ajouter Rendez-vous</a>
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
            @foreach ($rdvs as $rdv)
            <tr>
              <td>{{$rdv->date_prend_rdv}}</td>
              <td>{{$rdv->act_id}}</td>
              <td>{{$rdv->date_consu}}</td>
              <td>{{$rdv->heure_rdv}}</td>
              <td>{{$rdv->med_id}}</td>
              <td>{{$rdv->status}}</td>
              <td><a href="{{route('consultation.ajouter',['id'=>$rdv->etat_id])}}"><i class="fas fa-plus-square"></i></a></td>
              <td><a href="{{route('traitement.ajouter',['id'=>$rdv->etat_id])}}"><i class="fas fa-plus-square"></i></a></td>
            </tr>
            @endforeach
          </table>
        @endif
          
      </div>
      <!-- consulation section -->
      <div class="tab-pane fade" id="Consultation" role="tabpanel" aria-labelledby="Consultation-tab">
        @if ($consu->count() < 1)
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
            @foreach ($consu as $consultation)
            <tr>
              <td>{{$consultation->motif}}</td>
              <td>{{$consultation->duree}}</td>
              <td>{{$consultation->detail}}</td>
              <td><a href="{{route('Consultation.modifier',['id'=>$consultation->consu_id])}}" class="text-primary"><i class="fas fa-edit"></i></a></td>
              <td><a href="" class="text-danger"><i class="fas fa-trash"></i></a></td>
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
              <td>{{$trait->description}}</td>
              <td>{{$trait->status}}</td>
              <td><a href="" class="text-primary"><i class="fas fa-edit"></i></a></td>
              <td><a href="" class="text-danger"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
          </table>
        @endif
      </div>
      <!-- facturation section -->
      <div class="tab-pane fade" id="facturation" role="tabpanel" aria-labelledby="facturation-tab">
        <h6 class="mt-4 text-info">Facturation</h6>
      </div>
    </div>
  </div>
  <div class="card-footer">
    Total rdvs  : 3 | Total consulations : 2 | Total Traitements : 1 | Facturation : 10000,00 DH
  </div>
</div>

@endsection