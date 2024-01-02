<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des licenciés</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>


<h1>Liste des contacts</h1>
<a href="../../controllers/contact/AddContactController.php">Ajouter un contact</a>

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
</body>
</html>
