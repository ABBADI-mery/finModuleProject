<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations | Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Styles spécifiques à la page Réservations */
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        .reservation-container {
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
        
        .badge-status {
            padding: 0.5em 0.8em;
            border-radius: 50px;
            font-size: 0.75em;
            font-weight: 500;
        }
        
        .badge-confirmed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .badge-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .badge-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .date-badge {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 50px;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            color: #495057;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }
        
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #f1f3f9;
        }
        
        .table thead {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }
        
        .action-btns {
            display: flex;
            gap: 8px;
        }
        
        .action-btn {
            padding: 0.35em 0.65em;
            font-size: 0.75rem;
            border-radius: 50px;
        }

        .assurance-list {
            max-height: 100px;
            overflow-y: auto;
            font-size: 0.85em;
        }
        
        .assurance-item {
            margin-bottom: 0.5em;
        }
        
        .no-assurance {
            color: #6c757d;
            font-style: italic;
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
                    <li><a href="{{ route('assurances.index') }}"><i class="fas fa-shield-alt"></i> Assurances</a></li>
                    <li><a href="{{ route('reservations.index') }}" class="active"><i class="fas fa-calendar-check"></i> Réservations</a></li>
                    <li><a href="{{ route('contacts.index') }}"><i class="fas fa-address-book"></i> Contacts</a></li>
                </ul>
            </nav>
        </aside>
        
        <main class="main-content">
            <div class="reservation-container">
                <h1 class="page-title">
                    <i class="fas fa-calendar-check"></i> Gestion des Réservations
                </h1>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($reservations->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <h3>Aucune réservation enregistrée</h3>
                        <p class="text-muted">Les réservations apparaîtront ici.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-user-tie me-1"></i> Client</th>
                                    <th><i class="far fa-calendar-alt me-1"></i> Dates</th>
                                    <th><i class="fas fa-map-marked-alt me-1"></i> Destination</th>
                                    <th><i class="fas fa-user-friends me-1"></i> Passagers</th>
                                    <th><i class="fas fa-shield-alt me-1"></i> Assurances</th>
                                    <th><i class="fas fa-info-circle me-1"></i> Statut</th>
                                    <th><i class="fas fa-ellipsis-v me-1"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                <tr>
                                    <td>
                                        <strong>{{ $reservation->nom }}</strong>
                                        <div class="text-muted small">{{ $reservation->email }}</div>
                                    </td>
                                    <td>
                                        <div class="small">
                                            <div>{{ date('d/m/Y', strtotime($reservation->date_depart)) }}</div>
                                            <div>{{ date('d/m/Y', strtotime($reservation->date_retour)) }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $reservation->destination }}</td>
                                    <td class="text-center">{{ $reservation->nombre_passagers }}</td>
                                    <td>
                                        <div class="assurance-list">
                                            @forelse ($reservation->assurances as $assurance)
                                                <div class="assurance-item">
                                                    <i class="fas fa-shield-alt me-1"></i>
                                                    {{ $assurance->type_assurance }} ({{ $assurance->nom }} {{ $assurance->prenom }})
                                                </div>
                                            @empty
                                                <div class="no-assurance">Aucune assurance</div>
                                            @endforelse
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $badgeClass = [
                                                'confirmée' => 'badge-confirmed',
                                                'annulée' => 'badge-cancelled'
                                            ][$reservation->statut ?? ''] ?? 'badge-pending';
                                        @endphp
                                        <span class="badge-status {{ $badgeClass }}">
                                            @if($reservation->statut == 'confirmée')
                                                <i class="fas fa-check-circle me-1"></i>
                                            @elseif($reservation->statut == 'annulée')
                                                <i class="fas fa-times-circle me-1"></i>
                                            @else
                                                <i class="fas fa-clock me-1"></i>
                                            @endif
                                            {{ $reservation->statut ?? 'En attente' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-btns">
                                            @if(($reservation->statut ?? '') != 'confirmée')
                                            <form action="{{ route('reservations.approve', $reservation->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm action-btn" title="Confirmer">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            @endif
                                            
                                            @if(($reservation->statut ?? '') != 'annulée')
                                            <form action="{{ route('reservations.reject', $reservation->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm action-btn" title="Annuler">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <span class="badge bg-primary">
                            <i class="fas fa-database me-1"></i>
                            Total: {{ $reservations->count() }} réservations
                        </span>
                    </div>
                @endif
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
    <script>
        // Confirmation avant annulation
        document.querySelectorAll('form[action*="reject"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                if(!confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>