<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Voyage FM-services</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">
    {{-- Le chemin vers l'icône du site (favicon) --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">
    {{-- Polices web de Google --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    {{-- Feuilles de style pour les icônes Font Awesome --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    {{-- Feuilles de style pour les icônes Bootstrap --}}

    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    {{-- Feuille de style pour les animations --}}
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    {{-- Feuille de style pour le carrousel Owl --}}
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    {{-- Feuille de style pour le sélecteur de date et d'heure Tempus Dominus --}}

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Feuille de style Bootstrap personnalisée --}}

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    {{-- Feuille de style principale du template --}}

    
    <style>
 
 body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.travel-plans-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 50px 20px;
}

.travel-plan-card {
    background-color: #fff;
    width: 300px;
    margin: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.travel-plan-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.plan-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 2px solid #eee;
}

.plan-details {
    padding: 20px;
}

.plan-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
}

.plan-description {
    font-size: 1rem;
    color: #777;
    margin: 10px 0;
}

.day {
    margin-top: 15px;
}

.day h4 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
}

.day ul {
    list-style: none;
    padding: 0;
}

.day ul li {
    margin-bottom: 5px;
    font-size: 0.95rem;
    color: #555;
}

.day ul li:before {
    content: '•';
    color: #86B817;
    margin-right: 8px;
}

.bg-registration {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/carousel-2.jpg), no-repeat center center;
    background-size: cover;
    height:800px ;
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
        <div class="container-fluid bg-primary py-5 mb-5 hero-header6">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Planification</h1>
                        <h5 style="color: white;">Nous offrons des services complets pour simplifier vos voyages : réservation de vols, d'hôtels, et assurances adaptées à vos besoins, pour une expérience de voyage fluide et sécurisée.</h5>
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
        
        
        
    <!-- Navbar & Hero End --> 
     <div class="text-center wow fadeInUp" data-wow-delay="0.1s"><br><br>
            <h1 class="mb-5">Planifiez Votre Voyage avec Nos Propositions</h1>
            <h6  style="color: #86B817;margin-top: 30px;">Notre équipe se fera un plaisir de vous accompagner dans la création de votre voyage parfait !</h6>

        </div>
<!-- Registration Start -->
<div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
   
    <div class="container py-5">
        
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0" >
                <div class="mb-4" >
                    <h1 class="text-white"><span class="text-primary">Choisissez le plan qui correspond à vos envies et à vos besoins.</span> </h1>
                </div>
                <p class="text-white">Nous vous proposons une sélection de plans de voyage adaptés à différents types d'aventures. Que vous soyez 
                    à la recherche de détente, d'aventure ou de découvertes culturelles, nous avons la solution idéale pour vous. 
                    Complétez le formulaire ci-dessous pour nous faire part de vos préférences, et nous vous aiderons à organiser un séjour sur mesure 
                    qui correspond parfaitement à vos attentes</p>
                <ul class="list-inline text-white m-0">
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Personnalisez votre voyage</li>
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Simplifiez votre organisation</li>
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Gagnez votre temps</li>
                </ul>
            </div>
            <div class="col-lg-5">
                <div class="card border-0" style="background-color: #33333300;">
                    <div class="card-body rounded-bottom bg-white " style="margin-top: -68px; border-radius: 10px;opacity: 0.8;">
                        <form action="{{ route('planification.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Votre Nom</label>
                                <input type="text" class="form-control" id="name" name="name" style="border-radius: 10px;" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Votre Email</label>
                                <input type="email" class="form-control" id="email" name="email" style="border-radius: 10px;" required>
                            </div>
                            <div class="mb-3">
                                <label for="destination" class="form-label">Destination choisie</label>
                                <input type="text" class="form-control" id="destination" name="destination" placeholder="ex:Paris, France" style="border-radius: 10px;" required>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Date de départ</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" style="border-radius: 10px;" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">Date de retour</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" style="border-radius: 10px;" required>
                            </div>
                            <div class="mb-3">
                                <label for="preferences" class="form-label">Préférences d'hébergement</label>
                                <textarea class="form-control" id="preferences" name="preferences" rows="3" style="border-radius: 10px;"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="special_requests" class="form-label">Demandes spéciales</label>
                                <textarea class="form-control" id="special_requests" name="special_requests" rows="3" style="border-radius: 10px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" >Envoyer</button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Registration End -->
<div class="text-center wow fadeInUp" data-wow-delay="0.1s" id="plan">
    <h1 class="mb-5">Plans de Voyage Adaptés à Vos Besoins</h1>
</div>
    <div class="travel-plans-container" id="paris">
        <div class="travel-plan-card">
        <img src="{{ asset('assets/img/Paris.jpg') }}" alt="Paris" class="plan-image">
            <div class="plan-details">
                <h3 class="plan-title">Paris, France</h3>
                <p class="plan-description">2 jours à Paris pour explorer les incontournables.</p>
                <div class="day">
                    <h4>Jour 1: Découverte du centre historique</h4>
                    <ul>
                        <li>Visite de la Cathédrale Notre-Dame</li>
                        <li>Promenade sur l’Île de la Cité</li>
                        <li>Croisière sur la Seine</li>
                    </ul>
                </div>
                <div class="day">
                    <h4>Jour 2: Les incontournables</h4>
                    <ul>
                        <li>Visite du Louvre</li>
                        <li>Promenade dans le Jardin des Tuileries</li>
                        <li>Vue sur la Tour Eiffel illuminée</li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="travel-plan-card">
        <img src="{{ asset('assets/img/Marrakech.jpg') }}" alt="Marrakech" class="plan-image">           
         <div class="plan-details">
                <h3 class="plan-title">Marrakech, Maroc</h3>
                <p class="plan-description">2 jours à Marrakech pour une immersion totale.</p>
                <div class="day">
                    <h4>Jour 1: Exploration de la Médina</h4>
                    <ul>
                        <li>Découverte de la place Jemaa el-Fna</li>
                        <li>Visite du Palais de la Bahia</li>
                        <li>Dîner avec spectacle marocain</li>
                    </ul>
                </div>
                <div class="day">
                    <h4>Jour 2: Jardin et architecture</h4>
                    <ul>
                        <li>Visite du Jardin Majorelle</li>
                        <li>Découverte de la Koutoubia</li>
                        <li>Thé à la menthe sur une terrasse</li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="travel-plan-card">
        <img src="{{ asset('assets/img/japan.jpg') }}" alt="Tokyo" class="plan-image">
                    <div class="plan-details">
                <h3 class="plan-title">Tokyo, Japon</h3>
                <p class="plan-description">2 jours à Tokyo, entre tradition et modernité.</p>
                <div class="day">
                    <h4>Jour 1: Tradition et modernité</h4>
                    <ul>
                        <li>Visite du temple Sensō-ji</li>
                        <li>Découverte de la Tokyo Skytree</li>
                        <li>Balade dans Akihabara</li>
                    </ul>
                </div>
                <div class="day">
                    <h4>Jour 2: Nature et culture</h4>
                    <ul>
                        <li>Balade dans le parc Ueno</li>
                        <li>Découverte de Yanaka Ginza</li>
                        <li>Dîner sushi dans un restaurant local</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    
   
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
    {{-- Librairie jQuery --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Bundle JavaScript de Bootstrap 5 --}}
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    {{-- Librairie WOW.js pour les animations au scroll --}}
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    {{-- Librairie Easing pour des effets d'animation fluides --}}
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    {{-- Librairie Waypoints pour détecter le scroll des éléments --}}
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    {{-- Librairie Owl Carousel pour les carrousels --}}
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    {{-- Librairie Moment.js pour la manipulation de dates --}}
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    {{-- Librairie Moment Timezone pour la gestion des fuseaux horaires --}}
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    {{-- Librairie Tempus Dominus pour le sélecteur de date et d'heure (version Bootstrap 4) --}}

    

    <!-- Template Javascript -->
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
    </script>
    <SCRIpt>document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const travelPlans = document.querySelectorAll(".travel-plan-card");
    
        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Empêche la soumission réelle du formulaire
    
            // Récupérer la destination choisie dans le formulaire
            const destination = document.querySelector("#destination").value.trim().toLowerCase();
    
            // Parcourir les plans de voyage
            travelPlans.forEach(plan => {
                const planTitle = plan.querySelector(".plan-title").textContent.trim().toLowerCase();
    
                // Afficher ou masquer les plans en fonction de la correspondance
                if (planTitle.includes(destination)) {
                    plan.style.display = "block"; // Afficher le plan correspondant
                } else {
                    plan.style.display = "none"; // Masquer les autres plans
                }
            });
        });
    });
    </SCRIpt>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    
</body>

</html>