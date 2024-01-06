<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détails de l'educateur</title>
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
            <div class="details-container">
                <h1>Détails de l'educateur</h1>
                <a href="HomeEducateurController.php">Retour à la liste des educateurs</a>
                <?php if ($educateur): ?>
                    <!-- <p><strong>Nom du educateur</strong> </p>
                    <p><strong>Prenom du educateur :</strong> </p> -->
                    <p><span class="strong">Email du educateur :</span> <?php echo $educateur->getEmailEducateur(); ?></p>
          
                <?php else: ?>
                    <p class="notification">Le educateur n'a pas été trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php include_once("../../footer.php"); ?>
    </body>
</html>

