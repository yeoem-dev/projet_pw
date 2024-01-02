<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Modifier un licencié</h1>
    <a href="HomeLicencieController.php">Retour à la liste des licenciés</a>

    <?php if ($licencie): ?>
        <form action="EditLicencieController.php?id=<?php echo $licencie->getIdLicencie(); ?>" method="post">
            <label for="nomLicencie">Nom:</label>
            <input type="text" id="nomLicencie" name="nomLicencie" value="<?php echo $licencie->getNomLicencie(); ?>" required><br>

            <label for="prenomLicencie">Prenom :</label>
            <input type="text" id="prenomLicencie" name="prenomLicencie" value="<?php echo $licencie->getPrenomLicencie(); ?>" required><br>

            <label for="categorieId">Catégorie</label>
            <select name="categorieId" id="categorieId">
                <?php foreach ($categories as $categorie): ?>
                    <option value="<?= $categorie->getIdCategorie(); ?>">
                        <?= $categorie->getNomCategorie(); ?>
                    </option>
                <?php endforeach; ?>     
            </select><br>
            

            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>Le licencié n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>

