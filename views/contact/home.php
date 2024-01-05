<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des contacts</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
</head>
<body>
<div class="main-content">
    <?php include_once("../../header.php"); ?>
    <h1>Liste des contacts</h1>
    <a href="../../controllers/contact/AddContactController.php" class="add-link">Ajouter un contact</a>
    
    <?php if (count($contacts) > 0): ?>
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Numéro telephone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?php echo $contact->getNomContact(); ?></td>
                    <td><?php echo $contact->getPrenomContact(); ?></td>
                    <td><?php echo $contact->getEmailContact(); ?></td>
                    <td><?php echo $contact->getNumTelContact(); ?></td>
    
                    <td>
                        <a href="ViewContactController.php?id=<?php echo $contact->getIdContact(); ?>">Voir</a>
                        <a href="EditContactController.php?id=<?php echo $contact->getIdContact(); ?>">Modifier</a>
                        <a href="DeleteContactController.php?id=<?php echo $contact->getIdContact(); ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>Aucun contact trouvé.</p>
        <?php endif; ?>
</div>
<?php include_once("../../footer.php"); ?>
</body>
</html>
