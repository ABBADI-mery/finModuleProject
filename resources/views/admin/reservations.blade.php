<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations | Dashboard Admin</title>
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

        .reservation-container {
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

        .table thead {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .table tbody tr {
            transition: background 0.2s ease;
            cursor: pointer;
        }

        .table tbody tr:hover {
            background: #f1f5f9;
        }

        .badge-status {
            padding: 0.5em 1em;
            border-radius: 50px;
            font-size: 0.85em;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .badge-confirmed {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-pending {
            background: #fef9c3;
            color: #854d0e;
        }

        .action-btns {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 0.5em 1em;
            font-size: 0.85rem;
            border-radius: 50px;
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .assurance-list {
            max-height: 80px;
            overflow-y: auto;
            font-size: 0.85em;
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
                    <li><a href="{{ route('assurances.index') }}"><i class="fas fa-shield-alt"></i><span>Assurances</span></a></li>
                    <li><a href="{{ route('reservations.index') }}" class="active"><i class="fas fa-calendar-check"></i><span>Réservations</span></a></li>
                    <li><a href="{{ route('contacts.index') }}"><i class="fas fa-address-book"></i><span>Contacts</span></a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <div class="reservation-container">
                <h1 class="page-title">
                    <i class="fas fa-calendar-check"></i> Gestion des Réservations
                </h1>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="search-filter">
                    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par client ou destination...">
                    <select id="statusFilter" class="form-select">
                        <option value="">Tous les statuts</option>
                        <option value="confirmée">Confirmée</option>
                        <option value="annulée">Annulée</option>
                        <option value="en attente">En attente</option>
                    </select>
                </div>

                @if($reservations->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-calendar-times fa-3x mb-3"></i>
                        <h3>Aucune réservation enregistrée</h3>
                        <p class="text-muted">Les réservations apparaîtront ici une fois créées.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="reservationsTable">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-user-tie me-1"></i> Client</th>
                                    <th><i class="far fa-calendar-alt me-1"></i> Dates</th>
                                    <th><i class="fas fa-map-marked-alt me-1"></i> Destination</th>
                                    <th><i class="fas fa-user-friends me-1"></i> Passagers</th>
                                    <th><i class="fas fa-shield-alt me-1"></i> Assurances</th>
                                    <th><i class="fas fa-info-circle me-1"></i> Statut</th>
                                    <th><i class="fas fa-ellipsis-v me-1"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                <tr data-bs-toggle="modal" data-bs-target="#reservationModal" data-reservation='{{ json_encode($reservation) }}'>
                                    <td>
                                        <strong>{{ $reservation->nom }}</strong>
                                        <div class="text-muted small">{{ $reservation->email }}</div>
                                    </td>
                                    <td>
                                        <div class="small">
                                            <div>{{ date('d/m/Y', strtotime($reservation->date_depart)) }}</div>
                                            <div>{{ date('d/m/Y', strtotime($reservation->date_retour)) }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $reservation->destination }}</td>
                                    <td class="text-center">{{ $reservation->nombre_passagers }}</td>
                                    <td>
                                        <div class="assurance-list">
                                            @forelse ($reservation->assurances as $assurance)
                                                <div class="assurance-item">
                                                    <i class="fas fa-shield-alt me-1"></i>
                                                    {{ $assurance->type_assurance }}
                                                </div>
                                            @empty
                                                <div class="no-assurance">Aucune assurance</div>
                                            @endforelse
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $badgeClass = [
                                                'confirmée' => 'badge-confirmed',
                                                'annulée' => 'badge-cancelled',
                                                'en attente' => 'badge-pending'
                                            ][$reservation->statut] ?? 'badge-pending';
                                        @endphp
                                        <span class="badge-status {{ $badgeClass }}">
                                            @if($reservation->statut == 'confirmée')
                                                <i class="fas fa-check-circle me-1"></i>
                                            @elseif($reservation->statut == 'annulée')
                                                <i class="fas fa-times-circle me-1"></i>
                                            @else
                                                <i class="fas fa-clock me-1"></i>
                                            @endif
                                            {{ ucfirst($reservation->statut) ?? 'En attente' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-btns">
                                            @if($reservation->statut != 'confirmée')
                                            <form action="{{ route('reservations.approve', $reservation->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm action-btn" data-bs-toggle="tooltip" title="Confirmer la réservation">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            @endif
                                            @if($reservation->statut != 'annulée')
                                            <form action="{{ route('reservations.reject', $reservation->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm action-btn" data-bs-toggle="tooltip" title="Annuler la réservation">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <span class="badge bg-primary">
                            <i class="fas fa-database me-1"></i>
                            Total: {{ $reservations->count() }} réservations
                        </span>
                    </div>
                @endif
            </div>

            <!-- Modal pour les détails de la réservation -->
            <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reservationModalLabel">Détails de la Réservation</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6><i class="fas fa-user me-1"></i> Client</h6>
                                    <p id="modalClient"></p>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="far fa-calendar-alt me-1"></i> Dates</h6>
                                    <p id="modalDates"></p>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="fas fa-map-marked-alt me-1"></i> Destination</h6>
                                    <p id="modalDestination"></p>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="fas fa-user-friends me-1"></i> Passagers</h6>
                                    <p id="modalPassagers"></p>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="fas fa-plane me-1"></i> Préférence Vol</h6>
                                    <p id="modalVol"></p>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="fas fa-hotel me-1"></i> Préférence Hôtel</h6>
                                    <p id="modalHotel"></p>
                                </div>
                                <div class="col-12">
                                    <h6><i class="fas fa-comment me-1"></i> Demande Spéciale</h6>
                                    <p id="modalDemande"></p>
                                </div>
                                <div class="col-12">
                                    <h6><i class="fas fa-shield-alt me-1"></i> Assurances</h6>
                                    <div id="modalAssurances"></div>
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
        const statusFilter = document.getElementById('statusFilter');
        const tableRows = document.querySelectorAll('#reservationsTable tbody tr');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusTerm = statusFilter.value.toLowerCase();

            tableRows.forEach(row => {
                const client = row.cells[0].textContent.toLowerCase();
                const destination = row.cells[2].textContent.toLowerCase();
                const status = row.cells[5].textContent.toLowerCase();

                const matchesSearch = client.includes(searchTerm) || destination.includes(searchTerm);
                const matchesStatus = !statusTerm || status.includes(statusTerm);

                row.style.display = matchesSearch && matchesStatus ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);

        // Gestion de la modale des détails
        document.querySelectorAll('#reservationsTable tbody tr').forEach(row => {
            row.addEventListener('click', function() {
                const reservation = JSON.parse(this.dataset.reservation);

                document.getElementById('modalClient').innerHTML = `<strong>${reservation.nom}</strong><br>${reservation.email}`;
                document.getElementById('modalDates').innerHTML = `Départ: ${new Date(reservation.date_depart).toLocaleDateString('fr-FR')}<br>Retour: ${new Date(reservation.date_retour).toLocaleDateString('fr-FR')}`;
                document.getElementById('modalDestination').textContent = reservation.destination;
                document.getElementById('modalPassagers').textContent = reservation.nombre_passagers;
                document.getElementById('modalVol').textContent = reservation.preference_vol || 'Non spécifié';
                document.getElementById('modalHotel').textContent = reservation.preference_hotel || 'Non spécifié';
                document.getElementById('modalDemande').textContent = reservation.demande_speciale || 'Aucune';
                
                const assurancesDiv = document.getElementById('modalAssurances');
                if (reservation.assurances && reservation.assurances.length > 0) {
                    assurancesDiv.innerHTML = reservation.assurances.map(a => `<div><i class="fas fa-shield-alt me-1"></i> ${a.type_assurance}</div>`).join('');
                } else {
                    assurancesDiv.innerHTML = '<div class="no-assurance">Aucune assurance</div>';
                }
            });
        });

        // Confirmation avant annulation
        document.querySelectorAll('form[action*="reject"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>