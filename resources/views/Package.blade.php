<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>-OffresTourist</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
    
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
    
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    
        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <style
    >.packages-carousel {
        display: flex;
        gap: 20px;
        justify-content: center;
    }
    
    .packages-img {
        position: relative;
        overflow: hidden;
        border-radius: 15px 15px 0 0;
    }
    .packages-img:hover{
        color: #265301;
    }
    
    .packages-price {
        position: absolute;
        top: 0;
        right: 0;
        background: #78c103;
        color: #fff;
        font-size: 1rem;
        padding: 5px 15px;
        border-radius: 0 0 15px 15px;
        z-index: 10;
    }
    
    .packages-item:hover .packages-img img {
        transform: scale(1.1);
        transition: all 0.3s ease-in-out;
    }
    
    .packages-info {
        background: rgba(255, 255, 255, 0.8);
        position: absolute;
        bottom: 0;
        width: 100%;
        z-index: 5;
    }
    
    /* Flèches positionnées à côté du titre */
.mx-auto {
    position: relative; /* Pour que les flèches puissent être positionnées au-dessus */
}

.arrow-left, .arrow-right {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 30px; /* Taille des flèches */
    color: #28a745; /* Couleur des flèches (vert) */
    cursor: pointer;
    z-index: 10; /* Pour que les flèches soient toujours visibles */
}

/* Flèche gauche */
.arrow-left {
    left: -40px; /* Positionner la flèche à gauche du titre */
}

/* Flèche droite */
.arrow-right {
    right: -40px; /* Positionner la flèche à droite du titre */
}

/* Effet au survol des flèches */
.arrow-left:hover, .arrow-right:hover {
    color: #3d8404; /* Couleur plus sombre au survol */
}

