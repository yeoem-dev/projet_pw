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
            $stmt = $pdo->prepare("SELECT l.*, codeCategorie FROM licencie l JOIN categorie c ON l.categorieId = c.idCcategorie  WHERE idLicencie = ?");
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
                $licencies[] = new LicencieModel($row['idLicencie'], $row['numLicence'], $row['nomLicencie'], $row['prenomLicencie'], $row['categorieId']);
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
            $stmt = $pdo->prepare("UPDATE licencie SET nomLicencie = ?, prenomLicencie = ?");
            $stmt->execute([$licencie->getNomLicencie(), $licencie->getNomLicencie()]);
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