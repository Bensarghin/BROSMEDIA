

<footer class="footer-area pt-100 pb-70">
    <div class="container">
    <div class="row">
    <div class="col-lg-6 col-md-6">
    <div class="single-footer-widget">
    <h2>
    <a href="#">{{isset($cabinet->nom_cabenit)?$cabinet->nom_cabenit:'Cabinet Médical'}}</a>
    </h2>
    <p>{{isset($cabinet->description)?$cabinet->description:'Cabinet Description'}}</p>
    <div class="signature">
    <img src="{{asset('vsheet/assets/images/footer/signature.png')}}" alt="image">
    </div>
    </div>
    </div>
    <div class="col-lg-6 col-sm-6">
    <div class="single-footer-widget">
    <h3>Contact Information</h3>
    <ul class="footer-information">
    <li>
    <i class="flaticon-emergency-call"></i>
    Télé
    <span><a href="tel:{{isset($cabinet->tele)?$cabinet->tele:'0606060606'}}">{{isset($cabinet->tele)?$cabinet->tele:'0606060606'}}</a></span>
    </li>
    <li>
    <i class="flaticon-wall-clock"></i>
    Temps d'ouvrir :
    <span>{{isset($cabinet->heure_ouver)?$cabinet->heure_ouver:'00:00'}} à {{isset($cabinet->heure_ferme)?$cabinet->heure_ferme:'00:00'}}</span>
    </li>
    <li>
    <i class="flaticon-red-cross"></i>
    Location :
    <span>{{isset($cabinet->adresse)?$cabinet->adresse:'adresse'}}</span>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </footer>
    
    
    <div class="copyright-area">
    <div class="container">
    <div class="copyright-area-content">
    <p> Copyright © 2022 :BROSMEDIA </p>
    </div>
    </div>
    </div>
    
    
    <div class="go-top">
    <i class='bx bx-up-arrow-alt'></i>
    </div>
    
    
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('vsheet/assets/js/jquery.min.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/popper.min.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/bootstrap.min.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/jquery.meanmenu.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/owl.carousel.min.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/jquery.appear.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/odometer.min.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/nice-select.min.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/jquery.magnific-popup.min.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/form-validator.min.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/contact-form-script.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/wow.min.js')}}"></script>
    
    <script src="{{asset('vsheet/assets/js/main.js')}}"></script>
    </body>
    
    <!-- Mirrored from templates.hibootstrap.com/grin/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Dec 2021 14:04:23 GMT -->
    </html>