<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détails du licencie</title>
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
                <h1>Détails du licencie</h1>
                <a href="HomeLicencieController.php">Retour à la liste des licenciés</a>
                <?php if ($licencie): ?>
                    <p><span class="strong">Nom:</span> <?php echo $licencie->getNomLicencie(); ?></p>
                    <p><span class="strong">Prénom :</span> <?php echo $licencie->getPrenomLicencie(); ?></p>
                    <p><span class="strong">Catégorie :</span> <?php echo $licencie->getCategorieId()->getCodeCategorie(); ?></p>
                    <!-- <h2>Contact</h2>
                    <p><strong>Nom du contact :</strong> <?php echo $licencie->getPrenomLicencie(); ?></p>
                    <p><strong>Prénom du contact :</strong> <?php echo $licencie->getPrenomLicencie(); ?></p> -->
                <?php else: ?>
                    <p class="notification">La licencie n'a pas été trouvé.</p>
                <?php endif; ?>
                    </body>
            </div>
        </div>
        <?php include_once("../../footer.php"); ?>
</html>

