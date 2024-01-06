<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #f2f2f2;
            text-align: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        a {
            color: #457b9d;
            text-decoration: none;
            margin-bottom: 20px;
            font-size: 18px;
        }

        a:hover {
            color: #e63946;
        }

        .error-container {
            background-color: #1a1a1a;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .error-container p {
            font-size: 20px;
            margin: 0;
        }
    </style>
</head>
<body>
    <?php
    require_once 'utils/SessionUtil.php'; 
    checkUserSession();
    ?>
    <a href="index.php">Accueil</a>
    <div class="error-container">
        <p>Impossible, le numéro de licence est erroné.</p>
    </div>
</body>
</html>
