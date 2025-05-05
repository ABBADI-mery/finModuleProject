<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Client | FM Voyage</title>
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #7c3aed;
            --light-color: #f8fafc;
            --dark-color: #1e293b;
            --success-color: #10b981;
            --danger-color: #ef4444;
        }

        body {
            background: var(--light-color);
            font-family: 'Inter', sans-serif;
            margin: 0;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: var(--dark-color);
            color: white;
            padding: 1.5rem;
            transition: width 0.3s ease;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.75rem;
            border-radius: 8px;
            transition: background 0.2s ease;
        }

        .sidebar a:hover, .sidebar a.active {
            background: var(--primary-color);
        }

        .main-content {
            flex: 1;
            padding: 2rem;
        }

        .dashboard-header {
            margin-bottom: 2rem;
        }

        .dashboard-header h1 {
            font-size: 2rem;
            color: var(--dark-color);
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .dashboard-header p {
            color: #6c757d;
            font-size: 1rem;
            margin-top: 0.5rem;
        }

        .client-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.2s ease;
            animation: fadeIn 0.5s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
        }

        .info-card i {
            font-size: 1.8rem;
            color: var(--primary-color);
            margin-bottom: 0.75rem;
        }

        .info-card .label {
            font-weight: 600;
            color: var(--dark-color);
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .info-card p {
            color: #6c757d;
            font-size: 1rem;
            margin: 0.25rem 0;
        }

        .reservation-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .summary-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.2s ease;
            animation: fadeIn 0.5s ease;
        }

        .summary-card:hover {
            transform: translateY(-5px);
        }

        .summary-card i {
            font-size: 2rem;
            margin-bottom: 0.75rem;
        }

        .summary-card .count {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
        }

        .summary-card .label {
            font-size: 0.9rem;
            color: #6c757d;
            text-transform: uppercase;
        }

        .summary-pending i { color: #d4a017; }
        .summary-confirmed i { color: #059669; }
        .summary-cancelled i { color: #b91c1c; }

        .logout-btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: var(--danger-color);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            transition: background 0.2s ease;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }

            .sidebar a {
                justify-content: center;
            }

            .sidebar a span {
                display: none;
            }

            .main-content {
                padding: 1rem;
            }

            .client-info, .reservation-summary {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('client.dashboard') }}" class="active"><i class="fas fa-tachometer-alt"></i><span>Tableau de bord</span></a></li>
                    <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i><span>Déconnexion</span></a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <div class="dashboard-header">
                <h1><i class="fas fa-user-circle"></i> Bienvenue, {{ auth()->user()->client->first_name }} {{ auth()->user()->client->last_name }} !</h1>
                <p>Votre espace personnel pour gérer vos voyages</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="client-info">
                <div class="info-card">
                    <i class="fas fa-user"></i>
                    <p class="label">Nom complet</p>
                    <p>{{ auth()->user()->client->first_name }} {{ auth()->user()->client->last_name }}</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-envelope"></i>
                    <p class="label">Email</p>
                    <p>{{ auth()->user()->email }}</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-phone"></i>
                    <p class="label">Téléphone</p>
                    <p>{{ auth()->user()->client->phone ?? 'Non fourni' }}</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-calendar-alt"></i>
                    <p class="label">Compte créé</p>
                    <p>{{ auth()->user()->created_at->format('d/m/Y') }}</p>
                </div>
            </div>

            <div class="reservation-summary">
                <div class="summary-card summary-pending">
                    <i class="fas fa-hourglass-half"></i>
                    <p class="count">{{ $reservations->where('statut', 'en attente')->count() }}</p>
                    <p class="label">Réservations en attente</p>
                </div>
                <div class="summary-card summary-confirmed">
                    <i class="fas fa-check-circle"></i>
                    <p class="count">{{ $reservations->where('statut', 'confirmée')->count() }}</p>
                    <p class="label">Réservations confirmées</p>
                </div>
                <div class="summary-card summary-cancelled">
                    <i class="fas fa-times-circle"></i>
                    <p class="count">{{ $reservations->where('statut', 'annulée')->count() }}</p>
                    <p class="label">Réservations annulées</p>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/mainLogin.js') }}"></script>
</body>
</html>