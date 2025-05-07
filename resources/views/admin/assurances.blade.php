<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assurances | Dashboard Admin</title>
    
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

        .assurance-container {
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

        .assurance-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
        }

        .assurance-table thead {
            background: linear-gradient(135deg, var(--deep-saffron), var(--dark-orange));
            color: var(--white);
        }

        .assurance-table th {
            padding: 1rem;
            font-weight: 600;
            text-align: left;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .assurance-table tbody tr {
            border-bottom: 1px solid var(--cultured);
            transition: background 0.2s ease, transform 0.2s ease;
            cursor: pointer;
        }

        .assurance-table tbody tr:hover {
            background: var(--cultured);
            transform: translateY(-2px);
        }

        .assurance-table td {
            padding: 1rem;
            vertical-align: middle;
            font-size: 0.9rem;
        }

        .badge-pill {
            border-radius: 50px;
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .badge-annulation {
            background: rgba(137, 202, 6, 0.1);
            color: var(--dark-orange);
            border: 1px solid rgba(137, 202, 6, 0.3);
        }

        .badge-medicale {
            background: rgba(220, 53, 69, 0.1);
            color: #c82333;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .badge-bagages {
            background: rgba(13, 110, 253, 0.1);
            color: #0b5ed7;
            border: 1px solid rgba(13, 110, 253, 0.3);
        }

        .date-indicator {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--spanish-gray);
        }

        .reservation-info {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .no-reservation {
            color: var(--spanish-gray);
            font-style: italic;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--spanish-gray);
            background: var(--cultured);
            border-radius: 12px;
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

            .assurance-table td {
                font-size: 0.8rem;
                padding: 0.75rem;
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
                    <li><a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-check"></i> Réservations</a></li>
                    <li><a href="{{ route('assurances.index') }}" class="active"><i class="fas fa-shield-alt"></i> Assurances</a></li>
                    <li><a href="{{ route('admin.offres.index') }}"><i class="fas fa-plane"></i> Offres</a></li>                  
                    <li><a href="{{ route('users.index') }}"><i class="fas fa-users"></i> Utilisateurs</a></li>
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
            <div class="assurance-container">
                <h1 class="page-title">
                    <i class="fas fa-shield-alt"></i> Souscriptions d'assurances
                </h1>

                @if(session('success'))
                    <div class="alert" id="successAlert">
                        {{ session('success') }}
                        <button onclick="this.parentElement.style.display='none'">×</button>
                    </div>
                @endif

                <div class="search-filter">
                    <input type="text" id="searchInput" placeholder="Rechercher par nom ou destination...">
                    <select id="typeFilter">
                        <option value="">Tous les types</option>
                        <option value="Annulation">Annulation</option>
                        <option value="Médicale">Médicale</option>
                        <option value="Bagages">Bagages</option>
                    </select>
                </div>

                @if($assurances->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Aucune assurance enregistrée</h3>
                        <p>Les souscriptions d'assurances apparaîtront ici.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="assurance-table" id="assurancesTable">
                            <thead>
                                <tr>
                                    <th style="width: 18%;"> Client</th>
                                    <th style="width: 16%;">Durée</th>
                                    <th style="width: 10%;"> Destination</th>
                                    <th style="width: 18%;"> Type</th>
                                    <th style="width: 16%;"> Date</th>
                                    <th style="width: 22%;"> Réservation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($assurances as $assurance)
                                    <tr data-assurance='{{ json_encode($assurance) }}'>
                                        <td>
                                            <div class="fw-semibold">
                                                {{ $assurance->reservation ? $assurance->reservation->prenom . ' ' . $assurance->reservation->nom : 'N/A' }}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge-pill" style="background: var(--cultured); color: var(--spanish-gray);">
                                                <i class="fas fa-clock"></i>
                                                {{ $assurance->duree }} jours
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-map-marker-alt me-2" style="color: var(--deep-saffron);"></i>
                                                <span>{{ $assurance->destination }}</span>
                                            </div>
                                        </td>
                                        <td data-type="{{ $assurance->type_assurance }}">
                                            <span class="badge-pill 
                                                @if($assurance->type_assurance == 'Annulation') badge-annulation
                                                @elseif($assurance->type_assurance == 'Médicale') badge-medicale
                                                @else badge-bagages
                                                @endif">
                                                <i class="fas
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
                                                    <i class="fas fa-ticket-alt me-2" style="color: var(--deep-saffron);"></i>
                                                    <span>Réservation : {{ $assurance->reservation->destination }}</span>
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

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                        <div style="font-size: 0.85rem; color: var(--spanish-gray);">
                            Affichage de <strong>1</strong> à <strong>{{ $assurances->count() }}</strong> sur <strong>{{ $assurances->count() }}</strong> souscriptions
                        </div>
                        <span class="total-badge">
                            <i class="fas fa-database me-1"></i>
                            Total: {{ $assurances->count() }}
                        </span>
                    </div>
                @endif
            </div>

            <!-- Modal pour les détails de l'assurance -->
            <div class="modal" id="assuranceModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Détails de l'Assurance</h5>
                        <button class="modal-close">×</button>
                    </div>
                    <div class="modal-body">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div>
                                <h6><i class="fas fa-user-tie"></i> Client</h6>
                                <p id="modal-client">N/A</p>
                            </div>
                            <div>
                                <h6><i class="fas fa-calendar-day"></i> Durée</h6>
                                <p id="modal-duree">N/A</p>
                            </div>
                            <div>
                                <h6><i class="fas fa-map-marked-alt"></i> Destination</h6>
                                <p id="modal-destination">N/A</p>
                            </div>
                            <div>
                                <h6><i class="fas fa-tags"></i> Type</h6>
                                <p id="modal-type">N/A</p>
                            </div>
                            <div>
                                <h6><i class="fas fa-calendar-check"></i> Date</h6>
                                <p id="modal-date">N/A</p>
                            </div>
                            <div>
                                <h6><i class="fas fa-ticket-alt"></i> Réservation</h6>
                                <p id="modal-reservation">N/A</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById('assuranceModal').style.display='none'">Fermer</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Sélection des éléments
        const searchInput = document.getElementById('searchInput');
        const typeFilter = document.getElementById('typeFilter');
        const table = document.getElementById('assurancesTable');
        const rows = table.querySelectorAll('tbody tr');
        const modal = document.getElementById('assuranceModal');
        const modalClose = document.querySelector('.modal-close');

        // Fonction de filtrage
        function filterTable() {
            const searchText = searchInput.value.toLowerCase().trim();
            const selectedType = typeFilter.value;

            rows.forEach(row => {
                const client = row.cells[0].textContent.toLowerCase().trim();
                const destination = row.cells[2].textContent.toLowerCase().trim();
                const typeElement = row.cells[3].querySelector('.badge-pill');
                const type = typeElement ? typeElement.textContent.trim() : '';

                // Débogage : Afficher les valeurs pour vérifier
                console.log('Type extrait:', type, 'Type sélectionné:', selectedType);

                const matchesSearch = client.includes(searchText) || destination.includes(searchText);
                const matchesType = selectedType === '' || type === selectedType;

                row.style.display = matchesSearch && matchesType ? '' : 'none';
            });

            // Mettre à jour le compteur de lignes visibles
            const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none').length;
            const countDisplay = document.querySelector('.assurance-container div[style*="font-size: 0.85rem"]');
            countDisplay.innerHTML = `Affichage de <strong>1</strong> à <strong>${visibleRows}</strong> sur <strong>${rows.length}</strong> souscriptions`;

            const totalBadge = document.querySelector('.total-badge');
            totalBadge.innerHTML = `<i class="fas fa-database me-1"></i> Total: ${visibleRows}`;
        }

        // Ajouter des écouteurs d'événements pour la recherche et le filtrage
        searchInput.addEventListener('input', filterTable);
        typeFilter.addEventListener('change', filterTable);

        // Gestion du modal
        rows.forEach(row => {
            row.addEventListener('click', () => {
                const assurance = JSON.parse(row.getAttribute('data-assurance'));
                document.getElementById('modal-client').textContent = assurance.reservation ? 
                    `${assurance.reservation.prenom} ${assurance.reservation.nom}` : 'N/A';
                document.getElementById('modal-duree').textContent = `${assurance.duree} jours`;
                document.getElementById('modal-destination').textContent = assurance.destination;
                document.getElementById('modal-type').textContent = assurance.type_assurance;
                document.getElementById('modal-date').textContent = assurance.created_at ? 
                    new Date(assurance.created_at).toLocaleString('fr-FR') : 'N/A';
                document.getElementById('modal-reservation').textContent = assurance.reservation ? 
                    `Réservation: ${assurance.reservation.destination}` : 'Aucune réservation';
                modal.style.display = 'flex';
            });
        });

        modalClose.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Fermer le modal en cliquant à l'extérieur
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        // Appeler filterTable au chargement pour initialiser
        filterTable();
    </script>
</body>
</html>