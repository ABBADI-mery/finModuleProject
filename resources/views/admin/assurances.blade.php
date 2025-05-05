<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assurances | Dashboard Admin</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Styles spécifiques à la page Assurances */
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        .assurance-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin: 1rem;
        }
        
        .page-title {
            color: var(--dark-color);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1.5rem;
        }
        
        /* Nouveau style pour la table */
        .assurance-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .assurance-table thead th {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 1.25rem;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            border: none;
            position: sticky;
            top: 0;
        }
        
        .assurance-table tbody tr {
            transition: all 0.2s ease;
        }
        
        .assurance-table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .assurance-table td {
            padding: 1.25rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f3f9;
            font-size: 0.9rem;
        }
        
        .assurance-table tr:last-child td {
            border-bottom: none;
        }
        
        /* Styles améliorés pour les badges */
        .badge-pill {
            border-radius: 50px;
            padding: 0.5em 0.9em;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .badge-annulation {
            background-color: rgba(255, 193, 7, 0.15);
            color: #d4a017;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }
        
        .badge-medicale {
            background-color: rgba(220, 53, 69, 0.15);
            color: #c82333;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }
        
        .badge-bagages {
            background-color: rgba(13, 110, 253, 0.15);
            color: #0b5ed7;
            border: 1px solid rgba(13, 110, 253, 0.3);
        }
        
        /* Style pour les avatars */
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-weight: bold;
            font-size: 0.9rem;
        }
        
        /* Style pour les indicateurs de date */
        .date-indicator {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            color: #6c757d;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        
        /* Animation pour les icônes */
        .assurance-icon {
            transition: transform 0.2s ease;
        }
        .assurance-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1><i class="fas fa-route"></i> FM Voyage</h1>
            <p>Votre Passeport Vers l'Évasion</p>
        </header>
        
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                    <li><a href="#"><i class="fas fa-hotel"></i> Hébergements</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> Utilisateurs</a></li>
                    <li><a href="{{ route('contacts.index') }}"><i class="fas fa-address-book"></i> Contacts</a></li>
                    <li>
                        <a href="{{ route('assurances.index') }}" class="active">
                            <i class="fas fa-shield-alt"></i> Assurances
                        </a>
                    </li>
                    <li><a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-check"></i> Réservations</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Paramètres</a></li>
                </ul>
            </nav>
        </aside>
        
        <main class="main-content">
            <div class="assurance-container">
                <h1 class="page-title">
                    <i class="fas fa-shield-alt"></i> Souscriptions d'assurances
                </h1>
                
                @if ($assurances->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-shield-virus fa-2x mb-3"></i>
                        <h3>Aucune assurance enregistrée</h3>
                        <p class="text-muted">Les souscriptions d'assurances apparaîtront ici.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="assurance-table">
                            <thead>
                                <tr>
                                    <th style="width: 20%;"><i class="fas fa-user-tie me-2"></i> Client</th>
                                    <th style="width: 15%;"><i class="fas fa-birthday-cake me-2"></i> Date Naiss.</th>
                                    <th style="width: 10%;"><i class="fas fa-calendar-day me-2"></i> Durée</th>
                                    <th style="width: 15%;"><i class="fas fa-map-marked-alt me-2"></i> Destination</th>
                                    <th style="width: 20%;"><i class="fas fa-tags me-2"></i> Type</th>
                                    <th style="width: 20%;"><i class="fas fa-calendar-check me-2"></i> Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assurances as $assurance)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar">
                                                    {{ strtoupper(substr($assurance->prenom, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <div class="fw-semibold">{{ $assurance->prenom }} {{ $assurance->nom }}</div>
                                                    <div class="text-muted small">{{ $assurance->email ?? 'N/A' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="date-indicator">
                                                <i class="fas fa-calendar-day"></i>
                                                {{ \Carbon\Carbon::parse($assurance->date_naissance)->format('d/m/Y') }}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark">
                                                <i class="fas fa-clock"></i>
                                                {{ $assurance->duree }} jours
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-map-marker-alt text-primary me-2 assurance-icon"></i>
                                                <span>{{ $assurance->destination }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge-pill 
                                                @if($assurance->type_assurance == 'Annulation') badge-annulation
                                                @elseif($assurance->type_assurance == 'Médicale') badge-medicale
                                                @else badge-bagages
                                                @endif">
                                                <i class="fas assurance-icon
                                                    @if($assurance->type_assurance == 'Annulation') fa-ban
                                                    @elseif($assurance->type_assurance == 'Médicale') fa-heartbeat
                                                    @else fa-suitcase-rolling
                                                    @endif"></i>
                                                {{ $assurance->type_assurance }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="date-indicator">
                                                <i class="fas fa-clock"></i>
                                                {{ $assurance->created_at ? $assurance->created_at->format('d/m/Y H:i') : 'N/A' }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted small">
                            Affichage de <strong>1</strong> à <strong>{{ $assurances->count() }}</strong> sur <strong>{{ $assurances->count() }}</strong> souscriptions
                        </div>
                        <div>
                            <span class="badge bg-primary rounded-pill">
                                <i class="fas fa-database me-1"></i>
                                Total: {{ $assurances->count() }}
                            </span>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
</body>
</html>