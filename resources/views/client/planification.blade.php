<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planification de Voyage | FM Voyage</title>

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

        .card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        /* Planification */
        .trip-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .trip-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .trip-actions {
            display: flex;
            gap: 0.5rem;
        }

        .trip-list {
            padding: 1.5rem;
        }

        .trip-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .trip-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .trip-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .trip-info {
            flex: 1;
        }

        .trip-destination {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .trip-details {
            color: var(--gray-dark);
            font-size: 0.9rem;
        }

        .trip-action {
            margin-left: 1rem;
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding: 2rem 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 24px;
            width: 2px;
            background: var(--primary-light);
        }

        .timeline-item {
            position: relative;
            padding-left: 50px;
            margin-bottom: 2rem;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: 15px;
            top: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--primary);
            border: 4px solid var(--white);
            z-index: 1;
        }

        .timeline-content {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
        }

        .timeline-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .timeline-date {
            color: var(--gray-dark);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .timeline-description {
            color: var(--dark);
        }

        /* Tabs */
        .tabs {
            display: flex;
            border-bottom: 1px solid var(--gray-medium);
            margin-bottom: 1.5rem;
        }

        .tab {
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            font-weight: 500;
            color: var(--gray-dark);
            border-bottom: 3px solid transparent;
            transition: var(--transition);
        }

        .tab.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
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

            .trip-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .trip-icon {
                margin-bottom: 1rem;
            }

            .trip-action {
                margin-left: 0;
                margin-top: 1rem;
                align-self: flex-end;
            }
        }

        /* Améliorations visuelles */
        .calendar {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .calendar-title {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .calendar-nav {
            display: flex;
            gap: 0.5rem;
        }

        .calendar-nav-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            cursor: pointer;
            transition: var(--transition);
        }

        .calendar-nav-btn:hover {
            background: var(--primary);
            color: var(--white);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
        }

        .calendar-day-name {
            text-align: center;
            font-weight: 500;
            color: var(--gray-dark);
            padding: 0.5rem;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .calendar-day:hover {
            background: var(--primary-light);
        }

        .calendar-day.active {
            background: var(--primary);
            color: var(--white);
            font-weight: 600;
        }

        .calendar-day.has-event::after {
            content: '';
            position: absolute;
            bottom: 5px;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: var(--primary);
        }

        .calendar-day.active.has-event::after {
            background: var(--white);
        }

        .map-container {
            height: 300px;
            background: var(--gray-medium);
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .map-placeholder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--white);
            text-align: center;
        }

        .map-placeholder i {
            font-size: 3rem;
            margin-bottom: 1rem;
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
            <a href="{{ route('client.reservations') }}"><i class="fas fa-suitcase"></i> Mes réservations</a>
            <a href="{{ route('client.assurances') }}"><i class="fas fa-shield-alt"></i> Assurance</a>
            <a href="{{ route('client.planification') }}" class="active"><i class="fas fa-calendar-alt"></i> Planification</a>
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
            <h1><i class="fas fa-calendar-alt"></i> Planification de Voyage</h1>
            <a href="{{ route('planification') }}" class="btn"><i class="fas fa-plus"></i> Planifier un voyage</a>
        </div>

        <div class="tabs fade-in">
            <div class="tab active">Voyages à venir</div>
            <div class="tab">Calendrier</div>
            <div class="tab">Itinéraires</div>
        </div>

        <div class="tab-content active fade-in">
            <div class="card">
                <div class="trip-header">
                    <h2 class="trip-title">Vos prochains voyages</h2>
                    <div class="trip-actions">
                        <button class="btn btn-outline btn-sm"><i class="fas fa-print"></i></button>
                        <button class="btn btn-outline btn-sm"><i class="fas fa-download"></i></button>
                    </div>
                </div>
                
                <div class="trip-list">
                    <div class="trip-item">
                        <div class="trip-icon" style="background: var(--primary-light); color: var(--primary);">
                            <i class="fas fa-plane"></i>
                        </div>
                        <div class="trip-info">
                            <h3 class="trip-destination">New York, USA</h3>
                            <p class="trip-details">15 - 25 Juin 2023 • 2 adultes, 1 enfant</p>
                        </div>
                        <div class="trip-action">
                            <a href="#" class="btn btn-sm">Détails</a>
                        </div>
                    </div>
                    
                    <div class="trip-item">
                        <div class="trip-icon" style="background: rgba(40, 167, 69, 0.1); color: var(--success);">
                            <i class="fas fa-umbrella-beach"></i>
                        </div>
                        <div class="trip-info">
                            <h3 class="trip-destination">Bali, Indonésie</h3>
                            <p class="trip-details">10 - 25 Août 2023 • 2 adultes</p>
                        </div>
                        <div class="trip-action">
                            <a href="#" class="btn btn-sm">Détails</a>
                        </div>
                    </div>
                    
                    <div class="trip-item">
                        <div class="trip-icon" style="background: rgba(220, 53, 69, 0.1); color: var(--danger);">
                            <i class="fas fa-city"></i>
                        </div>
                        <div class="trip-info">
                            <h3 class="trip-destination">Tokyo, Japon</h3>
                            <p class="trip-details">15 - 30 Novembre 2023 • 2 adultes</p>
                        </div>
                        <div class="trip-action">
                            <a href="#" class="btn btn-sm">Détails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content fade-in">
            <div class="calendar">
                <div class="calendar-header">
                    <h2 class="calendar-title">Juin 2023</h2>
                    <div class="calendar-nav">
                        <div class="calendar-nav-btn"><i class="fas fa-chevron-left"></i></div>
                        <div class="calendar-nav-btn"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
                <div class="calendar-grid">
                    <div class="calendar-day-name">Lun</div>
                    <div class="calendar-day-name">Mar</div>
                    <div class="calendar-day-name">Mer</div>
                    <div class="calendar-day-name">Jeu</div>
                    <div class="calendar-day-name">Ven</div>
                    <div class="calendar-day-name">Sam</div>
                    <div class="calendar-day-name">Dim</div>
                    
                    <!-- Jours du mois -->
                    <div class="calendar-day">29</div>
                    <div class="calendar-day">30</div>
                    <div class="calendar-day">31</div>
                    <div class="calendar-day">1</div>
                    <div class="calendar-day">2</div>
                    <div class="calendar-day">3</div>
                    <div class="calendar-day">4</div>
                    <div class="calendar-day">5</div>
                    <div class="calendar-day">6</div>
                    <div class="calendar-day">7</div>
                    <div class="calendar-day">8</div>
                    <div class="calendar-day">9</div>
                    <div class="calendar-day">10</div>
                    <div class="calendar-day">11</div>
                    <div class="calendar-day">12</div>
                    <div class="calendar-day">13</div>
                    <div class="calendar-day">14</div>
                    <div class="calendar-day active has-event">15</div>
                    <div class="calendar-day has-event">16</div>
                    <div class="calendar-day has-event">17</div>
                    <div class="calendar-day has-event">18</div>
                    <div class="calendar-day has-event">19</div>
                    <div class="calendar-day has-event">20</div>
                    <div class="calendar-day has-event">21</div>
                    <div class="calendar-day has-event">22</div>
                    <div class="calendar-day has-event">23</div>
                    <div class="calendar-day has-event">24</div>
                    <div class="calendar-day has-event">25</div>
                    <div class="calendar-day">26</div>
                    <div class="calendar-day">27</div>
                    <div class="calendar-day">28</div>
                    <div class="calendar-day">29</div>
                    <div class="calendar-day">30</div>
                    <div class="calendar-day">1</div>
                    <div class="calendar-day">2</div>
                </div>
            </div>

            <div class="card">
                <div class="trip-header">
                    <h2 class="trip-title">Événements du 15 Juin 2023</h2>
                </div>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Départ pour New York</h3>
                            <div class="timeline-date">08:30 - Vol AF123</div>
                            <p class="timeline-description">Départ de l'aéroport Charles de Gaulle, Terminal 2E. Arrivée prévue à JFK à 11:00 (heure locale).</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Check-in à l'hôtel</h3>
                            <div class="timeline-date">14:00 - Marriott Times Square</div>
                            <p class="timeline-description">Enregistrement à l'hôtel et installation dans la chambre.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Visite guidée de Manhattan</h3>
                            <div class="timeline-date">16:00 - Départ de l'hôtel</div>
                            <p class="timeline-description">Tour guidé de 3 heures pour découvrir les principaux sites de Manhattan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content fade-in">
            <div class="map-container">
                <div class="map-placeholder">
                    <i class="fas fa-map-marked-alt"></i>
                    <h3>Carte interactive</h3>
                </div>
            </div>

            <div class="card">
                <div class="trip-header">
                    <h2 class="trip-title">Itinéraire - New York</h2>
                </div>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Jour 1 - Arrivée et Manhattan</h3>
                            <div class="timeline-date">15 Juin 2023</div>
                            <p class="timeline-description">Arrivée à New York, installation à l'hôtel et première découverte de Manhattan.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Jour 2 - Statue de la Liberté et Ellis Island</h3>
                            <div class="timeline-date">16 Juin 2023</div>
                            <p class="timeline-description">Visite de la Statue de la Liberté et du musée de l'immigration d'Ellis Island.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Jour 3 - Central Park et musées</h3>
                            <div class="timeline-date">17 Juin 2023</div>
                            <p class="timeline-description">Balade dans Central Park, visite du Metropolitan Museum of Art et du Museum of Modern Art.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Jour 4 - Brooklyn</h3>
                            <div class="timeline-date">18 Juin 2023</div>
                            <p class="timeline-description">Traversée du pont de Brooklyn et exploration du quartier de Brooklyn Heights et DUMBO.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des onglets
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabs.forEach((tab, index) => {
                tab.addEventListener('click', function() {
                    // Retirer la classe active de tous les onglets et contenus
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(c => c.classList.remove('active'));
                    
                    // Ajouter la classe active à l'onglet cliqué et au contenu correspondant
                    this.classList.add('active');
                    tabContents[index].classList.add('active');
                });
            });
        });
    </script>
</body>
</html>
