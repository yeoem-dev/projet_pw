<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un licencié</title>
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
            <h1>Supprimer un licencié</h1>
            <a href="HomeLicencieController.php">Retour à la liste des licencies</a>
            <?php if ($licencie): ?>
                <p>Voulez-vous vraiment supprimer le licencie "<?php echo $licencie->getNomLicencie() . $licencie->getPrenomLicencie(); ?>" ?</p>
                <form action="DeleteLicencieController.php?id=<?php echo $licencie->getIdLicencie(); ?>" method="post">
                    <input type="submit" value="Oui, Supprimer">
                </form>
            <?php else: ?>
                <p class="notification">La licencié n'a pas été trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php include_once("../../footer.php"); ?>
</body>
</html>

</body>
</html>