<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Supprimer un educateur</title>
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
            <div class="delete-container">
                <h1>Supprimer un educateur</h1>
                <a href="HomeEducateurController.php">Retour à la liste des educateurs</a>
                <?php if ($educateur): ?>
                    <p>Voulez-vous vraiment supprimer cet educateur ?</p>
                    <form action="DeleteEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>" method="post">
                        <input type="submit" value="Oui, Supprimer">
                    </form>
                <?php else: ?>
                    <p>L'educateur n'a pas été trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php include_once("../../footer.php"); ?>
    </body>
</html>