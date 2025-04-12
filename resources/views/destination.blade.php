<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        .package-item img {
    transition: .5s;
    height: 200px;
    width: 100%;
}
    </style>
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
    </div>
</nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header4">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Destination</h1>
                        <h5 class="mb-2" style="color: aliceblue;">Découvrez des lieux incontournables à travers le monde, offrant des expériences uniques et des paysages fascinants pour votre prochain voyage.</h5>
                        <br>
                        <nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Destination</li>
    </ol>
</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
                <h1 class="mb-5">Destination populaire</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('assets/img/destination-1.jpeg') }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">30% OFF</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Thailand</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('assets/img/destination-2.jpg') }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">25% OFF</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Malaysia</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('assets/img/destination-3.jpg') }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">35% OFF</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Australia</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('assets/img/destination-4.jpg') }}" alt="" style="object-fit: cover;">
                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">20% OFF</div>
                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Indonesia</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    

<!--destinations--->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3"> Galerie</h6>
            <h1 class="mb-5">Destinations</h1>
        </div>
        <div class="row g-4 justify-content-center" id="paris">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('assets/img/Paris.jpg') }}" alt="">
                    </div>

                    <div class="text-center p-4">
                        <h3 class="mb-0">Paris,France</h3>

                        <p>Paris, capitale de la France, est connue pour la Tour Eiffel, le Louvre, et son charme romantique.</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ route('service') }}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Voir plus</a>
                            <a href="{{ route('booking') }}" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Réservez</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('assets/img/Marrakech.jpg') }}" alt="">
                    </div>

                    <div class="text-center p-4">
                        <h3 class="mb-0">Marrakech,Maroc</h3>

                        <p>Marrakech, au Maroc, est célèbre pour sa médina, la place Jemaa el-Fna, et ses souks colorés.</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ route('service') }}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Voir plus</a>
                            <a href="{{ route('booking') }}" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Réservez</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('assets/img/japan.jpg') }}" alt="">
                    </div>

                    <div class="text-center p-4">
                        <h3 class="mb-0">Tokyo,Japan</h3>

                        <p>Tokyo, capitale du Japon, allie tradition, modernité, cuisine renommée et transport efficace.</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ route('service') }}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Voir plus</a>
                            <a href="{{ route('booking') }}" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Réservez</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('assets/img/london.jpg') }}" alt="">
                    </div>

                    <div class="text-center p-4">
                        <h3 class="mb-0">Londres, Royaume-Uni </h3>

                        <p>Londres, capitale du Royaume-Uni, est une ville historique avec des monuments emblématiques comme le Big Ben.</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ route('service') }}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Voir plus</a>
                            <a href="{{ route('booking') }}" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Réservez</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('assets/img/Istanbul.jpeg') }}" alt="">
                    </div>

                    <div class="text-center p-4">
                        <h3 class="mb-0">Istanbul,Turquie</h3>

                        <p>Istanbul, en Turquie, est une ville historique célèbre pour la Mosquée Bleue et la Sainte-Sophie.</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ route('service') }}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Voir plus</a>
                            <a href="{{ route('booking') }}" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Réservez</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('assets/img/usa.jpg') }}" alt="">
                    </div>

                    <div class="text-center p-4">
                        <h3 class="mb-0">New York,États-Unis</h3>

                        <p>
                            New York, aux États-Unis, est une ville iconique connue pour la Statue de la Liberté, Times Square.</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ route('service') }}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Voir plus</a>
                            <a href="{{ route('booking') }}" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Réservez</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Destination Start -->
        
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


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- Librairie JavaScript jQuery --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Bundle JavaScript de Bootstrap 5 (inclut Popper.js) --}}
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    {{-- Librairie JavaScript pour les animations au scroll (WOW.js) --}}
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    {{-- Librairie JavaScript pour les effets d'animation (Easing) --}}
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    {{-- Librairie JavaScript pour détecter le scroll des éléments (Waypoints) --}}
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    {{-- Librairie JavaScript pour le carrousel (Owl Carousel) --}}
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    {{-- Librairie JavaScript pour la manipulation de dates (Moment.js) --}}
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    {{-- Librairie JavaScript pour la gestion des fuseaux horaires (Moment Timezone) --}}
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    {{-- Librairie JavaScript pour le sélecteur de date et d'heure (Tempus Dominus pour Bootstrap 4) --}}

    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- Fichier JavaScript principal du template --}}
</body>

</html>