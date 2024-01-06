<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des licenciés</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
</head>
<body>
    <?php
    require_once '../../utils/SessionUtil.php'; 
    checkUserSession();
    ?>
<div class="main-content">
    <?php include_once("../../header.php"); ?>
    <h1>Liste des licencies</h1>
    <a href="../../controllers/licencie/AddLicencieController.php" class="add-link">Ajouter un licencié</a>
    
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
        <p class="no-data">Aucun licencié trouvé.</p>
    <?php endif; ?>
</div>
<?php include_once("../../footer.php"); ?>
</body>
</html>


