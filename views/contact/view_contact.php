<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détails du contact</title>
        <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
            <link rel="stylesheet" href="../../assets/css/style.css">
            <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
    </head>
    <body>
        <div class="main-content">
        <?php include_once("../../header.php"); ?>
            <div class="details-container">
                <h1>Détails du contact</h1>
                <a href="HomeContactController.php">Retour à la liste des contacts</a>
                <?php if ($contact): ?>
                    <p><span class="strong">Nom du contact</span> <?php echo $contact->getNomContact(); ?></p>
                    <p><span class="strong">Prenom du contact :</span> <?php echo $contact->getPrenomContact(); ?></p>
                    <p><span class="strong">Email du contact :</span> <?php echo $contact->getEmailContact(); ?></p>
                    <p><span class="strong">Numéro Telephone du contact :</span> <?php echo $contact->getNumTelContact(); ?></p>
                <?php else: ?>
                    <p class="notification">Le contact n'a pas été trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php include_once("../../footer.php"); ?>
    </body>
</html>

