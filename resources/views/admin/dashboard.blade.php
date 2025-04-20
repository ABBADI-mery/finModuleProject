<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Système de recommandation d'hébergements</title>
    
    <!-- Lien CSS pour Laravel -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> Utilisateurs</a></li>

                    <li>
                        
                        <a href="{{ route('assurances.index') }}">
                            <i class="fas fa-shield-alt"></i> Assurances
                        </a>
                    </li>
                   
                    <li>
                        <a href="{{ route('contacts.index') }}">
                            <i class="fas fa-address-book"></i> Contacts
                        </a>
                    </li>
                   <li><a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-check"></i> Réservations</a></li>
                </ul>
            </nav>
        </aside>
        
        <main class="main-content">
            <section class="stats-section">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <h3>Destinations</h3>
                    <p class="stat-value">1,245</p>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Utilisateurs</h3>
                    <p class="stat-value">3,542</p>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Reservation</h3>
                    <p class="stat-value">8,762</p>
                </div>
            </section>
            
            <section class="recent-activity">
                <h2><i class="fas fa-history"></i> Activité récente</h2>
                <div class="activity-list">
                    <!-- Contenu dynamique chargé par JS -->
                </div>
            </section>
        </main>
    </div>

    <!-- Lien JS pour Laravel -->
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
</body>
</html>
