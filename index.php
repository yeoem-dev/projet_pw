<?php
require_once 'utils/SessionUtil.php'; 
checkUserSession();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Club de sport</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
</head>
<body>
    <div class="main-content">
        <?php include_once("header.php"); ?>
        <div class="hero-section">
            <div class="content">
                <h1>Clubsport Automobile</h1>
                <p>Soyez le prochain licencié.</p>
                <!-- Vous pouvez ajouter plus de contenu ici selon vos besoins -->
            </div>
        </div>
    </div>
    <?php include_once("footer.php"); ?>
</body>
</html>