<?php
class ViewCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function viewCategorie($categorieId) {
        // Récupérer le categorie à afficher en utilisant son ID
        $categorie = $this->categorieDAO->getById($categorieId);

        // Inclure la vue pour afficher les détails du categorie
        include('../../views/categorie/view_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
global $pdo;
$categorieDAO = new CategorieDAO($pdo);
$controller = new ViewCategorieController($categorieDAO);
$controller->viewCategorie($_GET['id']);


