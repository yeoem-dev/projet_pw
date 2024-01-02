<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Supprimer un licencié</h1>
    <a href="HomeLicencieController.php">Retour à la liste des licencies</a>

    <?php if ($licencie): ?>
        <p>Voulez-vous vraiment supprimer le licencie "<?php echo $licencie->getNomLicencie() . $licencie->getPrenomLicencie(); ?>" ?</p>
        <form action="DeleteLicencieController.php?id=<?php echo $licencie->getIdLicencie(); ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>
    <?php else: ?>
        <p>La licencié n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>