<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détails de la categorie</title>
        <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
            <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Détails de la categorie</h1>
        <a href="HomeCategorieController.php">Retour à la liste des contacts</a>

        <?php if ($categorie): ?>
            <p><strong>Nom de la categorie</strong> <?php echo $categorie->getNomCategorie(); ?></p>
            <p><strong>Code de la categorie :</strong> <?php echo $categorie->getCodeCategorie(); ?></p>
        <?php else: ?>
            <p>La categorie n'a pas été trouvé.</p>
        <?php endif; ?>
    </body>
</html>

