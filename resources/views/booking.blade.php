<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Réservation - VoyageFM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Réservation de voyages en ligne" name="keywords">
    <meta content="Réservez vos voyages facilement avec VoyageFM" name="description">

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
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Chargement...</span>
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
                @auth
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded-pill py-2 px-4">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-4">Connexion</a>
                @endauth
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header8">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Réservation en ligne</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('destination') }}">Destination</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Réservation en ligne</li>
                            </ol>
                        </nav>
                        <h5 class="mb-2" style="color: aliceblue;">Réservez facilement vos voyages en ligne : choisissez votre destination, vos dates et vos préférences en quelques clics, avec des offres adaptées à vos besoins.</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Processus</h6>
                <h1 class="mb-5">3 étapes faciles</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-globe fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Choisissez une destination</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Explorez notre large sélection de destinations et trouvez celle qui correspond à vos envies pour votre prochain voyage.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-dollar-sign fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Payer en ligne</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Effectuez vos paiements de manière sécurisée et rapide grâce à nos solutions de paiement en ligne adaptées à vos besoins.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-plane fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Voler aujourd'hui</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Réservez votre vol de dernière minute et partez sans attendre vers votre prochaine aventure, en toute simplicité.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process End -->

    <!-- Booking Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h6 class="text-white text-uppercase">Réservation</h6>
                        <h1 class="text-white mb-4">Réservation en ligne</h1>
                        <p class="mb-4">Organisez votre voyage en toute simplicité grâce à notre service de réservation en ligne.</p>
                        <a class="btn btn-outline-light py-3 px-5 mt-2" href="{{ route('package') }}">Voir plus</a>
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Réserver une visite</h1>
                        @auth
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form id="reservationForm" method="POST" action="{{ route('reservation.store') }}">
                                @csrf
                                <input type="hidden" name="offre_id" value="{{ $offre->id }}">

                                <div class="row g-3">
                                    <!-- Nom (pré-rempli, modifiable) -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-transparent @error('nom') is-invalid @enderror" id="reservationName" name="nom" placeholder="Entrer votre nom" value="{{ old('nom', auth()->user()->client ? auth()->user()->client->first_name . ' ' . auth()->user()->client->last_name : auth()->user()->name) }}" required>
                                            <label for="reservationName">Votre nom</label>
                                            @error('nom')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Email (pré-rempli, non modifiable) -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control bg-transparent @error('email') is-invalid @enderror" id="reservationEmail" name="email" placeholder="Entrer votre email" value="{{ old('email', auth()->user()->email) }}" readonly>
                                            <label for="reservationEmail">Votre Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Destination (pré-rempli, non modifiable) -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-transparent @error('destination') is-invalid @enderror" id="destination" name="destination" placeholder="Destination" value="{{ old('destination', $offre->location ?? 'Non spécifié') }}" readonly>
                                            <label for="destination">Destination</label>
                                            @error('destination')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Hôtel (pré-rempli, non modifiable) -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-transparent @error('preference_hotel') is-invalid @enderror" id="preferenceHotel" name="preference_hotel" placeholder="Hôtel préféré" value="{{ old('preference_hotel', $offre->hotel_name ?? 'Non spécifié') }}" readonly>
                                            <label for="preferenceHotel">Hôtel préféré</label>
                                            @error('preference_hotel')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                     <!-- Nombre de passagers (pré-rempli, non modifiable) -->
                                     <div class="col-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control bg-transparent @error('nombre_passagers') is-invalid @enderror" id="passengerCount" name="nombre_passagers" min="1" max="{{ $offre->people ?? 1 }}" placeholder="Nombre de passagers" value="{{ old('nombre_passagers', $offre->people ?? 1) }}" readonly>
                                            <label for="passengerCount">Nombre de passagers</label>
                                            @error('nombre_passagers')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <!-- Date de départ (modifiable) -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="date" class="form-control bg-transparent @error('date_depart') is-invalid @enderror" id="departureDate" name="date_depart" placeholder="Date de départ" value="{{ old('date_depart') }}" required>
                                            <label for="departureDate">Date de départ</label>
                                            @error('date_depart')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Date de retour (modifiable) -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="date" class="form-control bg-transparent @error('date_retour') is-invalid @enderror" id="returnDate" name="date_retour" placeholder="Date de retour" value="{{ old('date_retour') }}" required>
                                            <label for="returnDate">Date de retour</label>
                                            @error('date_retour')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Demande spéciale (modifiable) -->
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control bg-transparent @error('demande_speciale') is-invalid @enderror" id="specialRequest" name="demande_speciale" placeholder="Demande spéciale" style="height: 100px;">{{ old('demande_speciale') }}</textarea>
                                            <label for="specialRequest">Demande spéciale</label>
                                            @error('demande_speciale')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Bouton de soumission -->
                                    <div class="col-12">
                                        <button class="btn btn-outline-light w-100 py-3" type="submit">Réservez maintenant</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="text-center text-white">
                                <p class="mb-4">Veuillez <a href="{{ route('login') }}" class="text-primary">vous connecter</a> pour effectuer une réservation.</p>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Infos</h4>
                    <a class="btn btn-link" href="{{ route('about') }}">À propos</a>
                    <a class="btn btn-link" href="{{ route('contact') }}">Nous contacter</a>
                    <a class="btn btn-link" href="{{ route('about') }}">Politique de confidentialité</a>
                    <a class="btn btn-link" href="{{ route('about') }}">Conditions générales</a>
                    <a class="btn btn-link" href="{{ route('about') }}">FAQ et aide</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Km 5, Route d'Essaouira, B.P 2400, Marrakech, Maroc</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+212 123 456 789</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>VoyageFM@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3"><a href="{{ route('about') }}#gallery" class="text-white">Galerie</a></h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-1.jpg') }}" alt="Galerie 1">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-2.jpg') }}" alt="Galerie 2">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-3.jpg') }}" alt="Galerie 3">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-2.jpg') }}" alt="Galerie 4">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-3.jpg') }}" alt="Galerie 5">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-1.jpg') }}" alt="Galerie 6">
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
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="{{ url('/') }}">VoyageFM</a>, Tous droits réservés.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Conçu par <a class="border-bottom" href="#">VoyageFM Team</a>
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
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- JavaScript pour confirmation de soumission -->
    <script>
        document.getElementById('reservationForm')?.addEventListener('submit', function(event) {
            // Vérifier s'il n'y a pas d'erreurs de validation avant d'afficher l'alerte
            if (this.checkValidity()) {
                alert('Votre réservation a été envoyée avec succès ! Vous serez redirigé vers la page des offres.');
            }
        });
    </script>
</body>
</html>