<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyages Proposés | FM Voyage</title>

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
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.1);
            --shadow-md: 0 6px 12px rgba(0,0,0,0.15);
            --shadow-lg: 0 12px 30px rgba(0,0,0,0.2);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --border-radius: 16px;
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
            padding-top: 90px;
        }

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
            padding: 0 2.5rem;
            height: 90px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .brand-icon {
            font-size: 2rem;
            color: var(--primary);
        }

        .brand-name {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            padding: 0.5rem 0;
            position: relative;
            transition: var(--transition);
        }

        .nav-menu a:hover {
            color: var(--primary);
            transform: translateY(-2px);
        }

        .nav-menu a.active {
            color: var(--primary);
            font-weight: 600;
        }

        .nav-menu a.active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary);
            border-radius: 4px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            position: relative;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 600;
            font-size: 1.2rem;
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: var(--white);
            box-shadow: var(--shadow-lg);
            border-radius: var(--border-radius);
            padding: 1.2rem 0;
            min-width: 220px;
            display: none;
            z-index: 100;
            transform: translateY(10px);
            opacity: 0;
            transition: var(--transition);
        }

        .user-profile:hover .user-dropdown {
            display: block;
            transform: translateY(0);
            opacity: 1;
        }

        .user-dropdown a {
            display: block;
            padding: 0.8rem 1.8rem;
            color: var(--dark);
            text-decoration: none;
            transition: var(--transition);
        }

        .user-dropdown a:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .main-content {
            padding: 3rem;
            max-width: 1500px;
            margin: 0 auto;
        }

        .section-header {
            margin-bottom: 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .section-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .view-toggle {
            display: flex;
            gap: 0.8rem;
        }

        .view-toggle button {
            padding: 0.6rem 1rem;
            background: var(--white);
            border: 1px solid var(--gray-medium);
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .view-toggle button.active {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.8rem;
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
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary-light);
            border-color: var(--primary-dark);
        }

        .btn-sm {
            padding: 0.6rem 1.2rem;
            font-size: 0.9rem;
        }

        .filters {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
            width: 100%;
        }

        .filter-group {
            flex: 1;
            min-width: 180px;
            max-width: 250px;
        }

        .filter-label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.95rem;
        }

        .filter-select, .filter-input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--gray-medium);
            border-radius: var(--border-radius);
            background: var(--white);
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .filter-select:focus, .filter-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .trips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
        }

        .trips-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .trip-card {
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .trip-card.list-view {
            display: flex;
            align-items: center;
            padding: 1.5rem;
        }

        .trip-card.list-view .trip-image {
            width: 240px;
            height: 140px;
            flex-shrink: 0;
            margin-right: 1.5rem;
            borderDARadius: var(--border-radius);
        }

        .trip-card.list-view .trip-content {
            flex: 1;
            padding: 0;
        }

        .trip-card.list-view .trip-actions {
            flex-direction: column;
            align-items: flex-end;
            gap: 1rem;
        }

        .trip-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .trip-image {
            height: 220px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .trip-badge {
            position: absolute;
            top: 1.2rem;
            right: 1.2rem;
            background: var(--primary);
            color: var(--white);
            padding: 0.3rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .trip-content {
            padding: 1.8rem;
        }

        .trip-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.6rem;
            color: var(--dark);
        }

        .trip-destination {
            color: var(--primary);
            font-weight: 500;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 1rem;
        }

        .trip-dates {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            color: var(--gray-dark);
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
        }

        .trip-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            margin-bottom: 1.8rem;
        }

        .trip-feature {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.85rem;
            color: var(--gray-dark);
        }

        .trip-price {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1.2rem;
        }

        .trip-price span {
            font-size: 0.95rem;
            font-weight: 400;
            color: var(--gray-dark);
        }

        .trip-actions {
            display: flex;
            gap: 0.8rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
            gap: 0.8rem;
        }

        .page-item {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--border-radius);
            background: var(--white);
            color: var(--dark);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .page-item:hover, .page-item.active {
            background: var(--primary);
            color: var(--white);
            transform: scale(1.1);
        }

        @media (max-width: 992px) {
            .navbar {
                padding: 0 1.5rem;
            }
            
            .nav-menu {
                gap: 1.5rem;
            }

            .main-content {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 80px;
            }
            
            .navbar {
                height: 80px;
                flex-direction: column;
                padding: 0.8rem 1.5rem;
            }
            
            .brand {
                margin-bottom: 0.8rem;
            }
            
            .nav-menu {
                width: 100%;
                justify-content: space-between;
                gap: 0;
            }
            
            .nav-menu a {
                font-size: 0.95rem;
                padding: 0.6rem 0;
            }
            
            .main-content {
                padding: 1.8rem;
            }

            .trips-grid {
                grid-template-columns: 1fr;
            }

            .trip-card.list-view {
                flex-direction: column;
                align-items: flex-start;
            }

            .trip-card.list-view .trip-image {
                width: 100%;
                height: 160px;
                margin-right: 0;
                margin-bottom: 1.2rem;
            }

            .trip-card.list-view .trip-actions {
                flex-direction: row;
                width: 100%;
                justify-content: flex-start;
            }

            .section-header h1 {
                font-size: 1.6rem;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="brand">
            <i class="fas fa-route brand-icon"></i>
            <span class="brand-name">FM Voyage</span>
        </div>

        <div class="nav-menu">
            <a href="{{ route('client.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a>
            <a href="{{ route('client.reservations') }}"><i class="fas fa-suitcase"></i> Mes réservations</a>
            <a href="{{ route('client.assurances') }}"><i class="fas fa-shield-alt"></i> Assurance</a>
            <a href="{{ route('client.voyages') }}" class="active"><i class="fas fa-calendar-alt"></i> Voyages</a>
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

    <main class="main-content">
        <div class="section-header fade-in">
            <h1><i class="fas fa-globe-europe"></i> Voyages Proposés</h1>
            <div class="view-toggle">
                <button class="view-btn active" data-view="grid"><i class="fas fa-th"></i></button>
                <button class="view-btn" data-view="list"><i class="fas fa-list"></i></button>
            </div>
            <div class="filters">
                <div class="filter-group">
                    <label class="filter-label">Recherche</label>
                    <input type="text" class="filter-input" id="searchFilter" placeholder="Rechercher un voyage...">
                </div>
                <div class="filter-group">
                    <label class="filter-label">Destination</label>
                    <select class="filter-select" id="destinationFilter">
                        <option value="">Toutes destinations</option>
                        <option value="europe">Europe</option>
                        <option value="asie">Asie</option>
                        <option value="amerique">Amérique</option>
                        <option value="afrique">Afrique</option>
                        <option value="oceanie">Océanie</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Date de départ</label>
                    <input type="date" class="filter-input" id="dateFilter" min="2025-05-08">
                </div>
                <div class="filter-group">
                    <label class="filter-label">Durée</label>
                    <select class="filter-select" id="durationFilter">
                        <option value="">Toutes durées</option>
                        <option value="7">1 semaine</option>
                        <option value="14">2 semaines</option>
                        <option value="21">3 semaines</option>
                        <option value="28">1 mois+</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Budget</label>
                    <select class="filter-select" id="budgetFilter">
                        <option value="">Tous budgets</option>
                        <option value="1000">Économique (<1000€)</option>
                        <option value="2000">Moyen (1000-2000€)</option>
                        <option value="3000">Confort (2000-3000€)</option>
                        <option value="3001">Luxe (>3000€)</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Trier par</label>
                    <select class="filter-select" id="sortFilter">
                        <option value="price-asc">Prix croissant</option>
                        <option value="price-desc">Prix décroissant</option>
                        <option value="duration-asc">Durée croissante</option>
                        <option value="duration-desc">Durée décroissante</option>
                        <option value="date-asc">Date proche</option>
                        <option value="date-desc">Date lointaine</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="trips-grid" id="tripsGrid">
            <!-- Voyage 1 -->
            <div class="trip-card fade-in" data-id="1" data-destination="europe" data-days="7" data-price="850" data-date="2025-06-15">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1502602898657-3e91760cbb34?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Nouveau</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Découverte de Paris</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Paris, France
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 15-22 Juin 2025 (7 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtel 4*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-utensils"></i> Petit-déjeuner inclus
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        850€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 2 -->
            <div class="trip-card fade-in" data-id="2" data-destination="amerique" data-days="10" data-price="1250" data-date="2025-08-10">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1518241353608-43b8f307dcac?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Best-seller</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">New York en liberté</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> New York, USA
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 10-20 Août 2025 (10 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtel 3*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-subway"></i> Pass transport inclus
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        1,250€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 3 -->
            <div class="trip-card fade-in" data-id="3" data-destination="asie" data-days="15" data-price="1750" data-date="2025-12-05">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1532236204992-f5e85e2ceec3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Promotion</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Évasion à Bali</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Bali, Indonésie
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 5-20 Décembre 2025 (15 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Resort 5*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-utensils"></i> Demi-pension
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        1,750€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 4 -->
            <div class="trip-card fade-in" data-id="4" data-destination="asie" data-days="14" data-price="2450" data-date="2025-04-01">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1490806230066-f67656f90e79?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Exclusivité</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Aventure Japonaise</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Tokyo, Japon
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 1-15 Avril 2025 (14 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtel 4* + Ryokan
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-train"></i> Pass JR inclus
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        2,450€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 5 -->
            <div class="trip-card fade-in" data-id="5" data-destination="europe" data-days="14" data-price="1950" data-date="2025-09-01">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1518962580666-76799f135 Diss?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Romantique</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Lune de Miel en Italie</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Rome, Venise & Florence
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 1-14 Septembre 2025 (14 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtels 4*-5*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-car"></i> Location de voiture
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        1,950€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 6 -->
            <div class="trip-card fade-in" data-id="6" data-destination="europe" data-days="5" data-price="650" data-date="2025-07-20">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1544181040-665d261f68fc?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Famille</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Disneyland Paris</h3>
                    <div class="trip-destination"> 
                        <i class="fas fa-map-marker-alt"></i> Paris, France
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 20-25 Juillet 2025 (5 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtel Disney 3*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-ticket-alt"></i> Billets parc inclus
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-bus"></i> Transferts inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        650€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 7 -->
            <div class="trip-card fade-in" data-id="7" data-destination="afrique" data-days="12" data-price="1850" data-date="2025-11-10">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1519657740076-8e5b86a2c700?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Safari</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Safari en Tanzanie</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Serengeti, Tanzanie
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 10-22 Novembre 2025 (12 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Lodges 4*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-binoculars"></i> Safaris guidés
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        1,850€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 8 -->
            <div class="trip-card fade-in" data-id="8" data-destination="oceanie" data-days="21" data-price="3250" data-date="2025-02-15">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1507528037699-8e862e4f42c1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Aventure</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Découverte de l'Australie</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Sydney & Great Barrier Reef
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 15 Février-7 Mars 2025 (21 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtels 4*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-ship"></i> Croisière incluse
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        3,250€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 9 -->
            <div class="trip-card fade-in" data-id="9" data-destination="amerique" data-days="8" data-price="950" data-date="2025-05-20">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1506953823976-52e1b35e2e1a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Économique</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Escapade à Cancun</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Cancun, Mexique
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 20-28 Mai 2025 (8 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtel 3*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-umbrella-beach"></i> Plage privée
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        950€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 10 -->
            <div class="trip-card fade-in" data-id="10" data-destination="europe" data-days="10" data-price="1350" data-date="2025-10-01">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1534797257736-5fc74b1d7d12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Culture</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Circuit en Grèce</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Athènes & Santorin
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 1-10 Octobre 2025 (10 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtels 4*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-landmark"></i> Visites guidées
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        1,350€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 11 -->
            <div class="trip-card fade-in" data-id="11" data-destination="asie" data-days="18" data-price="2800" data-date="2025-03-10">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1518546305927-5a55bb6c7cd2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Luxe</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Circuit au Vietnam</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Hanoi & Baie d'Halong
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 10-28 Mars 2025 (18 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtels 5*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-ship"></i> Croisière Baie d'Halong
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        2,800€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 12 -->
            <div class="trip-card fade-in" data-id="12" data-destination="afrique" data-days="9" data-price="1450" data-date="2025-06-01">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1516026672322-bc52d61a1d18?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Aventure</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Découverte du Maroc</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Marrakech & Désert
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 1-9 Juin 2025 (9 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Riads 4*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-camel"></i> Balade à dos de chameau
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        1,450€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 13 -->
            <div class="trip-card fade-in" data-id="13" data-destination="amerique" data-days="12" data-price="2200" data-date="2025-07-15">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1504214208698-ea1916a2195a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Exploration</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Aventure au Pérou</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Cusco & Machu Picchu
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 15-27 Juillet 2025 (12 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtels 4*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-hiking"></i> Trek inclus
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        2,200€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 14 -->
            <div class="trip-card fade-in" data-id="14" data-destination="europe" data-days="8" data-price="1100" data-date="2025-05-25">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1511739001486-6bfe10ce785f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">City Break</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Escapade à Londres</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Londres, Royaume-Uni
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 25 Mai-1 Juin 2025 (8 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtel 3*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-bus"></i> Pass transport inclus
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        1,100€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 15 -->
            <div class="trip-card fade-in" data-id="15" data-destination="asie" data-days="20" data-price="3500" data-date="2025-11-01">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1528164344738-073dfdf2b8a1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Luxe</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Odyssée en Thaïlande</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Bangkok & Phuket
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 1-20 Novembre 2025 (20 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Resorts 5*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-spa"></i> Spa inclus
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        3,500€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 16 -->
            <div class="trip-card fade-in" data-id="16" data-destination="oceanie" data-days="15" data-price="2900" data-date="2025-08-01">
                <div class="trip-image" style="background-image: url('https://images.unsplash.com/photo-1514282401047-d79a71fac224?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    <div class="trip-badge">Nature</div>
                </div>
                <div class="trip-content">
                    <h3 class="trip-title">Exploration Nouvelle-Zélande</h3>
                    <div class="trip-destination">
                        <i class="fas fa-map-marker-alt"></i> Auckland & Queenstown
                    </div>
                    <div class="trip-dates">
                        <i class="fas fa-calendar-alt"></i> 1-15 Août 2025 (15 jours)
                    </div>
                    <div class="trip-features">
                        <div class="trip-feature">
                            <i class="fas fa-hotel"></i> Hôtels 4*
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-mountain"></i> Randonnées guidées
                        </div>
                        <div class="trip-feature">
                            <i class="fas fa-plane"></i> Vol inclus
                        </div>
                    </div>
                    <div class="trip-price">
                        2,900€ <span>/personne</span>
                    </div>
                    <div class="trip-actions">
                        <a href="#" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagination fade-in">
            <div class="page-item active" data-page="1">1</div>
            <div class="page-item" data-page="2">2</div>
            <div class="page-item" data-page="3">3</div>
            <div class="page-item" data-page="4">4</div>
            <div class="page-item" data-page="5">5</div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filters = {
                search: document.getElementById('searchFilter'),
                destination: document.getElementById('destinationFilter'),
                date: document.getElementById('dateFilter'),
                duration: document.getElementById('durationFilter'),
                budget: document.getElementById('budgetFilter'),
                sort: document.getElementById('sortFilter')
            };

            const tripsGrid = document.getElementById('tripsGrid');
            const tripCards = Array.from(tripsGrid.querySelectorAll('.trip-card'));
            const viewButtons = document.querySelectorAll('.view-btn');
            const itemsPerPage = 6;
            let currentView = 'grid';

            function toggleView(view) {
                currentView = view;
                viewButtons.forEach(btn => btn.classList.remove('active'));
                document.querySelector(`.view-btn[data-view="${view}"]`).classList.add('active');
                
                tripsGrid.className = view === 'grid' ? 'trips-grid' : 'trips-list';
                tripCards.forEach(card => {
                    card.className = `trip-card fade-in ${view === 'list' ? 'list-view' : ''}`;
                });
                
                filterAndPaginateTrips();
            }

            function filterAndPaginateTrips() {
                const searchValue = filters.search.value.toLowerCase().trim();
                const destinationValue = filters.destination.value;
                const dateValue = filters.date.value ? new Date(filters.date.value) : null;
                const durationValue = parseInt(filters.duration.value) || 0;
                const budgetValue = parseInt(filters.budget.value) || 0;
                const sortValue = filters.sort.value;
                const currentPage = parseInt(document.querySelector('.page-item.active').dataset.page) || 1;

                const today = new Date();
                let filteredTrips = tripCards.filter(card => {
                    const cardTitle = card.querySelector('.trip-title').textContent.toLowerCase();
                    const cardDestination = card.dataset.destination;
                    const cardDays = parseInt(card.dataset.days);
                    const cardPrice = parseInt(card.dataset.price);
                    const cardDate = new Date(card.dataset.date);

                    const searchMatch = !searchValue || cardTitle.includes(searchValue);
                    const destinationMatch = !destinationValue || cardDestination === destinationValue;
                    const dateMatch = !dateValue || (
                        cardDate.toISOString().split('T')[0] === dateValue.toISOString().split('T')[0]
                    );
                    const durationMatch = !durationValue || cardDays <= durationValue;
                    const budgetMatch = !budgetValue || (
                        budgetValue === 1000 && cardPrice < 1000 ||
                        budgetValue === 2000 && cardPrice >= 1000 && cardPrice <= 2000 ||
                        budgetValue === 3000 && cardPrice > 2000 && cardPrice <= 3000 ||
                        budgetValue === 3001 && cardPrice > 3000
                    );

                    return searchMatch && destinationMatch && dateMatch && durationMatch && budgetMatch;
                });

                // Sorting
                filteredTrips.sort((a, b) => {
                    const aPrice = parseInt(a.dataset.price);
                    const bPrice = parseInt(b.dataset.price);
                    const aDays = parseInt(a.dataset.days);
                    const bDays = parseInt(b.dataset.days);
                    const aDate = new Date(a.dataset.date).getTime();
                    const bDate = new Date(b.dataset.date).getTime();

                    switch (sortValue) {
                        case 'price-asc': return aPrice - bPrice;
                        case 'price-desc': return bPrice - aPrice;
                        case 'duration-asc': return aDays - bDays;
                        case 'duration-desc': return bDays - aDays;
                        case 'date-asc': return aDate - bDate;
                        case 'date-desc': return bDate - aDate;
                        default: return 0;
                    }
                });

                // Pagination
                const startIndex = (currentPage - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;
                tripCards.forEach(card => card.style.display = 'none');
                filteredTrips.slice(startIndex, endIndex).forEach(card => 
                    card.style.display = currentView === 'grid' ? 'block' : 'flex'
                );

                // Update pagination
                const totalPages = Math.ceil(filteredTrips.length / itemsPerPage);
                const pagination = document.querySelector('.pagination');
                pagination.innerHTML = '';
                for (let i = 1; i <= Math.min(totalPages, 5); i++) {
                    const pageItem = document.createElement('div');
                    pageItem.className = `page-item ${i === currentPage ? 'active' : ''}`;
                    pageItem.dataset.page = i;
                    pageItem.textContent = i;
                    pagination.appendChild(pageItem);
                }

                // Re-attach pagination event listeners
                document.querySelectorAll('.page-item').forEach(page => {
                    page.addEventListener('click', function() {
                        document.querySelector('.page-item.active').classList.remove('active');
                        this.classList.add('active');
                        filterAndPaginateTrips();
                    });
                });
            }

            // Add to favorites
            function addToFavorites(tripId) {
                console.log('Voyage ajouté aux favoris:', tripId);
                alert('Ce voyage a été ajouté à vos favoris!');
            }

            // Event listeners
            Object.values(filters).forEach(filter => {
                filter.addEventListener('input', filterAndPaginateTrips);
                filter.addEventListener('change', filterAndPaginateTrips);
            });

            viewButtons.forEach(btn => {
                btn.addEventListener('click', () => toggleView(btn.dataset.view));
            });

            document.querySelectorAll('.btn-outline .fa-heart').forEach(heart => {
                heart.addEventListener('click', function(e) {
                    e.preventDefault();
                    const tripCard = this.closest('.trip-card');
                    const tripId = tripCard.dataset.id;
                    addToFavorites(tripId);
                });
            });

            // Initial filter
            filterAndPaginateTrips();
        });
    </script>
</body>
</html>