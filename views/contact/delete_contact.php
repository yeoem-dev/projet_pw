<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Supprimer un contact</title>
        <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
            <link rel="stylesheet" href="../../assets/css/style.css">
            <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
    </head>
    <body>
    <div class="main-content">
        <?php include_once("../../header.php"); ?>
            <div class="delete-container">
                <h1>Supprimer un contact</h1>
                <a href="HomeContactController.php">Retour à la liste des contacts</a>
                <?php if ($contact): ?>
                    <p>Voulez-vous vraiment supprimer la contact "<?php echo $contact->getNomContact(); ?> <?php echo $contact->getPrenomContact(); ?>" ?</p>
                    <form action="DeleteContactController.php?id=<?php echo $contact->getIdContact(); ?>" method="post">
                        <input type="submit" value="Oui, Supprimer">
                    </form>
                <?php else: ?>
                    <p class="notification">Le contact n'a pas été trouvé.</p>
                <?php endif; ?>
            </div>
    </div>
    <?php include_once("../../footer.php"); ?>
    </body>
</html>