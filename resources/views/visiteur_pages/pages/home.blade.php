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

<!-- Actes section -->
<section class="features-area bg-ffffff pt-100 pb-70"></section>

<section class="services-area pb-70">
    <div class="container" id="services">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-title-warp">
                    <span class="sub-title">
                    <i class="flaticon-hashtag-symbol"></i>
                        Notre meilleur Services
                    </span>
                    <h2>Enjoy Specialized Care Through Precision, Artistry, and Experience</h2>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="section-warp-btn">
                    <a href="services.html" class="default-btn">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($actes as $acte)
            <div class="col-lg-4 col-md-6">
                <div class="single-services-item">
                    <div class="services-image">
                        <a href="services-details.html"><img src="{{asset('vsheet/assets/images/services/services-6.jpg')}}" alt="image"></a>
                        <div class="icon">
                            <a href="services-details.html"><i class="flaticon-tooth-2"></i></a>
                        </div>
                    </div>
                    <div class="services-content">
                        <h3><a href="services-details.html">{{Str::limit($acte->nom_acte,20)}}</a></h3>
                        <p>{{Str::limit($acte->description, 150)}}</p>
                        <a href="services-details.html" class="default-btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$actes->links()}}
    </div>
</section>
@endsection