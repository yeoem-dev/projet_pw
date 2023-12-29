<?php
class ContactDAO{
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode pour insérer un nouveau contact dans la base de données
    public function create(ContactModel $contact) {
        //On importe notre variable global de connexion.


        global $pdo;
        $sql = "INSERT INTO contacts (nom, prenom, email, telephone) VALUES (:nom, :prenom, :email, :telephone)"; //On enregistre dans une variable notre requête SQL

        $nom = $contact->getNom();
        $prenom = $contact->getPrenom();
        $email= $contact->getEmail();
        $telephone = $contact->getTelephone();

        $stmt = $pdo->prepare($sql); // On prépare notre requête.

        // On remplace mes VALUES par nos paramètres.
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);

        $stmt->execute(); //On execute notre requête
    }

    // Méthode pour recuperer un contact par son ID
    public function getById($id) {
        //On importe notre variable global de connexion.
        global $pdo;

        $sql = "SELECT * FROM contacts WHERE id = :id"; //On enregistre dans une variable notre requête SQL

        $stmt = $pdo->prepare($sql); //On prépare notre requête.

        //On remplace mes VALUES par nos paramètres.
        $stmt->bindParam(':id', $id);

        $stmt->execute(); //On execute notre requête

        $result = $stmt->fetch(PDO::FETCH_ASSOC); //Le rend dans une ligne

        return $result ? $result : false; //Si vide, on rend faux

    }

    // Méthode pour récupérer la liste de tous les contacts
    public function getAll() {
        //On importe notre variable global de connexion.
        global $pdo;

        $sql = "SELECT * FROM contacts"; //On enregistre dans une variable notre requête SQL

        $stmt = $pdo->prepare($sql); //On prépare notre requête.

        $stmt->execute(); //On execute notre requête

        return $stmt->fetchAll(PDO::FETCH_ASSOC); //Le rend dans un tableau
    }

    // Méthode pour mettre à jour un contact
    public function update(ContactModel $contact) {
        //On importe notre variable global de connexion.
        global $pdo;

        $sql = "UPDATE contacts SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone WHERE id = :id"; //On enregistre dans une variable notre requête SQL

        $id = $contact->getId();
        $nom = $contact->getNom();
        $prenom = $contact->getPrenom();
        $email= $contact->getEmail();
        $telephone = $contact->getTelephone();

        $stmt = $pdo->prepare($sql); //On prépare notre requête.

        //On remplace mes VALUES par nos paramètres.
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);

        $stmt->execute(); //On execute notre requête
    }

    // Méthode pour supprimer un contact par son ID
    public function deleteById($id) {
        //On importe notre variable global de connexion.
        global $pdo;

        $sql = "DELETE FROM contacts WHERE id = :id"; //On enregistre dans une variable notre requête SQL

        $stmt = $pdo->prepare($sql); //On prépare notre requête.

        //On remplace mes VALUES par nos paramètres.

        $stmt->bindParam(':id', $id);

        $stmt->execute(); //On execute notre requête
    }
}
