<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un contact </title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
</head>
<body>
    <div class="main-content">
        <?php include_once("../../header.php"); ?>
        <div class="add-form-container">
            <h1>Ajouter un contact </h1>
            <a href="HomeContactController.php">Retour à la liste des contacts</a>
            <form action="../../controllers/contact/AddContactController.php" method="post">
        
                <?php if (isset($_GET['id'])): ?>
                    <input type="hidden" id="licencieId" name="licencieId" value="<?= $_GET['id'] ?>"><br>
                <?php endif; ?>
                <label for="nomContact">Nom:</label>
                <input type="text" id="nomContact" name="nomContact" required><br>
                <label for="prenomContact">Prénom :</label>
                <input type="text" id="prenomContact" name="prenomContact" required><br>
        
                <label for="emailContact">Email :</label>
                <input type="email" id="emailContact" name="emailContact" required><br>
        
                <label for="numTelContact">Téléphone :</label>
                <input type="tel" id="numTelContact" name="numTelContact" required><br>
                <?php if (!isset($_GET['id'])): ?>
                    <label for="numLicence">Numéro du licencié :</label>
                    <input type="text" id="numLicence" name="numLicence"><br>
                <?php endif; ?>
                <input type="submit" name="action" value="Ajouter">
            </form>
        </div>
    </div>
    <?php include_once("../../footer.php"); ?>

</body>
</html>