<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Assurances | FM Voyage</title>

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

        /* Cartes */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
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
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
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

        .card-body {
            margin-bottom: 1.5rem;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-status {
            font-weight: 600;
            color: var(--dark);
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

            .card-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Améliorations visuelles */
        .insurance-card {
            border-radius: var(--border-radius);
            background: var(--white);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            overflow: hidden;
        }

        .insurance-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .insurance-card-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
            position: relative;
        }

        .insurance-card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary);
        }

        .insurance-card-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .insurance-card-subtitle {
            color: var(--gray-dark);
            font-size: 0.9rem;
        }

        .insurance-card-body {
            padding: 1.5rem;
        }

        .insurance-card-features {
            margin-bottom: 1.5rem;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .feature-item:last-child {
            margin-bottom: 0;
        }

        .feature-icon {
            color: var(--primary);
            margin-right: 0.75rem;
            margin-top: 0.25rem;
        }

        .feature-text {
            flex: 1;
        }

        .insurance-card-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .insurance-card-price-period {
            font-size: 0.9rem;
            color: var(--gray-dark);
        }

        .insurance-card-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .insurance-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .status-active {
            background: var(--success);
        }

        .status-inactive {
            background: var(--gray-medium);
        }

        .status-text {
            font-weight: 500;
        }

        .insurance-banner {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .insurance-banner::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .insurance-banner h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .insurance-banner p {
            opacity: 0.9;
            margin-bottom: 1.5rem;
            max-width: 600px;
        }

        .insurance-banner .btn {
            background: white;
            color: var(--primary);
        }

        .insurance-banner .btn:hover {
            background: rgba(255, 255, 255, 0.9);
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
            <a href="{{ route('client.assurances') }}" class="active"><i class="fas fa-shield-alt"></i> Assurance</a>
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
        <div class="insurance-banner fade-in">
            <h2>Voyagez en toute sérénité</h2>
            <p>Nos assurances voyage vous protègent contre les imprévus et vous permettent de profiter pleinement de vos voyages sans souci.</p>
            <a href="{{ route('package') }}" class="btn">Comparer les offres</a>
        </div>

        <div class="section-header fade-in">
            <h1><i class="fas fa-shield-alt"></i> Mes Assurances</h1>
            <a href="#new-insurance" class="btn"><i class="fas fa-plus"></i> Souscrire une assurance</a>
        </div>
        
        <div class="card-grid fade-in">
            <div class="insurance-card">
                <div class="insurance-card-header">
                    <div class="insurance-card-title">
                        <i class="fas fa-umbrella-beach" style="color: var(--success);"></i>
                        Assurance Annulation
                    </div>
                    <div class="insurance-card-subtitle">Protection contre les annulations imprévues</div>
                </div>
                <div class="insurance-card-body">
                    <div class="insurance-card-features">
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Annulation sans frais jusqu'à 48h avant le départ</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Remboursement jusqu'à 100% du prix du voyage</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Couverture des frais d'annulation pour raisons médicales</div>
                        </div>
                    </div>
                    <div class="insurance-card-price">Incluse</div>
                    <div class="insurance-card-price-period">avec votre réservation</div>
                </div>
                <div class="insurance-card-footer">
                    <div class="insurance-status">
                        <div class="status-indicator status-active"></div>
                        <div class="status-text">Active</div>
                    </div>
                    <a href="#details" class="btn btn-outline">Détails</a>
                </div>
            </div>
            
            <div class="insurance-card">
                <div class="insurance-card-header">
                    <div class="insurance-card-title">
                        <i class="fas fa-briefcase-medical" style="color: var(--danger);"></i>
                        Assurance Médicale
                    </div>
                    <div class="insurance-card-subtitle">Couverture médicale à l'étranger</div>
                </div>
                <div class="insurance-card-body">
                    <div class="insurance-card-features">
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Prise en charge des frais médicaux à l'étranger</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Rapatriement sanitaire en cas de nécessité</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Assistance médicale 24h/24 et 7j/7</div>
                        </div>
                    </div>
                    <div class="insurance-card-price">Incluse</div>
                    <div class="insurance-card-price-period">avec votre réservation</div>
                </div>
                <div class="insurance-card-footer">
                    <div class="insurance-status">
                        <div class="status-indicator status-active"></div>
                        <div class="status-text">Active</div>
                    </div>
                    <a href="#details" class="btn btn-outline">Détails</a>
                </div>
            </div>
            
            <div class="insurance-card">
                <div class="insurance-card-header">
                    <div class="insurance-card-title">
                        <i class="fas fa-suitcase-rolling" style="color: var(--warning);"></i>
                        Assurance Bagages
                    </div>
                    <div class="insurance-card-subtitle">Protection de vos bagages</div>
                </div>
                <div class="insurance-card-body">
                    <div class="insurance-card-features">
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Indemnisation en cas de perte ou vol de bagages</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Remboursement des achats de première nécessité</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Assistance pour le remplacement des documents perdus</div>
                        </div>
                    </div>
                    <div class="insurance-card-price">29,90 €</div>
                    <div class="insurance-card-price-period">par voyage</div>
                </div>
                <div class="insurance-card-footer">
                    <div class="insurance-status">
                        <div class="status-indicator status-inactive"></div>
                        <div class="status-text">Non active</div>
                    </div>
                    <a href="#add" class="btn">Ajouter</a>
                </div>
            </div>
        </div>

        <div class="section-header" style="margin-top: 2rem;">
            <h1><i class="fas fa-plus-circle"></i> Assurances complémentaires</h1>
        </div>

        <div class="card-grid fade-in">
            <div class="insurance-card">
                <div class="insurance-card-header">
                    <div class="insurance-card-title">
                        <i class="fas fa-plane-slash" style="color: var(--danger);"></i>
                        Assurance Retard de Vol
                    </div>
                    <div class="insurance-card-subtitle">Compensation pour les retards</div>
                </div>
                <div class="insurance-card-body">
                    <div class="insurance-card-features">
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Indemnisation pour les retards de plus de 3 heures</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Prise en charge des frais d'hébergement et de repas</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Assistance pour la réorganisation du voyage</div>
                        </div>
                    </div>
                    <div class="insurance-card-price">19,90 €</div>
                    <div class="insurance-card-price-period">par voyage</div>
                </div>
                <div class="insurance-card-footer">
                    <div class="insurance-status">
                        <div class="status-indicator status-inactive"></div>
                        <div class="status-text">Non active</div>
                    </div>
                    <a href="#add" class="btn">Ajouter</a>
                </div>
            </div>

            <div class="insurance-card">
                <div class="insurance-card-header">
                    <div class="insurance-card-title">
                        <i class="fas fa-car-crash" style="color: var(--warning);"></i>
                        Assurance Activités
                    </div>
                    <div class="insurance-card-subtitle">Protection pour les activités sportives</div>
                </div>
                <div class="insurance-card-body">
                    <div class="insurance-card-features">
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Couverture des activités sportives à risque</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Remboursement des frais médicaux liés aux activités</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Indemnisation pour le matériel sportif endommagé</div>
                        </div>
                    </div>
                    <div class="insurance-card-price">24,90 €</div>
                    <div class="insurance-card-price-period">par voyage</div>
                </div>
                <div class="insurance-card-footer">
                    <div class="insurance-status">
                        <div class="status-indicator status-inactive"></div>
                        <div class="status-text">Non active</div>
                    </div>
                    <a href="#add" class="btn">Ajouter</a>
                </div>
            </div>

            <div class="insurance-card">
                <div class="insurance-card-header">
                    <div class="insurance-card-title">
                        <i class="fas fa-globe" style="color: var(--primary);"></i>
                        Assurance Premium
                    </div>
                    <div class="insurance-card-subtitle">Protection complète tout-en-un</div>
                </div>
                <div class="insurance-card-body">
                    <div class="insurance-card-features">
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Toutes les assurances incluses</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Couverture étendue et plafonds plus élevés</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <div class="feature-text">Service de conciergerie dédié 24h/24</div>
                        </div>
                    </div>
                    <div class="insurance-card-price">59,90 €</div>
                    <div class="insurance-card-price-period">par voyage</div>
                </div>
                <div class="insurance-card-footer">
                    <div class="insurance-status">
                        <div class="status-indicator status-inactive"></div>
                        <div class="status-text">Non active</div>
                    </div>
                    <a href="#add" class="btn">Ajouter</a>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des cartes au défilement
            const cards = document.querySelectorAll('.insurance-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                    }
                });
            }, { threshold: 0.1 });
            
            cards.forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>
