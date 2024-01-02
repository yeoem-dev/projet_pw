<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un contact </title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
</head>
<body>
    <h1>Ajouter un contact </h1>
    <!-- <a href="../../views/licencie/home.php">Retour à la liste des contacts</a> -->
    
    <form action="../../controllers/contact/AddContactController.php" method="post">
        
    
        <input type="hidden" id="licencieId" name="licencieId" value="<?= $_GET['id'] ?>"><br>


        <label for="nomContact">Nom:</label>
        <input type="text" id="nomContact" name="nomContact" required><br>

        <label for="prenomContact">Prénom :</label>
        <input type="text" id="prenomContact" name="prenomContact" required><br>

        

        <label for="emailContact">Email :</label>
        <input type="email" id="emailContact" name="emailContact" required><br>

        
        <label for="numTelContact">Téléphone :</label>
        <input type="tel" id="numTelContact" name="numTelContact" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

</body>
</html>