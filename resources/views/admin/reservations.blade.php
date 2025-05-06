<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations | Dashboard Admin</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --white: hsl(0, 0%, 100%);
            --black: hsl(0, 0%, 0%);
            --deep-saffron: #89ca06;
            --dark-orange: #7ab805;
            --gray-x-11-gray: hsl(0, 0%, 73%);
            --spanish-gray: hsl(0, 0%, 60%);
            --cultured: hsl(0, 0%, 93%);
            --rich-black-fogra-29: hsl(210, 26%, 7%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--white);
            color: var(--rich-black-fogra-29);
        }

        .dashboard-container {
            display: grid;
            grid-template-areas: 
                "header header"
                "sidebar main";
            grid-template-columns: 280px 1fr;
            grid-template-rows: auto 1fr;
            min-height: 100vh;
        }

        .dashboard-header {
            grid-area: header;
            background: var(--white);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--cultured);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dashboard-header h1 {
            font-size: 1.8rem;
            color: var(--deep-saffron);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dashboard-header p {
            font-size: 1rem;
            color: var(--spanish-gray);
        }

        .sidebar {
            grid-area: sidebar;
            background: var(--rich-black-fogra-29);
            padding: 2rem 1rem;
            color: var(--white);
        }

        .sidebar nav ul {
            list-style: none;
        }

        .sidebar nav ul li {
            margin: 0.75rem 0;
        }

        .sidebar nav ul li a {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1.5rem;
            color: var(--gray-x-11-gray);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar nav ul li a:hover,
        .sidebar nav ul li a.active {
            background: var(--deep-saffron);
            color: var(--black);
            transform: scale(1.02);
        }

        .main-content {
            grid-area: main;
            padding: 2rem;
            background: var(--cultured);
        }

        .reservation-container {
            background: var(--white);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--rich-black-fogra-29);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .search-filter {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .search-filter input,
        .search-filter select {
            padding: 0.5rem 1rem;
            border: 1px solid var(--cultured);
            border-radius: 8px;
            background: var(--white);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .search-filter input:focus,
        .search-filter select:focus {
            border-color: var(--deep-saffron);
            box-shadow: 0 0 0 3px rgba(137, 202, 6, 0.1);
            outline: none;
        }

        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
        }

        .table thead {
            background: linear-gradient(135deg, var(--deep-saffron), var(--dark-orange));
            color: var(--white);
        }

        .table th {
            padding: 1rem;
            font-weight: 600;
            text-align: left;
        }

        .table tbody tr {
            border-bottom: 1px solid var(--cultured);
            transition: background 0.2s ease;
            cursor: pointer;
        }

        .table tbody tr:hover {
            background: var(--cultured);
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
        }

        .badge-status {
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .badge-confirmed {
            background: rgba(137, 202, 6, 0.1);
            color: var(--dark-orange);
        }

        .badge-cancelled {
            background: rgba(255, 0, 0, 0.1);
            color: #d00000;
        }

        .badge-pending {
            background: rgba(255, 204, 0, 0.1);
            color: #cc9900;
        }

        .action-btns {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 50px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .action-btn.approve {
            background: var(--deep-saffron);
            color: var(--black);
        }

        .action-btn.reject {
            background: #d00000;
            color: var(--white);
        }

        .assurance-list {
            max-height: 80px;
            overflow-y: auto;
            font-size: 0.85rem;
            color: var(--spanish-gray);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--spanish-gray);
        }

        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--deep-saffron);
        }

        .empty-state h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .total-badge {
            background: var(--deep-saffron);
            color: var(--black);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: var(--white);
            border-radius: 12px;
            width: 90%;
            max-width: 800px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: var(--deep-saffron);
            color: var(--black);
            padding: 1rem 2rem;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h5 {
            margin: 0;
            font-size: 1.25rem;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--black);
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-body h6 {
            font-size: 1rem;
            color: var(--spanish-gray);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .modal-body p {
            margin-bottom: 1rem;
            color: var(--rich-black-fogra-29);
        }

        .modal-footer {
            padding: 1rem 2rem;
            border-top: 1px solid var(--cultured);
            text-align: right;
        }

        .modal-footer button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 8px;
            background: var(--deep-saffron);
            color: var(--black);
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .modal-footer button:hover {
            background: var(--dark-orange);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(137, 202, 6, 0.1);
            color: var(--dark-orange);
        }

        .alert button {
            background: none;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            color: var(--dark-orange);
        }

        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-areas: 
                    "header"
                    "main";
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .search-filter {
                flex-direction: column;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1><i class="fas fa-route"></i> FM Voyage</h1>
            <p>Votre Passeport Vers l’Évasion</p>
        </header>
        
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                    <li><a href="{{ route('reservations.index') }}" class="active"><i class="fas fa-calendar-check"></i> Réservations</a></li>
                    <li><a href="{{ route('assurances.index') }}"><i class="fas fa-shield-alt"></i> Assurances</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> Utilisateurs</a></li>
                    <li><a href="{{ route('contacts.index') }}"><i class="fas fa-address-book"></i> Contacts</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <a href="#" onclick="this.closest('form').submit(); return false;">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <div class="reservation-container">
                <h1 class="page-title">
                    <i class="fas fa-calendar-check"></i> Gestion des Réservations
                </h1>

                @if(session('success'))
                    <div class="alert" id="successAlert">
                        {{ session('success') }}
                        <button onclick="this.parentElement.style.display='none'">×</button>
                    </div>
                @endif

                <div class="search-filter">
                    <input type="text" id="searchInput" placeholder="Rechercher par client ou destination...">
                    <select id="statusFilter">
                        <option value="">Tous les statuts</option>
                        <option value="confirmée">Confirmée</option>
                        <option value="annulée">Annulée</option>
                        <option value="en attente">En attente</option>
                    </select>
                </div>

                @if($reservations->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <h3>Aucune réservation enregistrée</h3>
                        <p>Les réservations apparaîtront ici une fois créées.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table" id="reservationsTable">
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
                                <tr data-reservation='{{ json_encode($reservation) }}'>
                                    <td>
                                        <strong>{{ $reservation->nom }}</strong>
                                        <div style="font-size: 0.85rem; color: var(--spanish-gray);">{{ $reservation->email }}</div>
                                    </td>
                                    <td>
                                        <div style="font-size: 0.85rem;">
                                            <div>{{ date('d/m/Y', strtotime($reservation->date_depart)) }}</div>
                                            <div>{{ date('d/m/Y', strtotime($reservation->date_retour)) }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $reservation->destination }}</td>
                                    <td style="text-align: center;">{{ $reservation->nombre_passagers }}</td>
                                    <td>
                                        <div class="assurance-list">
                                            @forelse ($reservation->assurances as $assurance)
                                                <div><i class="fas fa-shield-alt me-1"></i> {{ $assurance->type_assurance }}</div>
                                            @empty
                                                <div>Aucune assurance</div>
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
                                                <button type="submit" class="action-btn approve" title="Confirmer la réservation">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            @endif
                                            @if($reservation->statut != 'annulée')
                                            <form action="{{ route('reservations.reject', $reservation->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="action-btn reject" title="Annuler la réservation">
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

                    <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
                        <span class="total-badge">
                            <i class="fas fa-database me-1"></i>
                            Total: {{ $reservations->count() }} réservations
                        </span>
                    </div>
                @endif
            </div>

            <!-- Modal pour les détails de la réservation -->
            <div class="modal" id="reservationModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Détails de la Réservation</h5>
                        <button class="modal-close">×</button>
                    </div>
                    <div class="modal-body">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div>
                                <h6><i class="fas fa-user me-1"></i> Client</h6>
                                <p id="modalClient"></p>
                            </div>
                            <div>
                                <h6><i class="far fa-calendar-alt me-1"></i> Dates</h6>
                                <p id="modalDates"></p>
                            </div>
                            <div>
                                <h6><i class="fas fa-map-marked-alt me-1"></i> Destination</h6>
                                <p id="modalDestination"></p>
                            </div>
                            <div>
                                <h6><i class="fas fa-user-friends me-1"></i> Passagers</h6>
                                <p id="modalPassagers"></p>
                            </div>
                            <div>
                                <h6><i class="fas fa-plane me-1"></i> Préférence Vol</h6>
                                <p id="modalVol"></p>
                            </div>
                            <div>
                                <h6><i class="fas fa-hotel me-1"></i> Préférence Hôtel</h6>
                                <p id="modalHotel"></p>
                            </div>
                            <div style="grid-column: 1 / -1;">
                                <h6><i class="fas fa-comment me-1"></i> Demande Spéciale</h6>
                                <p id="modalDemande"></p>
                            </div>
                            <div style="grid-column: 1 / -1;">
                                <h6><i class="fas fa-shield-alt me-1"></i> Assurances</h6>
                                <div id="modalAssurances"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById('reservationModal').classList.remove('show')">Fermer</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Gestion du filtrage et de la recherche
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const tableRows = document.querySelectorAll('#reservationsTable tbody tr');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const statusTerm = statusFilter.value.toLowerCase().trim();

            tableRows.forEach(row => {
                const client = row.cells[0].textContent.toLowerCase().trim();
                const destination = row.cells[2].textContent.toLowerCase().trim();
                const statusElement = row.cells[5].querySelector('.badge-status');
                const status = statusElement ? statusElement.textContent.trim().toLowerCase() : '';

                // Débogage : Afficher les valeurs pour vérifier
                console.log('Statut extrait:', status, 'Statut sélectionné:', statusTerm);

                const matchesSearch = client.includes(searchTerm) || destination.includes(searchTerm);
                const matchesStatus = statusTerm === '' || status === statusTerm;

                row.style.display = matchesSearch && matchesStatus ? '' : 'none';
            });

            // Mettre à jour le compteur de lignes visibles
            const visibleRows = Array.from(tableRows).filter(row => row.style.display !== 'none').length;
            const totalBadge = document.querySelector('.total-badge');
            totalBadge.innerHTML = `<i class="fas fa-database me-1"></i> Total: ${visibleRows} réservations`;
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);

        // Gestion de la modale des détails
        tableRows.forEach(row => {
            row.addEventListener('click', function(e) {
                if (e.target.closest('.action-btn')) return; // Ignore clicks on action buttons
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
                    assurancesDiv.innerHTML = '<div>Aucune assurance</div>';
                }

                document.getElementById('reservationModal').classList.add('show');
            });
        });

        // Fermeture de la modale
        document.querySelector('.modal-close').addEventListener('click', () => {
            document.getElementById('reservationModal').classList.remove('show');
        });

        // Fermer la modale en cliquant à l'extérieur
        window.addEventListener('click', (e) => {
            if (e.target === document.getElementById('reservationModal')) {
                document.getElementById('reservationModal').classList.remove('show');
            }
        });

        // Confirmation avant annulation
        document.querySelectorAll('form[action*="reject"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')) {
                    e.preventDefault();
                }
            });
        });

        // Appeler filterTable au chargement pour initialiser
        filterTable();
    </script>
</body>
</html>