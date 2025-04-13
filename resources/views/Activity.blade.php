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
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
/* Section des activités */
.activities-section {
    padding: 50px;
    background-color: #f9f9f9;
    text-align: center;
}

.activities-section h2 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 30px;
    color: #333;
}

/* Conteneur des rangées */
.activity-row {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
}

/* Carte d'activité */
.country-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 300px;
    text-align: left;
    transition: transform 0.3s ease;
}

.country-card:hover {
    transform: scale(1.05);
}

.country-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.country-card h3 {
    font-size: 1.5rem;
    margin: 15px 20px 10px;
    color: #333;
}

.country-card p {
    font-size: 1rem;
    color: #555;
    margin: 0 20px 15px;
}

.country-card .btn-primary {
    margin: 0 20px 20px;
    background-color: #86B817;
    color: white;
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    text-align: center;
}

.country-card .btn-primary:hover {
    background-color: #86B817;
}

/* Responsivité */
@media (max-width: 768px) {
    .activity-row {
        flex-wrap: wrap;
        gap: 15px;
    }
    .country-card {
        width: 100%;
    }
}
#activity-details {
    display: none; /* Par défaut, la section est masquée */
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 30px auto;
    text-align: left;
}

#activity-details h2 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

#activity-details img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 20px;
}

#activity-details p {
    font-size: 1rem;
    color: #555;
    margin-bottom: 20px;
    line-height: 1.6;
}

#activity-details h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #333;
    text-align: center;
}

#activity-details ul {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
}

#activity-details ul li {
    font-size: 1rem;
    color: #555;
    margin-bottom: 10px;
    position: relative;
    padding-left: 25px;
}

#activity-details ul li::before {
    content: "✔";
    position: absolute;
    left: 0;
    color: #86B817;
    font-size: 1.2rem;
    line-height: 1;
}

#activity-details .btn-primary {
    display: block;
    background-color: #86B817;
    color: white;
    padding: 12px 20px;
    font-size: 1rem;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    margin: 0 auto;
    text-align: center;
    width: fit-content;
}

#activity-details .btn-primary:hover {
    background-color: #86B817;
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


    <!-- Attractions Start -->
    <div class="container-fluid attractions py-5" style="padding-bottom: 100PX;">
        <div class="container attractions-section py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;"><br><br><br><br><br><br>
                <h1 class="display-5 text-white mb-4">Activités à Travers le Monde</h1>
                <h5 class="text-white mb-0">Découvrez des expériences inoubliables dans les destinations les plus fascinantes.
                </h5>
                <nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
    </ol>
