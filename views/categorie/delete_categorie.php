<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Supprimer une categorie</title>
        <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
            <link rel="stylesheet" href="../../assets/css/style.css">
            <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
    </head>
    <body>
        <div class="main-content">
        <?php include_once("../../header.php"); ?>
            <div class="delete-container">
                <h1>Supprimer une categorie</h1>
                <a href="HomeCategorieController.php">Retour à la liste des catégories</a>
                <?php if ($categorie): ?>
                    <p>Voulez-vous vraiment supprimer la categorie "<?php echo $categorie->getNomCategorie(); ?> <?php echo $categorie->getCodeCategorie(); ?>" ?</p>
                    <form action="DeleteCategorieController.php?id=<?php echo $categorie->getIdCategorie(); ?>" method="post">
                        <input type="submit" value="Oui, Supprimer">
                    </form>
                <?php else: ?>
                    <p class="notification">La categorie n'a pas été trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php include_once("../../footer.php"); ?>
    </body>
</html>