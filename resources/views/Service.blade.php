<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">
    {{-- Lien vers l'icône du site (favicon) --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">
    {{-- Liens vers les polices web de Google --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    {{-- Lien vers la feuille de style Font Awesome --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    {{-- Lien vers la feuille de style Bootstrap Icons --}}

    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    {{-- Lien vers la feuille de style de la librairie Animate.css --}}
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    {{-- Lien vers la feuille de style du carrousel Owl Carousel --}}
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    {{-- Lien vers la feuille de style du sélecteur de date et d'heure Tempus Dominus (Bootstrap 4) --}}

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Lien vers la feuille de style Bootstrap personnalisée --}}

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    {{-- Lien vers la feuille de style principal du template --}}

    <style>
        #rooms {
            position: relative;
            padding: 45px 0 0 0;
        }

        #rooms .room {
            margin-bottom: 60px;
        }

        #rooms .room-img,
        #rooms .room-des {
            position: relative;
            top: 50%;
            -moz-transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        #rooms .room-des {
            width: 100%;
            text-align: center;
        }

        #rooms .room-img {
            border-radius: 30px;
            overflow: hidden;
        }

        #rooms .room-img img {
            border-radius: 30px;
            transition: 0.3s;
        }

        #rooms .room-img:hover img {
            -ms-transform: scale(1.1);
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        #rooms .room-des h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        @media (max-width: 767.98px) {
            #rooms .room-des h3 {
                margin-top: 15px;
            }
        }

        #rooms .room-des h1 {
            font-size: 45px;
            margin-bottom: 15px;
        }

        #rooms .room-des h1 span {
            margin-left: 5px;
            font-size: 14px;
            font-weight: 400;
        }

        #rooms .room-size {
            margin: 0 0 25px 0;
            padding: 0;
        }

        #rooms .room-size li {
            display: inline-block;
            font-size: 14px;
            margin-right: 15px;
            list-style-type: none;
        }

        #rooms .room-size li i {
            margin-right: 6px;
        }

        #rooms .room-icon {
            margin: 0;
            padding: 0;
            position: relative;
            width: 100%;
        }

        #rooms .room-icon li {
            list-style-type: none;
            display: inline-block;
            width: 30px;
            height: 30px;
            margin-right: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            background-repeat: no-repeat;
            background-size: contain;
            transition: 0.5s;
        }

        @media (max-width: 575.98px) {
            #rooms .room-icon li {
                width: 20px;
                height: 20px;
                margin-right: 10px;
                margin-bottom: 10px;
            }

        }


        #rooms .room-link {
            position: relative;
            width: 100%;
            margin-top: 5px;
        }

        #rooms .room-link a {
            display: inline-block;
            padding: 7px 30px;
            color: #fafdf8;
            border-radius: 30px;
            background: #0e3901;
        }

        #rooms .room-link a:first-child {
            margin-right: 15px;
        }

        #rooms .room-link a:hover {
            color: #222222;
            background: #84db01;
        }

        #rooms hr {
            width: 75%;
            text-align: center;
        }



        .modal .modal-body img {
            height: 100%;
            width: 100%;
        }

        .modal .modal-body h2 {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .modal .modal-body p {
            margin-bottom: 15px;
        }

        .modal .modal-body .modal-link {
            position: relative;
            text-align: center;
        }

        .modal .modal-body a {
            display: inline-block;
            margin: 0 auto;
            padding: 8px 30px;
            background: #222222;
            color: #00CED1;
            cursor: pointer;
            border: none;
        }

        .modal .modal-body a:hover {
            color: #222222;
            background: #00CED1;
        }

        .modal .port-slider-nav .slick-track {
            padding: 30px 0 15px 0;
        }

        .modal .port-slider-nav .slick-center img {
            -ms-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            transform: scale(1.2);
        }

        .room-icon {
            font-size: 12px;

        }

        #rooms .room-icon:hover {
            color: #659707;
            /* Change la couleur au survol */
            transition: color 0.3s ease;
            /* Ajoute une animation fluide */
        }

        #rooms .room-img img {
            width: 525px;
            height: 350px;
        }

        .formass {
    background-color: white; /* Fond blanc */
    transition: background-color 0.3s ease;
}
        .formass:hover {
    background-color: rgba(162, 247, 3, 0.2);/* Augmenter la transparence au survol */
}
    </style>

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


   
    
    <!-- Topbar End -->


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

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Services</h1>
                        <h5 style="color: white;">Nous offrons des services complets pour simplifier vos voyages : réservation de vols, d'hôtels, et assurances adaptées à vos besoins, pour une expérience de voyage fluide et sécurisée.</h5>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                <h1 class="mb-5">Nos services</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5>Tournées mondiales</h5>
                            <p>Explorez le monde avec nos circuits soigneusement conçus pour une expérience inoubliable
                                !</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                            <h5>Réservation d'hôtel</h5>
                            <p>Réservez facilement votre hôtel avec notre service, en comparant prix et avis pour un
                                séjour serein.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user text-primary mb-4"></i>
                            <h5>Guides de voyage</h5>
                            <p>Explorez nos guides de voyage pour recommandations locales et des conseils pratiques.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cog text-primary mb-4"></i>
                            <h5>Planification</h5>
                            <p>Organisez facilement vos voyages avec notre service de planification et d'itinéraires
                                personnalisé.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->




    <!-- assurance start -->



    <!-- Options Section -->
    <div class="container py-5">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Assurance Voyage</h6>
            <h1 class="mb-5">Nos Options d'Assurance</h1>

        </div>
        <div class="row g-4">
            <!-- Option 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Assurance Annulation</h5>
                        <p class="card-text">Couvrez vos frais en cas d'annulation imprévue pour des raisons valides.
                        </p>
                        <button class="btn btn-primary details-btn" data-bs-toggle="modal"
                            data-bs-target="#detailsModal" data-title="Assurance Annulation"
                            data-content="Cette option rembourse vos frais d'annulation pour des raisons imprévues comme une maladie ou un imprévu familial.">
                            En savoir plus
                        </button>
                    </div>
                </div>
            </div>
            <!-- Option 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Assurance Médicale</h5>
                        <p class="card-text">Bénéficiez d'une prise en charge médicale complète lors de vos
                            déplacements.</p>
                        <button class="btn btn-primary details-btn" data-bs-toggle="modal"
                            data-bs-target="#detailsModal" data-title="Assurance Médicale"
                            data-content="Cette couverture prend en charge vos frais médicaux d'urgence à l'étranger, y compris les hospitalisations.">
                            En savoir plus
                        </button>
                    </div>
                </div>
            </div>
            <!-- Option 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Assurance Bagages</h5>
                        <p class="card-text">Protégez vos bagages contre la perte, le vol ou les dommages.</p>
                        <button class="btn btn-primary details-btn" data-bs-toggle="modal"
                            data-bs-target="#detailsModal" data-title="Assurance Bagages"
                            data-content="Cette option vous indemnise en cas de perte, vol ou dommages à vos bagages pendant votre voyage.">
                            En savoir plus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <!-- Call to Action Section -->
    <!-- formulaire assurance -->
