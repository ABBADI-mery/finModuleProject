<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($offre) ? 'Modifier une offre' : 'Ajouter une offre' }} | Dashboard Admin</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --white: hsl(0, 0%, 100%);
            --black: hsl(0, 0%, 0%);
            --deep-saffron: #89ca06;
            --dark-orange: #7ab805;
            --gray-x-11-gray: hsl(0, 0%, 73%);
            --spanish-gray: hsl(0, 0%, 60%);
            --cultured: hsl(0, 0%, 93%);
            --rich-black-fogra-29: hsl(210, 26%, 7%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--white);
            color: var(--rich-black-fogra-29);
        }

        .dashboard-container {
            display: grid;
            grid-template-areas: 
                "header header"
                "sidebar main";
            grid-template-columns: 280px 1fr;
            grid-template-rows: auto 1fr;
            min-height: 100vh;
        }

        .dashboard-header {
            grid-area: header;
            background: var(--white);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--cultured);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dashboard-header h1 {
            font-size: 1.8rem;
            color: var(--deep-saffron);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dashboard-header p {
            font-size: 1rem;
            color: var(--spanish-gray);
        }

        .sidebar {
            grid-area: sidebar;
            background: var(--rich-black-fogra-29);
            padding: 2rem 1rem;
            color: var(--white);
        }

        .sidebar nav ul {
            list-style: none;
        }

        .sidebar nav ul li {
            margin: 0.75rem 0;
        }

        .sidebar nav ul li a {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1.5rem;
            color: var(--gray-x-11-gray);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar nav ul li a:hover,
        .sidebar nav ul li a.active {
            background: var(--deep-saffron);
            color: var(--black);
            transform: scale(1.02);
        }

        .main-content {
            grid-area: main;
            padding: 2rem;
            background: var(--cultured);
        }

        .form-container {
            background: var(--white);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
            max-width: 700px;
            margin: 0 auto;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--rich-black-fogra-29);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
            color: var(--spanish-gray);
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--cultured);
            border-radius: 8px;
            background: var(--white);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            font-size: 0.95rem;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--deep-saffron);
            box-shadow: 0 0 0 3px rgba(137, 202, 6, 0.1);
            outline: none;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group input[type="file"] {
            padding: 0.5rem;
        }

        .image-preview {
            margin-top: 1rem;
        }

        .image-preview img {
            max-width: 200px;
            border-radius: 8px;
            border: 1px solid var(--cultured);
        }

        .action-btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 50px;
            font-size: 0.95rem;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.2s ease;
            background: var(--deep-saffron);
            color: var(--black);
        }

        .action-btn:hover {
            background: var(--dark-orange);
            transform: translateY(-2px);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
            text-decoration: none;
            color: var(--spanish-gray);
            font-size: 0.95rem;
        }

        .back-link:hover {
            color: var(--deep-saffron);
        }

        .error-message {
            color: #d00000;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(137, 202, 6, 0.1);
            color: var(--dark-orange);
        }

        .alert button {
            background: none;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            color: var(--dark-orange);
        }

        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-areas: 
                    "header"
                    "main";
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .form-container {
                padding: 1.5rem;
            }
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
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                    <li><a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-check"></i> Réservations</a></li>
                    <li><a href="{{ route('admin.offres.index') }}" class="active"><i class="fas fa-plane"></i> Offres</a></li>
                    <li><a href="{{ route('assurances.index') }}"><i class="fas fa-shield-alt"></i> Assurances</a></li>
                    <li><a href="{{ route('contacts.index') }}"><i class="fas fa-address-book"></i> Contacts</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <a href="#" onclick="this.closest('form').submit(); return false;">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <div class="form-container">
                <h1 class="page-title">
                    <i class="fas fa-plane"></i> {{ isset($offre) ? 'Modifier l\'offre' : 'Ajouter une offre' }}
                </h1>

                @if(session('success'))
                    <div class="alert" id="successAlert">
                        {{ session('success') }}
                        <button onclick="this.parentElement.style.display='none'">×</button>
                    </div>
                @endif

                <form action="{{ isset($offre) ? route('admin.offres.update', $offre->id) : route('admin.offres.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($offre))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="title"><i class="fas fa-tag"></i> Nom de l'offre</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $offre->title ?? '') }}" required>
                        @error('title')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description"><i class="fas fa-info-circle"></i> Description</label>
                        <textarea name="description" id="description" required>{{ old('description', $offre->description ?? '') }}</textarea>
                        @error('description')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price"><i class="fas fa-euro-sign"></i> Prix (en DH)</label>
                        <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $offre->price ?? '') }}" required>
                        @error('price')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image"><i class="fas fa-image"></i> Image</label>
                        <input type="file" name="image" id="image" accept="image/*">
                        @error('image')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="image-preview" id="imagePreview">
                            @if(isset($offre) && $offre->image_path)
                                <img src="{{ asset('storage/' . $offre->image_path) }}" alt="Image actuelle">
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location"><i class="fas fa-map-marked-alt"></i> Destination</label>
                        <input type="text" name="location" id="location" value="{{ old('location', $offre->location ?? '') }}" required>
                        @error('location')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="duration"><i class="far fa-clock"></i> Durée (jours)</label>
                        <input type="number" name="duration" id="duration" value="{{ old('duration', $offre->duration ?? '') }}" required>
                        @error('duration')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="people"><i class="fas fa-user-friends"></i> Nombre de personnes</label>
                        <input type="number" name="people" id="people" value="{{ old('people', $offre->people ?? '') }}" required>
                        @error('people')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="hotel_name"><i class="fas fa-hotel"></i> Nom de l'hôtel</label>
                        <input type="text" name="hotel_name" id="hotel_name" value="{{ old('hotel_name', $offre->hotel_name ?? '') }}" required>
                        @error('hotel_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="action-btn">
                        <i class="fas fa-save me-1"></i> {{ isset($offre) ? 'Mettre à jour' : 'Ajouter' }}
                    </button>
                </form>

                <a href="{{ route('admin.offres.index') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i> Retour à la liste des offres
                </a>
            </div>
        </main>
    </div>

    <script>
        // Image preview
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Prévisualisation';
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>