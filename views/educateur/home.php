<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des educateurs</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
</head>
<body>

<div class="main-content">
    <?php include_once("../../header.php"); ?>
    <h1>Liste des educateurs</h1>
    <a href="../../controllers/educateur/AddEducateurController.php" class="add-link">Ajouter un educateur</a>
    
    <?php if (count($educateurs) > 0): ?>
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($educateurs as $educateur): ?>
                <tr>
                    <td><?php echo $educateur->getLicencieId()->getNomLicencie(); ?></td>
                    <td><?php echo $educateur->getLicencieId()->getPrenomLicencie(); ?></td>
                    <td><?php echo $educateur->getEmailEducateur(); ?></td>
    
                    <td>
                        <a href="ViewEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>">Voir</a>
                        <a href="EditEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>">Modifier</a>
                        <a href="DeleteEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p class="no-data">Aucun educateur trouvé.</p>
        <?php endif; ?>
</div>
<?php include_once("../../footer.php"); ?>
</body>
</html>
