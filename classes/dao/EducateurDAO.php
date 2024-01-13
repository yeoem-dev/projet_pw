<?php
class EducateurDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode pour insérer un nouveau educateur dans la base de données
    public function create(EducateurModel $educateur) {
        global $pdo;

        try {
            $stmt = $pdo->prepare("INSERT INTO educateur (email_educateur, mdp_educateur, licencie_id, est_admin) VALUES (?, ?, ?, ?)");
            $stmt->execute([$educateur->getEmailEducateur(), $educateur->getMdpEducateur(), $educateur->getLicencieId(), $educateur->getEstAdmin()]);
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion ici
            return false;
        }
    }

    // Méthode pour récupérer un educateur par son ID
    public function getById($id) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("SELECT * FROM educateur WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($row['id'],$row['email_educateur'], $row['mdp_educateur'], $row['licencie_id'], $row['est_admin']);
            } else {
                return null; // Aucun educateur trouvé avec cet ID
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    // Méthode pour récupérer la liste de tous les educateurs
    public function getAll() {
        global $pdo;
        try {
            $stmt = $pdo->query("SELECT * FROM educateur");
            $educateurs = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencieDAO = new LicencieDAO($pdo);
                $licencie = $licencieDAO->getById($row['licencie_id']);
                $educateurs[] = new EducateurModel($row['id'],$row['email_educateur'], $row['mdp_educateur'], $licencie, $row['est_admin']);
            }

            return $educateurs;
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération ici
            return [];
        }
    }

    // Méthode pour mettre à jour un educateur
    public function update(EducateurModel $educateur) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("UPDATE educateur SET email_educateur = ?, mdp_educateur = ? , est_admin = ? WHERE id = ?");
            $stmt->execute([$educateur->getEmailEducateur(), $educateur->getMdpEducateur(), $educateur-> getEstAdmin(), $educateur->getIdEducateur()]);
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour ici
            return false;
        }
    }

    // Méthode pour supprimer un educateur par son ID
    public function deleteById($id) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("DELETE FROM educateur WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression ici
            return false;
        }
    }

    public static function authentification($email, $mdp) {
        global $pdo;
    
        try {
            $stmt = $pdo->prepare("SELECT * FROM educateur WHERE email_educateur = ?");
            var_dump($stmt);
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($row && $row['est_admin'] && password_verify($mdp, $row['mdp_educateur'])) {
                // Authentification réussie
                return $row['id'];
            }
            return null; // Authentification échouée
        } catch (PDOException $e) {
            // Gérer l'exception
            // Log l'erreur sans exposer de détails sensibles
            return null;
        }
    }
    
}
require_once("../../classes/dao/LicencieDAO.php");
