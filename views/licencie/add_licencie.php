<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un licencie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
</head>
<body>
    <h1>Ajouter une licencie </h1>
    <a href="../../views/licencie/home.php">Retour a la liste des licenciés</a>

    <form action="../../controllers/licencie/AddLicencieController.php" method="post">
        <label for="nomLicencie">Nom:</label>
        <input type="text" id="nomLicencie" name="nomLicencie" required><br>

        <label for="prenomLicencie">Prénom :</label>
        <input type="text" id="prenomLicencie" name="prenomLicencie" required><br>

        <!--Categorie-->


        <input type="submit" name="action" value="Ajouter">
    </form>

</body>
</html>