<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des categories</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>Liste des catégories</h1>
<a href="AddCategorieController.php">Ajouter une catégorie</a>

<?php if (count($categories) > 0): ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>code catégorie</th>
            <th>nom catégorie</th>
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
        <p>Aucun contact trouvé.</p>
    <?php endif; ?>
</body>
</html>


