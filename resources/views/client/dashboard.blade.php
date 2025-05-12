<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord | FM Voyage</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --white: hsl(0, 0%, 100%);
            --black: hsl(0, 0%, 0%);
            --primary: #89ca06;
            --primary-dark: #7ab805;
            --primary-light: rgba(137, 202, 6, 0.1);
            --primary-extra-light: rgba(137, 202, 6, 0.05);
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
            --shadow-xl: 0 15px 30px rgba(137, 202, 6, 0.2);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --border-radius: 16px;
            --glass: rgba(255, 255, 255, 0.2);
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
            min-height: 100vh;
        }

        /* Navigation */
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
            transition: var(--transition);
        }

        .user-profile:hover .user-avatar {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
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

        .section-header p {
            font-size: 1rem;
            color: var(--gray-dark);
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            text-align: center;
            box-shadow: 0 4px 15px rgba(137, 202, 6, 0.3);
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary-light);
        }

        /* Cartes */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .card {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(137, 202, 6, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--primary);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
        }

        .card-icon {
            font-size: 1.5rem;
            color: var(--primary);
        }

        /* Alerte */
        .alert {
            background: var(--primary-light);
            color: var(--primary-dark);
            padding: 1rem;
            border-radius: var(--border-radius);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: opacity 0.3s ease;
            border-left: 4px solid var(--primary);
        }

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

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

            .card-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Améliorations visuelles */
        .activity-item {
            display: flex;
            align-items: flex-start;
            padding: 1rem;
            border-bottom: 1px solid var(--gray-light);
            transition: background-color 0.2s ease;
        }

        .activity-item:hover {
            background-color: var(--primary-light);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            background: var(--primary-light);
            color: var(--primary);
            transition: var(--transition);
        }

        .activity-item:hover .activity-icon {
            background: var(--primary);
            color: white;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .activity-text {
            color: var(--gray-dark);
            font-size: 0.9rem;
        }

        .activity-time {
            color: var(--gray-dark);
            font-size: 0.8rem;
        }

        .welcome-banner {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .welcome-banner::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .welcome-banner h2 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .welcome-banner p {
            opacity: 0.9;
            position: relative;
            z-index: 1;
            max-width: 600px;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .stat-label {
            color: var(--gray-dark);
        }

        /* Floating elements */
        .floating-element {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: 0;
            animation: float 6s ease-in-out infinite;
        }

        /* Travel destinations */
        .destinations {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
            overflow-x: auto;
            padding-bottom: 1rem;
        }

        .destination-card {
            min-width: 200px;
            height: 120px;
            border-radius: var(--border-radius);
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            flex-shrink: 0;
        }

        .destination-card:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-md);
        }

        .destination-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1rem;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            color: white;
        }

        .destination-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .destination-date {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        /* Progress bar */
        .progress-container {
            margin-top: 2rem;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .progress-bar {
            height: 8px;
            background: var(--gray-light);
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--primary);
            border-radius: 4px;
            width: 75%;
            transition: width 1s ease;
        }

        /* 3D Card effect */
        .card-3d {
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .card-3d:hover {
            transform: rotateY(5deg) rotateX(2deg);
        }

        /* Badge */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Sparkle effect */
        .sparkle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: white;
            border-radius: 50%;
            opacity: 0;
            pointer-events: none;
        }

        /* Travel tips */
        .travel-tips {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .tip-card {
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .tip-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .tip-image {
            height: 150px;
            background-size: cover;
            background-position: center;
        }

        .tip-content {
            padding: 1.5rem;
        }

        .tip-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .tip-text {
            color: var(--gray-dark);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .read-more {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
        }

        .read-more:hover {
            color: var(--primary-dark);
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
        <a href="{{ route('client.voyages') }}"><i class="fas fa-calendar-alt"></i> Voyages</a>
        <a href="{{ route('client.plans') }}" ><i class="fas fa-map-marked-alt"></i> Planification</a>
    </div>
    
    <div class="user-profile">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->client->first_name, 0, 1)) }}
        </div>
        <span>{{ auth()->user()->client->first_name }}</span>
        <div class="user-dropdown">
            <a href="{{ route('client.profil') }}"><i class="fas fa-user-cog"></i> Profil</a>
            <a href="{{ route('home') }}"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
        </div>
    </div>
</nav>

    <!-- Contenu Principal -->
    <main class="main-content">
        <!-- Section Tableau de Bord -->
        <div class="welcome-banner fade-in" data-aos="fade-up">
            <div class="floating-element" style="width: 100px; height: 100px; top: 20px; left: 30px;"></div>
            <div class="floating-element" style="width: 150px; height: 150px; bottom: -50px; right: 50px;"></div>
            
            <h2>Bonjour, {{ auth()->user()->client->first_name }} ! ✈️</h2>
            <p>Prêt pour votre prochaine aventure ? Découvrez ce qui vous attend.</p>
            
            <div style="margin-top: 1.5rem;">
                <a href="{{ route('package') }}" class="btn floating" style="animation-delay: 0.2s;">
                    <i class="fas fa-plus"></i> Nouveau voyage
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert fade-in" data-aos="fade-up">
                <div>
                    <i class="fas fa-check-circle" style="margin-right: 10px;"></i>
                    {{ session('success') }}
                </div>
                <button onclick="this.parentElement.style.opacity='0'; setTimeout(() => this.parentElement.remove(), 300)" style="background: none; border: none; cursor: pointer; color: inherit;">×</button>
            </div>
        @endif

        <div class="section-header" data-aos="fade-up">
            <h1><i class="fas fa-chart-pie"></i> Votre activité</h1>
            <a href="{{ route('client.reservations') }}" class="btn">
                <i class="fas fa-arrow-right"></i> Explorer
            </a>
        </div>

        <div class="card-grid">
            <div class="card card-3d" data-aos="fade-up" data-aos-delay="100">
                <div class="card-header">
                    <h3 class="card-title">Réservations confirmées</h3>
                    <i class="fas fa-check-circle card-icon"></i>
                </div>
                <div class="card-body">
                    <div class="stat-value">{{ $reservations->where('statut', 'confirmée')->count() }}</div>
                    <div class="stat-label">Voyages à venir</div>
                </div>
            </div>
            
            <div class="card card-3d" data-aos="fade-up" data-aos-delay="200">
                <div class="card-header">
                    <h3 class="card-title">En attente</h3>
                    <i class="fas fa-hourglass-half card-icon"></i>
                </div>
                <div class="card-body">
                    <div class="stat-value" style="color: var(--warning);">
                        {{ $reservations->where('statut', 'en attente')->count() }}
                    </div>
                    <div class="stat-label">En cours de traitement</div>
                </div>
            </div>
            
           <!-- Carte statique : Astuce du jour -->
<div class="card card-3d" data-aos="fade-up" data-aos-delay="300">
    <div class="card-header">
        <h3 class="card-title">Astuce du jour</h3>
        <i class="fas fa-lightbulb card-icon"></i>
    </div>
    <div class="card-body">
        <div class="stat-value" style="font-size: 1rem; color: var(--dark);">
            Vérifiez la validité de votre passeport ✈
        </div>
        <div class="stat-label" style="margin-top: 0.5rem;">
            Avant de réserver un voyage à l’étranger
        </div>
    </div>
</div>

<!-- Carte statique : Destination recommandée -->
<div class="card card-3d" data-aos="fade-up" data-aos-delay="400">
    <div class="card-header">
        <h3 class="card-title">Destination recommandée</h3>
        <i class="fas fa-map-marker-alt card-icon"></i>
    </div>
    <div class="card-body">
        <div class="stat-value" style="color: var(--primary); font-size: 1.2rem;">
            Bali - Décembre 2025
        </div>
        <div class="stat-label">
            Soleil, plages et culture locale 🌴
        </div>
    </div>
</div>
        </div>

        <div class="section-header" style="margin-top: 2rem;" data-aos="fade-up">
            <h1><i class="fas fa-map-marked-alt"></i> Des meilleurs destinations proposés</h1>
            
        </div>
        
        <div class="destinations">
            <div class="destination-card" style="background-image: url('https://images.unsplash.com/photo-1499856871958-5b9627545d1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80');" data-aos="fade-right">
                <div class="destination-overlay">
                    <div class="destination-name">New York</div>
                    <div class="destination-date">15-22 Juin 2023</div>
                </div>
            </div>
            
            <div class="destination-card" style="background-image: url('https://images.unsplash.com/photo-1503917988258-f87a78e3c995?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80');" data-aos="fade-right" data-aos-delay="100">
                <div class="destination-overlay">
                    <div class="destination-name">Tokyo</div>
                    <div class="destination-date">10-20 Août 2023</div>
                </div>
            </div>
            
            <div class="destination-card" style="background-image: url('https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80');" data-aos="fade-right" data-aos-delay="200">
                <div class="destination-overlay">
                    <div class="destination-name">Bali</div>
                    <div class="destination-date">5-15 Décembre 2023</div>
                </div>
            </div>
            
            <div class="destination-card" style="background-image: url('https://images.unsplash.com/photo-1502602898657-3e91760cbb34?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80');" data-aos="fade-right" data-aos-delay="300">
                <div class="destination-overlay">
                    <div class="destination-name">Paris</div>
                    <div class="destination-date">Mars 2024</div>
                </div>
            </div>
        </div>

        
        
        

        <div class="section-header" style="margin-top: 3rem;" data-aos="fade-up">
            <h1><i class="fas fa-lightbulb"></i> Conseils de voyage</h1>
            <a href="{{ route('package') }}" class="btn floating" style="animation-delay: 0.2s;">
                    <i class="fas fa-plus"></i> Nouveau voyage
                </a>
        </div>

        <div class="travel-tips" data-aos="fade-up">
            <div class="tip-card">
                <div class="tip-image" style="background-image: url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80');"></div>
                <div class="tip-content">
                    <h3 class="tip-title">Préparer sa valise</h3>
                    <p class="tip-text">Découvrez notre checklist ultime pour ne rien oublier avant votre départ en voyage.</p>
                    <a href="{{ route('about') }}" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="tip-card">
                <div class="tip-image" style="background-image: url('https://images.unsplash.com/photo-1503220317375-aaad61436b1b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80');"></div>
                <div class="tip-content">
                    <h3 class="tip-title">Voyager avec des enfants</h3>
                    <p class="tip-text">Nos astuces pour un voyage en famille serein et agréable.</p>
                    <a href="{{ route('about') }}" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="tip-card">
                <div class="tip-image" style="background-image: url('https://images.unsplash.com/photo-1501555088652-021faa106b9b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80');"></div>
                <div class="tip-content">
                    <h3 class="tip-title">Assurances voyage</h3>
                    <p class="tip-text">Tout ce qu'il faut savoir pour bien choisir votre assurance voyage.</p>
                    <a href="{{ route('service') }}" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </main>

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize animations
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Auto-hide success alert after 5 seconds
            const successAlert = document.querySelector('.alert');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.opacity = '0';
                    setTimeout(() => successAlert.remove(), 300);
                }, 5000);
            }

            // Add floating elements to welcome banner
            const banner = document.querySelector('.welcome-banner');
            for (let i = 0; i < 5; i++) {
                const element = document.createElement('div');
                element.className = 'floating-element';
                element.style.width = `${Math.random() * 100 + 50}px`;
                element.style.height = element.style.width;
                element.style.top = `${Math.random() * 100}%`;
                element.style.left = `${Math.random() * 100}%`;
                element.style.opacity = Math.random() * 0.3 + 0.1;
                element.style.animation = `float ${Math.random() * 5 + 3}s ease-in-out infinite`;
                element.style.animationDelay = `${Math.random() * 5}s`;
                banner.appendChild(element);
            }

            // Add sparkle effect to cards on hover
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mousemove', function(e) {
                    const sparkle = document.createElement('div');
                    sparkle.className = 'sparkle';
                    sparkle.style.left = `${e.clientX - card.getBoundingClientRect().left}px`;
                    sparkle.style.top = `${e.clientY - card.getBoundingClientRect().top}px`;
                    card.appendChild(sparkle);
                    
                    // Animate sparkle
                    setTimeout(() => {
                        sparkle.style.opacity = '0.8';
                        sparkle.style.transform = 'scale(1.5)';
                        setTimeout(() => {
                            sparkle.style.opacity = '0';
                            setTimeout(() => sparkle.remove(), 300);
                        }, 200);
                    }, 10);
                });
            });
        });
    </script>
</body>
</html>