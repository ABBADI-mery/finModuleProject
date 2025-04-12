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
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

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
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

    <!-- Animations & AOS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
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
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Accueil</a>
                    <a href="{{ route('about') }}"
                        class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">À propos</a>
                    <a href="{{ route('service') }}"
                        class="nav-item nav-link {{ Request::is('service') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('package') }}"
                        class="nav-item nav-link {{ Request::is('package') ? 'active' : '' }}">Offres</a>
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

        <div class="container-fluid bg-primary py-5 mb-5 hero-header2" style="height: 600px;">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">À propos </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">À propos</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-1">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 " src="{{ asset('assets/img/imageabout2.png') }}"
                            style="height: 1000px;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-3 p-lg-2 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                        <h1 class="mb-3">Explorez le Monde avec VoyageFM : Votre Partenaire de Confiance pour des
                            Voyages Inoubliables</h1>
                        <p>VoyageFM est une agence de voyage dédiée à transformer vos rêves d’évasion en réalité. Que
                            vous cherchiez à explorer des destinations exotiques, à découvrir des merveilles culturelles
                            ou à profiter
                            d’un séjour relaxant, nous vous proposons des forfaits sur mesure adaptés à votre budget.
                            Grâce à notre expertise et notre passion pour les voyages, nous garantissons des expériences
                            mémorables et sans souci.
                            Chez VoyageFM, votre satisfaction est notre priorité, et nous nous engageons à vous offrir
                            un service de qualité pour chaque étape de votre aventure. Voyagez avec nous et découvrez le
                            monde autrement.
                            <br>Nos clients partagent avec nous leurs souvenirs de voyage, remplis d’émotions et
                            d’aventures. Chez VoyageFM, ces moments sont notre fierté
                        </p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="{{ asset('assets/img/about-1.jpg') }}" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="{{ asset('assets/img/about-2.jpg') }}" alt="">
                            </div>
                        </div>
                        <a href="#calery" class="btn btn-primary mt-1">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <br> <br><br>
    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Prix Compétitifs</h5>
                            <p class="m-1">Profitez des meilleures offres et des prix adaptés à tous les budgets pour
                                vos voyages de rêve.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px; ">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Services de Qualité</h5>
                            <p class="m-1">VoyageFM s'engage à vous offrir des prestations sur mesure et un service
                                client irréprochable.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Couverture Internationale</h5>
                            <p class="m-1">Explorez le monde sans limite grâce à notre réseau étendu et nos destinations
                                variées.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="faq-container">
        <h1 style="text-align: center ;">Préparez Votre Voyage avec VoyageFM</h1><br><br>
        <div class="question" onclick="toggleAnswer(1)">
            <p>Quels types de voyages propose VoyageFM ?</p>
            <div class="answer" id="answer-1">
                <p>VoyageFM offre une vaste gamme d'expériences de voyage adaptées à tous les types de voyageurs. Que
                    vous rêviez d’un séjour tout compris sur des plages paradisiaques,
                    d’un circuit culturel pour découvrir l’histoire et les traditions d’un pays, d’une escapade de luxe
                    dans des destinations prestigieuses, ou d’un voyage d’affaires
                    organisé dans les moindres détails, nous sommes là pour concrétiser vos envies. Nous proposons
                    également des aventures personnalisées, conçues sur mesure pour
                    répondre à vos attentes spécifiques, qu'il s'agisse de voyages en famille, entre amis ou en solo.
                    Chez VoyageFM, notre priorité est de vous offrir des souvenirs
                    inoubliables et des services d’excellence, quels que soient vos besoins ou vos désirs.</p>
            </div>
        </div>
        <div class="question" onclick="toggleAnswer(2)">
            <p>Est-ce que VoyageFM propose des voyages sur mesure ?</p>
            <div class="answer" id="answer-2">
                <p>nous offrons des voyages sur mesure adaptés à vos envies et besoins spécifiques.
                    Que vous souhaitiez un voyage romantique, une aventure en famille,
                    ou une exploration culturelle, notre équipe se charge de créer une expérience unique pour vous.</p>
            </div>
        </div>
        <div class="question" onclick="toggleAnswer(3)">
            <p>Comment puis-je obtenir des réductions ou des offres spéciales ?</p>
            <div class="answer" id="answer-3">
                <p>Pour bénéficier de réductions et d'offres spéciales, abonnez-vous à notre newsletter et suivez-nous
                    sur les réseaux sociaux. Nous publions régulièrement des promotions exclusives pour nos abonnés.</p>
            </div>
        </div>
        <div class="question" onclick="toggleAnswer(4)">
            <p>Quels documents sont nécessaires pour réserver un voyage ?</p>
            <div class="answer" id="answer-4">
                <p>Pour réserver un voyage, vous aurez généralement besoin d'une pièce d'identité (comme un passeport),
                    d'un moyen de paiement, et parfois de visas ou de documents spécifiques selon la destination.
                    Nos conseillers vous guideront à chaque étape.</p>
            </div>
        </div>
        <div class="question" onclick="toggleAnswer(5)">
            <p>Quels sont les modes de paiement acceptés ?</p>
            <div class="answer" id="answer-5">
                <p>Chez VoyageFM, nous acceptons plusieurs modes de paiement pour simplifier vos réservations. Vous
                    pouvez régler par carte de crédit (Visa, MasterCard, American Express), via PayPal pour des
                    transactions rapides et sécurisées, ou par virement bancaire.
                    Toutes nos méthodes de paiement sont protégées par des systèmes de sécurité avancés pour garantir la
                    confidentialité de vos informations. De plus, nous proposons des options flexibles, comme le
                    paiement en plusieurs fois, afin de rendre vos voyages
                    encore plus accessibles. Notre équipe est à votre disposition pour répondre à toutes vos questions
                    concernant le paiement. Avec VoyageFM, vous réservez en toute sérénité !</p>
            </div>
        </div>
        <div class="question" onclick="toggleAnswer(6)">
            <p>Puis-je modifier les dates de mon voyage après réservation ?</p>
            <div class="answer" id="answer-6">
                <p>Dans la plupart des cas, il est possible de modifier les dates de votre voyage. Cependant, cela
                    dépend des politiques de nos partenaires et des disponibilités. Contactez-nous dès que possible pour
                    effectuer une modification.</p>
            </div>
        </div>
    </div>
    <br><br>
    <!-- Gallery Start -->
    <div class="container-fluid gallery pb-5" id="calery">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Notre Galerie</h4>
                <h1 class="display-5 mb-4">Moments capturés à VoyageFM</h1>
                <p>Nos clients partagent avec nous leurs souvenirs inoubliables, immortalisant des instants précieux de
                    leurs voyages. Chaque photo raconte
                    une histoire unique, remplie d’émotions et d’aventures. Chez VoyageFM, ces moments deviennent notre
                    plus grande fierté.</p>
            </div>
            <div class="row g-4">
                <div class="col-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/img/gallery-1.jpg') }}" data-lightbox="gallery" data-title="Image 1">
                            <img src="{{ asset('assets/img/gallery-1.jpg') }}" class="img-fluid rounded w-100 h-100"
                                alt="Gallery Image">
                        </a>
                    </div>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/img/gallery-2.jpg') }}" data-lightbox="gallery" data-title="Image 2">
                            <img src="{{ asset('assets/img/gallery-2.jpg') }}" class="img-fluid rounded w-100 h-100"
                                alt="Gallery Image">
                        </a>
                    </div>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/img/gallery-3.jpg') }}" data-lightbox="gallery" data-title="Image 3">
                            <img src="{{ asset('assets/img/gallery-3.jpg') }}" class="img-fluid rounded w-100 h-100"
                                alt="Gallery Image">
                        </a>
                    </div>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/img/gallery-4.jpg') }}" data-lightbox="gallery" data-title="Image 4">
                            <img src="{{ asset('assets/img/gallery-4.jpg') }}" class="img-fluid rounded w-100 h-100"
                                alt="Gallery Image">
                        </a>
                    </div>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/img/gallery-5.jpg') }}" data-lightbox="gallery" data-title="Image 5">
                            <img src="{{ asset('assets/img/gallery-5.jpg') }}" class="img-fluid rounded w-100 h-100"
                                alt="Gallery Image">
                        </a>
                    </div>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/img/gallery-6.jpg') }}" data-lightbox="gallery" data-title="Image 6">
                            <img src="{{ asset('assets/img/gallery-6.jpg') }}" class="img-fluid rounded w-100 h-100"
                                alt="Gallery Image">
                        </a>
                    </div>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/img/gallery-7.jpg') }}" data-lightbox="gallery" data-title="Image 7">
                            <img src="{{ asset('assets/img/gallery-7.jpg') }}" class="img-fluid rounded w-100 h-100"
                                alt="Gallery Image">
                        </a>
                    </div>
                </div>
                <div class="col-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/img/gallery-10.jpg') }}" data-lightbox="gallery" data-title="Image 1">
                            <img src="{{ asset('assets/img/gallery-10.jpg') }}" class="img-fluid rounded w-100 h-100"
                                alt="Gallery Image">
                        </a>
                    </div>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/img/gallery-8.jpg') }}" data-lightbox="gallery" data-title="Image 8">
                            <img src="{{ asset('assets/img/gallery-8.jpg') }}" class="img-fluid rounded w-100 h-100"
                                alt="Gallery Image">
                        </a>
                    </div>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="gallery-item">
                        <a href="{{ asset('assets/img/gallery-9.jpg') }}" data-lightbox="gallery" data-title="Image 9">
                            <img src="{{ asset('assets/img/gallery-9.jpg') }}" class="img-fluid rounded w-100 h-100"
                                alt="Gallery Image">
                        </a>
                    </div>


                </div>
            </div>
        </div>
        <!-- Gallery End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Infos</h4>
                        <a class="btn btn-link" href="about.html">À propos</a>
                        <a class="btn btn-link" href="contact.html">Nous contacter</a>
                        <a class="btn btn-link" href="about.html">Politique de confidentialité</a>
                        <a class="btn btn-link" href="about.html">Conditions générales</a>
                        <a class="btn btn-link" href="about.html">FAQ et aide</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> Km 5, Route d'Essaouira,
                            B.P 2400, Marrakech, Maroc.</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>VoyageFM@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3"><a href="about.html.#calery" style="color: #fff">Galerie</a></h4>

                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-1.jpg') }}"
                                    alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-2.jpg') }}"
                                    alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-3.jpg') }}"
                                    alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-2.jpg') }}"
                                    alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-3.jpg') }}"
                                    alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('assets/img/package-1.jpg') }}"
                                    alt="">
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
        <script>
            function toggleAnswer(id) {
                const answer = document.getElementById(`answer-${id}`);
                if (answer.style.display === "block") {
                    answer.style.display = "none";
                } else {
                    answer.style.display = "block";
                }
            }

        </script>
        <!-- Template Javascript -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <!-- Lightbox2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/js/lightbox.min.js"></script>
</body>

</html>