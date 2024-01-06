<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une catégorie</title>
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
        <div class="edit-form-container">
            <h1>Modifier une categorie</h1>
            <a href="HomeCategorieController.php">Retour à la liste des catégories</a>
            <?php if ($categorie): ?>
                <form action="EditCategorieController.php?id=<?php echo $categorie->getIdCategorie(); ?>" method="post">
                    <label for="nomCategorie">nom Categorie :</label>
                    <input type="text" id="nomCategorie" name="nomCategorie" value="<?php echo $categorie->getNomCategorie(); ?>" required><br>
                    <label for="codeCategorie">Code catégorie :</label>
                    <input type="text" id="codeCategorie" name="codeCategorie" value="<?php echo $categorie->getCodeCategorie(); ?>" required><br>
            
                    <input type="submit" value="Modifier">
                </form>
            <?php else: ?>
                <p class="notification">La catégorie n'a pas été trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
<?php include_once("../../footer.php"); ?>
</body>
</html>

