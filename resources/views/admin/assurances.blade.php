<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assurances | Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #7c3aed;
            --light-color: #f8fafc;
            --dark-color: #1e293b;
            --success-color: #10b981;
            --danger-color: #ef4444;
        }

        body {
            background: var(--light-color);
            font-family: 'Inter', sans-serif;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: var(--dark-color);
            color: white;
            padding: 1.5rem;
            transition: width 0.3s ease;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.75rem;
            border-radius: 8px;
            transition: background 0.2s ease;
        }

        .sidebar a:hover, .sidebar a.active {
            background: var(--primary-color);
        }

        .main-content {
            flex: 1;
            padding: 2rem;
        }

        .assurance-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .page-title {
            color: var(--dark-color);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 2rem;
        }

        .search-filter {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .search-filter input, .search-filter select {
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            padding: 0.5rem 1rem;
            transition: border-color 0.2s ease;
        }

        .search-filter input:focus, .search-filter select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .assurance-table thead th {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 1.25rem;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .assurance-table tbody tr {
            transition: background 0.2s ease, transform 0.2s ease;
            cursor: pointer;
        }

        .assurance-table tbody tr:hover {
            background: #f1f5f9;
            transform: translateY(-2px);
        }

        .assurance-table td {
            padding: 1.25rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f3f9;
            font-size: 0.9rem;
        }

        .badge-pill {
            border-radius: 50px;
            padding: 0.5em 0.9em;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge-annulation {
            background: rgba(255, 193, 7, 0.15);
            color: #d4a017;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .badge-medicale {
            background: rgba(220, 53, 69, 0.15);
            color: #c82333;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .badge-bagages {
            background: rgba(13, 110, 253, 0.15);
            color: #0b5ed7;
            border: 1px solid rgba(13, 110, 253, 0.3);
        }

        .date-indicator {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            color: #6c757d;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
            background: #f8f9fa;
            border-radius: 12px;
        }

        .assurance-icon {
            transition: transform 0.2s ease;
        }

        .assurance-icon:hover {
            transform: scale(1.1);
        }

        .reservation-info {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .no-reservation {
            color: #6c757d;
            font-style: italic;
        }

        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background: var(--primary-color);
            color: white;
            border-radius: 12px 12px 0 0;
        }

        .modal-footer {
            border-top: none;
            padding: 1rem 2rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }

            .sidebar a {
                justify-content: center;
            }

            .sidebar a span {
                display: none;
            }

            .search-filter {
                flex-direction: column;
            }

            .assurance-table td {
                font-size: 0.8rem;
                padding: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i><span>Tableau de bord</span></a></li>
                    <li><a href="#"><i class="fas fa-hotel"></i><span>Hébergements</span></a></li>
                    <li><a href="#"><i class="fas fa-users"></i><span>Utilisateurs</span></a></li>
                    <li><a href="{{ route('contacts.index') }}"><i class="fas fa-address-book"></i><span>Contacts</span></a></li>
                    <li><a href="{{ route('assurances.index') }}" class="active"><i class="fas fa-shield-alt"></i><span>Assurances</span></a></li>
                    <li><a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-check"></i><span>Réservations</span></a></li>
                    <li><a href="#"><i class="fas fa-cog"></i><span>Paramètres</span></a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <div class="assurance-container">
                <h1 class="page-title">
                    <i class="fas fa-shield-alt"></i> Souscriptions d'assurances
                </h1>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="search-filter">
                    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par nom ou destination...">
                    <select id="typeFilter" class="form-select">
                        <option value="">Tous les types</option>
                        <option value="Annulation">Annulation</option>
                        <option value="Médicale">Médicale</option>
                        <option value="Bagages">Bagages</option>
                    </select>
                </div>

                @if($assurances->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-shield-virus fa-3x mb-3"></i>
                        <h3>Aucune assurance enregistrée</h3>
                        <p class="text-muted">Les souscriptions d'assurances apparaîtront ici.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="assurance-table" id="assurancesTable">
                            <thead>
                                <tr>
                                    <th style="width: 18%;"><i class="fas fa-user-tie me-2"></i>Client</th>
                                    <th style="width: 12%;"><i class="fas fa-calendar-day me-2"></i> Durée</th>
                                    <th style="width: 16%;"><i class="fas fa-map-marked-alt me-2"></i> Destination</th>
                                    <th style="width: 18%;"><i class="fas fa-tags me-2"></i> Type</th>
                                    <th style="width: 16%;"><i class="fas fa-calendar-check me-2"></i> Date</th>
                                    <th style="width: 20%;"><i class="fas fa-ticket-alt me-2"></i> Réservation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($assurances as $assurance)
                                    <tr data-bs-toggle="modal" data-bs-target="#assuranceModal" data-assurance='{{ json_encode($assurance) }}'>
                                        <td>
                                            <div class="fw-semibold">
                                                {{ $assurance->reservation ? $assurance->reservation->prenom . ' ' . $assurance->reservation->nom : 'N/A' }}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark">
                                                <i class="fas fa-clock"></i>
                                                {{ $assurance->duree }} jours
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-map-marker-alt text-primary me-2 assurance-icon"></i>
                                                <span>{{ $assurance->destination }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge-pill 
                                                @if($assurance->type_assurance == 'Annulation') badge-annulation
                                                @elseif($assurance->type_assurance == 'Médicale') badge-medicale
                                                @else badge-bagages
                                                @endif">
                                                <i class="fas assurance-icon
                                                    @if($assurance->type_assurance == 'Annulation') fa-ban
                                                    @elseif($assurance->type_assurance == 'Médicale') fa-heartbeat
                                                    @else fa-suitcase-rolling
                                                    @endif"></i>
                                                {{ $assurance->type_assurance }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="date-indicator">
                                                <i class="fas fa-clock"></i>
                                                {{ $assurance->created_at ? $assurance->created_at->format('d/m/Y H:i') : 'N/A' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="reservation-info">
                                                @if($assurance->reservation)
                                                    <i class="fas fa-ticket-alt text-primary me-2 assurance-icon"></i>
                                                    <span>Réservation:{{ $assurance->reservation->id }} -> {{ $assurance->reservation->destination }}</span>
                                                @else
                                                    <span class="no-reservation">Aucune réservation</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted small">
                            Affichage de <strong>1</strong> à <strong>{{ $assurances->count() }}</strong> sur <strong>{{ $assurances->count() }}</strong> souscriptions
                        </div>
                        <div>
                            <span class="badge bg-primary rounded-pill">
                                <i class="fas fa-database me-1"></i>
                                Total: {{ $assurances->count() }}
                            </span>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Modal pour les détails de l'assurance -->
            <div class="modal fade" id="assuranceModal" tabindex="-1" aria-labelledby="assuranceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="assuranceModalLabel">Détails de l'Assurance</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6><i class="fas fa-user me-1"></i> Nom du client</h6>
                                    <p id="modalClient"></p>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="fas fa-calendar-day me-1"></i> Durée</h6>
                                    <p id="modalDuree"></p>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="fas fa-map-marked-alt me-1"></i> Destination</h6>
                                    <p id="modalDestination"></p>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="fas fa-tags me-1"></i> Type d'Assurance</h6>
                                    <p id="modalType"></p>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="fas fa-calendar-check me-1"></i> Date de Souscription</h6>
                                    <p id="modalDate"></p>
                                </div>
                                <div class="col-12">
                                    <h6><i class="fas fa-ticket-alt me-1"></i> Réservation Associée</h6>
                                    <p id="modalReservation"></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialisation des tooltips
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

        // Gestion du filtrage et de la recherche
        const searchInput = document.getElementById('searchInput');
        const typeFilter = document.getElementById('typeFilter');
        const tableRows = document.querySelectorAll('#assurancesTable tbody tr');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const typeTerm = typeFilter.value.toLowerCase();

            tableRows.forEach(row => {
                const client = row.cells[0].textContent.toLowerCase();
                const destination = row.cells[2].textContent.toLowerCase();
                const type = row.cells[3].textContent.toLowerCase();

                const matchesSearch = client.includes(searchTerm) || destination.includes(searchTerm);
                const matchesType = !typeTerm || type.includes(typeTerm);

                row.style.display = matchesSearch && matchesType ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        typeFilter.addEventListener('change', filterTable);

        // Gestion de la modale des détails
        document.querySelectorAll('#assurancesTable tbody tr').forEach(row => {
            row.addEventListener('click', function() {
                const assurance = JSON.parse(this.dataset.assurance);

                document.getElementById('modalClient').innerHTML = `<strong>${assurance.prenom} ${assurance.nom}</strong>`;
                document.getElementById('modalDuree').textContent = `${assurance.duree} jours`;
                document.getElementById('modalDestination').textContent = assurance.destination;
                document.getElementById('modalType').textContent = assurance.type_assurance;
                document.getElementById('modalDate').textContent = assurance.created_at ? new Date(assurance.created_at).toLocaleDateString('fr-FR', { hour: '2-digit', minute: '2-digit' }) : 'N/A';
                document.getElementById('modalReservation').textContent = assurance.reservation ? `Réservation #${assurance.reservation.id} - ${assurance.reservation.destination}` : 'Aucune réservation';
            });
        });
    </script>
</body>
</html>