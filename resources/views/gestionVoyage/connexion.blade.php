<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page avec Arrière-Plan Flou</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('admin.jpeg'); /* Remplacez par le chemin de votre image */
            background-size: cover;
            background-position: center;
            filter: blur(3px); /* Effet flou sur l'image */
            z-index: -1; /* Positionne l'image derrière le contenu */
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Fond semi-transparent pour le contraste */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .container h1 {
            margin-bottom: 20px;
        }

        .container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .container button {
            padding: 10px 20px;
            border: none;
            background-color: #53b810;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .container button:hover {
            background-color: #9ce880;
        }
        h1{
            color: #53b810;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <!-- Arrière-plan flouté -->
    <div class="background"></div>

    <!-- Contenu principal -->
    <div class="container">
        <h1>VoyageFM</h1>
        <h3>Connexion</h3>
        <form id="loginForm">
            <input type="text" id="username" placeholder="Nom d'utilisateur" required>
            <input type="password" id="password" placeholder="Mot de passe" required>
            <a href="index.html">
                <button type="button">Se connecter</button>
            </a>
        </form>
    </div>
<script>
    function validateLogin(event) {
    // Empêcher l'envoi du formulaire
    event.preventDefault();

    // Récupérer les valeurs du formulaire
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('errorMessage');

    // Vérification des identifiants
    if (username === 'admin' && password === '1234') {
        // Rediriger vers index.html si les identifiants sont corrects
        window.location.href = 'index.html';
    } else {
        // Afficher un message d'erreur si les identifiants sont incorrects
        errorMessage.textContent = 'Nom d\'utilisateur ou mot de passe incorrect.';
    }
}

</script>
    
</body>
</html>
