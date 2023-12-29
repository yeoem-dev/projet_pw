<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Supprimer une categorie</h1>
    <a href="HomeController.php">Retour à la liste des contacts</a>

    <?php if ($categorie): ?>
        <p>Voulez-vous vraiment supprimer la categorie "<?php echo $categorie->getNomCategorie(); ?> <?php echo $categorie->getCodeCategorie(); ?>" ?</p>
        <form action="DeleteCategorieController.php?id=<?php echo $categorie->getIdCategorie(); ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>
    <?php else: ?>
        <p>La categorie n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>