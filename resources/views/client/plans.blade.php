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
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
            --border-radius: 16px;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--gray-light);
            color: var(--dark);
            line-height: 1.6;
            padding-top: 100px;
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

        .main-content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .card {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            margin-bottom: 2rem;
            border: 1px solid rgba(137, 202, 6, 0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
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
        
        .card-title {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .card-icon {
            font-size: 1.5rem;
            color: var(--primary);
        }
        
        p {
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .highlight {
            background: var(--primary-light);
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-weight: 500;
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
            text-decoration: none;
            text-align: center;
            box-shadow: 0 4px 15px rgba(137, 202, 6, 0.3);
            transition: all 0.3s ease;
            margin-top: 1rem;
        }
        
        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(137, 202, 6, 0.2);
        }
        
        .text-center {
            text-align: center;
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
        
        /* ... (autres styles de navigation existants) ... */
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



    <main class="main-content">
        <!-- Carte 1 : Informations personnelles -->
        <div class="card">
            <h2 class="card-title"><i class="fas fa-user card-icon"></i> Vos Informations Personnelles</h2>
            <p>Nous utilisons votre <span class="highlight">nom</span> et votre <span class="highlight">email</span> pour personnaliser votre expérience et vous envoyer des propositions adaptées.</p>
            <p>Ces informations nous permettent de :</p>
            <ul style="margin-left: 1.5rem; margin-bottom: 1rem;">
                <li>Créer des documents de voyage à votre nom</li>
                <li>Vous contacter pour valider les détails de votre séjour</li>
                <li>Vous envoyer des suggestions exclusives</li>
            </ul>
        </div>
        
        <!-- Carte 2 : Destination et dates -->
        <div class="card">
            <h2 class="card-title"><i class="fas fa-map-marker-alt card-icon"></i> Votre Destination et Dates</h2>
            <p>La <span class="highlight">destination choisie</span> (comme Paris, France) est le point de départ de notre planification.</p>
            <p>Vos dates de voyage (<span class="highlight">date de départ</span> et <span class="highlight">durée</span>) nous aident à :</p>
            <ul style="margin-left: 1.5rem; margin-bottom: 1rem;">
                <li>Vérifier la disponibilité des hébergements et activités</li>
                <li>Adapter le programme aux conditions saisonnières</li>
                <li>Optimiser votre itinéraire en fonction des événements locaux</li>
            </ul>
        </div>
        
        <!-- Carte 3 : Détails du voyage -->
        <div class="card">
            <h2 class="card-title"><i class="fas fa-suitcase card-icon"></i> Détails de Votre Voyage</h2>
            <p>Le <span class="highlight">nombre de personnes</span> et le <span class="highlight">budget approximatif</span> nous guident dans la sélection des options adaptées à votre groupe.</p>
            <p>Le <span class="highlight">type de voyage</span> (comme "Découverte") détermine le style d'activités que nous vous proposerons.</p>
            <p>Ces critères nous permettent de :</p>
            <ul style="margin-left: 1.5rem; margin-bottom: 1rem;">
                <li>Choisir des hébergements adaptés à la taille de votre groupe</li>
                <li>Sélectionner des activités correspondant à votre budget</li>
                <li>Proposer des expériences en phase avec vos attentes</li>
            </ul>
        </div>
        
        <!-- Carte 4 : Préférences spéciales -->
        <div class="card">
            <h2 class="card-title"><i class="fas fa-star card-icon"></i> Vos Préférences Spéciales</h2>
            <p>Vos <span class="highlight">activités spécifiques</span>, <span class="highlight">régimes alimentaires</span> et <span class="highlight">besoins particuliers</span> sont essentiels pour créer une expérience vraiment personnalisée.</p>
            <p>Ces informations nous aident à :</p>
            <ul style="margin-left: 1.5rem; margin-bottom: 1rem;">
                <li>Sélectionner des restaurants adaptés à vos restrictions alimentaires</li>
                <li>Prévoir des activités accessibles si nécessaire</li>
                <li>Intégrer vos passions et centres d'intérêt dans le programme</li>
            </ul>
        </div>
        
        <!-- Bouton d'action -->
        <div class="text-center">
            <a href="{{ route('planification') }}" class="btn">
                <i class="fas fa-magic"></i> Générer Mon Plan Personnalisé
            </a>
        </div>
    </main>
</body>
</html>