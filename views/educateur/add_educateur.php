<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un educateur </title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
</head>
<body>
    <div class="main-content">
        <?php include_once("../../header.php"); ?>
        <div class="add-form-container">
            <h1>Ajouter un educateur </h1>
            <a href="HomeEducateurController.php">Retour à la liste des educateurs</a>
            <form action="../../controllers/educateur/AddEducateurController.php" method="post">
        
                <label for="emailEducateur">Email :</label>
                <input type="email" id="emailEducateur" name="emailEducateur" required><br>
        
                <label for="mdpEducateur"> Mot de passe:</label>
                <input type="password" id="mdpEducateur" name="mdpEducateur" required><br>

                <label for="numLicence">Numéro du licencié :</label>
                <input type="text" id="numLicence" name="numLicence"><br>


                <div class="radio-group">
                    <h2>Est-il administrateur ?</h2>
                    <input type="radio" id="option1" name="choix" value="1">
                    <label for="option1">Oui</label><br>

                    <input type="radio" id="option2" name="choix" value="0" checked>
                    <label for="option2">Non</label><br>
                </div>

                <input type="submit" name="action" value="Ajouter">
            </form>
        </div>
        
    </div>
    <?php include_once("../../footer.php"); ?>

</body>
</html>