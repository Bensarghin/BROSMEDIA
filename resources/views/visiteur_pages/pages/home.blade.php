@extends('visiteur_pages.layouts.master')
@section('content')
    
<div class="modal fade fade-scale searchmodal" id="searchmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">
                <i class='bx bx-x'></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="modal-search-form">
                    <input type="search" class="search-field" placeholder="Search...">
                    <button type="submit"><i class='bx bx-search-alt'></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
    
    
<div class="main-banner-item">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="main-banner-content">
                    <span class="sub-title wow fadeInDown" data-wow-delay="1s">
                    <i class="flaticon-hashtag-symbol"></i>
                    Keeping Teeth Clean
                    </span>
                    <h1 class="wow fadeInDown" data-wow-delay="1s">The World Best <span>Dental Specialist</span> Treatment</h1>
                    <p class="wow fadeInLeft" data-wow-delay="1s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="banner-btn wow fadeInUp" data-wow-delay="1s">
                        <a href="appointment.html" class="default-btn">Book Appointment</a>
                        <a href="dentist.html" class="optional-btn">Consult A Dentist</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main-banner-image">
                <img src="{{asset('vsheet/assets/images/main-banner-1.jpg')}}" alt="image">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection