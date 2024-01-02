<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détails du contact</title>
        <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
            <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Détails du contact</h1>
        <a href="HomeContactController.php">Retour à la liste des contacts</a>

        <?php if ($contact): ?>
            <p><strong>Nom du contact</strong> <?php echo $contact->getNomContact(); ?></p>
            <p><strong>Prenom du contact :</strong> <?php echo $contact->getPrenomContact(); ?></p>
            <p><strong>Email du contact :</strong> <?php echo $contact->getEmailContact(); ?></p>
            <p><strong>Numéro Telephone du contact :</strong> <?php echo $contact->getNumTelContact(); ?></p>
        <?php else: ?>
            <p>Le contact n'a pas été trouvé.</p>
        <?php endif; ?>
    </body>
</html>

