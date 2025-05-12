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

        .section-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
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

        /* Table for Enrolled Assurances */
        .assurance-table {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .assurance-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .assurance-table th,
        .assurance-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--gray-light);
        }

        .assurance-table th {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .assurance-table td {
            color: var(--dark);
            font-size: 0.9rem;
        }

        .assurance-table tr:hover {
            background: var(--primary-light);
        }

        .assurance-table .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.5rem;
        }

        .assurance-table .status-active {
            background: var(--success);
        }

        .assurance-table .btn-outline {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
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

            .assurance-table {
                overflow-x: auto;
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

            .assurance-table th,
            .assurance-table td {
                font-size: 0.8rem;
                padding: 0.75rem;
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
        <div class="insurance-banner fade-in">
            <h2>Voyagez en toute sérénité</h2>
            <p>Nos assurances voyage vous protègent contre les imprévus et vous permettent de profiter pleinement de vos voyages sans souci.</p>
            <a href="{{ route('package') }}" class="btn">Comparer les offres</a>
        </div>

        <div class="section-header fade-in">
            <h1><i class="fas fa-shield-alt"></i> Mes Assurances</h1>
            <a href="{{ route('service') }}" class="btn"><i class="fas fa-plus"></i> Souscrire une assurance</a>
        </div>

       

        <!-- Cartes des types d'assurances -->
        <div class="section-header fade-in">
            <h2><i class="fas fa-info-circle"></i> Types d'Assurances Disponibles</h2>
        </div>
        <div class="card-grid">
            <!-- Assurance Annulation -->
            <div class="insurance-card">
                <div class="insurance-card-header">
                    <div>
                        <h3 class="insurance-card-title"><i class="fas fa-ban"></i> Assurance Annulation</h3>
                        <p class="insurance-card-subtitle">Protection contre les annulations imprévues</p>
                    </div>
                </div>
                <div class="insurance-card-body">
                    <div class="insurance-card-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <div class="feature-text">
                                <strong>Remboursement complet</strong> en cas d'annulation pour raisons médicales ou personnelles graves.
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <div class="feature-text">
                                Couverture des frais de transport et d'hébergement non remboursables.
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <div class="feature-text">
                                Assistance 24/7 pour gérer les modifications de voyage.
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="insurance-card-footer">
                    <div class="insurance-status">
                        <span class="status-indicator status-active"></span>
                        <span class="status-text">Disponible</span>
                    </div>
                    <a href="{{ route('service') }}" class="btn btn-outline">Souscrire</a>
                </div>
            </div>

            <!-- Assurance Bagage -->
            <div class="insurance-card">
                <div class="insurance-card-header">
                    <div>
                        <h3 class="insurance-card-title"><i class="fas fa-suitcase"></i> Assurance Bagage</h3>
                        <p class="insurance-card-subtitle">Protection de vos effets personnels</p>
                    </div>
                </div>
                <div class="insurance-card-body">
                    <div class="insurance-card-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <div class="feature-text">
                                <strong>Indemnisation</strong> en cas de perte, vol ou détérioration des bagages.
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <div class="feature-text">
                                Couverture des objets de valeur jusqu'à 1000€.
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <div class="feature-text">
                                Remboursement des articles essentiels en cas de retard de bagage.
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="insurance-card-footer">
                    <div class="insurance-status">
                        <span class="status-indicator status-active"></span>
                        <span class="status-text">Disponible</span>
                    </div>
                    <a href="{{ route('service') }}" class="btn btn-outline">Souscrire</a>
                </div>
            </div>

            <!-- Assurance Médicale -->
            <div class="insurance-card">
                <div class="insurance-card-header">
                    <div>
                        <h3 class="insurance-card-title"><i class="fas fa-heartbeat"></i> Assurance Médicale</h3>
                        <p class="insurance-card-subtitle">Soins médicaux à l'étranger</p>
                    </div>
                </div>
                <div class="insurance-card-body">
                    <div class="insurance-card-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <div class="feature-text">
                                <strong>Couverture des frais médicaux</strong> jusqu'à 500 000€.
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <div class="feature-text">
                                Rapatriement médical d'urgence si nécessaire avec prise en charge des frais de transport.
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <div class="feature-text">
                                Assistance médicale téléphonique 24/7.
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
                <div class="insurance-card-footer">
                    <div class="insurance-status">
                        <span class="status-indicator status-active"></span>
                        <span class="status-text">Disponible</span>
                    </div>
                    <a href="{{ route('service') }}" class="btn btn-outline">Souscrire</a>
                </div>
            </div>
        </div>
         <!-- Mes Assurances Souscrites -->
         <div class="section-header fade-in">
            <h2><i class="fas fa-file-contract"></i> Assurances Souscrites</h2>
        </div>
        @if($assurances->isEmpty())
            <p class="fade-in">Vous n'avez souscrit à aucune assurance pour le moment.</p>
        @else
            <div class="assurance-table fade-in">
                <table>
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Destination</th>
                            <th>Durée</th>
                            <th>Réservation</th>
                            <th>Date de souscription</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assurances as $assurance)
                            <tr>
                                <td>
                                    <i class="fas {{ $assurance->type_assurance === 'Annulation' ? 'fa-ban' : ($assurance->type_assurance === 'Bagages' ? 'fa-suitcase' : 'fa-heartbeat') }}"></i>
                                    {{ $assurance->type_assurance }}
                                </td>
                                <td>{{ $assurance->destination }}</td>
                                <td>{{ $assurance->duree }} jour{{ $assurance->duree > 1 ? 's' : '' }}</td>
                                <td>{{ $assurance->reservation_id }}</td>
                                <td>{{ $assurance->created_at->format('d/m/Y') }}</td>
                               
                                <td>
                                    <a href="{{ route('service') }}" class="btn btn-outline">Détails</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </main>
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des cartes et de la table au défilement
            const elements = document.querySelectorAll('.insurance-card, .assurance-table');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                    }
                });
            }, { threshold: 0.1 });
            
            elements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>
</html>