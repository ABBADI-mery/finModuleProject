<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts | Dashboard Admin</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Styles spécifiques à la page Contacts */
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        .contact-container {
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
        
        .badge-email {
            background-color: #e3f2fd;
            color: #1976d2;
            padding: 0.35em 0.65em;
            border-radius: 50px;
            font-size: 0.75em;
            font-weight: 500;
        }
        
        .message-preview {
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
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1><i class="fas fa-route"></i> FM Voyage</h1>
            <p>Votre Passeport Vers l’Évasion</p>
        </header>
        
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                    <li><a href="#"><i class="fas fa-hotel"></i> Hébergements</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> Utilisateurs</a></li>
                    <li>
                        <a href="{{ route('assurances.index') }}" >
                            <i class="fas fa-shield-alt"></i> Assurances
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contacts.index') }}" class="active">
                            <i class="fas fa-address-book"></i> Contacts
                        </a>
                    </li>
                    <li><a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-check"></i> Réservations</a></li>

                    <li><a href="#"><i class="fas fa-cog"></i> Paramètres</a></li>
                </ul>
            </nav>
        </aside>
        
        <main class="main-content">
            <div class="contact-container">
                <h1 class="page-title">
                    <i class="fas fa-address-book"></i> Messages des visiteurs
                </h1>
                
                @if ($contacts->isEmpty())
                    <div class="empty-state">
                        <i class="far fa-comment-dots"></i>
                        <h3>Aucun message pour le moment</h3>
                        <p class="text-muted">Lorsque les visiteurs vous contacteront, leurs messages apparaîtront ici.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th><i class="far fa-user me-1"></i> Nom</th>
                                    <th><i class="far fa-envelope me-1"></i> Email</th>
                                    <th><i class="far fa-comment me-1"></i> Sujet</th>
                                    <th><i class="far fa-file-alt me-1"></i> Message</th>
                                    <th><i class="far fa-clock me-1"></i> Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td><strong>{{ $contact->nom }}</strong></td>
                                        <td>
                                            <span class="badge-email">
                                                <i class="fas fa-at"></i>{{ $contact->email }}
                                            </span>
                                        </td>
                                        <td>{{ $contact->sujet }}</td>
                                        <td class="message-preview" title="{{ $contact->message }}">
                                            {{ Str::limit($contact->message, 50) }}
                                        </td>
                                        <td>
                                            <span class="date-badge">
                                                <i class="far fa-calendar"></i>
                                                {{ $contact->created_at->format('d/m/Y H:i') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <span class="badge bg-primary">
                            <i class="fas fa-database me-1"></i>
                            Total: {{ $contacts->count() }} messages
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