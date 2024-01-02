<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une nouvelle categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
</head>
<body>
    <h1>Ajouter une categorie </h1>
    <a href="HomeCategorieController.php">Retour à la liste des catégories</a>

    <form action="../../controllers/categorie/AddCategorieController.php" method="post">
        <label for="nomCategorie">Nom de la categorie:</label>
        <input type="text" id="nomCategorie" name="nomCategorie" required><br>

        <label for="codeCategorie">Code catégorie :</label>
        <input type="text" id="codeCategorie" name="codeCategorie" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

</body>
</html>

