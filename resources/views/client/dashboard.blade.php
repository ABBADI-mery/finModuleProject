<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Client | FM Voyage</title>
    
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

        .user-profile:hover .user-dropdown {
            display: block;
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

        /* Profil */
        .profile-form {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-medium);
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        /* Réservations */
        .reservation-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
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

        /* Assurance & Planification */
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
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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
            <a href="#dashboard" class="active"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a>
            <a href="#reservations"><i class="fas fa-suitcase"></i> Mes réservations</a>
            <a href="#assurance"><i class="fas fa-shield-alt"></i> Assurance</a>
            <a href="#planning"><i class="fas fa-calendar-alt"></i> Planification</a>
            <a href="#profile"><i class="fas fa-user-cog"></i> Profil</a>
        </div>
        
        <div class="user-profile">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->client->first_name, 0, 1)) }}
            </div>
            <span>{{ auth()->user()->client->first_name }}</span>
            <div class="user-dropdown">
                <a href="#profile"><i class="fas fa-user"></i> Mon profil</a>
                <a href="#settings"><i class="fas fa-cog"></i> Paramètres</a>
                <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <main class="main-content">
        <!-- Section Tableau de Bord -->
        <section id="dashboard" class="tab-content active">
            <div class="section-header">
                <div>
                    <h1><i class="fas fa-tachometer-alt"></i> Tableau de Bord</h1>
                    <p>Bienvenue dans votre espace personnel, {{ auth()->user()->client->first_name }} !</p>
                </div>
                <a href="#reservations" class="btn">Voir mes réservations</a>
            </div>

            @if(session('success'))
                <div class="alert" style="background: var(--primary-light); color: var(--primary-dark); padding: 1rem; border-radius: var(--border-radius); margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <i class="fas fa-check-circle" style="margin-right: 10px;"></i>
                        {{ session('success') }}
                    </div>
                    <button onclick="this.parentElement.style.opacity='0'; setTimeout(() => this.parentElement.remove(), 300)" style="background: none; border: none; cursor: pointer;">×</button>
                </div>
            @endif

            <div class="card-grid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Réservations confirmées</h3>
                        <i class="fas fa-check-circle card-icon"></i>
                    </div>
                    <div class="card-body">
                        <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary); margin-bottom: 0.5rem;">{{ $reservations->where('statut', 'confirmée')->count() }}</h2>
                        <p style="color: var(--gray-dark);">Voyages à venir</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">En attente</h3>
                        <i class="fas fa-hourglass-half card-icon" style="color: var(--warning);"></i>
                    </div>
                    <div class="card-body">
                        <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--warning); margin-bottom: 0.5rem;">{{ $reservations->where('statut', 'en attente')->count() }}</h2>
                        <p style="color: var(--gray-dark);">En cours de traitement</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Prochaine réservation</h3>
                        <i class="fas fa-calendar-day card-icon" style="color: var(--danger);"></i>
                    </div>
                    <div class="card-body">
                        <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--dark); margin-bottom: 0.5rem;">15 Juin 2023</h2>
                        <p style="color: var(--gray-dark);">Paris → New York</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Points fidélité</h3>
                        <i class="fas fa-gem card-icon" style="color: var(--success);"></i>
                    </div>
                    <div class="card-body">
                        <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--success); margin-bottom: 0.5rem;">1,250</h2>
                        <p style="color: var(--gray-dark);">Points disponibles</p>
                    </div>
                </div>
            </div>

            <div class="section-header" style="margin-top: 2rem;">
                <h1><i class="fas fa-bell"></i> Notifications récentes</h1>
            </div>
            
            <div class="card">
                <div style="display: flex; align-items: center; padding: 1rem; border-bottom: 1px solid var(--gray-light);">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--primary-light); display: flex; align-items: center; justify-content: center; margin-right: 1rem; color: var(--primary);">
                        <i class="fas fa-check"></i>
                    </div>
                    <div style="flex: 1;">
                        <h3 style="font-weight: 600; margin-bottom: 0.25rem;">Réservation confirmée</h3>
                        <p style="color: var(--gray-dark); font-size: 0.9rem;">Votre voyage à New York a été confirmé</p>
                    </div>
                    <span style="color: var(--gray-dark); font-size: 0.8rem;">Il y a 2 jours</span>
                </div>
                
                <div style="display: flex; align-items: center; padding: 1rem; border-bottom: 1px solid var(--gray-light);">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 193, 7, 0.1); display: flex; align-items: center; justify-content: center; margin-right: 1rem; color: var(--warning);">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div style="flex: 1;">
                        <h3 style="font-weight: 600; margin-bottom: 0.25rem;">Paiement reçu</h3>
                        <p style="color: var(--gray-dark); font-size: 0.9rem;">Nous avons reçu votre paiement pour Tokyo</p>
                    </div>
                    <span style="color: var(--gray-dark); font-size: 0.8rem;">Il y a 5 jours</span>
                </div>
                
                <div style="display: flex; align-items: center; padding: 1rem;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(137, 202, 6, 0.1); display: flex; align-items: center; justify-content: center; margin-right: 1rem; color: var(--primary);">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div style="flex: 1;">
                        <h3 style="font-weight: 600; margin-bottom: 0.25rem;">Profil mis à jour</h3>
                        <p style="color: var(--gray-dark); font-size: 0.9rem;">Vous avez modifié votre numéro de téléphone</p>
                    </div>
                    <span style="color: var(--gray-dark); font-size: 0.8rem;">Il y a 1 semaine</span>
                </div>
            </div>
        </section>

        <!-- Section Mes Réservations -->
        <section id="reservations" class="tab-content">
            <div class="section-header">
                <h1><i class="fas fa-suitcase"></i> Mes Réservations</h1>
                <a href="#new-reservation" class="btn">Nouvelle réservation</a>
            </div>
            
            <div class="card">
                <table class="reservation-table">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Destination</th>
                            <th>Dates</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                        <tr>
                            <td>#{{ $reservation->id }}</td>
                            <td>{{ $reservation->destination }}</td>
                            <td>{{ $reservation->date_depart }} - {{ $reservation->date_retour }}</td>
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
                                <a href="#" style="color: var(--primary); margin-right: 1rem;"><i class="fas fa-eye"></i></a>
                                <a href="#" style="color: var(--danger);"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Section Assurance -->
        <section id="assurance" class="tab-content">
            <div class="section-header">
                <h1><i class="fas fa-shield-alt"></i> Mes Assurances</h1>
                <a href="#new-insurance" class="btn">Souscrire une assurance</a>
            </div>
            
            <div class="card-grid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Assurance Annulation</h3>
                        <i class="fas fa-umbrella-beach card-icon" style="color: var(--success);"></i>
                    </div>
                    <div class="card-body">
                        <p style="margin-bottom: 1rem;">Protégez-vous contre les imprévus et annulez sans frais jusqu'à 48h avant le départ.</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-weight: 600; color: var(--dark);">Active</span>
                            <span style="color: var(--success); font-weight: 600;">Incluse</span>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Assurance Médicale</h3>
                        <i class="fas fa-briefcase-medical card-icon" style="color: var(--danger);"></i>
                    </div>
                    <div class="card-body">
                        <p style="margin-bottom: 1rem;">Couverture médicale à l'étranger et rapatriement si nécessaire.</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-weight: 600; color: var(--dark);">Active</span>
                            <span style="color: var(--success); font-weight: 600;">Incluse</span>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Assurance Bagages</h3>
                        <i class="fas fa-suitcase-rolling card-icon" style="color: var(--warning);"></i>
                    </div>
                    <div class="card-body">
                        <p style="margin-bottom: 1rem;">Couverture en cas de perte, vol ou dommage de vos bagages.</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-weight: 600; color: var(--dark);">Non active</span>
                            <a href="#" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Ajouter</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Planification -->
        <section id="planning" class="tab-content">
            <div class="section-header">
                <h1><i class="fas fa-calendar-alt"></i> Planification de Voyage</h1>
                <a href="#new-plan" class="btn">Planifier un voyage</a>
            </div>
            
            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.5rem; border-bottom: 1px solid var(--gray-light);">
                    <h2 style="font-size: 1.2rem; font-weight: 600;">Vos prochains voyages</h2>
                    <div>
                        <button class="btn btn-outline" style="margin-right: 0.5rem; padding: 0.5rem 1rem;"><i class="fas fa-print"></i></button>
                        <button class="btn btn-outline" style="padding: 0.5rem 1rem;"><i class="fas fa-download"></i></button>
                    </div>
                </div>
                
                <div style="padding: 1.5rem;">
                    <div style="display: flex; align-items: center; margin-bottom: 1.5rem;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background: var(--primary-light); display: flex; align-items: center; justify-content: center; margin-right: 1rem; color: var(--primary);">
                            <i class="fas fa-plane"></i>
                        </div>
                        <div style="flex: 1;">
                            <h3 style="font-weight: 600; margin-bottom: 0.25rem;">New York, USA</h3>
                            <p style="color: var(--gray-dark);">15 - 25 Juin 2023 • 2 adultes, 1 enfant</p>
                        </div>
                        <a href="#" class="btn" style="padding: 0.5rem 1.5rem;">Détails</a>
                    </div>
                    
                    <div style="display: flex; align-items: center; margin-bottom: 1.5rem;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background: rgba(40, 167, 69, 0.1); display: flex; align-items: center; justify-content: center; margin-right: 1rem; color: var(--success);">
                            <i class="fas fa-umbrella-beach"></i>
                        </div>
                        <div style="flex: 1;">
                            <h3 style="font-weight: 600; margin-bottom: 0.25rem;">Bali, Indonésie</h3>
                            <p style="color: var(--gray-dark);">10 - 25 Août 2023 • 2 adultes</p>
                        </div>
                        <a href="#" class="btn" style="padding: 0.5rem 1.5rem;">Détails</a>
                    </div>
                    
                    <div style="display: flex; align-items: center;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background: rgba(220, 53, 69, 0.1); display: flex; align-items: center; justify-content: center; margin-right: 1rem; color: var(--danger);">
                            <i class="fas fa-city"></i>
                        </div>
                        <div style="flex: 1;">
                            <h3 style="font-weight: 600; margin-bottom: 0.25rem;">Tokyo, Japon</h3>
                            <p style="color: var(--gray-dark);">15 - 30 Novembre 2023 • 2 adultes</p>
                        </div>
                        <a href="#" class="btn" style="padding: 0.5rem 1.5rem;">Détails</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Profil -->
        <section id="profile" class="tab-content">
            <div class="section-header">
                <h1><i class="fas fa-user-cog"></i> Mon Profil</h1>
            </div>
            
            <div class="profile-form">
                <form action=#  method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">Prénom</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ auth()->user()->client->first_name }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="last_name">Nom</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ auth()->user()->client->last_name }}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="{{ auth()->user()->client->phone ?? '' }}">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="birth_date">Date de naissance</label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ auth()->user()->client->birth_date ?? '' }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="gender">Genre</label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="">Sélectionner</option>
                                <option value="male" {{ auth()->user()->client->gender == 'male' ? 'selected' : '' }}>Masculin</option>
                                <option value="female" {{ auth()->user()->client->gender == 'female' ? 'selected' : '' }}>Féminin</option>
                                <option value="other" {{ auth()->user()->client->gender == 'other' ? 'selected' : '' }}>Autre</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ auth()->user()->client->address ?? '' }}">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="city">Ville</label>
                            <input type="text" id="city" name="city" class="form-control" value="{{ auth()->user()->client->city ?? '' }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="zip_code">Code postal</label>
                            <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ auth()->user()->client->zip_code ?? '' }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="country">Pays</label>
                            <input type="text" id="country" name="country" class="form-control" value="{{ auth()->user()->client->country ?? '' }}">
                        </div>
                    </div>
                    
                    <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2rem;">
                        <button type="button" class="btn btn-outline">Annuler</button>
                        <button type="submit" class="btn">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script>
        // Navigation entre les onglets
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des onglets
            const tabs = document.querySelectorAll('.nav-menu a');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Retirer la classe active de tous les onglets et contenus
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(c => c.classList.remove('active'));
                    
                    // Ajouter la classe active à l'onglet cliqué
                    this.classList.add('active');
                    
                    // Afficher le contenu correspondant
                    const target = this.getAttribute('href');
                    document.querySelector(target).classList.add('active');
                });
            });
            
            // Si l'URL contient un hash, activer l'onglet correspondant
            if(window.location.hash) {
                const targetTab = document.querySelector(`.nav-menu a[href="${window.location.hash}"]`);
                if(targetTab) {
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(c => c.classList.remove('active'));
                    
                    targetTab.classList.add('active');
                    document.querySelector(window.location.hash).classList.add('active');
                }
            }
            
            // Auto-hide success alert after 5 seconds
            const successAlert = document.querySelector('.alert');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.opacity = '0';
                    setTimeout(() => successAlert.remove(), 300);
                }, 5000);
            }
        });
    </script>
</body>
</html>