<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Modifier un contact</h1>
    <a href="HomeContactController.php">Retour à la liste des contacts</a>

    <?php if ($contact): ?>
        <form action="EditContactController.php?id=<?php echo $contact->getIdContact(); ?>" method="post">
            <label for="nomContact">Nom :</label>
            <input type="text" id="nomContact" name="nomContact" value="<?php echo $contact->getNomContact(); ?>" required><br>

            <label for="prenomContact">Prenom :</label>
            <input type="text" id="prenomContact" name="prenomContact" value="<?php echo $contact->getPrenomContact(); ?>" required><br>

            <label for="emailContact">Email :</label>
            <input type="text" id="emailContact" name="emailContact" value="<?php echo $contact->getEmailContact(); ?>" required><br>

            <label for="numTelContact">Numéro de telephone :</label>
            <input type="text" id="numTelContact" name="numTelContact" value="<?php echo $contact->getNumTelContact(); ?>" required><br>

            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>

