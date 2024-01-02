<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Supprimer un contact</title>
        <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
            <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Supprimer un contact</h1>
        <a href="HomeContactController.php">Retour à la liste des contacts</a>

        <?php if ($contact): ?>
            <p>Voulez-vous vraiment supprimer la contact "<?php echo $contact->getNomContact(); ?> <?php echo $contact->getPrenomContact(); ?>" ?</p>
            <form action="DeleteContactController.php?id=<?php echo $contact->getIdContact(); ?>" method="post">
                <input type="submit" value="Oui, Supprimer">
            </form>
        <?php else: ?>
            <p>Le contact n'a pas été trouvé.</p>
        <?php endif; ?>

    </body>
</html>