.packages .packages-item .packages-img {
    position: relative;
    overflow: hidden;
    transition: 0.5s;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    z-index: 1;
    
}
.img-fluid {
    max-width: 100%;
    height: 250px;
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
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>VoyageFM</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.html" class="nav-item nav-link ">Accueil</a>
                <a href="about.html" class="nav-item nav-link">À propos</a>
                <a href="service.html" class="nav-item nav-link ">Services</a>
                <a href="package.html" class="nav-item nav-link active">Offres</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="destination.html" class="dropdown-item">Destination</a>
                        <a href="booking.html" class="dropdown-item">Réservation</a>
                        <a href="team.html" class="dropdown-item">Guides de voyage</a>
                        <a href="testimonial.html" class="dropdown-item">Témoignage</a>
                       <a href="Activity.html" class="dropdown-item">Activité</a>
                        <a href="planification.html" class="dropdown-item">Planification de voyage</a>
                    </div>
                </div>
            </div>
            <a href="contact.html" class="btn btn-primary rounded-pill py-2 px-4">Contact</a>
        </div>
    </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header7">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Offres</h1>
                        <h5 class="mb-2" style="color: aliceblue;">Découvrez des offres exceptionnelles pour des destinations de rêve. Plages paradisiaques, villes historiques ou aventures inoubliables : trouvez le voyage qui vous ressemble et laissez-nous réaliser vos envies d’évasion.</h5>
                        <br>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Offres</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


        

      

       

        

        <!-- Packages Start -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                
                <div class="mx-auto text-center mb-5" style="max-width: 900px; position: relative;">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title bg-white text-center text-primary px-3">Offres</h6>
                        <h1 class="mb-5">Offres Incroyables</h1>
                    </div>
                   
                    <!-- Flèches de navigation avec nouvelles icônes -->
                        <span class="arrow-left"><i class="fa fa-arrow-left"></i></span>
                        <span class="arrow-right"><i class="fa fa-arrow-right"></i></span>
                                        </div>
                <div class="packages-carousel owl-carousel">
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="img/offreItaly.jpeg" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>Venise - Italie</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>3 Jours</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>2 Personne</small>
                            </div>
                            <div class="packages-price py-2 px-4">$349.00</div>
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0">Venise - Italie</h5>
                                <small class="text-uppercase">The Gritti Palace Hôtel</small>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                                <p class="mb-4">Découvrez la magie de Venise, ses canaux romantiques, ses gondoles emblématiques et son patrimoine historique unique.</p>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">Voir plus </a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="booking.html" class="btn-hover btn text-white py-2 px-4">Réservez </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="img/OffreCap.jpeg" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>Cape Town</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>3 Jours</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>5 Personne </small>
                            </div>
                            <div class="packages-price py-2 px-4">$249.00</div>
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0">Cape Town-Afrique du Sud</h5>
                                <small class="text-uppercase">The Silo Hotel</small>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                                <p class="mb-4">Cape Town est une ville côtière spectaculaire, célèbre pour sa montagne de la Table, ses plages et son ambiance cosmopolite.</p>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">Voir plus </a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="booking.html" class="btn-hover btn text-white py-2 px-4">Réservez</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="img/OffreChefchaouen.jpeg" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>Chefchaouen-Maroc</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>6 Jours</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>2 Personne</small>
                            </div>
                            <div class="packages-price py-2 px-4">$149.00</div>
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0">Chefchaouen-Maroc</h5>
                                <small class="text-uppercase">Lina Ryad & Spa</small>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                                <p class="mb-4">Chefchaouen, surnommée la "ville bleue", est un charmant village niché dans les montagnes du Rif, célèbre pour ses rues et bâtiments peints en bleu.</p>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">Voir plus</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="booking.html" class="btn-hover btn text-white py-2 px-4">Réservez</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="img/offrethayland.jpeg" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i> Bangkok-Thaïlande</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>6 Jours</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>4 Personnne</small>
                            </div>
                            <div class="packages-price py-2 px-4">$449.00</div>
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0">Bangkok-Thaïlande</h5>
                                <small class="text-uppercase">The Siam Hotel </small>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                                <p class="mb-4">Bangkok, capitale vibrante de la Thaïlande, offre un mélange de culture, de temples majestueux et de vie nocturne animée,Bangkok est un véritable culturel.</p>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">Voir plus</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="booking.html" class="btn-hover btn text-white py-2 px-4">Réservez</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="img/offreBrésil.jpeg" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>Rio de Janeiro-Brésil</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>3 Jours</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>2 Personne</small>
                            </div>
                            <div class="packages-price py-2 px-4">$549.00</div>
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0">Rio de Janeiro-Brésil</h5>
                                <small class="text-uppercase">Copacabana Palace</small>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                                <p class="mb-4">Rio de Janeiro, célèbre pour ses plages spectaculaires, le Christ Rédempteur et le carnaval, est une ville pleine de vie et de couleurs.</p>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">Voir plus</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="booking.html" class="btn-hover btn text-white py-2 px-4">Réservez</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="img/offreEgypte.jpeg" class="img-fluid w-100 rounded-top" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>Le Caire, Égypte</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>3 days</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>2 Person</small>
                            </div>
                            <div class="packages-price py-2 px-4">$649.00</div>
                        </div>
                        <div class="packages-content bg-light">
                            <div class="p-4 pb-0">
                                <h5 class="mb-0">Le Caire, Égypte</h5>
                                <small class="text-uppercase">Marriott Mena House</small>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                                <p class="mb-4">Le Caire,abrite les célèbres pyramides de Gizeh, le Sphinx et de nombreux trésors antiques qui témoignent de l'ancienne civilisation égyptienne.</p>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="#" class="btn-hover btn text-white py-2 px-4">Voir plus</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="booking.html" class="btn-hover btn text-white py-2 px-4">Réservez</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Packages End -->
         
<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Company</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">FAQs & Help</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3" ><a href="about.html.#calery" style="color: #fff">Gallery</a></h4>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1"  style="height: 60px ; width: 200px;" src="img/package-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" style="height: 60px ; width: 200px;"  src="img/package-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" style="height: 60px ; width: 200px;"  src="img/package-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1 " style="height: 60px ; width: 200px;" src="img/package-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1"  style="height: 60px ; width: 200px;" src="img/package-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" style="height: 60px ; width: 200px;"  src="img/package-1.jpg" alt="">
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
</div>
<!-- Footer End -->



<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

        
  

        
        
        

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
        

        <!-- Template Javascript -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const spinner = document.getElementById('spinner');
                if (spinner) spinner.classList.remove('show');
    
                $(".packages-carousel").owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: true,
                    autoplay: true,
                    responsive: {
                        0: { items: 1 },
                        768: { items: 2 },
                        992: { items: 3 }
                    }
                });
            });
            

            $(document).ready(function() {
        // Initialisation du carrousel
        $(".packages-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: false, // Vous n'avez pas besoin des flèches par défaut
            items: 1 // Par exemple, afficher une image à la fois
        });

        // Lier les flèches à l'action du carrousel
        $(".arrow-left").click(function() {
            $(".packages-carousel").trigger('prev.owl.carousel');
        });

        $(".arrow-right").click(function() {
            $(".packages-carousel").trigger('next.owl.carousel');
        });
    });
        </script>
        <script src="js/main.js"></script>
        

    </body>

</html>