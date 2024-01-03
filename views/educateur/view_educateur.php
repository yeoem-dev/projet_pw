<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détails de l'educateur</title>
        <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
            <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Détails de l'educateur</h1>
        <a href="HomeEducateurController.php">Retour à la liste des educateurs</a>

        <?php if ($educateur): ?>
            <!-- <p><strong>Nom du educateur</strong> </p>
            <p><strong>Prenom du educateur :</strong> </p> -->
            <p><strong>Email du educateur :</strong> <?php echo $educateur->getEmailEducateur(); ?></p>
         <!--    <p><strong>Numéro Telephone du educateur :</strong> <?php echo $educateur->getNumTelEducateur(); ?></p> -->
        <?php else: ?>
            <p>Le educateur n'a pas été trouvé.</p>
        <?php endif; ?>
    </body>
</html>

