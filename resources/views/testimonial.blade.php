<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VoyageFM - Témoignages</title>
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

    <style>
        .testimonial-form-card {
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .testimonial-form-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .form-control-sm {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }
        .floating-label {
            font-size: 0.9rem;
        }
        .testimonial-item {
            transition: transform 0.3s ease;
            border-radius: 10px;
        }
        .testimonial-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .rating-stars {
            font-size: 0.9rem;
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
                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-4">Login</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header5">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Témoignages</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Témoignages</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Testimonial Section -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="section-title bg-white text-center text-primary px-3">Témoignages</h6>
                <h1 class="mb-4">Ce que disent nos clients</h1>
                <p class="mb-0">Découvrez les expériences de nos voyageurs satisfaits</p>
            </div>

            <!-- Formulaire compact -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 col-xl-6">
                    <div class="testimonial-form-card bg-white p-4 mb-4">
                        <h5 class="text-center mb-4 text-primary">
                            <i class="fas fa-edit me-2"></i>Partagez votre expérience
                        </h5>
                        
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Votre nom" required>
                                        <label for="name" class="floating-label">Votre nom</label>
                                        <div class="invalid-feedback">
                                            Veuillez entrer votre nom.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm" id="location" name="location" placeholder="Ville, Pays" required>
                                        <label for="location" class="floating-label">Votre localisation</label>
                                        <div class="invalid-feedback">
                                            Veuillez indiquer votre localisation.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control form-control-sm" id="comment" name="comment" placeholder="Votre témoignage" style="height: 100px" required></textarea>
                                        <label for="comment" class="floating-label">Votre témoignage</label>
                                        <div class="invalid-feedback">
                                            Veuillez écrire votre témoignage.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="image" class="form-label small text-muted">
                                        <i class="fas fa-camera me-2"></i>Photo de profil (optionnelle)
                                    </label>
                                    <input type="file" class="form-control form-control-sm" id="image" name="image" accept="image/*">
                                    <div class="form-text">Format: JPG, PNG (max 2MB)</div>
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                                        <i class="fas fa-paper-plane me-2"></i>Publier votre avis
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Affichage des témoignages -->
            <div class="owl-carousel testimonial-carousel position-relative">
                @php
                    $displayedIds = [];
                @endphp

                @forelse($testimonials ?? [] as $testimonial)
                    @php
                        $testimonialId = $testimonial->id ?? null;
                    @endphp
                    
                    @if(!in_array($testimonialId, $displayedIds))
                        <div class="testimonial-item bg-white text-center border p-4 h-100">
                            @if($testimonial->image ?? false)
                                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('storage/'.$testimonial->image) }}" style="width: 80px; height: 80px;" alt="{{ $testimonial->name }}">
                            @else
                                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('assets/img/testimonial-'.rand(1,4).'.jpg') }}" style="width: 80px; height: 80px;" alt="Témoignage">
                            @endif
                            <h5 class="mb-1">{{ $testimonial->name ?? 'Client Satisfait' }}</h5>
                            <p class="text-muted small mb-2">{{ $testimonial->location ?? 'Marrakech, Maroc' }}</p>
                            <div class="rating-stars mb-2 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="mb-0">"{{ $testimonial->comment ?? 'Service exceptionnel et professionnel.' }}"</p>
                        </div>
                        @php
                            $displayedIds[] = $testimonialId;
                        @endphp
                    @endif
                @empty
                    <!-- Témoignages par défaut -->
                    <div class="testimonial-item bg-white text-center border p-4 h-100">
                        <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('assets/img/testimonial-1.jpg') }}" style="width: 80px; height: 80px;" alt="Julien Martin">
                        <h5 class="mb-1">Julien Martin</h5>
                        <p class="text-muted small mb-2">Paris, France</p>
                        <div class="rating-stars mb-2 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-0">"Un voyage parfaitement organisé avec une équipe très professionnelle."</p>
                    </div>

                    <div class="testimonial-item bg-white text-center border p-4 h-100">
                        <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('assets/img/testimonial-2.jpg') }}" style="width: 80px; height: 80px;" alt="Sophie Lambert">
                        <h5 class="mb-1">Sophie Lambert</h5>
                        <p class="text-muted small mb-2">Lyon, France</p>
                        <div class="rating-stars mb-2 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="mb-0">"Des guides locaux exceptionnels qui ont rendu notre séjour inoubliable."</p>
                    </div>

                    <div class="testimonial-item bg-white text-center border p-4 h-100">
                        <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('assets/img/testimonial-3.jpg') }}" style="width: 80px; height: 80px;" alt="Ahmed Benali">
                        <h5 class="mb-1">Ahmed Benali</h5>
                        <p class="text-muted small mb-2">Tanger, Maroc</p>
                        <div class="rating-stars mb-2 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-0">"Une agence sérieuse qui propose des circuits authentiques et bien pensés."</p>
                    </div>

                    <div class="testimonial-item bg-white text-center border p-4 h-100">
                        <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('assets/img/testimonial-4.jpg') }}" style="width: 80px; height: 80px;" alt="Laura Dupont">
                        <h5 class="mb-1">Laura Dupont</h5>
                        <p class="text-muted small mb-2">Bruxelles, Belgique</p>
                        <div class="rating-stars mb-2 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p class="mb-0">"Excellent rapport qualité-prix pour des vacances sans souci."</p>
                    </div>
                @endforelse
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
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+212 123 456 789</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>contact@voyagefm.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Galerie</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-1.jpg') }}" alt="Destination 1">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-2.jpg') }}" alt="Destination 2">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-3.jpg') }}" alt="Destination 3">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-2.jpg') }}" alt="Destination 4">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-3.jpg') }}" alt="Destination 5">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-1.jpg') }}" alt="Destination 6">
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
                    </div>
                    <h4 class="text-white mt-4 mb-3">Newsletter</h4>
                    <div class="position-relative">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Votre email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">S'inscrire</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">VoyageFM</a>, Tous droits réservés.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="{{ route('home') }}">Accueil</a>
                            <a href="#">Cookies</a>
                            <a href="{{ route('contact') }}">Aide</a>
                            <a href="{{ route('contact') }}">FAQ</a>
                        </div>
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
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        // Empêcher la soumission multiple du formulaire
        $(document).ready(function() {
            $('form.needs-validation').on('submit', function(e) {
                var $form = $(this);
                var $submitBtn = $form.find('button[type="submit"]');
                
                if ($form[0].checkValidity() === true) {
                    $submitBtn.prop('disabled', true);
                    $submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Publication en cours...');
                }
            });

            // Initialiser le carousel Owl avec des options
            $('.testimonial-carousel').owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                },
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
        });

        // Validation Bootstrap
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>