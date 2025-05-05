<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $offre->id ? 'Modifier' : 'Ajouter' }} une Offre | Dashboard Admin</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* [Vos styles CSS existants restent inchangés] */
    </style>
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1><i class="fas fa-route"></i> FM Voyage</h1>
            <p>Votre Passeport Vers l'Évasion</p>
        </header>
        
        <div class="main-container">
            <aside class="sidebar">
                <nav>
                    <ul>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                        <li><a href="{{ route('admin.offres.index') }}" class="active"><i class="fas fa-map-marked-alt"></i> Offres</a></li>
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
                            <i class="fas fa-{{ $offre->id ? 'edit' : 'plus-circle' }}"></i> 
                            {{ $offre->id ? 'Modifier l\'Offre: ' . $offre->title : 'Ajouter une Offre Touristique' }}
                        </h1>
                        
                        <a href="{{ route('admin.offres.index') }}" class="btn btn-outline-secondary btn-cancel">
                            <i class="fas fa-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i> Il y a des erreurs dans le formulaire
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul class="mt-2 mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ $offre->id ? route('admin.offres.update', $offre) : route('admin.offres.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($offre->id)
                            @method('PUT')
                        @endif
                        
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Informations générales -->
                                <div class="form-section">
                                    <h3 class="form-section-title"><i class="fas fa-info-circle"></i> Informations générales</h3>
                                    
                                    <div class="mb-3">
                                        <label for="title" class="form-label"><i class="fas fa-heading"></i> Titre de l'offre</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $offre->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="location" class="form-label"><i class="fas fa-map-marker-alt"></i> Destination</label>
                                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $offre->location) }}" required>
                                                @error('location')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="hotel" class="form-label"><i class="fas fa-hotel"></i> Hôtel</label>
                                                <input type="text" class="form-control @error('hotel') is-invalid @enderror" id="hotel" name="hotel" value="{{ old('hotel', $offre->hotel) }}" required>
                                                @error('hotel')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="description" class="form-label"><i class="fas fa-align-left"></i> Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $offre->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!-- Détails du séjour -->
                                <div class="form-section">
                                    <h3 class="form-section-title"><i class="fas fa-calendar-alt"></i> Détails du séjour</h3>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="price" class="form-label"><i class="fas fa-tag"></i> Prix ($)</label>
                                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $offre->price) }}" required>
                                                @error('price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="duration" class="form-label"><i class="fas fa-clock"></i> Durée (jours)</label>
                                                <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', $offre->duration) }}" required>
                                                @error('duration')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="persons" class="form-label"><i class="fas fa-users"></i> Personnes</label>
                                                <input type="number" class="form-control @error('persons') is-invalid @enderror" id="persons" name="persons" value="{{ old('persons', $offre->persons) }}" required>
                                                @error('persons')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="rating" class="form-label"><i class="fas fa-star"></i> Note (1-5)</label>
                                        <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating" required>
                                            <option value="">Sélectionnez une note</option>
                                            <option value="1" {{ old('rating', $offre->rating) == 1 ? 'selected' : '' }}>1 étoile</option>
                                            <option value="2" {{ old('rating', $offre->rating) == 2 ? 'selected' : '' }}>2 étoiles</option>
                                            <option value="3" {{ old('rating', $offre->rating) == 3 ? 'selected' : '' }}>3 étoiles</option>
                                            <option value="4" {{ old('rating', $offre->rating) == 4 ? 'selected' : '' }}>4 étoiles</option>
                                            <option value="5" {{ old('rating', $offre->rating) == 5 ? 'selected' : '' }}>5 étoiles</option>
                                        </select>
                                        @error('rating')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <!-- Image -->
                                <div class="form-section">
                                    <h3 class="form-section-title"><i class="fas fa-image"></i> Image</h3>
                                    
                                    <div class="image-preview" id="imagePreview">
                                        @if($offre->id && $offre->image)
                                            <img src="{{ asset('storage/' . $offre->image) }}" alt="{{ $offre->title }}">
                                        @else
                                            <i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>
                                        @endif
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="image" class="form-label">
                                            <i class="fas fa-file-image"></i> 
                                            {{ $offre->id ? 'Modifier l\'image' : 'Sélectionner une image' }}
                                        </label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" {{ $offre->id ? '' : 'required' }}>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            Format recommandé: JPG, PNG. Taille max: 2MB.
                                            @if($offre->id)
                                                Laissez vide pour conserver l'image actuelle.
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Actions -->
                                <div class="form-section">
                                    <h3 class="form-section-title"><i class="fas fa-cogs"></i> Actions</h3>
                                    
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-submit">
                                            <i class="fas fa-save"></i> 
                                            {{ $offre->id ? 'Mettre à jour l\'offre' : 'Enregistrer l\'offre' }}
                                        </button>
                                        <a href="{{ route('admin.offres.index') }}" class="btn btn-outline-secondary btn-cancel">
                                            <i class="fas fa-times"></i> Annuler
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide spinner after page load
            const spinner = document.getElementById('spinner');
            if (spinner) {
                setTimeout(() => {
                    spinner.classList.remove('show');
                }, 500);
            }
            
            // Image preview
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');
            
            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    }
                    reader.readAsDataURL(file);
                } else {
                    @if($offre->id && $offre->image)
                        imagePreview.innerHTML = `<img src="{{ asset('storage/' . $offre->image) }}" alt="{{ $offre->title }}">`;
                    @else
                        imagePreview.innerHTML = `<i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>`;
                    @endif
                }
            });
        });
    </script>
</body>
</html>