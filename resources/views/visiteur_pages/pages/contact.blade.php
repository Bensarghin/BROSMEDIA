@extends('visiteur_pages.layouts.master')
@section('content')
<!-- begin here-->
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
    
    
    <div class="page-banner-area">
    <div class="container">
    <div class="page-banner-content">
    <h2>Contact Us</h2>
    <ul class="pages-list">
    <li><a href="index.html">Home</a></li>
    <li>Contact Us</li>
    </ul>
    </div>
    </div>
    </div>
    
    
    <section class="contact-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">
            <i class="flaticon-hashtag-symbol"></i>
            Message Us
            </span>
            <h2>Drop Us Message for Any Query</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
        </div>
        <div class="contact-form">
            <form id="contactForm">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                        <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                        <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                        <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                        <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                        <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error="Write your message" placeholder="Your Message"></textarea>
                        <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <button type="submit" class="default-btn">Send Message</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="contact-info">
            <div class="contact-info-content">
            <h3>Contact Us by Phone Number or Email Address</h3>
            <h2>
            <a href="tel:+0881306298615">+088 130 629 8615</a>
            <span>OR</span>
            <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#93f4e1fafdd3f4fef2faffbdf0fcfe"><span class="__cf_email__" data-cfemail="1770657e7957707a767e7b3974787a">[email&#160;protected]</span></a>
            </h2>
            <ul class="social">
                <li><a href="#" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                <li><a href="#" target="_blank"><i class='bx bxl-youtube'></i></a></li>
                <li><a href="#" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                <li><a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                <li><a href="#" target="_blank"><i class='bx bxl-instagram'></i></a></li>
            </ul>
            </div>
        </div>
    </div>
    </section>
@endsection