</nav>
            </div>
           
            </div>
        </div>
    </div>
    <!-- Attractions End -->
   
    <section class="activities-section">
        <h2>Nos Activités</h2>
        
        <div class="activity-row">
            <div class="country-card">
                <img src="{{ asset('assets/img/paris-1.png') }}" alt="Paris">
                <h3>Paris, France</h3>
                <p>Découvrez les monuments emblématiques de Paris.</p>
                <button class="btn-primary" onclick="showDetails('paris')">Voir plus</button>
            </div>
            <div class="country-card">
                <img src="{{ asset('assets/img/italy-1.png') }}" alt="Rome">
                <h3>Rome, Italie</h3>
                <p>Visitez le Colisée et le Vatican.</p>
                <button class="btn-primary" onclick="showDetails('rome')">Voir plus</button>
            </div>
            <div class="country-card">
                <img src="{{ asset('assets/img/newyoek.png') }}" alt="New York">
                                <h3>New York, USA</h3>
                <p>Explorez Times Square et Central Park.</p>
                <button class="btn-primary" onclick="showDetails('newyork')">Voir plus</button>
            </div>
        </div>
    
        <div class="activity-row">
            <div class="country-card">
                <img src="{{ asset('assets/img/london-1.png') }}" alt="Londres">
                <h3>Londres, Royaume-Uni</h3>
                <p>Visitez le British Museum et Big Ben.</p>
                <button class="btn-primary" onclick="showDetails('londres')">Voir plus</button>
            </div>
            <div class="country-card">
                <img src="{{ asset('assets/img/barecalone.png') }}" alt="Barcelone">
                <h3>Barcelone, Espagne</h3>
                <p>Explorez la Sagrada Familia et la Rambla.</p>
                <button class="btn-primary" onclick="showDetails('barcelone')">Voir plus</button>
            </div>
            <div class="country-card">
                <img src="{{ asset('assets/img/tokyo-1.png') }}" alt="Tokyo">
                <h3>Tokyo, Japon</h3>
                <p>Découvrez les temples et le quartier d'Akihabara.</p>
                <button class="btn-primary" onclick="showDetails('tokyo')">Voir plus</button>
            </div>
        </div>
        <div id="activity-details" class="activity-detail" style="display: none;">
        <h2 id="activity-title"></h2>
        <img id="activity-image" src="" alt="Image Activité">
        <p id="activity-description"></p>
        <h3>Ce que vous allez faire :</h3>
        <ul id="activity-list"></ul>
        <a href="{{ route('booking') }}"><button class="btn-primary" >Réserver Maintenant</button></a>
    </div>
    </section>
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
    </script>
    <script>
    // Données des activités
    const activities = {
        paris: {
            title: "Paris, France",
            image: "{{ asset('assets/img/paris-1.png') }}",
            description: "Découvrez les monuments emblématiques de Paris, tels que la Tour Eiffel, le Louvre et Notre-Dame.",
            list: ["Visite de la Tour Eiffel", "Promenade sur les Champs-Élysées", "Visite du Louvre","Basilique du Sacré-Cœur","Arc de Triomphe"],
        },
        rome: {
            title: "Rome, Italie",
            image: "{{ asset('assets/img/italy-1.png') }}",
            description: "Randonnée et exploration des Cinque Terre",
            list: [" Monterosso","Vernazza" , "Corniglia", "Manarola", "Riomaggiore","Admirez les maisons colorées perchées sur les falaises"],
        },
        newyork: {
            title: "New York, USA",
            image: "{{ asset('assets/img/newyoek.png') }}",
            description: "Plongez dans l'énergie de New York, avec ses monuments iconiques et ses quartiers dynamiques.",
            list: ["Visite de Times Square", "Promenade à Central Park", "Découverte de l'Empire State Building"],
        },
        londres: {
        title: "Londres, Royaume-Uni",
        image: "{{ asset('assets/img/london-1.png') }}",
        description: "Explorez les attractions iconiques de Londres, telles que le Tower Bridge, le Palais de Buckingham et Big Ben.",
        list: [
            "Visite de la Tour de Londres",
            "Promenade sur le Tower Bridge",
            "Découverte du Palais de Buckingham",
            "Exploration du British Museum",
            "Balade dans Hyde Park"
        ],
    },
    barcelone: {
        title: "Barcelone, Espagne",
        image: "{{ asset('assets/img/barecalone.png') }}",
        description: "Découvrez l'architecture unique de Barcelone, avec des œuvres de Gaudí et des vues spectaculaires sur la mer Méditerranée.",
        list: [
            "Visite de la Sagrada Família",
            "Exploration du Parc Güell",
            "Balade sur La Rambla",
            "Découverte du Quartier Gothique",
            "Détente à la plage de Barceloneta"
        ],
    },
    tokyo: {
        title: "Tokyo, Japon",
        image: "{{ asset('assets/img/tokyo-1.png') }}",
        description: "Plongez dans la culture dynamique de Tokyo, entre traditions anciennes et modernité éclatante.",
        list: [
            "Visite du temple Senso-ji à Asakusa",
            "Découverte du marché de Tsukiji",
            "Balade dans le quartier animé de Shibuya",
            "Exploration du parc Ueno et de ses musées",
            "Ascension de la Tokyo Skytree pour une vue panoramique"
        ],
    },

    };

// Fonction pour afficher les détails d'une activité
function showDetails(country) {
    const activity = activities[country];
    
    // Mettre à jour les détails
    document.getElementById("activity-title").innerText = activity.title;
    document.getElementById("activity-image").src = activity.image;
    document.getElementById("activity-description").innerText = activity.description;

    // Mettre à jour la liste des activités
    const list = document.getElementById("activity-list");
    list.innerHTML = "";
    activity.list.forEach(item => {
        const li = document.createElement("li");
        li.innerText = item;
        list.appendChild(li);
    });

    // Afficher la section des détails
    document.getElementById("activity-details").style.display = "block";
}

    </script>
</body>

</html>