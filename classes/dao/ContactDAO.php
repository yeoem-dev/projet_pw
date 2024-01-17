<?php
class ContactDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode pour insérer un nouveau contact dans la base de données
    public function create(ContactModel $contact) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("INSERT INTO contact (nom_contact, prenom_contact, email_contact, num_tel_contact, licencie_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$contact->getNomContact(), $contact->getPrenomContact(), $contact->getEmailContact(), $contact->getNumTelContact(), $contact->getLicencieId()]);
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion ici
            return false;
        }
    }

    // Méthode pour récupérer un contact par son ID
    public function getById($id) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("SELECT * FROM contact WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new ContactModel($row['id'], $row['nom_contact'], $row['prenom_contact'], $row['email_contact'], $row['num_tel_contact'], $row['licencie_id']);
            } else {
                return null; // Aucun contact trouvé avec cet ID
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    // Méthode pour récupérer la liste de tous les contacts
    public function getAll() {
        global $pdo;
        try {
            $stmt = $pdo->query("SELECT * FROM contact");
            $contacts = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contacts[] = new ContactModel($row['id'],$row['nom_contact'], $row['prenom_contact'], $row['email_contact'], $row['num_tel_contact'], $row['licencie_id']);
            }

            return $contacts;
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération ici
            return [];
        }
    }

    // Méthode pour mettre à jour un contact
    public function update(ContactModel $contact) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("UPDATE contact SET nom_contact = ?, prenom_contact = ?, email_contact = ?, num_tel_contact = ? WHERE id = ?");
            $stmt->execute([$contact->getNomContact(), $contact->getPrenomContact(), $contact->getEmailContact(), $contact->getNumTelContact(), $contact->getIdContact()]);
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour ici
            return false;
        }
    }

    // Méthode pour supprimer un contact par son ID
    public function deleteById($id) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("DELETE FROM contact WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression ici
            return false;
        }
    }
}
?>
