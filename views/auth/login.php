<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
</head>
<body>
    <div class="form-container">
        <h1>Connexion</h1>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<p class='error-message'>" . $_SESSION['error'] ."</p>";
            unset($_SESSION['error']);
        }
        ?>
        <form action="../../controllers/auth/LoginController.php" method="post">
            Email: <input type="email" name="email" required>
            Mot de passe: <input type="password" name="mdp" required>
            <input type="submit" value="Connexion">
        </form>
        
    </div>
</body>
</html>
