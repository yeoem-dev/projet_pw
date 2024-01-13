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
            $stmt = $pdo->prepare("INSERT INTO categorie (nom_categorie, code_categorie) VALUES (?, ?)");
            $stmt->execute([$categorie->getNomCategorie(), $categorie->getCodeCategorie()]);
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion ici
            return false;
        }

    }

    // Méthode pour récupérer une catégorie par son ID
    public function getById($id) {
        global $pdo;
            try {
                $stmt = $pdo->prepare("SELECT * FROM categorie WHERE id = ?");
                $stmt->execute([$id]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($row) {
                    return new CategorieModel($row['id'], $row['nom_categorie'], $row['code_categorie']);
                } else {
                    return null; // Aucun contact trouvé avec cet ID
                }
            } catch (PDOException $e) {
                // Gérer les erreurs de récupération ici
                return null;
            
            }
    }

    // Méthode pour récupérer la liste de tous les categories
    public function getAll() {
        global $pdo;
        try {
            $stmt = $pdo->query("SELECT * FROM categorie");
            $categories = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categories[] = new CategorieModel($row['id'], $row['nom_categorie'], $row['code_categorie']);
            }

            return $categories;
        } catch (PDOException $e) {
            
            return [];
        }
    }  

    // Méthode pour mettre à jour une categorie
    public function update(CategorieModel $categorie) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("UPDATE categorie SET nom_categorie = ?, code_categorie = ? WHERE id = ?");
            $stmt->execute([$categorie->getNomCategorie(), $categorie->getCodeCategorie(), $categorie->getIdCategorie()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Méthode pour supprimer un categorie par son ID
    public function deleteById($id) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("DELETE FROM categorie WHERE id = ?");
            $stmt->execute([$id]);

            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression ici
            return false;
        }
    }
}