<div class="formass row g-4 justify-content-center">
    <div class="text-center">
        <h5 class="section-title bg-white text-center text-primary px-3">Souscrire à une Assurance</h5>
    </div>

    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <h5>Souscrire à une Assurance</h5>
        <p class="mb-4">Prêt à voyager l'esprit tranquille ? Choisissez une assurance qui répond à vos besoins et partez en toute sécurité.</p>
        <div class="d-flex align-items-center mb-4">
            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px; border-radius: 50%; text-align: center;">
                <i class="fa fa-medkit text-white"></i>
            </div>
            <div class="ms-3">
                <h5 class="text-primary">Assurance Médicale</h5>
                <p class="mb-0">Sécurisez votre santé et votre sécurité.</p>
            </div>
        </div>
        <div class="d-flex align-items-center mb-4">
            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px; border-radius: 50%; text-align: center;">
                <i class="fa fa-suitcase-rolling text-white"></i>
            </div>
            <div class="ms-3">
                <h5 class="text-primary">Assurance Bagages</h5>
                <p class="mb-0">Protégez-vous contre les imprévus avec notre couverture d'assurance.</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
        @auth
            <form method="POST" action="{{ route('assurance.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" placeholder="Votre Nom" required>
                            <label for="nom">Votre Nom</label>
                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" placeholder="Votre Prénom" required>
                            <label for="prenom">Votre Prénom</label>
                            @error('prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" placeholder="Date de naissance" required>
                            <label for="date_naissance">Date de naissance</label>
                            @error('date_naissance')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="duree" name="duree" value="{{ old('duree') }}" placeholder="Ex : 10" min="1" required>
                            <label for="duree">Durée (en jours)</label>
                            @error('duree')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination') }}" placeholder="Destination" required>
                            <label for="destination">Destination</label>
                            @error('destination')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select id="type_assurance" name="type_assurance" class="form-select" required>
                                <option value="" {{ old('type_assurance') ? '' : 'selected' }} disabled>Sélectionnez un type</option>
                                <option value="Annulation" {{ old('type_assurance') == 'Annulation' ? 'selected' : '' }}>Annulation</option>
                                <option value="Médicale" {{ old('type_assurance') == 'Médicale' ? 'selected' : '' }}>Médicale</option>
                                <option value="Bagages" {{ old('type_assurance') == 'Bagages' ? 'selected' : '' }}>Bagages</option>
                            </select>
                            <label for="type_assurance">Type d'Assurance</label>
                            @error('type_assurance')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <select id="reservation_id" name="reservation_id" class="form-select" required>
                                <option value="" {{ old('reservation_id') ? '' : 'selected' }} disabled>Sélectionnez une réservation</option>
                                @foreach (auth()->user()->reservations as $reservation)
                                    <option value="{{ $reservation->id }}" {{ old('reservation_id') == $reservation->id ? 'selected' : '' }}>
                                        Réservation #{{ $reservation->id }} - {{ $reservation->destination }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="reservation_id">Réservation associée</label>
                            @error('reservation_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Souscrire maintenant</button>
                    </div>
                </div>
            </form>
        @else
            <div class="text-center">
                <p class="mb-4">Veuillez <a href="{{ route('login') }}" class="text-primary">vous connecter</a> pour souscrire à une assurance.</p>
            </div>
        @endauth
    </div>
</div>
<!-- fin formulaire assurance -->
    <!-- Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Détails de l'assurance</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalContent"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- assurance end -->




    <!-- Room Section Start -->
    <div id="rooms">
        <div class="container">
            <div class="section-header">
                <center>
                    <h5 class="section-title bg-white text-center justify-content-center text-primary px-3">Hôtels </h5>
                </center>
                <br>
                <center>
                    <h6>
                        Choisissez parmi une sélection d’hôtels adaptés à tous les styles de voyage et profitez d’un
                        séjour inoubliable !
                    </h6>
                </center>
                <br>
                <br>
            </div>
            <div class="row">
                <div class="col-md-12 room">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="room-img">
                            <img src="{{ asset('assets/img/room1.jpeg') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="room-des">
                                <h3>Appart-Hôtels</h3>
                                <h1>$150<span>/ Night</span></h1>
                                <p>Proposez des logements avec cuisine équipée et espace de vie, parfaits pour les
                                    familles ou les longs séjours. Une option pratique pour les clients souhaitant plus
                                    d’autonomie.</p>
                                <ul class="room-icon">
                                    <i class="fas fa-shield-alt fa-2x mx-3"></i> <!-- Bouclier -->
                                    <i class="fas fa-wind fa-2x mx-3"></i> <!-- Climatisation -->
                                    <i class="fas fa-bath fa-2x mx-3"></i> <!-- Baignoire -->
                                    <i class="fas fa-shower fa-2x mx-3"></i> <!-- Douche -->
                                    <i class="fas fa-hanger fa-2x mx-3"></i> <!-- Porte-manteau -->
                                    <i class="fas fa-tv fa-2x mx-3"></i> <!-- Télévision -->
                                    <i class="fas fa-wifi fa-2x mx-3"></i> <!-- Wi-Fi -->
                                    <i class="fas fa-phone fa-2x mx-3"></i> <!-- Téléphone -->
                                    <i class="fas fa-wine-bottle fa-2x mx-3"></i> <!-- Bouteilles -->
                                    <i class="fas fa-kitchen-set fa-2x mx-3"></i> <!-- Cuisine -->
                                </ul>
                                <div class="room-link">

                                    <a href="{{ route('booking') }}" >Réservez</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 room">
                    <div class="row">
                        <div class="col-md-6 d-block d-md-none">
                            <div class="room-img">
                            <img src="{{ asset('assets/img/room2.jpeg') }}">                           
                         </div>
                        </div>
                        <div class="col-md-6">
                            <div class="room-des">
                                <h3>Hôtels de Luxe</h3>
                                <h1>$600<span>/ Night</span></h1>
                                <p>Offrez à vos clients une expérience exceptionnelle avec des hôtels haut de gamme,
                                    équipés de spas, restaurants étoilés, et services personnalisés. Idéal pour des
                                    voyages de prestige ou des lunes de miel.</p>
                                <ul class="room-icon">
                                    <i class="fas fa-shield-alt fa-2x mx-3"></i> <!-- Bouclier -->
                                    <i class="fas fa-wind fa-2x mx-3"></i> <!-- Climatisation -->
                                    <i class="fas fa-bath fa-2x mx-3"></i> <!-- Baignoire -->
                                    <i class="fas fa-shower fa-2x mx-3"></i> <!-- Douche -->
                                    <i class="fas fa-hanger fa-2x mx-3"></i> <!-- Porte-manteau -->
                                    <i class="fas fa-tv fa-2x mx-3"></i> <!-- Télévision -->
                                    <i class="fas fa-wifi fa-2x mx-3"></i> <!-- Wi-Fi -->
                                    <i class="fas fa-phone fa-2x mx-3"></i> <!-- Téléphone -->
                                    <i class="fas fa-wine-bottle fa-2x mx-3"></i> <!-- Bouteilles -->
                                    <i class="fas fa-kitchen-set fa-2x mx-3"></i> <!-- Cuisine -->
                                </ul>
                                <div class="room-link">

                                    <a href="{{ route('booking') }}" >Réservez</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-none d-md-block">
                            <div class="room-img">
                            <img src="{{ asset('assets/img/room2.jpeg') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 room">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="room-img">
                            <img src="{{ asset('assets/img/room3.jpeg') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="room-des">
                                <h3>Boutique Hôtels</h3>
                                <h1>$180<span>/ Night</span></h1>
                                <p>Des établissements uniques et design, souvent thématiques, qui séduisent les
                                    voyageurs en quête d’originalité et d’expériences personnalisées.</p>
                                <ul class="room-icon">
                                    <i class="fas fa-shield-alt fa-2x mx-3"></i> <!-- Bouclier -->
                                    <i class="fas fa-wind fa-2x mx-3"></i> <!-- Climatisation -->
                                    <i class="fas fa-bath fa-2x mx-3"></i> <!-- Baignoire -->
                                    <i class="fas fa-shower fa-2x mx-3"></i> <!-- Douche -->
                                    <i class="fas fa-hanger fa-2x mx-3"></i> <!-- Porte-manteau -->
                                    <i class="fas fa-tv fa-2x mx-3"></i> <!-- Télévision -->
                                    <i class="fas fa-wifi fa-2x mx-3"></i> <!-- Wi-Fi -->
                                    <i class="fas fa-phone fa-2x mx-3"></i> <!-- Téléphone -->
                                    <i class="fas fa-wine-bottle fa-2x mx-3"></i> <!-- Bouteilles -->
                                    <i class="fas fa-kitchen-set fa-2x mx-3"></i> <!-- Cuisine -->
                                </ul>
                                <div class="room-link">

                                    <a href="{{ route('booking') }}" >Réservez</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 room">
                    <div class="row">
                        <div class="col-md-6 d-block d-md-none">
                            <div class="room-img">
                            <img src="{{ asset('assets/img/room4.jpeg') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="room-des">
                                <h3>Hôtels Balnéaires</h3>
                                <h1>$300<span>/ Night</span></h1>
                                <p>Situés en bord de mer, ces hôtels sont parfaits pour les vacances détente. Ils
                                    offrent des activités nautiques et des paysages paradisiaques pour un séjour
                                    mémorable.</p>
                                <ul class="room-icon">
                                    <i class="fas fa-shield-alt fa-2x mx-3"></i> <!-- Bouclier -->
                                    <i class="fas fa-wind fa-2x mx-3"></i> <!-- Climatisation -->
                                    <i class="fas fa-bath fa-2x mx-3"></i> <!-- Baignoire -->
                                    <i class="fas fa-shower fa-2x mx-3"></i> <!-- Douche -->
                                    <i class="fas fa-hanger fa-2x mx-3"></i> <!-- Porte-manteau -->
                                    <i class="fas fa-tv fa-2x mx-3"></i> <!-- Télévision -->
                                    <i class="fas fa-wifi fa-2x mx-3"></i> <!-- Wi-Fi -->
                                    <i class="fas fa-phone fa-2x mx-3"></i> <!-- Téléphone -->
                                    <i class="fas fa-wine-bottle fa-2x mx-3"></i> <!-- Bouteilles -->
                                    <i class="fas fa-kitchen-set fa-2x mx-3"></i> <!-- Cuisine -->
                                </ul>
                                <div class="room-link">

                                    <a href="{{ route('booking') }}" >Réservez</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-none d-md-block">
                            <div class="room-img">
                            <img src="{{ asset('assets/img/room4.jpeg') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 room">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="room-img">
                            <img src="{{ asset('assets/img/room5.jpeg') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="room-des">
                                <h3>Hôtels Économiques</h3>
                                <h1>$120<span>/ Night</span></h1>
                                <p>Une solution pratique et abordable pour les clients avec un budget limité ou pour les
                                    séjours d’affaires rapides, offrant des services de base mais efficaces.</p>
                                <ul class="room-icon">
                                    <i class="fas fa-shield-alt fa-2x mx-3"></i> <!-- Bouclier -->
                                    <i class="fas fa-wind fa-2x mx-3"></i> <!-- Climatisation -->
                                    <i class="fas fa-bath fa-2x mx-3"></i> <!-- Baignoire -->
                                    <i class="fas fa-shower fa-2x mx-3"></i> <!-- Douche -->
                                    <i class="fas fa-hanger fa-2x mx-3"></i> <!-- Porte-manteau -->
                                    <i class="fas fa-tv fa-2x mx-3"></i> <!-- Télévision -->
                                    <i class="fas fa-wifi fa-2x mx-3"></i> <!-- Wi-Fi -->
                                    <i class="fas fa-phone fa-2x mx-3"></i> <!-- Téléphone -->
                                    <i class="fas fa-wine-bottle fa-2x mx-3"></i> <!-- Bouteilles -->
                                    <i class="fas fa-kitchen-set fa-2x mx-3"></i> <!-- Cuisine -->
                                </ul>
                                <div class="room-link">

                                    <a href="{{ route('booking') }}" >Réservez</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Section End -->



     
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle modal content dynamically
        document.querySelectorAll('.details-btn').forEach(button => {
            button.addEventListener('click', function () {
                const title = this.getAttribute('data-title');
                const content = this.getAttribute('data-content');
                document.getElementById('detailsModalLabel').textContent = title;
                document.getElementById('modalContent').textContent = content;
            });
        });
        function fct()
        {
            alert('votre demande en cours de tratement')
        }
    </script>
</body>

</html>