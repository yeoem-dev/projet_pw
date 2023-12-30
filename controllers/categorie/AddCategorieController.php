<?php


class AddCategorieController {
    private CategorieDAO $categorieDAO;
    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        // Inclure la vue pour afficher le formulaire d'ajout de categorie
        include('../../views/categorie/add_categorie.php');
    }

    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nomCategorie = $_POST['nomCategorie'];
            $codeCategorie = $_POST['codeCategorie'];
            // Valider les données du formulaire

            // Créer un nouvel objet CategorieModel avec les données du formulaire
            $nouvelleCategorie = new CategorieModel(0, $nomCategorie, $codeCategorie);

            if ($this->categorieDAO->create($nouvelleCategorie)) {
                // Rediriger vers la page de listing après l'ajout
                header('Location:HomeCategorieController.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de categorie
                echo "Erreur lors de l'ajout du categorie";
            }

        }
        include("../../views/categorie/add_categorie.php");

    }
}

require_once("../../config/config.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
global $pdo;
$categorieDAO = new CategorieDAO($pdo);
$controller = new AddCategorieController($categorieDAO);
if (!isset($_POST['action'])) {
    $controller->index();
} else {
    $controller->addCategorie();
}
