<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Voyage FM - Planification Intelligente</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- CSS Libraries -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .travel-plans-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin: 50px auto;
            max-width: 1200px;
        }

        .travel-plan-card {
            background-color: #fff;
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .travel-plan-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .plan-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .plan-details {
            padding: 25px;
        }

        .plan-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .plan-description {
            font-size: 1rem;
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .day {
            margin-top: 20px;
        }

        .day h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #3498db;
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .day ul {
            list-style: none;
            padding-left: 0;
        }

        .day ul li {
            margin-bottom: 8px;
            font-size: 0.95rem;
            color: #555;
            position: relative;
            padding-left: 20px;
        }

        .day ul li:before {
            content: '✓';
            color: #86B817;
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        .bg-registration {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset("assets/img/planification-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            position: relative;
        }

        .personalized-plan {
            background-color: #fff;
            border-radius: 15px;
            padding: 40px;
            margin: 50px auto;
            max-width: 900px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            border: 1px solid #e0e0e0;
        }

        .personalized-plan:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, #86B817, #3498db);
        }

        .plan-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .plan-section:last-child {
            border-bottom: none;
        }

        .plan-section h3 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            padding-left: 15px;
        }

        .plan-section h3:before {
            content: '';
            position: absolute;
            left: 0;
            top: 5px;
            height: 20px;
            width: 5px;
            background-color: #86B817;
        }

        .hidden {
            display: none;
        }

        .plan-feature {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .plan-feature-icon {
            background-color: #e8f4fc;
            color: #3498db;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .plan-feature-content {
            flex-grow: 1;
        }

        .plan-feature-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .plan-feature-desc {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .plan-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }

        .btn-plan {
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-save {
            background-color: #86B817;
            color: white;
            border: 2px solid #86B817;
        }

        .btn-save:hover {
            background-color: #76a80e;
            border-color: #76a80e;
        }

        .btn-print {
            background-color: white;
            color: #3498db;
            border: 2px solid #3498db;
        }

        .btn-print:hover {
            background-color: #3498db;
            color: white;
        }

        .btn-email {
            background-color: white;
            color: #e74c3c;
            border: 2px solid #e74c3c;
        }

        .btn-email:hover {
            background-color: #e74c3c;
            color: white;
        }

        .search-container {
            text-align: center;
            margin: 40px auto;
            max-width: 800px;
        }

        #searchInput {
            padding: 12px 25px;
            width: 100%;
            border-radius: 30px;
            border: 2px solid #86B817;
            outline: none;
            font-size: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }

        #searchInput:focus {
            border-color: #3498db;
            box-shadow: 0 5px 20px rgba(52, 152, 219, 0.2);
        }

        .no-results {
            text-align: center;
            padding: 50px;
            color: #7f8c8d;
            font-size: 1.2rem;
            display: none;
        }

        .tag {
            display: inline-block;
            background-color: #e8f4fc;
            color: #3498db;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .price-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: rgba(134, 184, 23, 0.9);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .select-plan-btn {
            width: 100%;
            margin-top: 20px;
            border-radius: 30px;
            padding: 10px;
            font-weight: 600;
            background-color: #3498db;
            border: none;
            transition: all 0.3s;
        }

        .select-plan-btn:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .timeline {
            position: relative;
            padding-left: 30px;
            margin-top: 20px;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 20px;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            left: -30px;
            top: 5px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background-color: #86B817;
            border: 3px solid #e8f4fc;
        }

        .timeline-item:after {
            content: '';
            position: absolute;
            left: -23px;
            top: 20px;
            width: 2px;
            height: calc(100% - 15px);
            background-color: #e0e0e0;
        }

        .timeline-item:last-child:after {
            display: none;
        }

        .timeline-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .timeline-desc {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .travel-plan-card {
                width: 100%;
                max-width: 400px;
            }
            
            .personalized-plan {
                padding: 25px;
            }
            
            .plan-actions {
                flex-direction: column;
            }
            
            .btn-plan {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Navbar -->
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
            </div>
        </nav>
        
        <!-- Hero Section -->
        <div class="container-fluid bg-primary py-5 mb-5 hero-header6">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Planification Intelligente</h1>
                        <h5 style="color: white;">Notre système expert crée des itinéraires sur mesure adaptés à vos préférences, budget et style de voyage.</h5>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Planification</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Introduction -->
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="mb-5">Planifiez Votre Voyage Idéal</h1>
        <h6 style="color: #86B817;margin-top: 30px;">Notre intelligence artificielle crée des plans personnalisés en fonction de vos envies et contraintes.</h6>
    </div>

    <!-- Formulaire de Planification -->
    <div class="container-fluid bg-registration py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h1 class="text-white"><span class="text-primary">Votre Voyage Sur Mesure en 3 Étapes</span></h1>
                    </div>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-title">1. Remplissez le formulaire</div>
                            <div class="timeline-desc">Dites-nous où, quand et comment vous souhaitez voyager</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-title">2. Génération automatique</div>
                            <div class="timeline-desc">Notre système analyse vos préférences et crée un plan optimal</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-title">3. Personnalisation finale</div>
                            <div class="timeline-desc">Ajustez les détails et recevez votre itinéraire complet</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0" style="background-color: rgba(255, 255, 255, 0.1);">
                        <div class="card-body rounded-bottom bg-white" style="border-radius: 10px; opacity: 0.9;">
                        <form id="planificationForm" method="POST">
    @csrf
    @auth
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Votre Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" style="border-radius: 10px;" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Votre Email</label>
                                    <input type="email" class="form-control" id="email" name="email" style="border-radius: 10px;" required>
                                </div>
                                <div class="mb-3">
                                    <label for="destination" class="form-label">Destination choisie</label>
                                    <input type="text" class="form-control" id="destination" name="destination" placeholder="ex: Paris, France" style="border-radius: 10px;" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="date_depart" class="form-label">Date de départ</label>
                                        <input type="date" class="form-control" id="date_depart" name="date_depart" style="border-radius: 10px;" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="duree" class="form-label">Durée (jours)</label>
                                        <input type="number" class="form-control" id="duree" name="duree" min="1" style="border-radius: 10px;" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="budget" class="form-label">Budget approximatif (€)</label>
                                        <input type="number" class="form-control" id="budget" name="budget" min="1" style="border-radius: 10px;" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre_personnes" class="form-label">Nombre de Personnes</label>
                                        <input type="number" class="form-control" id="nombre_personnes" name="nombre_personnes" min="1" style="border-radius: 10px;" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="type_voyage" class="form-label">Type de Voyage</label>
                                    <select class="form-control" id="type_voyage" name="type_voyage" style="border-radius: 10px;">
                                        <option value="decouverte">Découverte</option>
                                        <option value="romantique">Romantique</option>
                                        <option value="aventure">Aventure</option>
                                        <option value="detente">Détente</option>
                                        <option value="culturel">Culturel</option>
                                        <option value="gastronomique">Gastronomique</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="preferences" class="form-label">Préférences Spéciales</label>
                                    <textarea class="form-control" id="preferences" name="preferences" rows="3" style="border-radius: 10px;" placeholder="Activités spécifiques, régimes alimentaires, besoins particuliers..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" style="border-radius: 30px; padding: 10px;">Générer Mon Plan</button>
                                @else
    <div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle me-2"></i>
        Vous devez <a href="{{ route('login') }}">vous connecter</a> ou 
        <a href="{{ route('register') }}">créer un compte</a> pour générer un plan de voyage.
    </div>
    @endauth

                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Plan Personnalisé -->
    <div id="personalizedPlanContainer" class="personalized-plan hidden">
        <h2 class="text-center mb-4">Votre Plan de Voyage Personnalisé</h2>
        <div id="personalizedPlanContent"></div>
        
        <div class="plan-actions">
            <button class="btn btn-plan btn-save" id="savePlanBtn">
                <i class="far fa-save me-2"></i>Sauvegarder
            </button>
            <button class="btn btn-plan btn-print" id="printPlanBtn">
                <i class="fas fa-print me-2"></i>Imprimer
            </button>
            <button class="btn btn-plan btn-email" id="emailPlanBtn">
                <i class="far fa-envelope me-2"></i>Envoyer par Email
            </button>
        </div>
    </div>

    <!-- Plans Recommandés -->
    <div class="container-xxl py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Nos Plans Recommandés</h1>
            <p class="mb-4">Inspirez-vous de nos itinéraires populaires ou utilisez-les comme base pour votre voyage personnalisé</p>
        </div>

        <!-- Barre de recherche -->
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Rechercher une destination (Paris, Marrakech, Tokyo...)">
        </div>

        <!-- Conteneur des plans -->
        <div class="travel-plans-container" id="travelPlansContainer">
            <!-- Plan Paris -->
            <div class="travel-plan-card" data-destination="paris">
                <div class="price-badge">À partir de 650€</div>
                <img src="{{ asset('assets/img/Paris.jpg') }}" alt="Paris" class="plan-image">
                <div class="plan-details">
                    <h3 class="plan-title">Paris, France</h3>
                    <div class="mb-3">
                        <span class="tag">Romantique</span>
                        <span class="tag">Culture</span>
                        <span class="tag">Gastronomie</span>
                    </div>
                    <p class="plan-description">Découvrez la Ville Lumière avec cet itinéraire soigneusement conçu pour explorer ses trésors cachés et ses monuments emblématiques.</p>
                    <div class="day">
                        <h4>Jour 1: Découverte du centre historique</h4>
                        <ul>
                            <li>Visite de la Cathédrale Notre-Dame</li>
                            <li>Promenade sur l'Île de la Cité</li>
                            <li>Croisière sur la Seine au coucher du soleil</li>
                        </ul>
                    </div>
                    <div class="day">
                        <h4>Jour 2: Les incontournables</h4>
                        <ul>
                            <li>Visite du Louvre et ses chefs-d'œuvre</li>
                            <li>Promenade dans le Jardin des Tuileries</li>
                            <li>Dîner avec vue sur la Tour Eiffel illuminée</li>
                        </ul>
                    </div>
                    <button class="select-plan-btn" onclick="selectDestination('Paris, France')">
                        <i class="fas fa-magic me-2"></i>Personnaliser ce plan
                    </button>
                </div>
            </div>
        
            <!-- Plan Marrakech -->
            <div class="travel-plan-card" data-destination="marrakech">
                <div class="price-badge">À partir de 450€</div>
                <img src="{{ asset('assets/img/Marrakech.jpg') }}" alt="Marrakech" class="plan-image">           
                <div class="plan-details">
                    <h3 class="plan-title">Marrakech, Maroc</h3>
                    <div class="mb-3">
                        <span class="tag">Aventure</span>
                        <span class="tag">Culture</span>
                        <span class="tag">Détente</span>
                    </div>
                    <p class="plan-description">Plongez dans l'atmosphère envoûtante de Marrakech avec ce circuit qui combine découverte culturelle et moments de détente.</p>
                    <div class="day">
                        <h4>Jour 1: Exploration de la Médina</h4>
                        <ul>
                            <li>Découverte de la place Jemaa el-Fna</li>
                            <li>Visite du Palais de la Bahia</li>
                            <li>Dîner avec spectacle marocain dans un riad</li>
                        </ul>
                    </div>
                    <div class="day">
                        <h4>Jour 2: Jardin et architecture</h4>
                        <ul>
                            <li>Visite du Jardin Majorelle et musée YSL</li>
                            <li>Découverte de la Koutoubia et ses jardins</li>
                            <li>Thé à la menthe sur une terrasse panoramique</li>
                        </ul>
                    </div>
                    <button class="select-plan-btn" onclick="selectDestination('Marrakech, Maroc')">
                        <i class="fas fa-magic me-2"></i>Personnaliser ce plan
                    </button>
                </div>
            </div>
        
            <!-- Plan Tokyo -->
            <div class="travel-plan-card" data-destination="tokyo">
                <div class="price-badge">À partir de 1200€</div>
                <img src="{{ asset('assets/img/japan.jpg') }}" alt="Tokyo" class="plan-image">
                <div class="plan-details">
                    <h3 class="plan-title">Tokyo, Japon</h3>
                    <div class="mb-3">
                        <span class="tag">Moderne</span>
                        <span class="tag">Culture</span>
                        <span class="tag">Gastronomie</span>
                    </div>
                    <p class="plan-description">Entre tradition et modernité, découvrez Tokyo avec ce circuit équilibré qui vous fera vivre l'essence même du Japon.</p>
                    <div class="day">
                        <h4>Jour 1: Tradition et modernité</h4>
                        <ul>
                            <li>Visite du temple Sensō-ji à Asakusa</li>
                            <li>Découverte de la Tokyo Skytree</li>
                            <li>Balade dans Akihabara, le quartier high-tech</li>
                        </ul>
                    </div>
                    <div class="day">
                        <h4>Jour 2: Nature et culture</h4>
                        <ul>
                            <li>Balade dans le parc Ueno et ses musées</li>
                            <li>Découverte de Yanaka Ginza</li>
                            <li>Dîner sushi dans un restaurant local</li>
                        </ul>
                    </div>
                    <button class="select-plan-btn" onclick="selectDestination('Tokyo, Japon')">
                        <i class="fas fa-magic me-2"></i>Personnaliser ce plan
                    </button>
                </div>
            </div>
        </div>

        <!-- Message quand aucun résultat -->
        <div class="no-results" id="noResults">
            <i class="fas fa-search fa-3x mb-3" style="color: #86B817;"></i>
            <h4>Aucun plan trouvé pour cette destination</h4>
            <p>Contactez-nous pour créer un voyage sur mesure adapté à vos envies !</p>
            <a href="{{ route('contact') }}" class="btn btn-primary mt-3">Nous contacter</a>
        </div>
    </div>

    <!-- Footer -->
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

    <!-- Planification Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialisation des éléments
            const form = document.getElementById("planificationForm");
            const travelPlans = document.querySelectorAll(".travel-plan-card");
            const personalizedPlanContainer = document.getElementById("personalizedPlanContainer");
            const personalizedPlanContent = document.getElementById("personalizedPlanContent");
            const searchInput = document.getElementById("searchInput");
            const noResults = document.getElementById("noResults");
            const savePlanBtn = document.getElementById("savePlanBtn");
            const printPlanBtn = document.getElementById("printPlanBtn");
            const emailPlanBtn = document.getElementById("emailPlanBtn");

            // Gestion de la recherche
            searchInput.addEventListener("input", function () {
                const searchTerm = this.value.trim().toLowerCase();
                let hasResults = false;
                
                travelPlans.forEach(plan => {
                    const planTitle = plan.querySelector(".plan-title").textContent.toLowerCase();
                    if (planTitle.includes(searchTerm)) {
                        plan.style.display = "block";
                        hasResults = true;
                    } else {
                        plan.style.display = "none";
                    }
                });
                
                noResults.style.display = hasResults ? "none" : "block";
            });

            // Sélection d'une destination prédéfinie
            window.selectDestination = function(destination) {
                document.getElementById("destination").value = destination;
                document.getElementById("planificationForm").scrollIntoView({
                    behavior: "smooth"
                });
                document.getElementById("destination").focus();
            };

            // Soumission du formulaire
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                
                // Afficher le spinner
                document.getElementById("spinner").classList.add("show");
                
                // Simuler un délai pour la génération du plan (à remplacer par une requête AJAX en production)
                setTimeout(function() {
                    // Récupérer les données du formulaire
                    const formData = {
                        nom: document.getElementById("nom").value,
                        email: document.getElementById("email").value,
                        destination: document.getElementById("destination").value,
                        date_depart: document.getElementById("date_depart").value,
                        duree: document.getElementById("duree").value,
                        budget: document.getElementById("budget").value,
                        nombre_personnes: document.getElementById("nombre_personnes").value,
                        type_voyage: document.getElementById("type_voyage").value,
                        preferences: document.getElementById("preferences").value
                    };

                    // Générer un plan personnalisé
                    const plan = genererPlanPersonnalise(formData);
                    
                    // Afficher le plan personnalisé
                    personalizedPlanContent.innerHTML = plan;
                    personalizedPlanContainer.classList.remove("hidden");
                    
                    // Faire défiler jusqu'au plan
                    personalizedPlanContainer.scrollIntoView({ behavior: 'smooth' });

                    // Cacher le spinner
                    document.getElementById("spinner").classList.remove("show");
                }, 1500);
            });

            // Bouton Sauvegarder
            savePlanBtn.addEventListener("click", function() {
                // Envoyer les données au serveur pour sauvegarde
                alert("Votre plan a été sauvegardé avec succès !");
            });

            // Bouton Imprimer
            printPlanBtn.addEventListener("click", function() {
                window.print();
            });

            // Bouton Email
            emailPlanBtn.addEventListener("click", function() {
                const email = prompt("Entrez votre adresse email pour recevoir votre plan:");
                if (email) {
                    alert(`Votre plan de voyage a été envoyé à ${email}`);
                }
            });

            // Fonction pour générer un plan personnalisé
            function genererPlanPersonnalise(data) {
                // Calculs initiaux
                const budgetParPersonne = data.budget / data.nombre_personnes;
                const budgetParJour = data.budget / data.duree;
                const dateDepart = new Date(data.date_depart);
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                const dateFormatee = dateDepart.toLocaleDateString('fr-FR', options);
                
                // Déterminer la saison
                const mois = dateDepart.getMonth() + 1;
                let saison = "";
                if (mois >= 3 && mois <= 5) saison = "printemps";
                else if (mois >= 6 && mois <= 8) saison = "été";
                else if (mois >= 9 && mois <= 11) saison = "automne";
                else saison = "hiver";

                // Base de données des destinations
                const destinationsDB = {
                    'paris': {
                        type: 'ville',
                        tags: ['romantique', 'culture', 'histoire', 'gastronomie'],
                        budget: 'moyen',
                        conseils: {
                            printemps: "Profitez des jardins en fleurs et des températures douces",
                            été: "Évitez les heures d'affluence dans les musées",
                            automne: "Admirez les couleurs automnales dans les parcs",
                            hiver: "Découvrez les marchés de Noël magiques"
                        }
                    },
                    'marrakech': {
                        type: 'ville',
                        tags: ['aventure', 'culture', 'détente'],
                        budget: 'variable',
                        conseils: {
                            printemps: "Idéal pour explorer sans trop de chaleur",
                            été: "Privilégiez les activités tôt le matin ou en soirée",
                            automne: "Saison parfaite pour les excursions dans le désert",
                            hiver: "Nuits fraîches, prévoyez une veste légère"
                        }
                    },
                    'tokyo': {
                        type: 'ville',
                        tags: ['moderne', 'culture', 'aventure', 'gastronomie'],
                        budget: 'élevé',
                        conseils: {
                            printemps: "Ne manquez pas les cerisiers en fleurs",
                            été: "Prévoyez des vêtements légers et un parapluie",
                            automne: "Admirez les érables rouges",
                            hiver: "Découvrez les illuminations hivernales"
                        }
                    }
                };

                // Trouver la destination dans la base
                const destinationCle = data.destination.toLowerCase().split(',')[0].trim();
                const destinationInfo = destinationsDB[destinationCle] || {
                    type: 'ville',
                    tags: [],
                    budget: 'variable',
                    conseils: {}
                };

                // Analyser les préférences
                const preferences = analyserPreferences(data.preferences);
                
                // Déterminer le type de voyage
                const typeVoyage = determinerTypeVoyage(data.type_voyage, preferences);
                
                // Recommandations d'hébergement
                const hebergement = recommanderHebergement(data, destinationInfo);
                
                // Activités recommandées
                const activites = recommanderActivites(data, preferences, destinationInfo);
                
                // Itinéraire quotidien
                const itineraire = genererItineraire(data, preferences, destinationInfo);
                
                // Conseils personnalisés
                const conseils = genererConseils(data, preferences, destinationInfo, saison);
                
                // Estimation de budget
                const estimationBudget = genererEstimationBudget(data, destinationInfo);

                // Construire le plan final
                let plan = `
                    <div class="plan-section">
                        <h3>Informations Générales</h3>
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Voyageur</div>
                                <div class="plan-feature-desc">${data.nom} (${data.nombre_personnes} personne${data.nombre_personnes > 1 ? 's' : ''})</div>
                            </div>
                        </div>
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Destination</div>
                                <div class="plan-feature-desc">${data.destination}</div>
                            </div>
                        </div>
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Dates</div>
                                <div class="plan-feature-desc">Du ${dateFormatee} pour ${data.duree} jour${data.duree > 1 ? 's' : ''}</div>
                            </div>
                        </div>
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-euro-sign"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Budget</div>
                                <div class="plan-feature-desc">${data.budget}€ (${Math.round(budgetParJour)}€/jour/pers)</div>
                            </div>
                        </div>
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-suitcase"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Type de voyage</div>
                                <div class="plan-feature-desc">${typeVoyage}</div>
                            </div>
                        </div>
                    </div>

                    <div class="plan-section">
                        <h3>Hébergement Recommandé</h3>
                        ${hebergement}
                    </div>

                    <div class="plan-section">
                        <h3>Activités Recommandées</h3>
                        ${activites}
                    </div>

                    <div class="plan-section">
                        <h3>Itinéraire Quotidien</h3>
                        ${itineraire}
                    </div>

                    <div class="plan-section">
                        <h3>Estimation de Budget</h3>
                        ${estimationBudget}
                    </div>

                    <div class="plan-section">
                        <h3>Conseils Spéciaux</h3>
                        ${conseils}
                    </div>
                `;

                return plan;
            }

            function analyserPreferences(preferencesText) {
                const motsCles = {
                    'aventure': ['aventure', 'randonnée', 'sport', 'extrême', 'trek'],
                    'détente': ['détente', 'spa', 'repos', 'plage', 'farniente', 'relax'],
                    'culture': ['culture', 'musée', 'histoire', 'art', 'architecture', 'tradition'],
                    'romantique': ['romantique', 'couple', 'lune de miel', 'anniversaire', 'honeymoon'],
                    'gastronomie': ['gastronomie', 'restaurant', 'cuisine', 'vin', 'dégustation', 'food', 'gourmet'],
                    'famille': ['famille', 'enfant', 'ado', 'parent', 'familial']
                };

                const preferences = {};
                for (const [type, mots] of Object.entries(motsCles)) {
                    for (const mot of mots) {
                        if (preferencesText.toLowerCase().includes(mot)) {
                            preferences[type] = true;
                            break;
                        }
                    }
                }

                return preferences;
            }

            function determinerTypeVoyage(typeSelectionne, preferences) {
                const types = {
                    'decouverte': "Voyage découverte",
                    'romantique': "Voyage romantique",
                    'aventure': "Voyage d'aventure",
                    'detente': "Voyage de détente",
                    'culturel': "Voyage culturel",
                    'gastronomique': "Voyage gastronomique"
                };
                
                let type = types[typeSelectionne] || "Voyage découverte";
                
                // Affiner en fonction des préférences textuelles
                if (preferences.romantique) type = "Voyage romantique";
                if (preferences.aventure) type = "Voyage d'aventure";
                if (preferences.famille) type += " en famille";
                
                return type;
            }

            function recommanderHebergement(data, destinationInfo) {
                const budgetParJour = data.budget / data.duree / data.nombre_personnes;
                let recommandation = '';
                
                if (budgetParJour > 200) {
                    recommandation = `
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-hotel"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Hôtels 5 étoiles & Villas de luxe</div>
                                <div class="plan-feature-desc">
                                    Pour un séjour haut de gamme avec service personnalisé et équipements premium.
                                    Privilégiez les établissements avec spa, piscine et restaurants gastronomiques.
                                </div>
                            </div>
                        </div>
                    `;
                } else if (budgetParJour > 100) {
                    recommandation = `
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-hotel"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Hôtels 4 étoiles & Résidences premium</div>
                                <div class="plan-feature-desc">
                                    Un excellent rapport qualité-prix avec un bon niveau de confort et de service.
                                    Recherchez des établissements bien situés avec de bonnes notes des voyageurs.
                                </div>
                            </div>
                        </div>
                    `;
                } else if (budgetParJour > 50) {
                    recommandation = `
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-hotel"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Hôtels 3 étoiles & Appartements</div>
                                <div class="plan-feature-desc">
                                    Des hébergements confortables et fonctionnels, idéaux pour les voyageurs souhaitant
                                    privilégier les visites et activités plutôt que le luxe de l'hébergement.
                                </div>
                            </div>
                        </div>
                    `;
                } else {
                    recommandation = `
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-hotel"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Auberges & Locations économiques</div>
                                <div class="plan-feature-desc">
                                    Pour maximiser votre budget voyage, optez pour des auberges conviviales ou
                                    des locations d'appartements en périphérie des zones touristiques.
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                // Ajouter des conseils spécifiques selon la destination
                if (destinationInfo.tags.includes('romantique')) {
                    recommandation += `
                        <div class="alert alert-primary mt-3" role="alert">
                            <i class="fas fa-heart me-2"></i>
                            Pour un voyage romantique, nous recommandons des chambres avec vue, 
                            bain à remous ou accès à des espaces privés.
                        </div>
                    `;
                }
                
                if (data.nombre_personnes > 2) {
                    recommandation += `
                        <div class="alert alert-info mt-3" role="alert">
                            <i class="fas fa-users me-2"></i>
                            Pour ${data.nombre_personnes} personnes, la location d'un appartement ou d'une maison
                            peut être plus économique et pratique qu'un hôtel.
                        </div>
                    `;
                }
                
                return recommandation;
            }

            function recommanderActivites(data, preferences, destinationInfo) {
                let activites = '<div class="row">';
                
                // Activités basées sur le type de voyage
                if (data.type_voyage === 'romantique' || preferences.romantique) {
                    activites += `
                        <div class="col-md-6">
                            <div class="plan-feature">
                                <div class="plan-feature-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="plan-feature-content">
                                    <div class="plan-feature-title">Expériences Romantiques</div>
                                    <div class="plan-feature-desc">
                                        • Dîner aux chandelles avec vue panoramique<br>
                                        • Croisière privée au coucher du soleil<br>
                                        • Séance photo dans des lieux emblématiques<br>
                                        • Spa en couple avec soins romantiques
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                if (data.type_voyage === 'aventure' || preferences.aventure) {
                    activites += `
                        <div class="col-md-6">
                            <div class="plan-feature">
                                <div class="plan-feature-icon">
                                    <i class="fas fa-hiking"></i>
                                </div>
                                <div class="plan-feature-content">
                                    <div class="plan-feature-title">Aventures</div>
                                    <div class="plan-feature-desc">
                                        • Randonnée guidée dans les sites naturels<br>
                                        • Sports extrêmes locaux (varies selon destination)<br>
                                        • Excursion hors des sentiers battus<br>
                                        • Rencontre avec les communautés locales
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                if (data.type_voyage === 'culturel' || preferences.culture) {
                    activites += `
                        <div class="col-md-6">
                            <div class="plan-feature">
                                <div class="plan-feature-icon">
                                    <i class="fas fa-landmark"></i>
                                </div>
                                <div class="plan-feature-content">
                                    <div class="plan-feature-title">Culture</div>
                                    <div class="plan-feature-desc">
                                        • Visite guidée des musées et monuments<br>
                                        • Spectacles culturels traditionnels<br>
                                        • Rencontres avec des artisans locaux<br>
                                        • Cours de cuisine ou d'artisanat local
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                if (data.type_voyage === 'gastronomique' || preferences.gastronomie) {
                    activites += `
                        <div class="col-md-6">
                            <div class="plan-feature">
                                <div class="plan-feature-icon">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <div class="plan-feature-content">
                                    <div class="plan-feature-title">Gastronomie</div>
                                    <div class="plan-feature-desc">
                                        • Tour gastronomique des spécialités locales<br>
                                        • Cours de cuisine avec un chef<br>
                                        • Dégustation de vins/alcools locaux<br>
                                        • Visite de marchés alimentaires
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                if (data.type_voyage === 'detente' || preferences.détente) {
                    activites += `
                        <div class="col-md-6">
                            <div class="plan-feature">
                                <div class="plan-feature-icon">
                                    <i class="fas fa-spa"></i>
                                </div>
                                <div class="plan-feature-content">
                                    <div class="plan-feature-title">Détente</div>
                                    <div class="plan-feature-desc">
                                        • Journée spa et bien-être<br>
                                        • Séance de yoga ou méditation<br>
                                        • Plage privée ou piscine<br>
                                        • Retraite relaxante en nature
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                // Activités spécifiques à la destination
                if (destinationInfo.tags.includes('culture')) {
                    activites += `
                        <div class="col-md-6">
                            <div class="plan-feature">
                                <div class="plan-feature-icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <div class="plan-feature-content">
                                    <div class="plan-feature-title">Incontournables Culturels</div>
                                    <div class="plan-feature-desc">
                                        • Visite des sites culturels majeurs<br>
                                        • Musées et galeries d'art<br>
                                        • Quartiers historiques et architecture<br>
                                        • Spectacles traditionnels
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                activites += '</div>';
                
                return activites;
            }

            function genererItineraire(data, preferences, destinationInfo) {
                let itineraire = '<div class="timeline">';
                const jours = parseInt(data.duree);
                
                for (let i = 1; i <= jours; i++) {
                    itineraire += `
                        <div class="timeline-item">
                            <div class="timeline-title">Jour ${i}: ${i === 1 ? 'Arrivée' : (i === jours ? 'Départ' : 'Exploration')}</div>
                            <div class="timeline-desc">
                    `;
                    
                    if (i === 1) {
                        itineraire += `
                            - Transfert à votre hébergement<br>
                            - Installation et repos<br>
                            - Dîner de bienvenue et briefing sur le séjour<br>
                            - Première découverte des environs (balade nocturne selon arrivée)
                        `;
                    } else if (i === jours) {
                        itineraire += `
                            - Petit-déjeuner et dernière visite si temps permet<br>
                            - Préparation des bagages<br>
                            - Transfert à l'aéroport/gare selon horaire<br>
                            - Suggestions pour votre prochaine visite!
                        `;
                    } else {
                        if (preferences.culture || data.type_voyage === 'culturel') {
                            itineraire += `
                                - Visite matinale de sites culturels (musées, monuments)<br>
                                - Déjeuner dans un restaurant local typique<br>
                            `;
                        }
                        
                        if (preferences.aventure || data.type_voyage === 'aventure') {
                            itineraire += `
                                - Activité d'aventure ou excursion en nature<br>
                            `;
                        }
                        
                        if (preferences.détente || data.type_voyage === 'detente') {
                            itineraire += `
                                - Temps libre pour détente (spa, plage, piscine)<br>
                            `;
                        }
                        
                        if (preferences.gastronomie || data.type_voyage === 'gastronomique') {
                            itineraire += `
                                - Expérience gastronomique le soir<br>
                            `;
                        }
                        
                        if (!preferences.culture && !preferences.aventure && !preferences.détente) {
                            itineraire += `
                                - Matinée libre pour exploration personnelle<br>
                                - Déjeuner dans un café local<br>
                                - Visite guidée ou activité optionnelle l'après-midi<br>
                                - Dîner et soirée libre
                            `;
                        }
                    }
                    
                    itineraire += `
                            </div>
                        </div>
                    `;
                }
                
                itineraire += '</div>';
                
                // Ajouter une note sur la flexibilité
                itineraire += `
                    <div class="alert alert-info mt-3" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        Cet itinéraire est flexible et peut être ajusté selon vos envies sur place.
                        Votre guide local pourra vous suggérer des alternatives en fonction de la météo
                        et des événements locaux.
                    </div>
                `;
                
                return itineraire;
            }

            function genererEstimationBudget(data, destinationInfo) {
                const budgetTotal = parseInt(data.budget);
                const nombrePersonnes = parseInt(data.nombre_personnes);
                const duree = parseInt(data.duree);
                
                // Calcul des pourcentages approximatifs
                let pourcentageHebergement = 40;
                let pourcentageTransport = 25;
                let pourcentageActivites = 20;
                let pourcentageRepas = 15;
                
                // Ajustements selon la destination
                if (destinationInfo.budget === 'élevé') {
                    pourcentageHebergement = 50;
                    pourcentageTransport = 20;
                } else if (destinationInfo.budget === 'variable') {
                    pourcentageHebergement = 35;
                    pourcentageActivites = 25;
                }
                
                // Ajustements selon le type de voyage
                if (data.type_voyage === 'romantique') {
                    pourcentageHebergement += 10;
                    pourcentageActivites -= 5;
                    pourcentageRepas += 5;
                } else if (data.type_voyage === 'aventure') {
                    pourcentageHebergement -= 10;
                    pourcentageActivites += 15;
                } else if (data.type_voyage === 'gastronomique') {
                    pourcentageRepas += 10;
                    pourcentageHebergement -= 5;
                    pourcentageActivites -= 5;
                }
                
                // Calcul des montants
                const hebergement = Math.round(budgetTotal * pourcentageHebergement / 100);
                const transport = Math.round(budgetTotal * pourcentageTransport / 100);
                const activites = Math.round(budgetTotal * pourcentageActivites / 100);
                const repas = Math.round(budgetTotal * pourcentageRepas / 100);
                
                // Calcul par jour/personne
                const hebergementJourPers = Math.round(hebergement / duree / nombrePersonnes);
                const transportJourPers = Math.round(transport / duree / nombrePersonnes);
                const activitesJourPers = Math.round(activites / duree / nombrePersonnes);
                const repasJourPers = Math.round(repas / duree / nombrePersonnes);
                
                return `
                    <div class="row">
                        <div class="col-md-6">
                            <div class="plan-feature">
                                <div class="plan-feature-icon">
                                    <i class="fas fa-hotel"></i>
                                </div>
                                <div class="plan-feature-content">
                                    <div class="plan-feature-title">Hébergement</div>
                                    <div class="plan-feature-desc">
                                        ${hebergement}€ (${pourcentageHebergement}%)<br>
                                        <small>${hebergementJourPers}€/jour/pers</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="plan-feature">
                                <div class="plan-feature-icon">
                                    <i class="fas fa-plane"></i>
                                </div>
                                <div class="plan-feature-content">
                                    <div class="plan-feature-title">Transport</div>
                                    <div class="plan-feature-desc">
                                        ${transport}€ (${pourcentageTransport}%)<br>
                                        <small>${transportJourPers}€/jour/pers</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="plan-feature">
                                <div class="plan-feature-icon">
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                                <div class="plan-feature-content">
                                    <div class="plan-feature-title">Activités</div>
                                    <div class="plan-feature-desc">
                                        ${activites}€ (${pourcentageActivites}%)<br>
                                        <small>${activitesJourPers}€/jour/pers</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="plan-feature">
                                <div class="plan-feature-icon">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <div class="plan-feature-content">
                                    <div class="plan-feature-title">Repas</div>
                                    <div class="plan-feature-desc">
                                        ${repas}€ (${pourcentageRepas}%)<br>
                                        <small>${repasJourPers}€/jour/pers</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-warning mt-3" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Ces estimations sont indicatives et peuvent varier selon la saison, 
                        les options choisies et les fluctuations de prix. Nous vous recommandons 
                        de prévoir une marge de 10-15% pour les imprévus.
                    </div>
                `;
            }

            function genererConseils(data, preferences, destinationInfo, saison) {
                let conseils = '';
                
                // Conseils généraux
                conseils += `
                    <div class="plan-feature">
                        <div class="plan-feature-icon">
                            <i class="fas fa-suitcase"></i>
                        </div>
                        <div class="plan-feature-content">
                            <div class="plan-feature-title">Bagage</div>
                            <div class="plan-feature-desc">
                                Pour un séjour de ${data.duree} jours, nous recommandons :
                                ${data.duree <= 3 ? 'un bagage cabine' : 'une valise moyenne'}.
                                Prévoyez des vêtements adaptés à la saison (${saison}).
                            </div>
                        </div>
                    </div>
                `;
                
                // Conseils spécifiques à la destination
                if (destinationInfo.conseils && destinationInfo.conseils[saison]) {
                    conseils += `
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Conseils pour ${data.destination}</div>
                                <div class="plan-feature-desc">
                                    ${destinationInfo.conseils[saison]}
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                // Conseils selon le type de voyage
                if (data.type_voyage === 'romantique') {
                    conseils += `
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Pour un voyage romantique</div>
                                <div class="plan-feature-desc">
                                    • Réservez à l'avance les restaurants et activités spéciales<br>
                                    • Prévoyez des surprises pour votre partenaire<br>
                                    • Informez les établissements des occasions spéciales (anniversaire, etc.)
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                if (data.type_voyage === 'aventure') {
                    conseils += `
                        <div class="plan-feature">
                            <div class="plan-feature-icon">
                                <i class="fas fa-hiking"></i>
                            </div>
                            <div class="plan-feature-content">
                                <div class="plan-feature-title">Pour une aventure réussie</div>
                                <div class="plan-feature-desc">
                                    • Vérifiez l'état de votre équipement avant le départ<br>
                                    • Souscrivez une assurance voyage adaptée<br>
                                    • Informez-vous sur les conditions locales et les risques potentiels
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                // Conseils budget
                conseils += `
                    <div class="plan-feature">
                        <div class="plan-feature-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="plan-feature-content">
                            <div class="plan-feature-title">Gestion du budget</div>
                            <div class="plan-feature-desc">
                                • Réservez à l'avance les activités principales pour bénéficier de tarifs préférentiels<br>
                                • Mélangez restaurants haut de gamme et options locales économiques<br>
                                • Prévoyez de l'argent liquide pour les petits achats et pourboires
                            </div>
                        </div>
                    </div>
                `;
                
                return conseils;
            }
        });
    </script>
</body>
</html>