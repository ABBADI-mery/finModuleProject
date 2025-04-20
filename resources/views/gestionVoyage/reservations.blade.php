<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord des Réservations</title>
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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
        }

        /* Content */
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        h1, h2 {
            color: #333;
        }
        .dashboard-summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .summary-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin: 0 10px;
            text-align: center;
        }
        .summary-card h3 {
            margin-top: 0;
            font-size: 22px;
        }
        .summary-card:nth-child(1) {
            background-color: #4CAF50;
            color: white;
        }
        .summary-card:nth-child(2) {
            background-color: #FFC107;
            color: white;
        }
        .summary-card:nth-child(3) {
            background-color: #008CBA;
            color: white;
        }
        .summary-card:nth-child(4) {
            background-color: #f44336;
            color: white;
        }
        .filters {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
       
        .action-buttons button {
            margin-right: 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            color: #fff;
        }
        .modify { background-color: #4CAF50; }
        .cancel { background-color: #f44336; }
        .confirm { background-color: #008CBA; }
        .contact { background-color: #555; }
        .charts-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .chart-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            margin: 0 10px;
        }
        .chart-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        canvas {
            max-width: 100%;
        }
        nav {
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 160px;
            overflow-y: auto;
        }

        /* Titre de la barre latérale */
        nav h3 {
            text-align: center;
            color: #1ca717;
            margin-bottom: 20px;
        }

        /* Suppression des marges et espacements par défaut dans la liste */
        nav ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        /* Suppression de l'espace entre les éléments du menu */
        nav ul li {
            margin: 0;
        }

        /* Style pour les liens du menu */
        nav ul li a {
            display: block;
            /* Forcer chaque lien à occuper toute la largeur */
            padding: 10px 15px;
            /* Espacement autour du texte */
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            border-radius: 5px;
            /* Coins arrondis */
            transition: background-color 0.3s;
        }

        /* Effet au survol des éléments du menu */
        nav ul li a:hover {
            background-color: #495057;
            color: #28a745;
        }

        /* Style pour les icônes */
        nav ul li a i {
            margin-right: 10px;
            /* Espacement entre l'icône et le texte */
        }
        .aa {
    background-color: #007bff; /* Bleu */
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
    font-weight: bold;
}

.aa:hover {
    background-color: #0056b3; /* Bleu plus foncé au survol */
    transform: scale(1.05); /* Effet d'agrandissement au survol */
    box-shadow: 0 4px 10px rgba(0, 123, 255, 0.4); /* Ombre portée au survol */
}

.aa:focus {
    outline: none;
}

.aa:active {
    background-color: #004085; /* Bleu très foncé lors du clic */
    transform: scale(1); /* Retrait de l'effet d'agrandissement */
}
/* Style des boutons Modifier et Supprimer */
.modify {
    background-color: #4CAF50; /* Vert pour "Modifier" */
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
    font-weight: bold;
}

.modify:hover {
    background-color: #45a049; /* Vert foncé au survol */
    transform: scale(1.05); /* Agrandissement au survol */
    box-shadow: 0 4px 10px rgba(76, 175, 80, 0.4); /* Ombre portée */
}

.modify:focus {
    outline: none;
}

.modify:active {
    background-color: #388e3c; /* Vert très foncé au clic */
    transform: scale(1); /* Retrait de l'agrandissement */
}

/* Style des boutons Supprimer */
.cancel {
    background-color: #f44336; /* Rouge pour "Supprimer" */
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
    font-weight: bold;
}

.cancel:hover {
    background-color: #e53935; /* Rouge foncé au survol */
    transform: scale(1.05); /* Agrandissement au survol */
    box-shadow: 0 4px 10px rgba(244, 67, 54, 0.4); /* Ombre portée */
}

.cancel:focus {
    outline: none;
}

.cancel:active {
    background-color: #c62828; /* Rouge très foncé au clic */
    transform: scale(1); /* Retrait de l'agrandissement */
}

        /* Assurer que la barre latérale occupe toute la hauteur de la page */
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="bg-dark text-white vh-100 p-3" style="width: 250px;">
        <h3 class="text-primary text-center mb-3"><i class="fa fa-calendar-check me-2" style="margin-top: 10px;"></i>Réservations</h3>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="index.html" class="nav-link text-white"><i class="fa fa-tachometer-alt me-2"></i> Tableau de bord</a>
            </li>
            <li class="nav-item mb-2">
                <a href="reservations.html" class="nav-link text-white"><i class="fa fa-calendar-check me-2"></i> Réservations</a>
            </li>
            <li class="nav-item mb-2">
                <a href="Facturation.html" class="nav-link text-white"><i class="fas fa-file-invoice-dollar"></i> Facturations</a>
            </li>
            <li class="nav-item mb-2">
                <a href="connexion.html" class="nav-link text-white"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </li>
        </ul>
    </nav>

    <!-- Content -->
    <div class="content">
        <h1>Tableau de Bord des Réservations</h1>

        <!-- Summary -->
        <div class="dashboard-summary">
            <div class="summary-card">
                <h3>Total des Réservations</h3>
                <p id="total-reservations">0</p>
            </div>
            <div class="summary-card">
                <h3>Confirmées</h3>
                <p id="confirmed-reservations">0</p>
            </div>
            <div class="summary-card">
                <h3>Annulées</h3>
                <p id="cancelled-reservations">0</p>
            </div>
        </div>

        <!-- Add Reservation Form -->
        <div class="filters">
            <h2>Ajouter une Réservation</h2>
            <input type="text" id="client-name" placeholder="Nom du Client">
            <input type="datetime-local" id="reservation-date">
            <select id="reservation-status">
                <option value="Confirmée">Confirmée</option>
                <option value="Annulée">Annulée</option>
            </select>
            <select id="reservation-service">
                <option value="Hôtel">Hôtel</option>
                <option value="Activity">Activity</option>
                <option value="Vol">Vol</option>
            </select>
            <button onclick="addReservation()" class="aa">Ajouter</button>
        </div>

        <!-- Reservations Table -->
        <table id="reservations-table">
            <thead>
                <tr style="color:#383737">
                    <th>ID</th>
                    <th>Nom du Client</th>
                    <th>Date/Heure</th>
                    <th>Statut</th>
                    <th>Type de Service</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="reservations-tbody">
                <!-- Dynamically populated rows will go here -->
            </tbody>
        </table>
        <!-- Modal or Form for editing reservation -->
<div id="edit-form" style="display:none;">
    <h2>Modifier la Réservation</h2>
    <input type="text" id="edit-client-name" placeholder="Nom du Client">
    <input type="datetime-local" id="edit-reservation-date">
    <select id="edit-reservation-status">
        <option value="Confirmée" >Confirmée</option>
        <option value="Annulée" >Annulée</option>
    </select>
    <select id="edit-reservation-service">
        <option value="Hôtel">Hôtel</option>
        <option value="Activity">Activity</option>
        <option value="Vol">Vol</option>
    </select>
    <button onclick="saveReservation()" class="aa">Enregistrer</button>
    <button onclick="cancelEdit()" class="aa">Annuler</button>
</div>
 <br><br>

        <!-- Statistics Charts -->
        <h2>Statistiques des Réservations</h2>
        <div class="charts-container" style="color:#383737">
            <div class="chart-container">
                <div class="chart-title">Réservations Mensuelles</div>
                <canvas id="monthlyChart"></canvas>
            </div>

            <div class="chart-container">
                <div class="chart-title">Répartition des Types de Réservations</div>
                <canvas id="typeChart"></canvas>
            </div>

            <div class="chart-container">
                <div class="chart-title">Statut des Réservations</div>
                <canvas id="statusChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Initial data
        let reservations = [
            {id: 1, client: 'Jean Dupont', date: '2024-12-01 10:00', status: 'Confirmée', service: 'Hôtel'},
            {id: 2, client: 'Marie Curie', date: '2024-12-05 14:30', status: 'Annulée', service: 'Hôtel'},
            {id: 3, client: 'Albert Einstein', date: '2024-12-10 09:00', status: 'Annulée', service: 'Activity'}
        ];

        // Function to update the table
        function updateTable() {
            const tbody = document.getElementById('reservations-tbody');
            tbody.innerHTML = '';
            reservations.forEach(reservation => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${reservation.id}</td>
                    <td>${reservation.client}</td>
                    <td>${reservation.date}</td>
                    <td>${reservation.status}</td>
                    <td>${reservation.service}</td>
                    <td>
                       <button class="modify" onclick="editReservation(${reservation.id})">Modifier</button>
                       <button class="cancel" onclick="deleteReservation(${reservation.id})">Supprimer</button>

                    </td>
                `;
                tbody.appendChild(row);
            });

            updateSummary();
            updateCharts();
        }

        // Function to update summary (totals)
        function updateSummary() {
            const totalReservations = reservations.length;
            const confirmedReservations = reservations.filter(r => r.status === 'Confirmée').length;
            const cancelledReservations = reservations.filter(r => r.status === 'Annulée').length;

            document.getElementById('total-reservations').innerText = totalReservations;
            document.getElementById('confirmed-reservations').innerText = confirmedReservations;
            document.getElementById('cancelled-reservations').innerText = cancelledReservations;
        }

        // Function to update charts
        function updateCharts() {
            // Monthly chart
            const monthlyData = {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Nombre de réservations',
                    data: Array(12).fill(0).map((_, index) => reservations.filter(r => new Date(r.date).getMonth() === index).length),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };

            const typeData = {
                labels: ['Hôtel', 'Activity', 'Vol'],
                datasets: [{
                    data: [
                        reservations.filter(r => r.service === 'Hôtel').length,
                        reservations.filter(r => r.service === 'Activity').length,
                        reservations.filter(r => r.service === 'Vol').length
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)'
                    ]
                }]
            };

            const statusData = {
                labels: ['Confirmée', 'Annulée'],
                datasets: [{
                    data: [
                        reservations.filter(r => r.status === 'Confirmée').length,
                        reservations.filter(r => r.status === 'Annulée').length
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(255, 99, 132, 0.8)'
                    ]
                }]
            };

            new Chart(document.getElementById('monthlyChart'), {
                type: 'bar',
                data: monthlyData,
                options: { responsive: true, plugins: { legend: { display: false } } }
            });

            new Chart(document.getElementById('typeChart'), {
                type: 'pie',
                data: typeData,
                options: { responsive: true, plugins: { legend: { position: 'top' } } }
            });

            new Chart(document.getElementById('statusChart'), {
                type: 'pie',
                data: statusData,
                options: { responsive: true, plugins: { legend: { position: 'top' } } }
            });
        }

        // Function to add a reservation
        function addReservation() {
            const clientName = document.getElementById('client-name').value;
            const reservationDate = document.getElementById('reservation-date').value;
            const reservationStatus = document.getElementById('reservation-status').value;
            const reservationService = document.getElementById('reservation-service').value;

            const newReservation = {
                id: reservations.length + 1,
                client: clientName,
                date: reservationDate,
                status: reservationStatus,
                service: reservationService
            };

            reservations.push(newReservation);
            updateTable();
        }

        // Function to edit a reservation
        function editReservation(id) {
            alert('Modification de la réservation ID: ' + id);
        }

        // Function to delete a reservation
        function deleteReservation(id) {
            reservations = reservations.filter(r => r.id !== id);
            updateTable();
        }

        // Initial table and charts update
        updateTable();
        let editingReservation = null;

function editReservation(id) {
    // Trouver la réservation à modifier
    editingReservation = reservations.find(r => r.id === id);

    // Remplir le formulaire d'édition avec les données de la réservation
    document.getElementById('edit-client-name').value = editingReservation.client;
    document.getElementById('edit-reservation-date').value = editingReservation.date;
    document.getElementById('edit-reservation-status').value = editingReservation.status;
    document.getElementById('edit-reservation-service').value = editingReservation.service;

    // Afficher le formulaire d'édition
    document.getElementById('edit-form').style.display = 'block';
}

function saveReservation() {
    // Mettre à jour la réservation avec les nouvelles valeurs
    editingReservation.client = document.getElementById('edit-client-name').value;
    editingReservation.date = document.getElementById('edit-reservation-date').value;
    editingReservation.status = document.getElementById('edit-reservation-status').value;
    editingReservation.service = document.getElementById('edit-reservation-service').value;

    // Masquer le formulaire d'édition
    document.getElementById('edit-form').style.display = 'none';

    // Mettre à jour le tableau et les statistiques
    updateTable();
}

function cancelEdit() {
    // Masquer le formulaire d'édition sans enregistrer
    document.getElementById('edit-form').style.display = 'none';
}

    </script>
</body>
</html>