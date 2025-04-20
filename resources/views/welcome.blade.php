<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

    <!-- Animations & AOS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
        <a href="{{ route('connexion') }}"  class="btn btn-primary rounded-pill py-2 px-4">Login</a>
        </div>
        
</nav>

        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header1">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Profitez de vos vacances avec nous</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown" style="font-family: ZZ;">Nous vous souhaitons la bienvenue ! Comptez sur notre savoir-faire pour vivre des expériences mémorables,
                            profiter de services d’excellence, et créer des souvenirs impérissables.</p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                            <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Ex: Thailand">
                            <a href="destination.html"> <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Recherche</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->



    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('assets/img/image1.png') }}" alt="" style="object-fit: cover; height: 40px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Bienvenue chez <span class="text-primary">VoyageFM</span></h1>
                    <p class="mb-4">Notre agence de voyage est bien plus qu’un simple service, c’est votre porte d’entrée vers des expériences extraordinaires. Spécialistes en organisation de séjours sur mesure, nous mettons tout en œuvre pour transformer vos rêves d’évasion en réalité. Que vous souhaitiez explorer des destinations exotiques, découvrir des cultures fascinantes ou simplement vous détendre dans des lieux paradisiaques, notre équipe expérimentée est là pour vous guider à chaque étape.</p>

                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Vols en première classe</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Hébergement 5 étoiles</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>150 visites guidées de la ville haut de gamme</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Hôtels triés sur le volet</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Véhicules de dernière génération</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Service 24h/24 et 7j/7</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="about.html">voir détails</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4 " style="margin-left: 30px;"><span class="text-primary">VoyageFM</span>: Votre Passeport Vers l’Évasion</h1>
                    <p class="mb-4" style="margin-left: 30px;">Évadez-vous vers des horizons lointains où chaque détail est pensé pour votre confort et votre émerveillement.
                        Chez VoyageFM, nous vous proposons des itinéraires soigneusement élaborés, mêlant découvertes culturelles, détente et aventure.
                        Que ce soit pour un séjour en bord de mer, une escapade en montagne ou une immersion dans des villes vibrantes,
                        nous transformons vos rêves de voyage en réalité. Avec notre réseau
                        d'experts locaux et notre engagement pour des expériences authentiques, chaque moment devient une histoire à raconter.</p>

                    <a class="btn btn-primary py-3 px-5 mt-2" href="about.html" style="margin-left : 30px;">voir détails</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <video autoplay loop muted style="height: 500px; margin-top: 10px ;width: 550px;">
                        <source src="{{ asset('assets/img/vid1.mp4') }}" type="video/mp4"> <!-- Vidéo en format MP4 -->
                        <source src="{{ asset('assets/img/vid1.webm') }}" type="video/webm"> <!-- Vidéo en format WebM -->

                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br>
    <!-- temp Start -->

    <div id="gtco-features" data-aos="fade-up" class="feature-center animate__animated animate__fadeIn">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-9 col-md-offset-2 text-center gtco-heading animate-box">
                    <br>
                    <h2>Comment ça marche</h2>
                    <p>Organiser un voyage n’a jamais été aussi simple. Suivez ces étapes faciles et laissez-nous prendre soin de chaque détail pour créer une expérience unique, personnalisée et sans stress. Avec notre expertise, votre aventure commence ici.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i>1</i>
                        </span>
                        <h3>Faites votre demande</h3>
                        <p>Choisissez votre destination, vos dates, et indiquez vos préférences. Notre équipe vous propose des options sur mesure adaptées à vos envies et à votre budget.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i>2</i>
                        </span>
                        <h3>Nous planifions tout pour vous</h3>
                        <p> De la réservation des vols aux hébergements en passant par les activités et les transferts, nous organisons chaque détail de votre voyage pour que vous puissiez voyager l’esprit tranquille.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i>3</i>
                        </span>
                        <h3>Profitez de votre aventure</h3>
                        <p>Il ne vous reste plus qu’à profiter pleinement de votre voyage ! Avec notre assistance 24/7, vous êtes entre de bonnes mains tout au long de votre séjour.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="gtco-cover gtco-cover-sm" style="background-image: url(assets/img/section.png)" data-stellar-background-ratio="0.5" data-aos="fade-up" class="feature-center animate__animated animate__fadeIn">
        <div class="overlay"></div>
        <div class="gtco-container text-center">
            <div class="display-t">
                <div class="display-tc">
                    <h1>Nous avons des services de haute qualité que vous allez sûrement adorer !</h1>
                </div>
            </div>
        </div>
    </div>

    <div id="gtco-counter" class="gtco-section" data-aos="fade-up" class="feature-center animate__animated animate__fadeIn">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box" id="t">
                    <br>
                    <h2>Notre succès</h2>
                    <p>Depuis notre création, nous avons accompagné des milliers de voyageurs dans la réalisation de leurs rêves. Grâce à notre expertise, notre attention aux détails et notre engagement envers la satisfaction client, nous avons construit une réputation de confiance et d’excellence dans le domaine du voyage</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="feature-center">
                        <span class="counter js-counter" data-from="0" data-to="196" data-speed="5000" data-refresh-interval="50">0</span>
                        <span class="counter-label">Destination</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="feature-center">
                        <span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">0</span>
                        <span class="counter-label">Hôtels</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="feature-center">
                        <span class="counter js-counter" data-from="0" data-to="12402" data-speed="5000" data-refresh-interval="50">0</span>
                        <span class="counter-label">Les voyageurs</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="feature-center">
                        <span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">0</span>
                        <span class="counter-label">Clients satisfaits</span>
                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        AOS.init();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll(".js-counter");

            const animateCounters = () => {
                counters.forEach(counter => {
                    const from = +counter.getAttribute("data-from");
                    const to = +counter.getAttribute("data-to");
                    const speed = +counter.getAttribute("data-speed");
                    const refreshInterval = +counter.getAttribute("data-refresh-interval");

                    let currentValue = from;
                    const increment = (to - from) / (speed / refreshInterval);

                    const updateCounter = () => {
                        currentValue += increment;

                        if (currentValue < to) {
                            counter.textContent = Math.floor(currentValue);
                            setTimeout(updateCounter, refreshInterval);
                        } else {
                            counter.textContent = to;

                            // Réinitialiser après un délai
                            setTimeout(() => {
                                counter.textContent = from;
                                animateCounters(); // Relancer l'animation
                            }, 2000); // Pause avant de recommencer
                        }
                    };

                    updateCounter();
                });
            };

            animateCounters();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.stellar.js/0.6.2/jquery.stellar.min.js"></script>
    <script>
        $(function() {
            $(window).stellar();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const options = {
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-slide-up');
                    }
                });
            }, options);

            document.querySelectorAll('.feature-center').forEach(el => {
                observer.observe(el);
            });
        });
        document.getElementById("searchBar").addEventListener("input", function() {
            const searchValue = this.value.toLowerCase();
            const destinations = document.querySelectorAll(".destination-card");

            destinations.forEach(card => {
                const destinationName = card.querySelector(".destination-title").textContent.toLowerCase();
                if (destinationName.includes(searchValue)) {
                    card.style.display = "block"; // Affiche la carte
                } else {
                    card.style.display = "none"; // Cache la carte
                }
            });
        });
    </script>





    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>

</html>