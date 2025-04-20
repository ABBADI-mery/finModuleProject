<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Tableau de bord Administrateur - Gestion de Voyage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

    <style>
        /* Barre latérale */
        nav {
            background-color: #343a40;
            color: white;
            padding: 20px;
            height: 100vh; 
            position:fixed;
        }

        .nav-item {
            margin: 3px 0;
            padding: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            /* Alignement de l'icône et du texte */
            padding: 8px 15px;
            /* Espace autour du texte et de l'icône */
            border-radius: 5px;
            /* Coins arrondis pour les liens */
            transition: background-color 0.3s;
            /* Transition pour l'effet au survol */
            font-size: 16px;
        }

        .nav-link:hover {
            background-color: #495057;
            /* Couleur de fond au survol */
        }

        .nav-link i {
            margin-right: 10px;
            /* Espacement entre l'icône et le texte */
        }



        nav h3 {
            text-align: center;
            color: #1e7e34;
        }

        nav ul {
            list-style: none;
            padding-left: 0;
        }

        nav ul li {
            margin: 20px 0;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
        }

        nav ul li a:hover {
            color: #28a745;
        }

        /* Styles pour la carte */
        #map {
            height: 400px;
            width: 100%;
        }

        /* Tableau de bord */
        .dashboard {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            flex-wrap: wrap;
            padding: 20px;

        }

        /* Statistiques */
        .stats {
            width: 48%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .stats h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
        }

        .continent {
            margin-bottom: 20px;
        }

        canvas {
            width: 100%;
            height: 250px;
        }

        /* Styles pour les statistiques en ligne */
        .stats-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .continent {
            width: 48%;
            /* Largeur de chaque graphique */
            margin-bottom: 20px;
        }

        /* Réactivité */
        @media (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }

            .stats {
                width: 100%;
            }

            .stats-container {
                flex-direction: column;
            }

            .continent {
                width: 100%;
            }

            #map {
                height: 300px;
            }
        }

        .statsRes {
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;

            max-width: 100%;
            height: auto;
            margin-left: auto;
            /* Aligne à l'extrême droite */
            margin-right: 0;
            /* Supprime l'espacement sur la droite */
        }

        .statsT {
            flex: 1;
            background-color: #bde09d;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .card-container {
            display: flex;
            gap: 20px;
            /* Espace entre les cartes */
            justify-content: space-between;
            flex-wrap: wrap;
            /* Les cartes se déplacent sur la ligne suivante si la taille de l'écran est petite */
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            color: #333;
            padding: 20px;
            border-radius: 8px;
            width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card .count {
            font-size: 2rem;
            font-weight: bold;
            color: #4CAF50;
        }

        /* Si nécessaire, ajuster la taille et la mise en page */
        .card-container {
            display: flex;
            gap: 20px;
        }

        .card {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stats {
            margin-top: 30px;
        }

        .dashboard .d-flex {
            margin: 0;
            padding: 0;
        }

        nav {
            margin-left: 0;
            /* Supprime l'espace gauche du menu */
            padding-left: 0;
            /* Supprime les paddings du menu */
        }

        .container-fluid {
            padding: 0;
            /* Supprime tout padding dans le container global */
        } 
       .container-fluidG
                        {
                            width: 1020px;
                            margin-left: 260px;
                        }
                        .tout{
                            width: 1020px;
                            margin-left: 260px;

                        }
                        .guide-photo {
            width: 40px;          /* Taille de l'image circulaire */
            height: 40px;         /* Taille de l'image circulaire */
            border-radius: 50%;    /* Rend l'image circulaire */
            overflow: hidden;      /* Empêche l'image de déborder */
           
        }
        /*-------------------------------Guides---------------------------------*/
         /* Style pour la table */
         .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        .table th, .table td {
            text-align: center;
            padding: 9px;
            font-size: 16px;
        }
        
        .table-bordered {
            border: 1px solid #dee2e6;
        }

        /* Style pour les bordures de la table */
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }

        

        /* Style de survol de ligne */
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Style pour les en-têtes de la table */
        .table thead {
            background-color: #e7f3ca;
            color: white;
        }

        .table thead th {
            font-weight: bold;
        }

        /* Style pour les cellules du tableau */
        .table td {
            vertical-align: middle;
        }













        /* style.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 50px auto;
    text-align: center;
    width: 900px;
                            margin-left: 260px;
}

.chart-container {
    position: relative;
    width: 80%;
    height: 400px;
    margin: 0 auto;
}

h1 {
    color: #333;
    margin-bottom: 30px;
    font-size: 20px;
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

    <div class="container-fluid">
        <!-- Navbar & Sidebar -->
        <div class="d-flex">
            <!-- Barre latérale (fixe à gauche) -->
            <nav class="bg-dark text-white vh-100 p-3" style="width: 230px; ">
                <h3 class="text-primary text-center mb-4"><i class="fa fa-cogs me-2"></i>Panneau Admin</h3>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="index.html" class="nav-link text-white">
                            <i class="fa fa-tachometer-alt me-2"></i> Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="reservations.html" class="nav-link text-white">
                            <i class="fa fa-calendar-check me-2"></i> Réservations
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="Facturation.html" class="nav-link text-white">
                            <i class="fas fa-file-invoice-dollar"></i>Facturations
                        </a>
                    </li>
                   
                    <li class="nav-item mb-2">
                        <a href="connexion.html" class="nav-link text-white">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Contenu principal -->
            <div class="dashboard-content tout" style="flex-grow: 1; padding-left: 20px;">
                <!-- Section des statistiques globales -->
                <div class="statsT">
                    <h2>Statistiques Globales</h2>
                    <div class="card-container" style="display: flex; gap: 20px;">
                        <div class="card" style="flex: 1;">
                            <h3>Total Clients</h3>
                            <p class="count" id="total-clients">1500</p>
                        </div>
                        <div class="card" style="flex: 1;">
                            <h3>Total Réservations</h3>
                            <p class="count" id="total-reservations">1200</p>
                        </div>
                        <div class="card" style="flex: 1;">
                            <h3>Total Destinations</h3>
                            <p class="count" id="total-destinations">50</p>
                        </div>
                    </div>
                </div>

                <!-- Section Carte des Visites et Statistiques des Visites côte à côte -->
                <div style="display: flex; gap: 20px; margin-top: 30px;">
                    <!-- Carte des Visites -->
                    <div class="map-container" style="flex: 1;">
                        <h2>Carte des Visites</h2>
                        <div id="map" style="height: 400px;"></div>
                    </div>

                    <!-- Statistiques des Visites -->
                    <div class="stats">
                        <h2>Statistiques des Visites</h2>
                        <div class="stats-container">
                            <div class="continent">
                                <h3>Europe</h3>
                                <canvas id="europeChart"></canvas>
                            </div>
                            <div class="continent">
                                <h3>Amérique</h3>
                                <canvas id="americaChart"></canvas>
                            </div>
                            <div class="continent">
                                <h3>Afrique</h3>
                                <canvas id="africaChart"></canvas>
                            </div>
                            <div class="continent">
                                <h3>Océanie</h3>
                                <canvas id="oceaniaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="container-fluidG">
            <!-- Titre de la section -->
          <center>  <h5 class="mt-4">Liste des Guides de Voyage</h5></center>
            
            <!-- Table des guides de voyage -->
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemples de lignes de la table -->
                    <tr>
                        <td><img src="img/team-1.jpg" alt="Guide 1" class="guide-photo"></td>
                        <td>Paris, France</td>
                        <td>Jean Dupont</td>
                        <td>jean.dupont@email.com</td>
                    </tr>
                    <tr>
                        <td><img src="img/team-2.jpg" alt="Guide 2" class="guide-photo"></td>
                        <td>Rome, Italie</td>
                        <td>Maria Rossi</td>
                        <td>maria.rossi@email.com</td>
                    </tr>
                    <tr>
                        <td><img src="img/team-3.jpg" alt="Guide 3" class="guide-photo"></td>
                        <td>Tokyo, Japon</td>
                        <td>Takashi Sato</td>
                        <td>takashi.sato@email.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <h1>Total des Clients pour cette Année</h1>
            <div class="chart-container">
                <canvas id="clientsChart"></canvas>
            </div>
        </div>
        
        
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Script pour la carte -->
    <script>
        // Initialisation de la carte
        var map = L.map('map').setView([20, 0], 2); // Vue initiale au centre du monde

        // Ajout d'un fond de carte
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Ajout de marqueurs pour chaque pays
        var countries = [
            { name: "France", lat: 46.603354, lng: 1.888334, visits: 1200 },
            { name: "Allemagne", lat: 51.165691, lng: 10.451526, visits: 800 },
            { name: "États-Unis", lat: 37.09024, lng: -95.712891, visits: 3500 },
            { name: "Australie", lat: -25.274398, lng: 133.775136, visits: 400 },
            { name: "Brésil", lat: -14.235004, lng: -51.92528, visits: 950 },
            { name: "Afrique du Sud", lat: -30.559482, lng: 22.937506, visits: 700 }
        ];

        countries.forEach(function (country) {
            L.marker([country.lat, country.lng]).addTo(map)
                .bindPopup("<b>" + country.name + "</b><br>Visites : " + country.visits);
        });
    </script>

    <!-- Script pour les graphiques -->
    <script>
        // Graphiques pour chaque continent
        var europeChart = new Chart(document.getElementById('europeChart'), {
            type: 'bar',
            data: {
                labels: ['France', 'Allemagne'],
                datasets: [{
                    label: 'Visites',
                    data: [1200, 800],
                    backgroundColor: ['#4CAF50', '#8BC34A']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: { beginAtZero: true },
                    y: { beginAtZero: true }
                }
            }
        });

        var americaChart = new Chart(document.getElementById('americaChart'), {
            type: 'bar',
            data: {
                labels: ['États-Unis', 'Brésil'],
                datasets: [{
                    label: 'Visites',
                    data: [3500, 950],
                    backgroundColor: ['#FF5722', '#FFC107']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: { beginAtZero: true },
                    y: { beginAtZero: true }
                }
            }
        });

        var africaChart = new Chart(document.getElementById('africaChart'), {
            type: 'bar',
            data: {
                labels: ['Afrique du Sud'],
                datasets: [{
                    label: 'Visites',
                    data: [700],
                    backgroundColor: ['#009688']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: { beginAtZero: true },
                    y: { beginAtZero: true }
                }
            }
        });

        var oceaniaChart = new Chart(document.getElementById('oceaniaChart'), {
            type: 'bar',
            data: {
                labels: ['Australie'],
                datasets: [{
                    label: 'Visites',
                    data: [400],
                    backgroundColor: ['#03A9F4']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: { beginAtZero: true },
                    y: { beginAtZero: true }
                }
            }
        });

        // Données pour le diagramme
        const reservationsData = {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            datasets: [{
                label: 'Nombre de Réservations',
                data: [120, 150, 180, 200, 220, 250, 300, 320, 290, 270, 240, 200], // Exemple de données
                backgroundColor: [
                    '#4CAF50', '#8BC34A', '#FF9800', '#FFC107', '#03A9F4',
                    '#009688', '#FF5722', '#E91E63', '#9C27B0', '#673AB7',
                    '#3F51B5', '#CDDC39'
                ],
                borderWidth: 1,
                borderColor: '#ccc'
            }]
        };

        // Options pour personnaliser le diagramme
        const chartOptions = {
            responsive: true,
            plugins: {
                legend: {
                    display: true, // Affiche la légende
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true // Commence l'axe Y à zéro
                }
            }
        };

        // Création du graphique avec Chart.js
        const ctx = document.getElementById('reservationsChart').getContext('2d');
        const reservationsChart = new Chart(ctx, {
            type: 'bar', // Type du diagramme : barres
            data: reservationsData,
            options: chartOptions
        });

        // Exemple de données dynamiques
        let totalClients = 1500;  // Remplacez cette valeur par celle venant de votre base de données
        let totalReservations = 1200;  // Remplacez cette valeur par celle venant de votre base de données
        let totalDestinations = 50;  // Remplacez cette valeur par celle venant de votre base de données

        // Mettez à jour les cartes avec les données dynamiques
        document.getElementById("total-clients").textContent = totalClients;
        document.getElementById("total-reservations").textContent = totalReservations;
        document.getElementById("total-destinations").textContent = totalDestinations;







        

    </script>
     <script src="script.js"></script>
</body>

</html>