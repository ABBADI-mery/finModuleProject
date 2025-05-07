<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Réservation | FM Voyage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
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

        .reservation-card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: var(--transition);
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

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

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

    <main class="main-content">
        <div class="section-header fade-in">
            <h1><i class="fas fa-suitcase"></i> Détails de la Réservation #{{ $reservation->id }}</h1>
            <a href="{{ route('client.reservations') }}" class="btn btn-outline">Retour</a>
        </div>

        <div class="reservation-card fade-in">
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
                <a href="{{ route('client.reservation.edit', $reservation) }}" class="btn btn-outline">Modifier</a>
                @if($reservation->statut == 'en attente')
                    <form action="{{ route('client.reservation.cancel', $reservation) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn" style="background-color: var(--danger);" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">Annuler</button>
                    </form>
                @endif
            </div>
        </div>
    </main>
</body>
</html>