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
    <?php
    require_once '../../utils/SessionUtil.php'; 
    checkUserSession();
    ?>
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

                    <div class="radio-group">
                        <h2>Est-il administrateur ?</h2>
                        <input type="radio" id="option1" name="choix" value="1">
                        <label for="option1">Oui</label><br>

                        <input type="radio" id="option2" name="choix" value="0" checked>
                        <label for="option2">Non</label><br>
                    </div>
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

