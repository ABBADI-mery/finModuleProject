<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations | FM Voyage</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --white: hsl(0, 0%, 100%);
            --black: hsl(0, 0%, 0%);
            --primary: #89ca06;
            --primary-dark: #7ab805;
            --primary-light: rgba(137, 202, 6, 0.1);
            --gray-light: hsl(0, 0%, 93%);
            --gray-medium: hsl(0, 0%, 73%);
            --gray-dark: hsl(0, 0%, 60%);
            --dark: hsl(210, 26%, 7%);
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --border-radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--gray-light);
            color: var(--dark);
            line-height: 1.6;
            padding-top: 80px;
        }

        /* Navigation Horizontale Fixe */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: var(--white);
            box-shadow: var(--shadow-md);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            height: 80px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-icon {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .brand-name {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            padding: 1rem 0;
            position: relative;
            transition: var(--transition);
        }

        .nav-menu a:hover {
            color: var(--primary);
        }

        .nav-menu a.active {
            color: var(--primary);
            font-weight: 600;
        }

        .nav-menu a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary);
            border-radius: 3px 3px 0 0;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 600;
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: var(--white);
            box-shadow: var(--shadow-lg);
            border-radius: var(--border-radius);
            padding: 1rem 0;
            min-width: 200px;
            display: none;
            z-index: 100;
            transform: translateY(10px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .user-profile:hover .user-dropdown {
            display: block;
            transform: translateY(0);
            opacity: 1;
        }

        .user-dropdown a {
            display: block;
            padding: 0.75rem 1.5rem;
            color: var(--dark);
            text-decoration: none;
            transition: var(--transition);
        }

        .user-dropdown a:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        /* Contenu Principal */
        .main-content {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            text-align: center;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary-light);
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            padding: 0;
            border-radius: 50%;
        }

        /* Réservations */
        .reservation-table-container {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .reservation-table {
            width: 100%;
            border-collapse: collapse;
        }

        .reservation-table th,
        .reservation-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--gray-light);
        }

        .reservation-table th {
            background: var(--primary-light);
            color: var(--primary-dark);
            font-weight: 600;
            position: sticky;
            top: 0;
        }

        .reservation-table tr:last-child td {
            border-bottom: none;
        }

        .reservation-table tr:hover {
            background: var(--primary-light);
        }

        .status-badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending {
            background: rgba(255, 193, 7, 0.1);
            color: var(--warning);
        }

        .status-confirmed {
            background: var(--primary-light);
            color: var(--primary-dark);
        }

        .status-cancelled {
            background: rgba(220, 53, 69, 0.1);
            color: var(--danger);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
        }

        .view-btn {
            color: var(--primary);
        }

        .cancel-btn {
            color: var(--danger);
        }

        /* Filtres */
        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .filter-item {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: var(--shadow-sm);
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-item:hover {
            background: var(--primary-light);
        }

        .filter-item.active {
            background: var(--primary);
            color: var(--white);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .pagination-item {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--white);
            color: var(--dark);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .pagination-item:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .pagination-item.active {
            background: var(--primary);
            color: var(--white);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .navbar {
                padding: 0 1rem;
            }
            
            .nav-menu {
                gap: 1rem;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }
            
            .navbar {
                height: 70px;
                flex-direction: column;
                padding: 0.5rem 1rem;
            }
            
            .brand {
                margin-bottom: 0.5rem;
            }
            
            .nav-menu {
                width: 100%;
                justify-content: space-between;
                gap: 0;
            }
            
            .nav-menu a {
                font-size: 0.9rem;
                padding: 0.5rem 0;
            }
            
            .main-content {
                padding: 1.5rem;
            }

            .reservation-table-container {
                overflow-x: auto;
            }

            .reservation-table {
                min-width: 800px;
            }
        }

        /* Améliorations visuelles */
        .reservation-card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: var(--transition);
            display: none;
        }

        .reservation-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .reservation-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .reservation-card-title {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .reservation-card-body {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .reservation-card-info {
            display: flex;
            flex-direction: column;
        }

        .reservation-card-label {
            font-size: 0.875rem;
            color: var(--gray-dark);
            margin-bottom: 0.25rem;
        }

        .reservation-card-value {
            font-weight: 500;
        }

        .reservation-card-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-light);
        }

        @media (max-width: 768px) {
            .reservation-table-container {
                display: none;
            }

            .reservation-card {
                display: block;
            }
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
        }

        .empty-state-icon {
            font-size: 3rem;
            color: var(--gray-medium);
            margin-bottom: 1rem;
        }

        .empty-state-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-state-text {
            color: var(--gray-dark);
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Navigation Horizontale Fixe -->
    <nav class="navbar">
        <div class="brand">
            <i class="fas fa-route brand-icon"></i>
            <span class="brand-name">FM Voyage</span>
        </div>

        <div class="nav-menu">
            <a href="{{ route('client.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a>
            <a href="{{ route('client.reservations') }}" class="active"><i class="fas fa-suitcase"></i> Mes réservations</a>
            <a href="{{ route('client.assurances') }}"><i class="fas fa-shield-alt"></i> Assurance</a>
            <a href="{{ route('client.planification') }}"><i class="fas fa-calendar-alt"></i> Planification</a>
            <a href="{{ route('client.profil') }}"><i class="fas fa-user-cog"></i> Profil</a>
        </div>
        
        <div class="user-profile">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->client->first_name, 0, 1)) }}
            </div>
            <span>{{ auth()->user()->client->first_name }}</span>
            <div class="user-dropdown">
                <a href="{{ route('home') }}"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <main class="main-content">
        <div class="section-header fade-in">
            <h1><i class="fas fa-suitcase"></i> Mes Réservations</h1>
            <a href="{{ route('booking') }}" class="btn"><i class="fas fa-plus"></i> Nouvelle réservation</a>
        </div>

        <div class="filters fade-in">
            <div class="filter-item active" data-filter="all">
                <i class="fas fa-globe"></i>
                <span>Toutes</span>
            </div>
            <div class="filter-item" data-filter="confirmée">
                <i class="fas fa-check-circle"></i>
                <span>Confirmées</span>
            </div>
            <div class="filter-item" data-filter="en attente">
                <i class="fas fa-clock"></i>
                <span>En attente</span>
            </div>
            <div class="filter-item" data-filter="annulée">
                <i class="fas fa-times-circle"></i>
                <span>Annulées</span>
            </div>
        </div>
        
        @if($reservations->count() > 0)
            <div class="reservation-table-container fade-in">
                <table class="reservation-table">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Destination</th>
                            <th>Dates</th>
                            <th>Voyageurs</th>
                    
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                        <tr data-status="{{ $reservation->statut }}">
                            <td>#{{ $reservation->id }}</td>
                            <td>{{ $reservation->destination }}</td>
                            <td>{{ $reservation->date_depart }} - {{ $reservation->date_retour }}</td>
                            <td>2 adultes</td>
                          
                            <td>
                                @if($reservation->statut == 'confirmée')
                                    <span class="status-badge status-confirmed">Confirmée</span>
                                @elseif($reservation->statut == 'en attente')
                                    <span class="status-badge status-pending">En attente</span>
                                @else
                                    <span class="status-badge status-cancelled">Annulée</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('client.reservation.show', $reservation) }}" class="action-btn view-btn" title="Voir les détails">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('client.reservation.edit', $reservation) }}" class="action-btn view-btn" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($reservation->statut == 'en attente')
                                        <form action="{{ route('client.reservation.cancel', $reservation) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="action-btn cancel-btn" title="Annuler" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">
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

            <!-- Version mobile des réservations -->
            @foreach($reservations as $reservation)
            <div class="reservation-card fade-in" data-status="{{ $reservation->statut }}">
                <div class="reservation-card-header">
                    <div class="reservation-card-title">{{ $reservation->destination }}</div>
                    @if($reservation->statut == 'confirmée')
                        <span class="status-badge status-confirmed">Confirmée</span>
                    @elseif($reservation->statut == 'en attente')
                        <span class="status-badge status-pending">En attente</span>
                    @else
                        <span class="status-badge status-cancelled">Annulée</span>
                    @endif
                </div>
                <div class="reservation-card-body">
                    <div class="reservation-card-info">
                        <div class="reservation-card-label">Référence</div>
                        <div class="reservation-card-value">#{{ $reservation->id }}</div>
                    </div>
                    <div class="reservation-card-info">
                        <div class="reservation-card-label">Dates</div>
                        <div class="reservation-card-value">{{ $reservation->date_depart }} - {{ $reservation->date_retour }}</div>
                    </div>
                    <div class="reservation-card-info">
                        <div class="reservation-card-label">Voyageurs</div>
                        <div class="reservation-card-value">2 adultes</div>
                    </div>
                   
                </div>
                <div class="reservation-card-footer">
                    <a href="{{ route('client.reservation.show', $reservation) }}" class="btn btn-outline btn-sm">Voir les détails</a>
                    @if($reservation->statut == 'en attente')
                        <form action="{{ route('client.reservation.cancel', $reservation) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-sm" style="background-color: var(--danger);" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">Annuler</button>
                        </form>
                    @endif
                </div>
            </div>
            @endforeach

            <div class="pagination fade-in">
                <div class="pagination-item"><i class="fas fa-chevron-left"></i></div>
                <div class="pagination-item active">1</div>
                <div class="pagination-item">2</div>
                <div class="pagination-item">3</div>
                <div class="pagination-item"><i class="fas fa-chevron-right"></i></div>
            </div>
        @else
            <div class="empty-state fade-in">
                <div class="empty-state-icon">
                    <i class="fas fa-suitcase"></i>
                </div>
                <h2 class="empty-state-title">Aucune réservation trouvée</h2>
                <p class="empty-state-text">Vous n'avez pas encore effectué de réservation. Commencez votre aventure dès maintenant !</p>
                <a href="{{ route('booking') }}" class="btn">Réserver un voyage</a>
            </div>
        @endif
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des filtres
            const filterItems = document.querySelectorAll('.filter-item');
            const tableRows = document.querySelectorAll('.reservation-table tr[data-status]');
            const mobileCards = document.querySelectorAll('.reservation-card[data-status]');

            filterItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Mettre à jour la classe active
                    filterItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');

                    // Obtenir le filtre sélectionné
                    const filter = this.getAttribute('data-filter');

                    // Filtrer les lignes du tableau
                    tableRows.forEach(row => {
                        const status = row.getAttribute('data-status');
                        if (filter === 'all' || status === filter) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    // Filtrer les cartes mobiles
                    mobileCards.forEach(card => {
                        const status = card.getAttribute('data-status');
                        if (filter === 'all' || status === filter) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>