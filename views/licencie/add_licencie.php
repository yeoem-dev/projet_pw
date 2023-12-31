<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
</head>
<body>
    <h1>Ajouter un licencié </h1>
    <a href="../../views/licencie/home.php">Retour à la liste des licenciés</a>

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

        <label for="numLicence">Numéro de licence :</label>
        <input type="text" id="numLicence" name="numLicence" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

</body>
</html>