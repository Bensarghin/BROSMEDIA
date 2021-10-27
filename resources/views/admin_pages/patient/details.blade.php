@extends('admin_pages.layouts.master')
@section('content')

<div class="card">
  <div class="card-header">
    <div  style="font-family:Titillium Web;margin-bottom: -30px;color: #84a9d9;font-size:30px">
      <div class="card-title">
        {{$patients->nom}} {{$patients->prenom}}
      </div>
      <div class="card-subtitle">
        <h5>CIN : {{$patients->cin}} </h5>
      </div>
    </div>
  </div>
  <div class="card-body">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Contact</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Rendez-vous</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Traitements</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="facturation-tab" data-bs-toggle="tab" data-bs-target="#facturation" type="button" role="tab" aria-controls="contact" aria-selected="false">Facturation</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <!-- contact section -->
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h4 class="mt-4 ml-4">Date de naissance : <span class="text-info"> {{$patients->date_nais}} </span></h4>
        <ul class="list-group">
          <li class="list-group-item"><span class="text-primary">Telephone </span><i class="fas fa-phone-square-alt"></i> : {{$patients->tele}}</li>
          <li class="list-group-item"><span class="text-primary">Adresse </span><i class="fas fa-map-marker-alt"></i> : {{$patients->adresse}}</li>
          <li class="list-group-item"><span class="text-primary">Gender  </span><i class="fas fa-venus-mars"></i> : {{$patients->sexe}}</li>
        </ul>
      </div>
      <!-- rendez-vous section -->
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <h4 class="mt-4 ml-4">Salle d'attend : <span class="text-success"> {{$patients->status}} </span></h4>
          <ul class="list-group">
            <li class="list-group-item"><span class="text-primary">Medecin affecté</span> <i class="fas fa-user-md"></i> : {{$patients->med_id}}</li>
            <li class="list-group-item"><span class="text-primary">Date Prend RDV </span> <i class="fas fa-calendar"></i> : {{$patients->date_prend_rdv}}</li>
            <li class="list-group-item"><span class="text-primary">Date Consultation </span> <i class="fas fa-calendar-check"></i> : {{$patients->date_consu}}</li>
            <li class="list-group-item"><span class="text-primary">Heure Consulation </span> <i class="fas fa-user-md"></i> : {{$patients->heure_rdv}}</li>
            <li class="list-group-item"><span class="text-primary">Nom acte </span> <i class="fas fa-tooth"></i> : {{$patients->act_id}}</li>
          </ul>
      </div>
      <!-- consultation section -->
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        @if (!isset($data->motif))
        <h6 class="mt-4 text-info">
          Pas de consultation
       </h6>
        @else
        <h6 class="mt-4 text-info">
           {{$data->motif}}
        </h6>
        <ul class="list-group">
          <li class="list-group-item"><span class="text-primary">Resultat de traitement</span><i class="fas fa-calendar"></i> : {{$data->status}}</li>
          <li class="list-group-item"><span class="text-primary">Nom traitement</span><i class="fas fa-calendar"></i> : {{--{$data->nomTrait--}}</li>
          <li class="list-group-item"><span class="text-primary">Date Consultation </span><i class="fas fa-calendar"></i> : {{$data->date_consu}}</li>
          <li class="list-group-item"><span class="text-primary">Heure Consulation </span><i class="fas fa-user-md"></i> : {{$data->heure_rdv}}</li>
          <li class="list-group-item"><span class="text-primary">Nom acte </span><i class="fas fa-tooth"></i> : {{$data->act_id}}</li>
        </ul>
        @endif
      </div>
      <!-- facturation section -->
      <div class="tab-pane fade" id="facturation" role="tabpanel" aria-labelledby="facturation-tab">
        <h6 class="mt-4 text-info">Facturation</h6>
      </div>
    </div>
  </div>
</div>

@endsection