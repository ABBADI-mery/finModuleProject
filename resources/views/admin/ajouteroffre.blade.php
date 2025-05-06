<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($offre) ? 'Modifier une offre' : 'Ajouter une offre' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 600px;
            background: white;
            margin: 50px auto;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #1e88e5;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 12px 0 6px;
            color: #333;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .btn {
            display: inline-block;
            background: #1e88e5;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            margin-top: 20px;
            cursor: pointer;
        }
        .btn:hover {
            background: #1565c0;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #555;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .image-preview {
            margin-top: 10px;
        }
        .image-preview img {
            max-width: 150px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>{{ isset($offre) ? 'Modifier l\'offre' : 'Ajouter une nouvelle offre' }}</h2>

    <form action="{{ isset($offre) ? route('admin.offres.update', $offre->id) : route('admin.offres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($offre))
            @method('PUT')
        @endif

        <label for="title">Nom de l'offre</label>
        <input type="text" name="title" id="title" value="{{ old('title', $offre->title ?? '') }}" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" required>{{ old('description', $offre->description ?? '') }}</textarea>

        <label for="price">Prix (en DH)</label>
        <input type="number" name="price" id="price" value="{{ old('price', $offre->price ?? '') }}" required>

        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        @if(isset($offre) && $offre->image_path)
            <div class="image-preview">
                <strong>Image actuelle :</strong><br>
                <img src="{{ asset('storage/' . $offre->image_path) }}" alt="Image offre">
            </div>
        @endif

        <label for="location">Destination</label>
        <input type="text" name="location" id="location" value="{{ old('location', $offre->location ?? '') }}" required>

        <label for="duration">Durée (jours)</label>
        <input type="number" name="duration" id="duration" value="{{ old('duration', $offre->duration ?? '') }}" required>

        <label for="people">Nombre de personnes</label>
        <input type="number" name="people" id="people" value="{{ old('people', $offre->people ?? '') }}" required>

        <label for="hotel_name">Nom de l'hôtel</label>
        <input type="text" name="hotel_name" id="hotel_name" value="{{ old('hotel_name', $offre->hotel_name ?? '') }}" required>

        <button type="submit" class="btn">{{ isset($offre) ? 'Mettre à jour' : 'Ajouter' }}</button>
    </form>

    <a href="{{ route('admin.offres.index') }}" class="back-link">← Retour au tableau de bord</a>
</div>

</body>
</html>