<?php
class LicencieDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(LicencieModel $licencie) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("INSERT INTO licencie (numLicence, nomLicencie, prenomLicencie, categorieId) VALUES (?,?,?,?)");
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
            $stmt = $pdo->prepare("SELECT l.*, codeCategorie FROM licencie l JOIN categorie c ON l.categorieId = c.idCategorie  WHERE idLicencie = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $categorieDAO = new CategorieDAO($pdo);
                $categorie = $categorieDAO->getById($row['categorieId']);
                return new LicencieModel($row['idLicencie'], $row['numLicence'], $row['nomLicencie'], $row['prenomLicencie'], $categorie);
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
            $stmt = $pdo->prepare("SELECT * FROM licencie WHERE NumLicence = ?");
            $stmt->execute([$LicenseId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['idLicencie'], $row['numLicence'], $row['nomLicencie'], $row['prenomLicencie'], $row['categorieId']);
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
            $stmt = $pdo->prepare("SELECT nomContact, prenomContact FROM licencie l JOIN contact c WHERE l.idLicencie = c.licencieId AND l.idLicencie = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['idLicencie'], $row['numLicence'], $row['nomLicencie'], $row['prenomLicencie'], $row['categorieId']);
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
                $categorie = $categorieDAO->getById($row['categorieId']);
                $licencies[] = new LicencieModel(
                    $row['idLicencie'], 
                    $row['numLicence'], 
                    $row['nomLicencie'], 
                    $row['prenomLicencie'], 
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
            $stmt = $pdo->prepare("UPDATE licencie SET nomLicencie = ?, prenomLicencie = ?, categorieId = ? WHERE idLicencie = ?");
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
            $stmt = $pdo->prepare("DELETE FROM licencie WHERE idLicencie = ?");
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