<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Offres | Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Liste des Offres Touristiques</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.offres.create') }}" class="btn btn-primary mb-3">Ajouter une Offre</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Destination</th>
                    <th>Durée</th>
                    <th>Personnes</th>
                    <th>Prix</th>
                    <th>Hôtel</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offres as $offre)
                    <tr>
                        <td>{{ $offre->title }}</td>
                        <td>{{ $offre->location }}</td>
                        <td>{{ $offre->duration }} jours</td>
                        <td>{{ $offre->people }}</td>
                        <td>{{ number_format($offre->price, 2) }} €</td>
                        <td>{{ $offre->hotel_name }}</td>
                        <td>
                            <a href="{{ route('admin.offres.edit', $offre->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('admin.offres.destroy', $offre->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>