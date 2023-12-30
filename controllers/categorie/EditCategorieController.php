<?php
class EditCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function editCategorie($id) {
        // Récupérer le categorie à modifier en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        if (!$categorie) {
            // Le categorie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La categorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nomCategorie = $_POST['nomCategorie'];
            $codeCategorie = $_POST['codeCategorie'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du categorie
            $categorie->setNomCategorie($nomCategorie);
            $categorie->setCodeCategorie($codeCategorie);
            

            // Appeler la méthode du modèle (CategorieDAO) pour mettre à jour le categorie
            if ($this->categorieDAO->update($categorie)) {
                // Rediriger vers la page de détails du categorie après la modification
                header('Location:HomeCategorieController.php');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du categorie
                echo "Erreur lors de la modification du categorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('../../views/categorie/edit_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
global $pdo;
$categorieDAO = new CategorieDAO($pdo);
$controller = new EditCategorieController($categorieDAO);
$controller->editCategorie($_GET['id']);


