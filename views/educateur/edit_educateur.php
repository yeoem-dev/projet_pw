<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un educateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
</head>
<body>
    <div class="main-content">
    <?php include("../../header.php"); ?>
        <div class="edit-form-container">
            <h1>Modifier un educateur</h1>
            <a href="HomeEducateurController.php">Retour à la liste des educateurs</a>
            <?php if ($educateur): ?>
                <form action="EditEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>" method="post">
        
                    <label for="emailEducateur">Email :</label>
                    <input type="text" id="emailEducateur" name="emailEducateur" value="<?php echo $educateur->getEmailEducateur(); ?>" required><br>
                    <label for="mdpEducateur">Nouveau mot de passe :</label>
                    <input type="password" id="mdpEducateur" name="mdpEducateur" required><br>
                    <input type="submit" value="Modifier">
                </form>
            <?php else: ?>
                <p>Le educateur n'a pas été trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php include("../../footer.php"); ?>
</body>
</html>

