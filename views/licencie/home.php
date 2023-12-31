<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des licencie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>Liste des licencies</h1>
<a href="../../controllers/licencie/AddLicencieController.php">Ajouter un licencié</a>

<?php if (count($licencies) > 0): ?>
    <table>
        <thead>
        <tr>
            <th>Numéro de Licence</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Categorie</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($licencies as $licencie): ?>
            <tr>
                <td><?php echo $licencie->getNumLicence(); ?></td>
                <td><?php echo $licencie->getNomLicencie(); ?></td>
                <td><?php echo $licencie->getPrenomLicencie(); ?></td>
                <td><?php echo $licencie->getCategorieId()->getCodeCategorie(); ?></td>
                
                <td>
                    <a href="ViewLicencieController.php?id=<?php echo $licencie->getIdLicencie(); ?>">Voir</a>
                    <a href="EditLicencieController.php?id=<?php echo $licencie->getIdLicencie(); ?>">Modifier</a>
                    <a href="DeleteLicencieController.php?id=<?php echo $licencie->getIdLicencie(); ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Aucun licencié trouvé.</p>
    <?php endif; ?>
</body>
</html>


