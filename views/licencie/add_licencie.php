<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un licencié</title>
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
        <?php include_once("../../header.php"); ?>
        <div class="add-form-container">
            <h1>Ajouter un licencié </h1>
            <a href="HomeLicencieController.php">Retour à la liste des licenciés</a>
            <form action="../../controllers/licencie/AddLicencieController.php" method="post">
                <label for="nomLicencie">Nom:</label>
                <input type="text" id="nomLicencie" name="nomLicencie" required><br>
                <label for="prenomLicencie">Prénom :</label>
                <input type="text" id="prenomLicencie" name="prenomLicencie" required><br>
                <!--Categorie-->
                <label for="categorieId">Catégorie</label>
                <select name="categorieId" id="categorieId">
                    <?php foreach ($categories as $categorie): ?>
                        <option value="<?= $categorie->getIdCategorie(); ?>">
                            <?= $categorie->getNomCategorie(); ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
                <input type="hidden" id="numLicence" name="numLicence" required>
                <input type="submit" name="action" value="Ajouter">
            </form>
        </div>
    </div>
    <script src="../../assets/js/functions.js"></script>
    <?php include_once("../../footer.php"); ?>
</body>
</html>