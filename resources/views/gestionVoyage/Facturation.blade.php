<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Facture- Gestion de Voyage</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


    <style>
        /* Barre latérale */
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
            color: #1e7e34;
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

        /* Assurer que la barre latérale occupe toute la hauteur de la page */
        body {
            display: flex;
            flex-direction: row;
            margin: 0;
        }

        .stats-section {
            margin-left: 260px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .stat-card {
            background-color: #e3eece;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 200px;
            height: 120px;
        }

        .chart-container {
            width: 300px;
            height: 300px;
        }

        /* Style pour la section du formulaire */
        .form-section {
            margin: 30px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Titre du formulaire */
        .form-section h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Style des champs de saisie */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #bbe29e;
            box-shadow: 0 0 5px rgba(154, 201, 115, 0.5);
        }

        /* Style du bouton de soumission */
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Ajouter une petite marge entre les éléments du formulaire */
        .form-section .form-group {
            margin-bottom: 25px;
        }

       

        /* Ajouter un petit espacement entre les éléments */
        .form-group input[type="text"],
        .form-group input[type="number"] {
            margin-top: 8px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex">
            <!-- Barre latérale -->
            <nav class="bg-dark text-white vh-100 p-3" style="width: 230px;">
                <h3 class="text-primary text-center mb-3"><i class="fas fa-file-invoice-dollar"></i>Facturations</h3>
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

            <!-- Section principale -->
            <div class="container-fluid">
                <!-- Statistiques Globales avec Diagramme Circulaire -->
                <div class="stats-section" style="margin-left: 250px; width: calc(100% - 250px);">
                    <!-- Canvas pour le diagramme circulaire -->
                    <div class="chart-container" style="margin-bottom: 30px;">
                        <canvas id="factureChart"></canvas>
                    </div>

                    <!-- Cartes des statistiques -->
                    <div class="stat-cards" style="display: flex; justify-content: space-between; width: 100%; margin-bottom: 30px;">
                        <div class="stat-card" style="flex: 1; padding: 10px; margin-right: 10px; background-color: #d6efbc; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <h5>Total des Factures</h5>
                            <p class="count" id="totalFactures">0</p>
                        </div>
                        <div class="stat-card" style="flex: 1; padding: 10px; margin-right: 10px; background-color: #d6efbc; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <h5>Factures Payées</h5>
                            <p class="count" id="facturesPayees">0</p>
                        </div>
                        <div class="stat-card" style="flex: 1; padding: 10px; background-color: #d6efbc; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <h5>Factures en Attente</h5>
                            <p class="count" id="facturesEnAttente">0</p>
                        </div>
                    </div>
                </div>

                <!-- Formulaire pour générer une facture -->
                <div class="form-section" style="margin-left: 250px; width: calc(100% - 250px);">
                    <h3>Générer une Facture</h3>
                    <form id="generateInvoiceForm">
                        <div class="form-group">
                            <label for="clientName">Nom du Client</label>
                            <input type="text" id="clientName" class="form-control" placeholder="Entrez le nom du client" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Montant</label>
                            <input type="number" id="amount" class="form-control" placeholder="Entrez le montant" required>
                        </div>
                        <div class="form-group ">
                            <label for="status">Statut de la Facture</label>
                            <select id="status" class="form-control" required>
                                <option value="payee">Payée</option>
                                <option value="en_attente">En Attente</option>
                                <option value="annulee">Annulée</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Générer la Facture</button>
                    </form>
                </div>

                <!-- Historique des Factures -->
                <div class="table-section" style="margin-left: 250px; width: calc(100% - 250px); margin-top: 30px;">
                    <h3>Historique des Factures</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom du Client</th>
                                <th>Montant</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="invoiceTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let invoices = [];
        let factureChart;

        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('factureChart').getContext('2d');
            factureChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Payées', 'En Attente', 'Autres'],
                    datasets: [{
                        data: [0, 0, 0],
                        backgroundColor: ['#28a745', '#ffc107', '#17a2b8'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                    }
                }
            });

            const generateInvoiceForm = document.getElementById('generateInvoiceForm');
            const invoiceTableBody = document.getElementById('invoiceTableBody');

            let editingRow = null;

            generateInvoiceForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const clientName = document.getElementById('clientName').value;
                const amount = parseFloat(document.getElementById('amount').value);
                const status = document.getElementById('status').value;

                if (editingRow) {
                    const index = editingRow.dataset.index;
                    invoices[index] = { clientName, amount, status };
                    const cells = editingRow.querySelectorAll('td');
                    cells[1].textContent = clientName;
                    cells[2].textContent = amount + '€';
                    cells[3].textContent = status.charAt(0).toUpperCase() + status.slice(1);
                    editingRow = null;
                } else {
                    invoices.push({ clientName, amount, status });

                    const newRow = document.createElement('tr');
                    newRow.dataset.index = invoices.length - 1;
                    newRow.innerHTML = `
                        <td>${invoices.length}</td>
                        <td>${clientName}</td>
                        <td>${amount}€</td>
                        <td>${status.charAt(0).toUpperCase() + status.slice(1)}</td>
                        <td>
                            <button class="btn btn-warning" onclick="modifyInvoice(this)">Modifier</button>
                            <button class="btn btn-danger" onclick="deleteInvoice(this)">Supprimer</button>
                             <button class="btn btn-primary" onclick="printInvoice(this)">Imprimer</button>
                        </td>
                    `;
                    invoiceTableBody.appendChild(newRow);
                }

                generateInvoiceForm.reset();
                updateStatistics();
            });

            window.deleteInvoice = function (button) {
                const row = button.parentElement.parentElement;
                const index = row.dataset.index;
                invoices.splice(index, 1);
                row.remove();
                updateInvoiceNumbers();
                updateStatistics();
            };

            window.modifyInvoice = function (button) {
                const row = button.parentElement.parentElement;
                const cells = row.querySelectorAll('td');
                document.getElementById('clientName').value = cells[1].textContent;
                document.getElementById('amount').value = cells[2].textContent.replace('€', '');
                document.getElementById('status').value = cells[3].textContent.toLowerCase();
                editingRow = row;
            };

            function updateStatistics() {
                const totalFactures = invoices.length;
                const facturesPayees = invoices.filter(invoice => invoice.status === 'payee').length;
                const facturesEnAttente = invoices.filter(invoice => invoice.status === 'en_attente').length;

                document.getElementById('totalFactures').textContent = totalFactures;
                document.getElementById('facturesPayees').textContent = facturesPayees;
                document.getElementById('facturesEnAttente').textContent = facturesEnAttente;

                factureChart.data.datasets[0].data = [facturesPayees, facturesEnAttente, totalFactures - facturesPayees - facturesEnAttente];
                factureChart.update();
            }

            function updateInvoiceNumbers() {
                const rows = invoiceTableBody.querySelectorAll('tr');
                rows.forEach((row, index) => {
                    row.querySelector('td').textContent = index + 1;
                    row.dataset.index = index;
                });
            }
        });
        window.printInvoice = function (button) {
    const row = button.parentElement.parentElement;
    const cells = row.querySelectorAll('td');
    const invoiceData = {
        id: cells[0].textContent,
        clientName: cells[1].textContent,
        amount: cells[2].textContent,
        status: cells[3].textContent,
    };

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    

// Titre de la facture
doc.setFontSize(22);
doc.setFont("helvetica", "bold");
doc.setTextColor(0, 102, 204);  // Couleur bleue pour le titre
doc.text('Facture', 105, 20, { align: 'center' });

// Informations sur le site
doc.setFontSize(12);
doc.setFont("helvetica", "normal");
doc.setTextColor(0, 102, 204); // Couleur bleue pour VoyageFM
doc.text('VoyageFM', 20, 30);

// Affichage de la date actuelle
const currentDate = new Date();
const formattedDate = currentDate.toLocaleDateString('fr-FR'); // Format: dd/mm/yyyy
doc.setTextColor(0); // Réinitialiser la couleur pour la date
doc.text(`Date : ${formattedDate}`, 160, 30); // Positionné à droite

// Ligne horizontale sous les informations
doc.setDrawColor(0);
doc.setLineWidth(0.5);
doc.line(10, 35, 200, 35);

// Informations sur la facture
doc.setFontSize(12);
doc.setFont("helvetica", "normal");
doc.setTextColor(0); // Réinitialiser la couleur pour le texte principal

// Détails de la facture avec espacements et bordures
doc.text(`Numéro de Facture : ${invoiceData.id}`, 20, 50);
doc.text(`Nom du Client : ${invoiceData.clientName}`, 20, 60);
doc.text(`Montant : ${invoiceData.amount} EUR`, 20, 70);
doc.text(`Statut : ${invoiceData.status}`, 20, 80);

// Bordure autour des informations principales
doc.setDrawColor(0);
doc.setLineWidth(0.5);
doc.rect(15, 40, 180, 70);  // Rectangle autour des informations principales


// Ligne horizontale avant le pied de page
doc.setLineWidth(0.5);
doc.line(10, 250, 200, 250);

// Pied de page avec texte centré et couleur en italique
doc.setFontSize(10);
doc.setFont("helvetica", "italic");
doc.setTextColor(100, 100, 100);  // Gris pour le pied de page
doc.text('Merci pour votre confiance.', 105, 280, { align: 'center' });


// Enregistrer ou ouvrir le fichier PDF
doc.save(`Facture_${invoiceData.id}.pdf`);


        }
        
    </script>
</body>

</html>
