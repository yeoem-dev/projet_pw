<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détails du licencie</title>
        <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
            <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Détails du licencie</h1>
        <a href="HomeLicencieController.php">Retour à la liste des licenciés</a>

        <?php if ($licencie): ?>
            <p><strong>Nom:</strong> <?php echo $licencie->getNomLicencie(); ?></p>
            <p><strong>Prénom :</strong> <?php echo $licencie->getPrenomLicencie(); ?></p>
            <p><strong>Catégorie :</strong> <?php echo $licencie->getCategorieId()->getCodeCategorie(); ?></p>

            <!-- <h2>Contact</h2>
            <p><strong>Nom du contact :</strong> <?php echo $licencie->getPrenomLicencie(); ?></p>
            <p><strong>Prénom du contact :</strong> <?php echo $licencie->getPrenomLicencie(); ?></p> -->
        <?php else: ?>
            <p>La licencie n'a pas été trouvé.</p>
        <?php endif; ?>
    </body>
</html>

