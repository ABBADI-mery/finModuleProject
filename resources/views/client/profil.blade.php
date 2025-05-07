<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil | FM Voyage</title>

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

        .profile-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
        }

        .profile-sidebar {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            padding: 2rem;
            height: fit-content;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .profile-avatar-text {
            font-size: 3rem;
            font-weight: 600;
            color: var(--primary);
        }

        .profile-avatar-upload {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: var(--white);
            text-align: center;
            padding: 0.5rem;
            cursor: pointer;
            font-size: 0.8rem;
            opacity: 0;
            transition: var(--transition);
        }

        .profile-avatar:hover .profile-avatar-upload {
            opacity: 1;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .profile-email {
            color: var(--gray-dark);
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .profile-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .profile-stat {
            text-align: center;
        }

        .profile-stat-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
        }

        .profile-stat-label {
            font-size: 0.8rem;
            color: var(--gray-dark);
        }

        .profile-menu {
            list-style: none;
        }

        .profile-menu-item {
            margin-bottom: 0.5rem;
        }

        .profile-menu-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            border-radius: var(--border-radius);
            color: var(--dark);
            text-decoration: none;
            transition: var(--transition);
        }

        .profile-menu-link:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .profile-menu-link.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 500;
        }

        .profile-content {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            padding: 2rem;
        }

        .profile-form {
            display: grid;
            gap: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-medium);
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .profile-header-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .profile-header-subtitle {
            color: var(--gray-dark);
            margin-top: 0.25rem;
        }

        .form-group-header {
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .form-group-title {
            font-weight: 600;
            color: var(--dark);
        }

        .form-group-subtitle {
            color: var(--gray-dark);
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 1rem;
            color: var(--gray-dark);
        }

        .input-with-icon .form-control {
            padding-left: 2.5rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        @media (max-width: 992px) {
            .profile-container {
                grid-template-columns: 1fr;
            }
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
            <a href="{{ route('client.reservations') }}"><i class="fas fa-suitcase"></i> Mes réservations</a>
            <a href="{{ route('client.assurances') }}"><i class="fas fa-shield-alt"></i> Assurance</a>
            <a href="{{ route('client.planification') }}"><i class="fas fa-calendar-alt"></i> Planification</a>
            <a href="{{ route('client.profil') }}" class="active"><i class="fas fa-user-cog"></i> Profil</a>
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
            <h1><i class="fas fa-user-cog"></i> Mon Profil</h1>
        </div>
        <div class="profile-container fade-in">
            <div class="profile-sidebar">
                <div class="profile-avatar">
                    <div class="profile-avatar-text">
                        {{ strtoupper(substr(auth()->user()->client->first_name, 0, 1)) }}
                    </div>
                    <div class="profile-avatar-upload">
                        <i class="fas fa-camera"></i> Changer la photo
                    </div>
                </div>
                <h2 class="profile-name">{{ auth()->user()->client->first_name }} {{ auth()->user()->client->last_name }}</h2>
                <p class="profile-email">{{ auth()->user()->email }}</p>
                <div class="profile-stats">
                    <div class="profile-stat">
                        <div class="profile-stat-value">5</div>
                        <div class="profile-stat-label">Voyages</div>
                    </div>
                    <div class="profile-stat">
                        <div class="profile-stat-value">1250</div>
                        <div class="profile-stat-label">Points</div>
                    </div>
                </div>
                <ul class="profile-menu">
                    <li class="profile-menu-item">
                        <a href="#personal-info" class="profile-menu-link active">
                            <i class="fas fa-user"></i>
                            <span>Informations personnelles</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="profile-content">
                <div class="profile-header">
                    <div>
                        <h2 class="profile-header-title">Informations personnelles</h2>
                        <p class="profile-header-subtitle">Gérez vos informations personnelles et vos coordonnées</p>
                    </div>
                </div>
                <form action="{{ route('client.updateProfile') }}" method="POST" class="profile-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group-header">
                        <h3 class="form-group-title">Informations de base</h3>
                        <p class="form-group-subtitle">Ces informations seront utilisées pour vos réservations</p>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">Prénom</label>
                            <div class="input-with-icon">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ auth()->user()->client->first_name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Nom</label>
                            <div class="input-with-icon">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ auth()->user()->client->last_name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
%EC                <div class="input-with-icon">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <div class="input-with-icon">
                            <i class="fas fa-phone input-icon"></i>
                            <input type="tel" id="phone" name="phone" class="form-control" value="{{ auth()->user()->client->phone ?? '' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="birth_date">Date de naissance</label>
                            <div class="input-with-icon">
                                <i class="fas fa-calendar-alt input-icon"></i>
                                <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ auth()->user()->client->birth_date ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Genre</label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="">Sélectionner</option>
                                <option value="male" {{ auth()->user()->client->gender == 'male' ? 'selected' : '' }}>Masculin</option>
                                <option value="female" {{ auth()->user()->client->gender == 'female' ? 'selected' : '' }}>Féminin</option>
                                <option value="other" {{ auth()->user()->client->gender == 'other' ? 'selected' : '' }}>Autre</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group-header">
                        <h3 class="form-group-title">Adresse</h3>
                        <p class="form-group-subtitle">Votre adresse de facturation et de livraison</p>
                    </div>
                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <div class="input-with-icon">
                            <i class="fas fa-home input-icon"></i>
                            <input type="text" id="address" name="address" class="form-control" value="{{ auth()->user()->client->address ?? '' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="city">Ville</label>
                            <div class="input-with-icon">
                                <i class="fas fa-city input-icon"></i>
                                <input type="text" id="city" name="city" class="form-control" value="{{ auth()->user()->client->city ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zip_code">Code postal</label>
                            <div class="input-with-icon">
                                <i class="fas fa-map-marker-alt input-icon"></i>
                                <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ auth()->user()->client->zip_code ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country">Pays</label>
                            <div class="input-with-icon">
                                <i class="fas fa-globe input-icon"></i>
                                <input type="text" id="country" name="country" class="form-control" value="{{ auth()->user()->client->country ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-outline">Annuler</button>
                        <button type="submit" class="btn">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>