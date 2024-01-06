<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des categories</title>
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
    <h1>Liste des catégories</h1>
    <a href="AddCategorieController.php" class="add-link">Ajouter une catégorie</a>
    
    <?php if (count($categories) > 0): ?>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom catégorie</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $categorie): ?>
                <tr>
                    <td><?php echo $categorie->getIdCategorie(); ?></td>
                    <td><?php echo $categorie->getNomCategorie(); ?></td>
                    <td><?php echo $categorie->getCodeCategorie(); ?></td>
                    <td>
                        <a href="ViewCategorieController.php?id=<?php echo $categorie->getIdCategorie(); ?>">Voir</a>
                        <a href="EditCategorieController.php?id=<?php echo $categorie->getIdCategorie(); ?>">Modifier</a>
                        <a href="DeleteCategorieController.php?id=<?php echo $categorie->getIdCategorie(); ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p class="no-data">Aucun contact trouvé.</p>
        <?php endif; ?>
</div>
    <?php include_once("../../footer.php"); ?>
</body>
</html>


