<?php
class LicencieDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(LicencieModel $licencie) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("INSERT INTO licencie (num_licence, nom_licencie, prenom_licencie, categorie_id) VALUES (?,?,?,?)");
            $stmt->execute([$licencie->getNumLicence(), $licencie->getNomLicencie(), $licencie->getPrenomLicencie(), $licencie->getCategorieId()]);
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false;
        }
    }

    // Méthode pour récupérer un licencie par son ID
    public function getById($id) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("SELECT l.*, code_categorie FROM licencie l JOIN categorie c ON l.categorie_id = c.id  WHERE l.id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $categorieDAO = new CategorieDAO($pdo);
                $categorie = $categorieDAO->getById($row['categorie_id']);
                return new LicencieModel($row['id'], $row['num_licence'], $row['nom_licencie'], $row['prenom_licencie'], $categorie);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    // Méthode pour retrouver un licencié par son numéro de licence
    public function getByNumLicence($LicenseId) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("SELECT * FROM licencie WHERE Num_licence = ?");
            $stmt->execute([$LicenseId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['id'], $row['num_licence'], $row['nom_licencie'], $row['prenom_licencie'], $row['categorie_id']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getContactById($id) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("SELECT nom_contact, prenom_contact FROM licencie l JOIN contact c WHERE l.id = c.licencie_id AND l.id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['id'], $row['num_licence'], $row['nom_licencie'], $row['prenom_licencie'], $row['categorie_id']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    // Méthode pour récupérer la liste de tous les licenciés
    public function getAll() {
        global $pdo;
        try {
            $stmt = $pdo->query("SELECT * FROM licencie");

            $licencies = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorieDAO = new CategorieDAO($pdo);
                $categorie = $categorieDAO->getById($row['categorie_id']);
                $licencies[] = new LicencieModel(
                    $row['id'], 
                    $row['num_licence'], 
                    $row['nom_licencie'], 
                    $row['prenom_licencie'], 
                    $categorie
                );
            }
            
            return $licencies;
        } catch (PDOException $e) {
            return [];
        }
    }

    // Méthode pour mettre à jour un contact
    public function update(LicencieModel $licencie) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("UPDATE licencie SET nom_licencie = ?, prenom_licencie = ?, categorie_id = ? WHERE id = ?");
            $stmt->execute([$licencie->getNomLicencie(), $licencie->getPrenomLicencie(), $licencie->getCategorieId(), $licencie->getIdLicencie()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Méthode pour supprimer un licencié
    public function deleteById($id) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("DELETE FROM licencie WHERE id = ?");
            $stmt->execute([$id]);
            // Assurer la suppression en cascade
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

require_once("CategorieDAO.php");
require_once('../../classes/models/CategorieModel.php');
require_once('../../classes/models/LicencieModel.php');