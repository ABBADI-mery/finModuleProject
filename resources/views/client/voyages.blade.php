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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 2 -->
            <div class="trip-card fade-in" data-id="2" data-destination="amerique" data-days="10" data-price="1250" data-date="2025-08-10">
                <div class="trip-image" style="background-image: url('data:image/jpeg;base64,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');">
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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 3 -->
            <div class="trip-card fade-in" data-id="3" data-destination="asie" data-days="15" data-price="1750" data-date="2025-12-05">
                <div class="trip-image" style="background-image: url('data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUTExMWFhUXGBsYGBgWGBgbGxgdGRsYHh4aGBgdHiggIB0nHR0YIjEhJykrLi4uGB8zODMtNygtLisBCgoKDg0OGxAQGzImICUtLS8tLy4tLS8tLS01LS0tLS0tNS8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALcBEwMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAAEBQIDBgABB//EAEEQAAECBQIEAwYEBQMEAQUBAAECEQADEiExBEEFIlFhE3GBBjKRobHRQlLB8BQjcuHxgpKyFRYzomJTg6PC4jT/xAAaAQADAQEBAQAAAAAAAAAAAAABAgMEAAUG/8QAMBEAAgICAQMCBAUDBQAAAAAAAQIAEQMhEgQxQRNRFCJx8AVhkaGxFTKBQlLB0fH/2gAMAwEAAhEDEQA/APp6YtEUgxYkwCIAZ6p9oiJZOYuTFqYIM6oqnSL2EUrYe8QPMtDykRk/bjRJUlKknmwR1SSHPo+fvHNlKjUQ44fTHtI6+kQ4aoqQkK94C/fva0LvaJcxCXlhRqISpQbkTuxNg5/S28HJmIS1FmIqe8on8ZUlSgEYLJFQdV+mcX3+kLtBxyZMUpQc3KUsl0vk3fo3+0xm5ylpKEggqYEklQUSrCVMXYXL2ts0aAFkl7OG982JqBKXDObX7+UeLkzZAbc+feXCitCPOBa6aVUTEu4qC6iQdgw2sxZ940NNsRg9FxOhaqlFCwOYunpgp3ZyzdI02h9oApgsBIYMrdVthl3+ojZ0/VqPkMBTzFfF/aCYlSpQHMxfdLC9WMMwd2iOm41NEs1KeossqNNNTjkt0YfOEXF58rxFEFSi4SSLBbJYLI2+DFu8TlzwAtCl0kipmBKWd7bi4PZ3xGHO2QNyVu0cARirXiaEBi6Q1gWckElyQXcfL0iE6SKUhKlFTuxIAJe9mJcGzdoL0aQaTUSCN0jr+JXm1sbwNp9MhMwKmTSQxULukKLhIPQ73bPZyMbPlGqndoIhBmE1VIKQUkCzXzewsWsPW0EyAZMwMpRD2oJAIDU2OLjfoYX6zXyVKKgOYMMlYICrk33cW6jvHabi62KVhiKVEMb1EikM1t+vzjmWu2x/H/cabbS+0iVAlSCC7BIYkdar2b9iHVYZwX8o+XyZ6ieQISbqICmDEFncHzpaNBpuJzES0pcFQaqkO9tg2NvS8aMXXshrLv8AmIVvtNfVEwIQyvaAOgKCQDlRJHyv9dxD8ER6OLOmUWpiVXeeGK5oghIEelMVnRe0QxB8xAgVYveGEQziq0VTFmJzFgYir3oIEUmUlJMSSlsxf/Dlo9UkjaGuCpWZYbpEfFa0XUvtFM+WRAE4/lPUGq5EEBDiA0qO0EyiY4icplwlCOiLHrHQlR5GYQLkgecTTGfmLILlaiog748vvA8vWLQXBIAtt1Nr+fyjz8vXpjNMI4E1yYtEZvS8WUWGT1w58jjEOkaoN+/lFsWZMotYbhM02MZHjkkqUSTgWvtSbemX7nYsCdfx0qrQBQlJZRNiewvs4PeF07UI8MlJ/Aok5AIGQBg3IbtGXL1KseK+IwElwjV+GGBdLp8ki7je4bPbtC3iHGDNUKQDLUghQLs1ZuRuGa/3gfTpRLqUlZUCCCE5BJVzdjSSNvWKkakKUeUBDABW6nuBfPKA3r1jHkzPZW5wAqW6ihQUqiWSA1TUsAGcjOLHNhCTTKU4BDpD0kOkc2zksLNkNZ9oYp4gXUgIKbFgLX72ixUlwlZpCmoW7B7VAjoQHHdomrtRs3DE+v1a5gkpSp1g8xYgoBAuFXdIY236QaviBMunkU16gHcWYl9ib26wn1WlWgrSVi5aySrLEE7hu569olptUhKEpUpJDFS6SX5WYXLE+nzeLcflBX9oDLtU0tDqmpIupNLAl9mZwLD4m8EHQKUlJuFJCRYkna53uCNvwtCjU6kTOWgqABUpSXqIy5DbWiOn1qED3gwKWDkqu+CQndutvjFBiar7QibCUhQsNkhJ5iCxcnlINwCGfcNe0SUzy2cnACgxsl/eNtju47bJOBrWskpUoBhUlgpTsMFwQLgkMbHvDgpmXCk1AEG7sUq5Vfhxvfrs0ZuARt7hMqSuWEiaAk0KdjUXGWcU3BIxhu1lnEtYVzwFIKEWKQp3Ocv5Y/VhF/GZUgqZIMsUC6VOTSBkLOAQS4yDA0hKQpKlkG6mCrWTTSCGNjdr5aNa49UGsRbl/D9Rzn3SF2Kdyb3cvdxjyhjqkLSUpCVljdBDe842s/ISw/N5Rm9LM96kKdJIYGxGSKtzn4QZ/HahRCvEUUlQZKrk23AF7jLOzd4VsKbJhv2m04QgTaDUEEXIsagwZJL4ba+I1qpkfLtOqdLqFkmoFqFN5qNu9upjRcE166kBSk0qqwc4DkkZs/dzD9LnXC3EjR8j/mK6kzW+NBCJ1swveOePa4zOGIjBc2B1XMDuY9fvHcZ3K5KZKjkBojVHKLw1QXDPGDRTPnA7xQ0LuN6gykiYATSQ4G43HqIm9IOUPImN/wCI6CKlkmBdJrUTByn0gmGUqwtYCTItHtRjmjoaCc56x0eFY6iPI6GDy+G8zk9fm32i9fDkEJGwf1J3hSriU0k0qThqbm97uLg/aFOp1s3xKjM5MslwbXJ6YHYdtz4vxPRbrZleLRjxTQXKkkglhYgYJAT3F/20Br1k2Sp+nncEk27kDc7bZjyVxIJQ5Cgyt3NLE3D/ALz3jhq0qSSwuLm5FgcgG9i4Lv3jNfTs9g8TGIYCD6nVibMABpDEurKics1wbnb6GCJMmgJSxYhTkPkuHY5/sIV6pdBKk3SwUkmnoMAuWs3W/wAR53tAoskszHqbZ7MSxhMmEqbHf73HUxpqlpVKUgklrBRewb38Yzg7CE8+aCWpUQBsAbAXJI3YfSCEKCg6g4ULbMLUpYZu3xGWgDiXERKJZIuBUwLAmnzd2N8Y3eFLFzsbjVPLU+8SoEhD3L2sX2a22YMk6xNLG55Ve6oAFtyLkc2b4hXpl1iq4ADAmzsMOfQ+sEhSLlQsKgCEhuUVMC+CCnI6whHiCpVq9MEpBAKQoMeayiDYnd8b9HhXrGBASm7/AIAQrHMBdrl2cH1jQ8OnompCWqTuCbsbX6EH79IC4vwgAGlyoVMHUygzikXFV7ANcRXDk4tucRLjpDUiVInS2UlJKFslfUioJ5XAa23TZTVpggyTK/munnqUkC3MlTm9KruGtfDwn0OomS1lUtRQpmJcuNm2+ENtHSGSrHvKcVMyqiKhsbP8N49F8kUR1L1SUiWy1BSWpVSSFpYHAF279mi7ik9JWUVnKUENzJK+ZwcY6N7xG0K/GQJlSVBlVdA9JLG1wbgYsD8J67UHxDMUGBSgVU3DoCVMrqrO+3aMvw63HAsSxGp8cJFVSgspOz9DmxItkv8AOB1cJK511U2ITdykh7jY9i+T6w8l8Q0yZnjqQUJCXRL/ADMwSCoYe5c42g3T8aXPStCZaJKTzgpSh2JACb4L03Z3LxUIqHRnavczHFtH/CpSZQKASlyU1K3PIVFiLc1rEgXtFy9d7ipToDivt5E7O45S1r9Ice1OgVNSmg1KlqKC5/CpnJKQOm+xeM/I4hLRUCkAKKaSGUXyck7kZ6DEDJjPGzsxshAOu0cJ1a0Hw3xTSVKSykjo5d82eNRw/USk3WE3PKUuXL4bzcvGU1OtSwqVdyUGxKX2IfH3EWDWJCOWqouQAc/0ucRgV3Rg6ruTJB1Nxr+LSpRIWq4DsAT88D1hHL9ozNIKQEhJcgKd2yO9ntCSTrJ85QmLIL2KbYb5MAc/rAyCUEpCFBAdmbBu59P8xtzfiGRmIXt995FUE+hHiskKSnxA6g47Dv0gmXOSokJUCRliLR861eoU6Fc3h/mYMAbuRm/UQ89mZ1E96wUqDdB88XBtF8X4izOAwFH7/mcceprFFo5CgQ8U8VnAJJYsL2MZJerUpQShy+EpqZ9y37zGzL1IQ1UUJc2wTCrjwdDAirob/FO8X6TiyClKVWULHcBupgPjU9CkM/cWNj2IZvN4b1lZCVMUjxEns0FGaRYBLFSj0NwlLn9+sabX63w7sVCwZIJN+gHpGQ0k4y51TuAkEu1/9Rb+8XniIE1E1RYC7Wd8UsN2c7x5SdQcXyL3J/SVC3ubDTTQtAUMEP8At4G4jq6KRuXP+1v1I+EKOKcemC8o8oDlwlmud73sOsKps7UzUmaC4SOZRDKAfCBgMTtcu20bsnV6Kr394oTyZqJc22H82PzjyMhNmJe8y9n/APGdv/kX/drR5EfUf/cI3y+0acUkGSzKIBflSACGPUnFj9IUzFFailKWsXbFt/kYN4vrkCcoTCVElyEh2YKFvIKz1vtC8caSusIlrSkBgSQVNhR7OxLufdJiGXpEHJhGV7IEO/ialUU8ibDNwLl1ZLlh+sSE11EOMOxFh0bsLPbCh3ikz/DKCpPKxJbLcrvuSQ+em0dK1SVKLJcpA9agAb/luB6R5ZRSbO5oPtE2q00wTCEmlLu4x1el2OQ4xFBlcyUtcLSX6hQIGf8AHwhxOmpSkKUo0qxg0m1/Sx9TCyavK0kiilW7KAvYjd7P9o14mNQKgJl/EdKqpaXHK9TH3DTZz1wGfeFk2ehwSkqs7EWCag1s2Z7i9RbMQ0XEEzgErOCSoKUGUVbsz7vc7ecErmhIIWUlikCkjmUCgguMjA8h5xVlA0BFqDTJKwEpK3NwQ9rFV+lVXiA+QhrprSGIdVXu2sGz8h+zEZurQkFATZNTkXU+6vNzb1JyIGE1KiK0gEMkbgFRUUgHYXZ+w84kQxFkRqEjpdJ4ZKnZLOGu1zZ7fKDJeqUpVqhzuKijmcDpkeVx84tkrCOUpYAjPQs6v9qn80mA+MaRRJShQ3Ca+qdgW2f59oUAcvmi1KHQpcwTE8qzTWSSUlBpF+mCR0ALmLkIShZSkkOnlNQURzDFwb3zmIrSBZSQBgjAVypBJUAHYnt3gpdK1jmNabWFKSxccuSAGdj0iuTID9Isqm6BCQSqXWAkGktSNrKTd3IY+hgPiSky1Fc0s5ShEsG6qEJSSq1kC/qe8O5c8hYUU8gDqTysb25upLk4Fz3jB8TnKmVz5hVUVqbFGzJHS2LbCNHTk5Fr2jA0I34jxOVUaFFQPurZLjdIKWyl2N/wgxreEIKRKCkgLmPOmdeUMkFx1U/bG0ZL2Z4eJs5ClP4SGmLT+EHZKSDgsPgY2comZOmqdmAQG8nP/IB+0XCAG5y7lsqY8xYJLKS5vuHBY+Q+cZ3W6QBTLtRUHuMgFJcXcj6GHS5ZSuWv8NRQzNYv+ogT2v0JmS6h+Bznbc+lj/uhcqWLhftM/rdOpAlzLlHvrDnI/E5ZixGPnmJaXUhUxKkFVuvMxarkDFhbrAs7iIXJKZiecWAdstti7Qp4bPmVAISQScBiDuKgfTeM642ZTy7yGzNrO1KWRNCqEqNKic39OxuOsU8S1VbLQuoJDvvg2NPQufMjq0ASJyAhCQlUwgklOXcEe7sxdj5xCfqZsuWpSdOUJZmcHIPMrOerdIXHjCbrfjtKLQhkviwCAmpwNmKiAAkPm17Q2VqKAoqCTT0YOzFiAPqTmMZwqucqsrRLSTyukGu5JJDjtfJtDziUuYf5iZgKWpIsKXyTfG3aBlTHfEwFhUdp9plFAQskhmAUmzN+ZN97Wh7wvi0slSmAUElSVBQINhYHY7xiEIC1AKFiEgl7Ntcd7bEOIv1fC1KXTLTa9gQxDBkpSM3PrfrBTOUcG4lAioWjiRFLP76XVZlBvtV8oZnWGagEkFN26DHL+YG+x9YzsisJpmS1KURu9gCGdQwRfPSGEiUtKAUhTF+pY72br/naAqqDyQw1feDazWipIscAHcOer9W657QbOBUoJRLIcupRdkuGxvh8bHvGb1upUkl2UMM1i56tm3xh7w3WkOVEuQCx7t+7ecTyaYGOo1UN4tKpliomwLMQKlDqE47eWOour1S/CSgrpSyl0BROxKR1tjaOnkrUZiZhxSFKFWCCAMhN7+vxR8RmzEUABiKiDUDgWL4OzX+ghw3I0hr+YCK2Y7lagNgeoQ/b8PSOjLTRPJJ5i9xdWNsEbR7FPQEHKanVTgx/ll2u+/Zrv/aCuFTJaUCqUmosxxe5bGx5swLNTcgXubFQc9j3ItiPDSl6gfMFxfYDz+e8IuRl0DKlQe8bcU1gMtU5IcppDEGxJdz+ziEUjXrWahycrEGWUBg7O6iDe2w69geJ6lJV4ZUpJIJuAX2uHYm5w2Yv0nCygKSQUlRBpN1EWukbPblv9zxXvOoxVpJAUtJWSpz7oNTBwDU5ACWa142p0pFEuUCE5NV0qJsoZew69S28C8MAQpIQEhRIrUq7gBVv6bfMW6nJmrMqSoIpaYUqu5AWrLP1bYxizuWMKrMpxHgMyolKClSRSQ71MSXSc7i5uSoecUzkAywVhYWlQd3vsx6dX7GNZxCbNmKmS5rFKZayFMeYUmnG4V2feM1pJRCSaqlFLlCjtcAgq8rDt3iuN2I3ARR1LtBpAZSlBwQck9jb99ICQVlVChUCk3T9VMchh6QTO1yEJEsKSxuqyiHOLjGwvu8WI1iLCplNSCHsCTZzu+/SKAOLoXOIgnEULWlBZ1JdBbrkEdXA+L9Ypl6lUxIqmWSbEvVk565PoBB03SKoJQS4CVts4I+xx3gbUaSWoGZhwF0dC6agPQeVxFEHIVGk9d/KQiYwWsYUWpUCN3t7tmOTe8BcE4tW6VOLFiL3LMRblZmfpB6gaFEcyWpUg4IBdwLt+FXqYjI4OhwmpizhyxI2AL4+BBjicYUhhuKw3ccSZavCIWhxNDHA5XNwQewt3Pqo1HDUISQEVXUz1qswcU2vYXHaGVCy4TcWNyBSxqCUpez/ALfZjodI5SZiCkpJNxkgNfpfeExFiaU6gqzI+z3Ck6aQxDH3lnBsMP2Abzizgyh4dSmBmFSi7/iJP0IEW8YmfyVhJ99kWbKiE/cwSNOAEi1g4+nTFvlHpeI4EF1vNLWRcp5v9pCrfA/GDklKkg2YpfsXimn/AFPYxHhB/lgG6kcp9N32gQzFcU4TRNCStkPblctdgBfex7iDuGaKSFlaOYYLgBmv8fV4a+0vDFLSlaQK0lxg2Vn7+hjO6RU9CgBQmu1QuTUbg94yZlbsDIlSDqEjTSkrUoKDBL3uwJUrPqoP5dYlxDVBEgEUlCzcsQzEHD3JvvtiBuJzApQHiBKTRWpKSpSimrkbr6/3R8S1UwfyiClJNkq3wOw823hFxFyGJnFT5mj0JNTiWAAAyaUhxkAnD4vs7RaslclYRLpU5BSwGLOQ1LgjsCxhVwhVCfEm2CQBhgLt62PaDuH8RmTElg4dRLWADqZuhpLvcu0I+Ojf0gC+8O4Dw1ah4k9YL2oF0kMAXN79uwvBHFtPSkeEGpZ/zGoMG62B+PwjpOKJQKCRZT8puxNmBNvjtFOp4h/LUo3NYBBsXDt16u32gAMWsymq1F+mE6Yplzlhin8V+a7EOL5aGUxSJK6BOq6h3UFA4sClinqWBtaA18SC5ayhVKyRUGvkvSXa4+fpCbia0pQDLFSmKWsCkEEVGkZdj3Zo041VgVI3Eo3C9cpKpqqCkvlNJAKgCH3Bu1/2Qf4ykEkn8rfZ8Yb4wJWoISQkiYTcMQyQQ6vW0XyJAXUq6yR5C3QecHgANwsD3j/QTqgHPKQwBzhRttsfUxYumpLpJcFSXy735u/zt0hbp0EIDUs4u4dx523+cMeGkKCXNwUsN7nbszn4RkZQDCu4aOKadHKp3BI6tewdukdENToZZVzBJIYEiu7AB7DtHROh+cf02nS1oUeV03Atk9n9fN7QWuQwHMw3u4Hcn5fF4T8T1fglqWciz1Xu72GLejRZIUpcnlmgmYRzqD2ChZjZ7lgOjd40kAbgsQ7UcigRSVJFSXsXfYszm3e+0DcV1i1FMxmWAQAKjVkBW+z3dgRHk6pCrJJYZSAsPdgwulgA5u9oU8amLnJMlCqSkBQTSxJIwH/docFSanHJqhHMtbgFCOWlYDlvels5O5um3l3i/RcVGnTKCi9c0iYKnYKFxfYKJPnjMA6BR8A0khOwUxLqABDfD1A8gadEhQQyBU4XlgRy7328nPlEnxqdHtKLuG6wlapM0EOictDO7pcj4cv/ALQt4kgXWgFhMUg3DsWIc+q/pBGoR4WnQSFBUsAil6bcxqH5n6XwYWy+KApUKFsr3lFJCRcF3OcXzZ4gqEbERjXeVIQgysEG3mx2VZmzfyhFq+L6cFqmILEMW88XjRJTUozfFSp7BJIFQZQppd/8QL7VIQkS1GVLXMpEvnpqN3CQGuQ7uztnBjV0+ejxiLuLeH+1UuWbrBT/AEno3T0jyRxaTMnIKVqAFgyCS5tzYsTvCPV6EBd9P4anBYKJABI2b9YdaPhWmllKlKWJhTWp0mlDvepnAz1fEa2VBbr3InG44kFGnmKNRUCCyGLAHNQ+TdniU7WImDkScXAaoAWKS5w1rYzENPwSapJXKBWCOVgzh6nchsh7wRwj2UmpVWpaZdsg1KB8hb5xkGPmeRO5wDNJ8PkcxKHSUsQAoXwbkE3/AH0jV0KABJqURzKsL22gHhXA5UouHUb3LWfoGaGa9QB+J/Jv0H7aK4sZUkmOq1FnEgDOko6EzFW/KGDnzMFzCUqI2DPAWrmgqrGWZ+3R/wBvEfHX2P8Al8xcmMBDier52vv9or0SwmdMBwWO24Fxv1gJOoWHNvhd4H1S5pImILFIam3ML/PzggziJoZqQXSbbvs/7tCIcLRKqW71FkpUHAJIuLWa4GLt3ien9oHsQARYpuCD3Edq9aV9R5HPZ+mIjnxl1od4Jn+LcPLuhJRMKUqZuUs9TENdwDeBNJKr5FkJUME3YtYF8DyjXajin8ulUtKiPdW9xcMFOL+fVoRapK1T1sUqQklscwbAVvYY6eUYlOQCmFRGFQAI8WkKUGDDZmA9Nx84Z8IR4ZVWQwSQMMTsO0AzpSAxYgFTcxIZjd02Ivl/7wWNIa0p5KSojIUpj7ufNr9IdtijGUWakdRohMLs3MMG4Bd/SI6gI5wymKTcj8ScKLOx7941kjh8tD0pzl4qnaJN2wdvOI8ze+01HonUXMQuWUEKCakqAKBm24ft/wDqIuQEqVLXMSTZqU1XuGcJu/7Ea3hGhEpNOeYkPt+7Qr1DDUKUEVBCWAH5mIc2YDmV50+cW9QHtEfp2GMN7+Ij4lMCl0mnlSknrUsAqGf6LdnhnodB/KVMBLAAsS3ViCB2PqIXzVCYU0gqKlEgkXw1z5nHbEaHQqRLkmXMBJSQtIAFQS7FYByE+8c27GEYHQmMDcWS5KFIs11EMMDHMepxbeLV8MEhFRU6SOwLmwIP76wn1xVpvES9QACwUmy0jBB6N8xDDVTk6iQVVMNnwAALi75YekOVYfQzgYbJE5Yql+4SWe5sSOkdGcPEEo5ApwmzgG7eUdCnE96H7GXDY/MZf9YQ6gSMHJJY9mHXyiB1YoUX8RhYJDMOpbcYtmF3HtKkpRPlJdEz8uytwTh8j0PSAky1pBU7HABFj9LPFfhlEzXL/wCLUEnw6mDBT365727YPpORqwkAk1qyNmZ2A74gGfqvdYBJYhV89WtbHUwJPmkF8kFnf9Yt6XLU6azSLUsEgcqx0w1+93Dd3h9wnUmxJWkXDO9mA2tntYxgJPF1ilhkuz5IJD4Ztm842nDDLD81TsHAIpJfAAtd2LBrekmxlf7u0vjMu4pOCUKWVKBNjSoFKhsdnva3U9YzP8VpwtKxMSpJspIyks9QZTtt8o0XtBpzMlqQFXNNgoO4qLuzYdgc23zjtfwhOnUhlVb5B36WOGGI7Gitu9wZFtrmkmsqUlaEhRBJLirukkC7MFXAOPSGOnmKBQuWaVkMCxdwGakscY3vDX2d0qZiAulgE+GXDVEGrmA6Y7uYC9qtSJahLTKDG5UWAJe1/QD4RBlHaUOLiOUmrVBNctkzEmxqlsXubi7nv0LwLruKK06ELloRzpekgHBYMQQQ4ex/L3jp2kKFy1slJYKLECnsSTd2PV2EUauSJuoSqYAZdYq8MnB2T6Ox6v5w+JKIb9YrWJXqPaPWsVeCCkZKbj/n6wEj2t1H/wBMDN6QMea/28ODpQkzEJRNoBSzhT4zjr8gIRcP06q1TCaEAsCH/Mgi5uWBJ826xpGT3g3Jq9o9TNSQlCiMkoT0uzu/9oqX7UTxYJlkHHJMOdve+kQ4no1eMpctZCXBuS5sHJHXMGabVFchKUgkoZHnu/XDmCMl78QE1cEme1M8GgolpNsy5gN/NUGajietSApUuUAbO1vL34p0iEpMwpUCVTC4H4eUWP19YL4zOPgKcOzNnLjpFxRg5mUaXiOtmOESpam6JP6LgT/uKfuiWW2AX9ATDj2b4gZVZCRkZvt1ivh890MkOedh0NQO18JgNoEzg3vE0/ja1WXJQ4DvzJLdrPBUvjrfy/DQpVrpWp7WIJKeucXiOllTFy5yS4UoMGBLGtLjsfuOsL9Xo538Usy0mlM2YHaweaXu3WnyaBy1uONxmn2iTgyy4LEBRcHcEU2/zERxOQT/AONSSOhAb0NvlAvG5RlLUiQCuYpRM6YlJIQVEcqD6+8cxnfC1QTMFC2vsSbOeXfBNx0EECx3nMa8TbTuOaZCTMXLJOUsz1dubyDtCH/vmcAAJaaUsEkywSAMXcdfnCvTaN5CZii5UVJu/wCEp39flHuqkgSO4A/SE4JdEXuo4LL8ymtR0n231Sg4CW/o/wD6i5XtPrcUj/aPvF/B/Z2rSpUVFKnCSGBYukZBhOnh010/zHsDdSru8KExtdAalHy5UAsnYhn/AHTrQ9g2/KPvEND7SaiYSkJABDkhLduuS7esWr4Sgy38SYhT5KuUt29PnEOIaASiihaVszOnkLEOFP2hR6RPGhf0k/Xcg/MZouA8NVapN2qdw16iElNi9lYPXrAvEuL+ItSCWYcikAOAW5Fgs6SLhvy77OOBrUVCsFKi1y7AH8r3Bf8A5esY7ikwI1qlGsFQpIULYsU3J2w28IgDMfeIaC6g8xMw1BZJAQR1FIAZnwObHYxWgKKfCQCEpLm+Q5Fu1n+EOuFzBNTOJIASAL/lDk/Oo+ogT2N05IWhYco5exq777+jRcsAD+UzkQZEhOwdiR8CRHRRreIplrUgAqpLVCm5Gfm8dDBGMFQz2ZnoFemXdE2wG4Vb3fMfMJg3hXswuZNmo8VghlJNyFJL3F8np1Bhrp/YtCb+O/S8sN5Oo38o1HDtKJagkrSsqRSVhW97qKXA3+MU4wF1B7z5JN0wpANgxwQSHYOd/jFn/T2Ql2YKUTzC24sLub9O8av/ALNkpsJq1i3uBx6sIOkez2nSeZVRzSVjP/yYD6xDJkGL+4x1YHzM1wv2amTlBaLISSx6qyw8n8o1krSeGAKU1gCzLak3IqdsvazuYvmaiWhLOhFiGlqGNj7pv1Zo80vFHAExNSHDWJIHmQMfq0ee/UFzZ7SysohmmQKa7JuxJJZk5pBF+X0hZrfZ6XNUkFRSGzRykqxSzJhkhMtAWpCzSQ7K5mLBiGtTbf5x5qNQhaChOope6SKbPsyWcZ6HztEkygPfiOWU95RpdBqEoplT0plosFKSztlXkL3J2ipfC5mqSZq51CEEhKqcpSVGou1t37GIhamKf421gAUjY9ydoLCNWUGmb4iTt4NQHmG8sRtXgx0Z3IGC8VmGVJQJindyHDKCQSylE9X904te0ZjScTPLKlukhTuVbOqzeSlQy4roZuoU8zUGzBkyiMesL1cAmpuie3/2wPmQTGpcFLUizgmOpesU5qUptgNsfL9Wi8aRE2XLFTqSQFAhjc++VNSw9Iz0zRTUu2pGN2b0cE9PhEDJnBL/AMWl7uBScYA5POEPTIAa1ODzWe0Ps74cszVKlHmTgqGS2AG9e5jLcNkzqUKkoFClBSnUHOUqYWZxi8W6IqSyp09JF2Sw5nTbCU3BLjyhlwaZQjwlhQUh0kHYuYC4gmhGqxBfahM2ZOUrSSChJpJCjKyEgGwUWxFNeoB/mada5b3QUJLgdwevbaE/tAgK1y+3hRp5WtWnVTJaQCFKUrG7AAVbYxFASBUcp594s/ilhak+EqUFAqCVS3xsHUOwgfhU6elR5FAEqKSkJe/V1dx843y+GTJigzE03KFCkXDgk7uR3bpCccIKVkWDG5cmlyB0Yl79rxMP3Edks35g/ElzTPUuRLPhqSljYKrFJUWKuqR8TAcue60JDlU/ncuogrWsnlNrt8W6xvp3Ck6SQpcwVTFAi2EBrm4yRbG/nGQ0fDFHwZyQTTLSHSFVBqt2bfrCEXSwn+0t+YjOVwOaNOFIoC6/EKgoipNDUEUs4IFsWzAPC9PqtRLCkLlunlUCA7EHcgl2+pgfTDUoAlGZyXstYADsW5V1Xc5eLdHolyiJkqWlJf8AmALStKr2ICphIzt37QfRictxZq+HyU16ZYTJKFOFBiOYOemRSY5HsRMmyzQoKSv3VuE7ke6XP+Ib8X4LqJ9RMlFeVFC1FwXwFFn7i/K2I7gCtdpwJRkEygSQSlTjO4feCEI7GcDujJcG0UyZLUmUE0pIcKLELSXw25HXaA5HAv5hkkjxk2aqkEC7p5T1xDQS9VKUtciTSqYqpYWoKQRc2AuC5+Z9KtXplTVeNMpTNDOUTRLHISUkCanP2vC8SpsHvGJur8RDr+CqTNRJWpMskkgrVyqcE3UBh3Fx2ijivB5kuZKExQWg8zyyKbHmDs9nB9ekHL1upnLIE2WsJNKT+JiRZwAlRZr/AHMEcRT4igETAlBJc0khKrjGwO+et3MTfKVMk1boz3hTJplkEMXQVKSSyjgMR+Uh+h2hH7T6AmaJhStLIBRapyMORakkHFu250PC1EGmYgA0llBmsQ1JybkO94P8ROFLFzy2UApi3KcXvaJDOUawIe4mG0EickroSyVvkjB7Ev8A5jz2eSeek0mtQqYq91CXSGvlXzEaf2qXOC3lSFzClIAIUCC27ZFzg9PhleFKXpwSqTOqVkBLgGzsAN2Hwj0ErInL3idjJT/ZtSlEoHKcHlD92NxeOhqeIq2lTiP6DHQwQ+8nxEaL1ssd/QxPh3FU10swU1x62v1+0IS3+LxEzQP8/aPfcKRRnxeHF6bB17zTcQ1S5fI6wlQdk0lJHkS/SFdMm5KP/wAZA/8AW/zhgiVL1KUKrYpSlKgC74wGJDOXdrXeFvioK1BGHtf+/wC+0ZB02E9xPSydb1CdjrxLZA04I5f/AEm/pDJc/TD8Bp6ATR8njpOiFAU72Ji6XpnIJ+/6RnbD0p8SydV1XkQZM3ThbypahbFKy/xiUkSS5KC5O6Et8SYPVokqub+Q/YhZxZKUBkgA7tCph6djSrHfquoQcmImx0ek06QyZA6u0ux+ZgjV65KUkBkhtn+gAjF6bVEp3e36xYnUVFn7G1j9IcdIoPaE/iLEd53F9HpZoQFLIIDcqdhfpCxXBdMFcs/4kD9IM1IDu2P3eFs6WSbCNeLCKqeZ1PU5C93LJ3C0BKlVjLJIJIs1yWt8ISa2oilzyg3QDcHJJyfW0PPBUENSWd4kiWMkbdoDdGrSyfiuRNRHM4wshLpSQkAczksAAwJx/eLtXxzxZ6lhBAUXGOm7Ew9Gjl2ISlVs2HozgxBfCUKW5SgOfzj9Yj8AlzYv41kqiJjtclUyeZgSSD4ebHlzGplcQSJyZ3hTZRBJMxBFV8tfLdoJ1XC5aFBlbbMkjs7iDNApCVALAUHy7qx1EA9AO4Mp/WjfErNQv2j0Ty1pkzVFKSHA/MXNTqAU5vd4D0vHpSXUmROC6phHIik1zAoVMp3AAGIq1aZAIZZ2sFg46gl4rSjT1OZyv6HcfAWHxjP8De5qP4sAeJH7xvxH2iRPQwlTHBelSPeyM4Gd4zM7RzF50qQL3MykgFywpw20MNRPlBL8yg1hzBvgrMDJ10mzyzcA4v8AG0Afh+7nf1j5aA1OleMABXIoAZNXOr1uQTEtDJCwak8wPvISALdAp/k2IdVySgEi1vwu3wMUp1Mm4C2P9LfrFk6VZmzfiGUeP3iDjGlVLB/h0qBfIU1m6GLuFpUJcszTNEy5J840K9KDzVAjqBjz7xKhIAa3QN/aHbAlamfD1mbmS2x7TEav2imgs5KS9l836hQs2DAv/V0bop/oUpP/ADCo3M7SoUPwn6QBM4HJZ6Uh+wb+3oRCHpcTdxHPWdQD+UzWl1MuZYBQ9UKb/jfeG8nhNQapfmUJ+qVmCf8AoenDFm8lEg94JlaFCcKf4RnfosPiVXr8oPzqPv8ASDI9m1nExLDYoWPvFkv2b1DNWjO9Ts+zJhjIZskep+8GSZwF6lf7lRn+BTxNS9ap7j7/AFiuX7O6kXC0/FX2BggezMxX/kmEdKSX+JB+hhoviCUs5X/vV94E1HGkAXr9VKPx5oZOirYuMeuxDyPv/MWzPY9T/wD+iaP9Mk/OmOiqZx5LlpYI8k/eOjR6L/dSH9QwfdzGSNP1c/L6x7Ok4Zx3z9CRF6NOo3pA+D/FosXpTvlsAfU5j1GJE+dAvz9/xKeGF1KlqVyqSodCCWchr4GMGBdXoTKUxLNuBY9wIJRJKS6VUh3tk/GGWtmgpCheoX3pP7e8HjZ7RuY49+0F0OrZGD6+nUFob/xAUBcnHb9XhKxN4vl+77zHzibdMp3OTrGBj8agBGMdIzWun1n+8SVzFv1f6xFWhMNiwBDcXqOr50DPdMthkDp38jB0hZNhf99Iol8NJDuPWGOg0lIIqHaKMohw5LoCe/wQ/Fc9B+7xUZKQ1IA/fWDJ0u1vliBlSwdlHyBhlhyyYCwIrUXur5iB5unQX5ino5/vEZGkWbJW487fu8PMpYyydLRuB++8C6bTHxgAlgOhj2bp6VMs/C7RfI0yDdEwE9CL/CD4nJfLtK+KSkKXkA9CT9jASdEQdj6wVqllKmUQP9NvRoHmaoMQ/wAH+UMo1GdiWl0wpOUrcbAi3yihDBXuqbu0dpJjbev3i9erSO/zgcBULZDynk2YjAq8rRSgkkWUWxiCkpQQ9ID9hFyVxwSE5dy2XVSzKbzFg/m7wHM1CWZyfIn9mGSdUALiEOqmhSiWaJqlGXy5eSjcvmTgPdNnuHV9HaDdNrlHJ+lvJzCWmCpC+7dM3guliTwZOLTQDUFnqJt1+20Rd2ufm3xaAJKh1PrHTFENSok+lozelPXHViu0Zy039YhxEgAq3brC4Tl9f7fCKtVqV4IDev6wPhyT3iZerQqflO4y4ZrzYKAVbuD9jF87iqASG9HDiEWm1BGEt8Y9nagKDHfuf7wjdKeWpiXqgEow7WcYDsHBtn7ARTM4lLLvU/77vCuckj3durfaISqHJUClrvkdvm1vOLonAbmZwHNxmrUoBYqD96n+QjoUztMlRJ8XP9X3joHpiWGUgUD+0eq00xLY+d/T+0MNJxGWAxcHpZvTf4xCcpJR1PnC2aw8/OLBQe8xvkKnUY6mRLVfD3/d4FpHhqAAUXBw7bQGdUOsW6XjXh/gB26QxU1Owm23qQ1GnmXUZagM4LD5WEAqVDpftdMZgkAephPreKLmZI6xy8v9QlsmLH3Vif8AEgma0WnWmFkzUpGSIrTrkfm+rfGBzW6uD4ViL4n9I1/j1dY9TrF7GFmo1QRlzHSde+Ev0Fw/yhWyIDRMdOjyMLVY3Rrlgbvt1/xBkvjChsX7NfzEL5eooHugqIuOh2HTML53EppJuB2ZIv6xzuo8Q4sOR7AIFe5mim6xKjcD5DEcZym5Q8JdLrF5WxT2Ad+zRaqatRaugbZt6i98wfUpbAnDATk4s4+vj+IeuZMJHIkdzeKjp1ke8Bf9sIDM1aFXnKV1DKYtsSd/pFHFNStYFC1Btgf739YK5CVupzYFDheQ+tGEzpK8XPkDE5XClqzZ+ohVopK8+JMB9T+sHcTnzCA01QHQ4P0jhkYjtGbEgYLz/Y6jGVwtaQSU1AD8JHa8GaQSUitJKDeyiH9GhFo+FTKTMVNNJvygk5FgKr5ieqmuGFSe5zCq5a9TnxopFMDf11+cdaniCDkO3YXheqco+6IC0PCTMU6Zq2GSQQO7cxvBsxKEBpc0lTXUoDPRnxHJl8UZ2bABRDg/rBZ4Xu7GBzHmo184MKkKH+kfIwZoleIklaWI6bi/zx8YZcwJqjFyYGxryJU/Q/8AkGGO0WJPzgbxFuaUP2BN/lBASp+ZCk23DbdW/SB66E1coejzBeVa+olwmG/1fMS8XfD9IHWopGH3DfURX/Ejdx3bMHml1cHpZePIKf0jFM8bRBc5wz28oGAicPxEztkbsZySxiS5nePA0G6bh6Vp/wDIAroR9S/6QSoGzEUFjQi8mOWSEt1v5jA/WGP/AESY+zdXsfKBNdIUlTHaz3284GjoR+DqLIixWnT3jouIjoHpiHmfeEajXUByWBtaANRxhL4PrHR0Qy5GVqE2dH0mN05sLlUniBWpqW7vFydHOmAlBDAtazeb/pHsdEy7FLuUZExZaVR28wbVcMmpDqW3qT9PvHSgQllF46Oh8a1uSfMX1QH0EEVpwMJHmP8AMXaZCRtfaPY6AFAOhHbI7LswjxOhvHKmqfmN/n8Y6OitWZEDUtuYlIkCp+n1PSxjo6D3kSa7TQabRUIqtluuf2IF4joCU1sABZ7Av6bR0dCjvJnUBkytoMVQyQQCe79sGOjorxEQsbkks7hJBOcN2+kSCkqZywFr3y+BeOjoHEQXuMdMgJ9whsXGLty3go6KUoGsuSct1ZtjHkdEyNyiyzT8K5VpB5AS5A3FIPSF2r9nBVyqcFs5v/fvHR0IGNy3AVBJ/AglLu4uX8s5MRRppYABerAI/vHsdFF3M7kgzzR8NBWCJlVnLhQuOrM8S4mmZWA7lrEEsX6A4jo6F/1RgxI3FU5SgS7A7gfbEXyZoQHUAo7Pj13Pyjo6OKhjsTSuV0HympXOnBZJpAB2TZujM2IEUAHAUW73PxAEdHR2TGpFx8OfIhIBl+nFi6yezb+ZgbV68oIAS7946OhrKY9GKtZc3zAfxIy+NHuOwJgga6t+ZRIy7x0dCY8rFqM1Z+lxrjLDUiZneOjo6NNzz+In/9k=');">
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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 4 -->
            <div class="trip-card fade-in" data-id="4" data-destination="asie" data-days="14" data-price="2450" data-date="2025-04-01">
                <div class="trip-image" style="background-image: url('data:image/jpeg;base64,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');">
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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 5 -->
            <div class="trip-card fade-in" data-id="5" data-destination="europe" data-days="14" data-price="1950" data-date="2025-09-01">
                <div class="trip-image" style="background-image: url('data:image/jpeg;base64,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');">
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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 6 -->
            <div class="trip-card fade-in" data-id="6" data-destination="europe" data-days="5" data-price="650" data-date="2025-07-20">
                <div class="trip-image" style="background-image: url('data:image/jpeg;base64,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');">
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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

           

            
            <!-- Voyage 9 -->
            <div class="trip-card fade-in" data-id="9" data-destination="amerique" data-days="8" data-price="950" data-date="2025-05-20">
                <div class="trip-image" style="background-image: url('data:image/jpeg;base64,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');">
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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>

            <!-- Voyage 10 -->
            <div class="trip-card fade-in" data-id="10" data-destination="europe" data-days="10" data-price="1350" data-date="2025-10-01">
                <div class="trip-image" style="background-image: url('data:image/jpeg;base64,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');">
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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
                        <a href="#" class="btn btn-outline btn-sm"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>


            <!-- Voyage 12 -->
            <div class="trip-card fade-in" data-id="12" data-destination="afrique" data-days="9" data-price="1450" data-date="2025-06-01">
                <div class="trip-image" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPBarZq369aYcAC2OV4c_wqBy8QHyx3QPE2A&s');">
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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
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
                        <a href="{{ route('package') }}" class="btn btn-sm">Détails</a>
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