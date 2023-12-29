<?php

class CategorieDAO {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode pour créer une nouvelle catégorie
    public function create(CategorieModel $categorie) {
        global $pdo;
        try {
            $sql = "INSERT INTO categorie (nomCategorie, codeCategorie) VALUES (:nomCategorie, :codeCategorie)";
            $nomCategorie = $categorie->getNomCategorie();
            $codeCategorie = $categorie->getCodeCategorie();

            // Requête préparée
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nomCategorie', $nomCategorie);
            $stmt->bindParam(':codeCategorie', $codeCategorie);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }

    }

    // Méthode pour récupérer une catégorie par son ID
    public function getById($id) {
        global $pdo;
        $sql = "SELECT * FROM categorie WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute(); //On execute notre requête
        $result = $stmt->fetch(PDO::FETCH_ASSOC); //Le rend dans une ligne
        return $result ? $result : false; //Si vide, on rend faux
    }

    // Méthode pour récupérer la liste de tous les contacts
    public static function getAll() {
        global $pdo;
        $sql = "SELECT * FROM categorie";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //Le rend dans un tableau
    }

    // Méthode pour mettre à jour une categorie
    public function update(CategorieModel $categorie) {
        //On importe notre variable global de connexion.

        global $pdo;
        $sql = "UPDATE categorie SET nomCategorie = :nomCategorie, codeCategorie = :codeCategorie WHERE id = :id";

        $nomCategorie= $categorie->getNomCategorie();
        $codeCategorie = $categorie->getCodeCategorie();

        $stmt = $pdo->prepare($sql); //On prépare notre requête.

        //On remplace mes VALUES par nos paramètres.

        $stmt->bindParam(':nomCategorie', $nomCategorie);
        $stmt->bindParam(':codeCategorie', $codeCategorie);

        $stmt->execute(); //On execute notre requête
    }

    // Méthode pour supprimer une categorie par son ID
    public function deleteById($id) {
        //On importe notre variable global de connexion.
        global $pdo;
        $sql = "DELETE FROM categorie WHERE id = :id"; //On enregistre dans une variable notre requête SQL

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
}
