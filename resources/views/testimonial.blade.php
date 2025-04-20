<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


   
    


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{ url('/') }}" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>VoyageFM</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Accueil</a>
            <a href="{{ route('about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">À propos</a>
            <a href="{{ route('service') }}" class="nav-item nav-link {{ Request::is('service') ? 'active' : '' }}">Services</a>
            <a href="{{ route('package') }}" class="nav-item nav-link {{ Request::is('package') ? 'active' : '' }}">Offres</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ route('destination') }}" class="dropdown-item">Destination</a>
                    <a href="{{ route('booking') }}" class="dropdown-item">Réservation</a>
                    <a href="{{ route('team') }}" class="dropdown-item">Guides de voyage</a>
                    <a href="{{ route('testimonial') }}" class="dropdown-item">Témoignage</a>
                    <a href="{{ route('activity') }}" class="dropdown-item">Activité</a>
                    <a href="{{ route('planification') }}" class="dropdown-item">Planification de voyage</a>
                </div>
            </div>
        </div>
        <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill py-2 px-4">Contact</a>
        <a href="{{ route('login') }}"  class="btn btn-primary rounded-pill py-2 px-4">Login</a>

    </div>
</nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header5">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Témoignage</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Témoignage</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    
 <!-- Testimonial Start -->
 <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Avis de nos clients!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item bg-white text-center border p-4">
            <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('assets/img/testimonial-1.jpg') }}" style="width: 80px; height: 80px;">
            <h5 class="mb-0">Julien Martin</h5>
                <p>Paris, France</p>
                <p class="mb-0">Ce que j’ai le plus apprécié avec VoyageFM, c’est leur professionnalisme et leur souci du détail. Chaque étape de mon voyage a été soigneusement planifiée, ce qui m’a permis de profiter pleinement de mon séjour.
                </p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
            <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('assets/img/testimonial-2.jpg') }}" style="width: 80px; height: 80px;">
                <h5 class="mb-0">John Doe</h5>
                <p>New York, USA</p>
                <p class="mt-2 mb-0">Un service irréprochable et une équipe à l’écoute ! Grâce à VoyageFM, j’ai découvert des destinations incroyables tout en bénéficiant d’un accompagnement personnalisé. Je repartirais avec eux sans hésiter.
                </p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
            <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('assets/img/testimonial-3.jpg') }}" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Ahmed Benali</h5>
                <p>Tanger, Maroc</p>
                <p class="mt-2 mb-0">VoyageFM a transformé mes vacances en un rêve. Grâce à leur organisation parfaite, j’ai pu découvrir des paysages magnifiques et vivre des moments inoubliables. Je recommande vivement leurs services.
                </p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
            <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('assets/img/testimonial-4.jpg') }}" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Lara Doe</h5>
                <p>New York, USA</p>
                <p class="mt-2 mb-0">VoyageFM m’a permis de vivre une expérience authentique et enrichissante. Les guides étaient incroyables, et chaque excursion était à la hauteur de mes attentes. Merci pour ces souvenirs uniques !

        </div>
    </div>
</div>

    <!-- Testimonial End -->
      
        
 <!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Infos</h4>
                <a class="btn btn-link" href="{{ url('about') }}">À propos</a>
                <a class="btn btn-link" href="{{ url('contact') }}">Nous contacter</a>
                <a class="btn btn-link" href="{{ url('about') }}">Politique de confidentialité</a>
                <a class="btn btn-link" href="{{ url('about') }}">Conditions générales</a>
                <a class="btn btn-link" href="{{ url('about') }}">FAQ et aide</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> Km 5, Route d'Essaouira, B.P 2400, Marrakech, Maroc.</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>VoyageFM@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3"><a href="{{ url('about') }}#calery" style="color: #fff">Galerie</a></h4>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-1.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-2.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-3.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-2.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-3.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-1.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Paiement</h4>
                <div class="d-flex flex-wrap justify-content-start">
                    <i class="fab fa-cc-amex fa-2x text-light me-3"></i>
                    <i class="fab fa-cc-visa fa-2x text-light me-3"></i>
                    <i class="fab fa-cc-mastercard fa-2x text-light me-3"></i>
                    <i class="fab fa-cc-paypal fa-2x text-light me-3"></i>
                    <i class="fab fa-cc-discover fa-2x text-light me-3"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->




    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bibliothèques locales (s'assurer que les fichiers sont dans le bon dossier public/lib) -->
<script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>