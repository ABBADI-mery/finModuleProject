<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres Touristiques | Dashboard Admin</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Styles spécifiques à la page Offres */
        :root {
            --primary-color: #78c103;
            --secondary-color: #265301;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        .offers-container {
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
        
        .badge-price {
            background-color: rgba(120, 193, 3, 0.15);
            color: #265301;
            border: 1px solid rgba(120, 193, 3, 0.3);
            padding: 0.35em 0.65em;
            border-radius: 50px;
            font-size: 0.75em;
            font-weight: 500;
        }
        
        .description-preview {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
            background-color: #f8f9fa;
            border-radius: 10px;
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
        
        /* Style pour le bouton d'ajout */
        .btn-add-offer {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(120, 193, 3, 0.3);
        }
        
        .btn-add-offer:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(120, 193, 3, 0.4);
            color: white;
        }
        
        /* Style pour la sidebar */
        .sidebar {
            background: linear-gradient(180deg, #265301, #78c103);
        }
        
        .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.2);
            border-left: 4px solid white;
        }
        
        /* Style pour le header */
        .dashboard-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        /* Style pour les boutons d'action */
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        
        .btn-action {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            border: none;
        }
        
        .btn-edit {
            background-color: rgba(255, 193, 7, 0.15);
            color: #d4a017;
        }
        
        .btn-edit:hover {
            background-color: rgba(255, 193, 7, 0.3);
        }
        
        .btn-delete {
            background-color: rgba(220, 53, 69, 0.15);
            color: #c82333;
        }
        
        .btn-delete:hover {
            background-color: rgba(220, 53, 69, 0.3);
        }
        
        .btn-view {
            background-color: rgba(13, 110, 253, 0.15);
            color: #0b5ed7;
        }
        
        .btn-view:hover {
            background-color: rgba(13, 110, 253, 0.3);
        }
        
        /* Style pour l'image de l'offre */
        .offer-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 12px;
            border: 2px solid #f1f3f9;
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
                    <li>
                        <a href="{{ route('admin.offres.offres') }}" class="active">
                            <i class="fas fa-map-marked-alt"></i> Offres
                        </a>
                    </li>
                    <li><a href="#"><i class="fas fa-hotel"></i> Hébergements</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> Utilisateurs</a></li>
                    <li><a href="{{ route('contacts.index') }}"><i class="fas fa-address-book"></i> Contacts</a></li>
                    <li><a href="{{ route('assurances.index') }}"><i class="fas fa-shield-alt"></i> Assurances</a></li>
                    <li><a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-check"></i> Réservations</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Paramètres</a></li>
                </ul>
            </nav>
        </aside>
        
        <main class="main-content">
            <div class="offers-container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="page-title">
                        <i class="fas fa-map-marked-alt"></i> Gestion des Offres Touristiques
                    </h1>
                    
                    <a href="{{ route('admin.offres.ajouteroffres') }}" class="btn-add-offer">
                        <i class="fas fa-plus-circle"></i> Ajouter une offre
                    </a>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if ($offres->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-map-marked-alt fa-2x mb-3"></i>
                        <h3>Aucune offre touristique</h3>
                        <p class="text-muted">Commencez par ajouter votre première offre touristique.</p>
                        <a href="{{ route('admin.offres.ajouteroffres') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus-circle me-2"></i> Ajouter une offre
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-map-marker-alt me-1"></i> Destination</th>
                                    <th><i class="fas fa-hotel me-1"></i> Hôtel</th>
                                    <th><i class="fas fa-tag me-1"></i> Prix</th>
                                    <th><i class="fas fa-calendar-day me-1"></i> Durée</th>
                                    <th><i class="fas fa-users me-1"></i> Personnes</th>
                                    <th><i class="fas fa-star me-1"></i> Note</th>
                                    <th><i class="fas fa-cogs me-1"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offres as $offre)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $offre->image) }}" alt="{{ $offre->title }}" class="offer-image">
                                                <div>
                                                    <div class="fw-semibold">{{ $offre->title }}</div>
                                                    <div class="text-muted small">{{ $offre->location }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $offre->hotel }}</td>
                                        <td>
                                            <span class="badge-price">
                                                <i class="fas fa-dollar-sign"></i>
                                                {{ number_format($offre->price, 2) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark">
                                                <i class="fas fa-clock"></i>
                                                {{ $offre->duration }} jours
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark">
                                                <i class="fas fa-user"></i>
                                                {{ $offre->persons }}
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $offre->rating)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @else
                                                        <i class="far fa-star text-muted"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('admin.offres.ajouteroffres', $offre->id) }}" class="btn-action btn-edit" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn-action btn-view" title="Voir" data-bs-toggle="modal" data-bs-target="#viewOfferModal{{ $offre->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn-action btn-delete" title="Supprimer" data-bs-toggle="modal" data-bs-target="#deleteOfferModal{{ $offre->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                            
                                            <!-- Modal de visualisation -->
                                            <div class="modal fade" id="viewOfferModal{{ $offre->id }}" tabindex="-1" aria-labelledby="viewOfferModalLabel{{ $offre->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewOfferModalLabel{{ $offre->id }}">{{ $offre->title }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <img src="{{ asset('storage/' . $offre->image) }}" alt="{{ $offre->title }}" class="img-fluid rounded mb-3">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h5>Détails de l'offre</h5>
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Destination
                                                                            <span>{{ $offre->location }}</span>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Hôtel
                                                                            <span>{{ $offre->hotel }}</span>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Prix
                                                                            <span>${{ number_format($offre->price, 2) }}</span>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Durée
                                                                            <span>{{ $offre->duration }} jours</span>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Personnes
                                                                            <span>{{ $offre->persons }}</span>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Note
                                                                            <span>
                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                    @if ($i <= $offre->rating)
                                                                                        <i class="fas fa-star text-warning"></i>
                                                                                    @else
                                                                                        <i class="far fa-star text-muted"></i>
                                                                                    @endif
                                                                                @endfor
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3">
                                                                <h5>Description</h5>
                                                                <p>{{ $offre->description }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Modal de suppression -->
                                            <div class="modal fade" id="deleteOfferModal{{ $offre->id }}" tabindex="-1" aria-labelledby="deleteOfferModalLabel{{ $offre->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteOfferModalLabel{{ $offre->id }}">Confirmer la suppression</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Êtes-vous sûr de vouloir supprimer l'offre <strong>{{ $offre->title }}</strong> ?</p>
                                                            <p class="text-danger"><small>Cette action est irréversible.</small></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <form action="{{ route('admin.offres.destroy', $offre) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
                            Total: {{ $offres->count() }} offres
                        </span>
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
