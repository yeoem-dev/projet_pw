<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une nouvelle categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/favicon.ico"/>
</head>
<body>
    <?php
    require_once '../../utils/SessionUtil.php'; 
    checkUserSession();
    ?>
    <div class="main-container">
        <?php include_once("../../header.php"); ?>
        <div class="add-form-container">
            <h1>Ajouter une categorie </h1>
            <a href="HomeCategorieController.php">Retour à la liste des catégories</a>
            <form action="../../controllers/categorie/AddCategorieController.php" method="post">
                <label for="nomCategorie">Nom de la categorie:</label>
                <input type="text" id="nomCategorie" name="nomCategorie" required><br>
                <label for="codeCategorie">Code catégorie :</label>
                <input type="text" id="codeCategorie" name="codeCategorie" required><br>
                <input type="submit" name="action" value="Ajouter">
            </form>
        </div>
    </div>
    <?php include_once("../../footer.php"); ?>

</body>
</html>

