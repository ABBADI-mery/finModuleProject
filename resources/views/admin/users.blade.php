<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Utilisateurs | Dashboard Admin</title>
    
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

        .users-container {
            background: var(--white);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
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

        .search-filter {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .search-filter input {
            padding: 0.5rem 1rem;
            border: 1px solid var(--cultured);
            border-radius: 8px;
            background: var(--white);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .search-filter input:focus {
            border-color: var(--deep-saffron);
            box-shadow: 0 0 0 3px rgba(137, 202, 6, 0.1);
            outline: none;
        }

        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
        }

        .table thead {
            background: linear-gradient(135deg, var(--deep-saffron), var(--dark-orange));
            color: var(--white);
        }

        .table th {
            padding: 1rem;
            font-weight: 600;
            text-align: left;
        }

        .table tbody tr {
            border-bottom: 1px solid var(--cultured);
            transition: background 0.2s ease;
        }

        .table tbody tr:hover {
            background: var(--cultured);
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
        }

        .action-btns {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 50px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .action-btn.edit {
            background: var(--deep-saffron);
            color: var(--black);
        }

        .action-btn.delete {
            background: #d00000;
            color: var(--white);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--spanish-gray);
        }

        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--deep-saffron);
        }

        .empty-state h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .total-badge {
            background: var(--deep-saffron);
            color: var(--black);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 1000;
            overflow-y: auto;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: var(--white);
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            margin: 1rem;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            background: var(--deep-saffron);
            color: var(--black);
            padding: 1rem 2rem;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h5 {
            margin: 0;
            font-size: 1.25rem;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--black);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
            position: relative;
        }

        .form-group label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--spanish-gray);
            margin-bottom: 0.25rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--cultured);
            border-radius: 8px;
            background: var(--white);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            font-size: 0.9rem;
        }

        .form-group input:focus {
            border-color: var(--deep-saffron);
            box-shadow: 0 0 0 3px rgba(137, 202, 6, 0.1);
            outline: none;
        }

        .modal-footer {
            padding: 1rem 2rem;
            border-top: 1px solid var(--cultured);
            text-align: right;
        }

        .modal-footer button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 8px;
            background: var(--deep-saffron);
            color: var(--black);
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .modal-footer button:hover {
            background: var(--dark-orange);
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

        .alert.error {
            background: rgba(208, 0, 0, 0.1);
            color: #d00000;
        }

        .alert button {
            background: none;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            color: inherit;
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

            .search-filter {
                flex-direction: column;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }

        @media (max-width: 576px) {
            .modal-content {
                margin: 0.5rem;
                max-width: 95%;
            }

            .modal-body {
                padding: 1rem;
            }

            .modal-header {
                padding: 0.75rem 1rem;
            }

            .modal-footer {
                padding: 0.75rem 1rem;
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
                    <li><a href="{{ route('admin.offres.index') }}"><i class="fas fa-plane"></i> Offres</a></li>
                    <li><a href="{{ route('assurances.index') }}"><i class="fas fa-shield-alt"></i> Assurances</a></li>
                    <li><a href="{{ route('contacts.index') }}"><i class="fas fa-address-book"></i> Contacts</a></li>
                    <li><a href="{{ route('users.index') }}" class="active"><i class="fas fa-users"></i> Utilisateurs</a></li>
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
            <div class="users-container">
                <h1 class="page-title">
                    <i class="fas fa-users"></i> Gestion des Utilisateurs
                </h1>

                <div id="alertContainer"></div>

                <div class="search-filter">
                    <input type="text" id="searchInput" placeholder="Rechercher par nom ou email...">
                </div>

                @if($clients->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-users-slash"></i>
                        <h3>Aucun utilisateur enregistré</h3>
                        <p>Les utilisateurs apparaîtront ici une fois inscrits.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table" id="usersTable">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-user me-1"></i> Prénom</th>
                                    <th><i class="fas fa-user me-1"></i> Nom</th>
                                    <th><i class="fas fa-phone me-1"></i> Téléphone</th>
                                    <th><i class="fas fa-envelope me-1"></i> Email</th>
                                    <th><i class="fas fa-ellipsis-v me-1"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr data-client='{{ json_encode([
                                    "id" => $client->id,
                                    "first_name" => $client->first_name,
                                    "last_name" => $client->last_name,
                                    "phone" => $client->phone,
                                    "email" => $client->user->email ?? "Non défini"
                                ]) }}'>
                                    <td>{{ $client->first_name }}</td>
                                    <td>{{ $client->last_name }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->user->email ?? 'Non défini' }}</td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="action-btn edit" onclick="openEditModal(this.closest('tr'))" title="Modifier l'utilisateur">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn delete" onclick="deleteClient({{ $client->id }})" title="Supprimer l'utilisateur">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
                        <span class="total-badge">
                            <i class="fas fa-database me-1"></i>
                            Total: {{ $clients->count() }} utilisateurs
                        </span>
                    </div>
                @endif

                <!-- Modal pour modifier l'utilisateur -->
                <div class="modal" id="editModal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Modifier un Utilisateur</h5>
                            <button class="modal-close" onclick="closeEditModal()">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm">
                                @csrf
                                <input type="hidden" name="id" id="editId">
                                <div class="form-group">
                                    <label for="editFirstName"><i class="fas fa-user"></i> Prénom</label>
                                    <input type="text" name="first_name" id="editFirstName" required>
                                    <div class="error-message" id="errorFirstName"></div>
                                </div>
                                <div class="form-group">
                                    <label for="editLastName"><i class="fas fa-user"></i> Nom</label>
                                    <input type="text" name="last_name" id="editLastName" required>
                                    <div class="error-message" id="errorLastName"></div>
                                </div>
                                <div class="form-group">
                                    <label for="editPhone"><i class="fas fa-phone"></i> Téléphone</label>
                                    <input type="text" name="phone" id="editPhone" required>
                                    <div class="error-message" id="errorPhone"></div>
                                </div>
                                <div class="form-group">
                                    <label for="editEmail"><i class="fas fa-envelope"></i> Email</label>
                                    <input type="email" name="email" id="editEmail" required>
                                    <div class="error-message" id="errorEmail"></div>
                                </div>
                                <div class="form-group">
                                    <label for="editPassword"><i class="fas fa-lock"></i> Nouveau mot de passe (facultatif)</label>
                                    <input type="password" name="password" id="editPassword">
                                    <div class="error-message" id="errorPassword"></div>
                                </div>
                                <div class="form-group">
                                    <label for="editPasswordConfirmation"><i class="fas fa-lock"></i> Confirmer le mot de passe</label>
                                    <input type="password" name="password_confirmation" id="editPasswordConfirmation">
                                    <div class="error-message" id="errorPasswordConfirmation"></div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button onclick="closeEditModal()">Annuler</button>
                            <button onclick="submitEditForm()">Mettre à jour</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Gestion du filtrage et de la recherche
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('#usersTable tbody tr');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            tableRows.forEach(row => {
                const firstName = row.cells[0].textContent.toLowerCase().trim();
                const lastName = row.cells[1].textContent.toLowerCase().trim();
                const email = row.cells[3].textContent.toLowerCase().trim();
                const matchesSearch = firstName.includes(searchTerm) || lastName.includes(searchTerm) || email.includes(searchTerm);
                row.style.display = matchesSearch ? '' : 'none';
            });

            const visibleRows = Array.from(tableRows).filter(row => row.style.display !== 'none').length;
            const totalBadge = document.querySelector('.total-badge');
            totalBadge.innerHTML = `<i class="fas fa-database me-1"></i> Total: ${visibleRows} utilisateurs`;
        }

        searchInput.addEventListener('input', filterTable);

        // Gestion de la modale d'édition
        function openEditModal(row) {
            const client = JSON.parse(row.dataset.client);
            document.getElementById('editId').value = client.id;
            document.getElementById('editFirstName').value = client.first_name;
            document.getElementById('editLastName').value = client.last_name;
            document.getElementById('editPhone').value = client.phone;
            document.getElementById('editEmail').value = client.email;
            document.getElementById('editPassword').value = '';
            document.getElementById('editPasswordConfirmation').value = '';

            // Réinitialiser les messages d'erreur
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

            document.getElementById('editModal').classList.add('show');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.remove('show');
        }

        // Soumission du formulaire via AJAX
        function submitEditForm() {
            const form = document.getElementById('editForm');
            const formData = new FormData(form);
            const id = document.getElementById('editId').value;

            fetch(`/users/${id}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => { throw data; });
                }
                return response.json();
            })
            .then(data => {
                showAlert('success', data.message);
                updateTableRow(id, formData);
                closeEditModal();
            })
            .catch(error => {
                console.error('Erreur :', error);
                if (error.errors) {
                    Object.keys(error.errors).forEach(key => {
                        const errorElement = document.getElementById(`error${key.charAt(0).toUpperCase() + key.slice(1)}`);
                        if (errorElement) {
                            errorElement.textContent = error.errors[key][0];
                        }
                    });
                } else {
                    showAlert('error', error.message || 'Une erreur est survenue lors de la mise à jour.');
                }
            });
        }

        // Mise à jour de la ligne du tableau
        function updateTableRow(id, formData) {
            const row = Array.from(tableRows).find(row => JSON.parse(row.dataset.client).id == id);
            if (row) {
                const client = {
                    id: id,
                    first_name: formData.get('first_name'),
                    last_name: formData.get('last_name'),
                    phone: formData.get('phone'),
                    email: formData.get('email'),
                };
                row.cells[0].textContent = client.first_name;
                row.cells[1].textContent = client.last_name;
                row.cells[2].textContent = client.phone;
                row.cells[3].textContent = client.email;
                row.dataset.client = JSON.stringify(client);
                filterTable();
            }
        }

        // Suppression d'un client via AJAX
        function deleteClient(id) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) return;

            fetch(`/users/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => { throw data; });
                }
                return response.json();
            })
            .then(data => {
                showAlert('success', data.message);
                const row = Array.from(tableRows).find(row => JSON.parse(row.dataset.client).id == id);
                if (row) row.remove();
                filterTable();
            })
            .catch(error => {
                console.error('Erreur :', error);
                showAlert('error', error.message || 'Une erreur est survenue lors de la suppression.');
            });
        }

        // Afficher les alertes
        function showAlert(type, message) {
            const alertContainer = document.getElementById('alertContainer');
            const alert = document.createElement('div');
            alert.className = `alert ${type}`;
            alert.innerHTML = `${message} <button onclick="this.parentElement.style.display='none'">×</button>`;
            alertContainer.appendChild(alert);
            setTimeout(() => alert.style.display = 'none', 5000);
        }

        // Fermer la modale en cliquant à l'extérieur
        window.addEventListener('click', (e) => {
            if (e.target === document.getElementById('editModal')) {
                closeEditModal();
            }
        });

        // Appeler filterTable au chargement
        filterTable();
    </script>
</body>
</html>
