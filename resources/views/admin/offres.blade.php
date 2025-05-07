<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres | Dashboard Admin</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --white: hsl(0, 0%, 100%);
            --black: hsl(0, 0%, 0%);
            --deep-saffron: #89ca06;
            --dark-orange: #7ab805;
            --gray-x-ㄶ-11-gray: hsl(0, 0%, 73%);
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

        .offre-container {
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

        .action-btn.edit {
            background: var(--deep-saffron);
            color: var(--black);
        }

        .action-btn.delete {
            background: #d00000;
            color: var(--white);
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
                    <li><a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-check"></i> Réservations</a></li>
                    <li><a href="{{ route('admin.offres.index') }}" class="active"><i class="fas fa-plane"></i> Offres</a></li>
                    <li><a href="{{ route('users.index') }}"><i class="fas fa-users"></i> Utilisateurs</a></li>

                    <li><a href="{{ route('assurances.index') }}"><i class="fas fa-shield-alt"></i> Assurances</a></li>
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
            <div class="offre-container">
                <h1 class="page-title">
                    <i class="fas fa-plane"></i> Gestion des Offres
                </h1>

                @if(session('success'))
                    <div class="alert" id="successAlert">
                        {{ session('success') }}
                        <button onclick="this.parentElement.style.display='none'">×</button>
                    </div>
                @endif

                <div class="search-filter">
                    <input type="text" id="searchInput" placeholder="Rechercher par titre ou destination...">
                    <select id="durationFilter">
                        <option value="">Toutes les durées</option>
                        <option value="1-3">1-3 jours</option>
                        <option value="4-7">4-7 jours</option>
                        <option value="8+">8+ jours</option>
                    </select>
                </div>

                <a href="{{ route('admin.offres.create') }}" class="action-btn edit" style="margin-bottom: 1.5rem; display: inline-block;">
                    <i class="fas fa-plus me-1"></i> Ajouter une Offre
                </a>

                @if($offres->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-plane-slash"></i>
                        <h3>Aucune offre enregistrée</h3>
                        <p>Les offres apparaîtront ici une fois créées.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table" id="offresTable">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-tag me-1"></i> Titre</th>
                                    <th><i class="fas fa-map-marked-alt me-1"></i> Destination</th>
                                    <th><i class="far fa-clock me-1"></i> Durée</th>
                                    <th><i class="fas fa-user-friends me-1"></i> Personnes</th>
                                    <th><i class="fas fa-euro-sign me-1"></i> Prix</th>
                                    <th><i class="fas fa-hotel me-1"></i> Hôtel</th>
                                    <th><i class="fas fa-ellipsis-v me-1"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($offres as $offre)
                                <tr data-offre='{{ json_encode($offre) }}'>
                                    <td>{{ $offre->title }}</td>
                                    <td>{{ $offre->location }}</td>
                                    <td>{{ $offre->duration }} jours</td>
                                    <td style="text-align: center;">{{ $offre->people }}</td>
                                    <td>{{ number_format($offre->price, 2) }} €</td>
                                    <td>{{ $offre->hotel_name }}</td>
                                    <td>
                                        <div class="action-btns">
                                            <a href="{{ route('admin.offres.edit', $offre->id) }}" class="action-btn edit" title="Modifier l'offre">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.offres.destroy', $offre->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn delete" title="Supprimer l'offre">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
                            Total: {{ $offres->count() }} offres
                        </span>
                    </div>
                @endif
            </div>

            <!-- Modal pour les détails de l'offre -->
            <div class="modal" id="offreModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Détails de l'Offre</h5>
                        <button class="modal-close">×</button>
                    </div>
                    <div class="modal-body">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div>
                                <h6><i class="fas fa-tag me-1"></i> Titre</h6>
                                <p id="modalTitle"></p>
                            </div>
                            <div>
                                <h6><i class="fas fa-map-marked-alt me-1"></i> Destination</h6>
                                <p id="modalLocation"></p>
                            </div>
                            <div>
                                <h6><i class="far fa-clock me-1"></i> Durée</h6>
                                <p id="modalDuration"></p>
                            </div>
                            <div>
                                <h6><i class="fas fa-user-friends me-1"></i> Personnes</h6>
                                <p id="modalPeople"></p>
                            </div>
                            <div>
                                <h6><i class="fas fa-euro-sign me-1"></i> Prix</h6>
                                <p id="modalPrice"></p>
                            </div>
                            <div>
                                <h6><i class="fas fa-hotel me-1"></i> Hôtel</h6>
                                <p id="modalHotel"></p>
                            </div>
                            <div style="grid-column: 1 / -1;">
                                <h6><i class="fas fa-info-circle me-1"></i> Description</h6>
                                <p id="modalDescription"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById('offreModal').classList.remove('show')">Fermer</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Gestion du filtrage et de la recherche
        const searchInput = document.getElementById('searchInput');
        const durationFilter = document.getElementById('durationFilter');
        const tableRows = document.querySelectorAll('#offresTable tbody tr');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const durationTerm = durationFilter.value.toLowerCase().trim();

            tableRows.forEach(row => {
                const title = row.cells[0].textContent.toLowerCase().trim();
                const location = row.cells[1].textContent.toLowerCase().trim();
                const duration = parseInt(row.cells[2].textContent) || 0;

                const matchesSearch = title.includes(searchTerm) || location.includes(searchTerm);
                let matchesDuration = true;
                if (durationTerm) {
                    if (durationTerm === '1-3') matchesDuration = duration >= 1 && duration <= 3;
                    else if (durationTerm === '4-7') matchesDuration = duration >= 4 && duration <= 7;
                    else if (durationTerm === '8+') matchesDuration = duration >= 8;
                }

                row.style.display = matchesSearch && matchesDuration ? '' : 'none';
            });

            // Mettre à jour le compteur de lignes visibles
            const visibleRows = Array.from(tableRows).filter(row => row.style.display !== 'none').length;
            const totalBadge = document.querySelector('.total-badge');
            totalBadge.innerHTML = `<i class="fas fa-database me-1"></i> Total: ${visibleRows} offres`;
        }

        searchInput.addEventListener('input', filterTable);
        durationFilter.addEventListener('change', filterTable);

        // Gestion de la modale des détails
        tableRows.forEach(row => {
            row.addEventListener('click', function(e) {
                if (e.target.closest('.action-btn')) return; // Ignore clicks on action buttons
                const offre = JSON.parse(this.dataset.offre);

                document.getElementById('modalTitle').textContent = offre.title;
                document.getElementById('modalLocation').textContent = offre.location;
                document.getElementById('modalDuration').textContent = `${offre.duration} jours`;
                document.getElementById('modalPeople').textContent = offre.people;
                document.getElementById('modalPrice').textContent = `${parseFloat(offre.price).toFixed(2)} €`;
                document.getElementById('modalHotel').textContent = offre.hotel_name;
                document.getElementById('modalDescription').textContent = offre.description || 'Aucune description';

                document.getElementById('offreModal').classList.add('show');
            });
        });

        // Fermeture de la modale
        document.querySelector('.modal-close').addEventListener('click', () => {
            document.getElementById('offreModal').classList.remove('show');
        });

        // Fermer la modale en cliquant à l'extérieur
        window.addEventListener('click', (e) => {
            if (e.target === document.getElementById('offreModal')) {
                document.getElementById('offreModal').classList.remove('show');
            }
        });

        // Confirmation avant suppression
        document.querySelectorAll('form[action*="destroy"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')) {
                    e.preventDefault();
                }
            });
        });

        // Appeler filterTable au chargement pour initialiser
        filterTable();
    </script>
</body>
</html>