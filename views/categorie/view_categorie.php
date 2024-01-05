<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détails de la categorie</title>
        <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
            <link rel="stylesheet" href="../../assets/css/style.css">
            <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
    </head>
    <body>
    <div class="main-content">
        <?php include_once("../../header.php"); ?>
            <div class="details-container">
                <h1>Détails de la categorie</h1>
                <a href="HomeCategorieController.php">Retour à la liste des catégories</a>
                <?php if ($categorie): ?>
                    <p><span class="strong">Nom de la categorie</span> <?php echo $categorie->getNomCategorie(); ?></p>
                    <p><span class="strong">Code de la categorie :</span> <?php echo $categorie->getCodeCategorie(); ?></p>
                <?php else: ?>
                    <p class="notification">La categorie n'a pas été trouvé.</p>
                <?php endif; ?>
            </div>
    </div>
    <?php include_once("../../footer.php"); ?>
    </body>
</html>

