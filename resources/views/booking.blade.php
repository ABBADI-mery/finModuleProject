<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Réservation - Travel Agency </title>
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

        <div class="container-fluid bg-primary py-5 mb-5 hero-header8">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Réservation en ligne </h1>
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
    <div class="container-xxl py-5" >
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
                        <p class="mb-0">Effectuez vos paiements de manière sécurisée et rapide grâce à nos solutions de paiement en ligne adaptées à vos besoins</p>
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
                        <p class="mb-0">Réservez votre vol de dernière minute et partez sans attendre vers votre prochaine aventure, en toute simplicité et sans tracas, grâce à nos services .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Start -->


    <!-- Booking Start -->
    <div id="bookingCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Formulaire de Réservation -->
            <div class="carousel-item active">
                <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container">
                        <div class="booking p-5">
                            <div class="row g-5 align-items-center">
                                <div class="col-md-6 text-white">
                                    <h6 class="text-white text-uppercase">Réservation</h6>
                                    <h1 class="text-white mb-4">Réservation en ligne</h1>
                                    <p class="mb-4">Organisez votre voyage en toute simplicité grâce à notre service de réservation en ligne.</p>
                                    <a class="btn btn-outline-light py-3 px-5 mt-2" href="">Voir plus </a>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="text-white mb-4">Réserver une visite</h1>
                                   
                                        <form >
                                            <div class="row g-3">
                                                <!-- Nom -->
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control bg-transparent" id="reservationName" placeholder="Entrer votre nom">
                                                        <label for="reservationName">Votre nom</label>
                                                    </div>
                                                </div>
                                                <!-- Email -->
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="email" class="form-control bg-transparent" id="reservationEmail" placeholder="Entrer votre email">
                                                        <label for="reservationEmail">Votre Email</label>
                                                    </div>
                                                </div>
                                                <!-- Date de départ -->
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control bg-transparent" id="departureDate" placeholder="Date de départ">
                                                        <label for="departureDate">Date de départ</label>
                                                    </div>
                                                </div>
                                                <!-- Date de retour -->
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control bg-transparent" id="returnDate" placeholder="Date de retour">
                                                        <label for="returnDate">Date de retour</label>
                                                    </div>
                                                </div>
                                                <!-- Nombre de passagers -->
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control bg-transparent" id="passengerCount" min="1" max="10" placeholder="Nombre de passagers">
                                                        <label for="passengerCount">Nombre de passagers</label>
                                                    </div>
                                                </div>
                                                <!-- Destination -->
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select bg-transparent" id="destination">
                                                            <option value="1">Destination 1</option>
                                                            <option value="2">Destination 2</option>
                                                            <option value="3">Destination 3</option>
                                                        </select>
                                                        <label for="destination">Destination</label>
                                                    </div>
                                                </div>
                                                <!-- Préférences de vol -->
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select bg-transparent" id="flightPreference">
                                                            <option value="economy">Économie</option>
                                                            <option value="business">Affaires</option>
                                                            <option value="firstClass">Première classe</option>
                                                        </select>
                                                        <label for="flightPreference">Préférences de vol</label>
                                                    </div>
                                                </div>
                                                <!-- Préférences d'hôtel -->
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select bg-transparent" id="hotelPreference">
                                                            <option value="3stars">3 étoiles</option>
                                                            <option value="4stars">4 étoiles</option>
                                                            <option value="5stars">5 étoiles</option>
                                                        </select>
                                                        <label for="hotelPreference">Préférences d'hôtel</label>
                                                    </div>
                                                </div>
                                                <!-- Demande spéciale -->
                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <textarea class="form-control bg-transparent" id="specialRequest" placeholder="Demande spéciale" style="height: 100px;"></textarea>
                                                        <label for="specialRequest">Demande spéciale</label>
                                                    </div>
                                                </div>
                                                <!-- Bouton de soumission -->
                                                <div class="col-12">
                                                    <button class="btn btn-outline-light w-100 py-3" type="submit">Réservez maintenant</button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
           <!-- Formulaire de Paiement -->
<div class="carousel-item">
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h6 class="text-white text-uppercase">Paiement</h6>
                        <h1 class="text-white mb-4">Effectuez votre paiement</h1>
                        <p class="mb-4">Sécurisez votre réservation en procédant au paiement.</p>
                        <a class="btn btn-outline-light py-3 px-5 mt-2" href="#">En savoir plus</a>
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Formulaire de Paiement</h1>
                        <form id="paymentForm">
                            <div class="row g-3">
                                <!-- Montant -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="amount" placeholder="Montant">
                                        <label for="amount">Montant (€)</label>
                                    </div>
                                </div>
                                <!-- Méthode de paiement -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select class="form-control bg-transparent" id="paymentMethod">
                                            <option value="" disabled selected>Choisissez une méthode de paiement</option>
                                            <option value="carte">Carte Bancaire</option>
                                            <option value="virement">Virement Bancaire</option>
                                            <option value="paypal">PayPal</option>
                                        </select>
                                        <label for="paymentMethod">Méthode de Paiement</label>
                                    </div>
                                </div>
                                <!-- Étapes supplémentaires pour les méthodes de paiement -->
                                <div id="paymentSteps" class="col-12"></div>
                                <!-- Bouton de soumission -->
                                <div class="col-12">
                                    <button class="btn btn-outline-light w-100 py-3" type="submit">Payer maintenant</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
        <!-- Contrôles du Carousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bookingCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bookingCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
    
    
    <!-- Booking End-->
        

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
    <script>
         document.getElementById('paymentMethod').addEventListener('change', function() {
        const paymentSteps = document.getElementById('paymentSteps');
        paymentSteps.innerHTML = ''; // Clear previous steps

        switch (this.value) {
            case 'carte':
                paymentSteps.innerHTML = `
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-transparent" id="cardName" placeholder="Nom sur la carte">
                                <label for="cardName">Nom sur la carte</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-transparent" id="cardNumber" placeholder="Numéro de carte">
                                <label for="cardNumber">Numéro de carte</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-transparent" id="expiryDate" placeholder="Date d'expiration">
                                <label for="expiryDate">Date d'expiration (MM/AA)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-transparent" id="cvv" placeholder="CVV">
                                <label for="cvv">CVV</label>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 'virement':
                paymentSteps.innerHTML = `
                    <div class="form-floating">
                        <input type="text" class="form-control bg-transparent" id="iban" placeholder="IBAN">
                        <label for="iban">IBAN</label>
                    </div>
                `;
                break;
            case 'paypal':
                paymentSteps.innerHTML = `
                    <div class="form-floating">
                        <input type="email" class="form-control bg-transparent" id="paypalEmail" placeholder="Email PayPal">
                        <label for="paypalEmail">Email PayPal</label>
                    </div>
                `;
                break;
        }
    });

    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        event.preventDefault();
        alert('Paiement effectué avec succès!');
    });
    </script>


</body>

</html>