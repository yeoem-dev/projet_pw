<?php

class DeleteCategorieController {
    private CategorieDAO $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function deleteCategorie($id) {
        $categorie = $this->categorieDAO->getById($id);

        if (!$categorie) {
            echo "La categorie n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($this->categorieDAO->deleteById($id)) {
                header('Location:HomeCategorieController.php');
                exit();
            } else {
                echo "Erreur lors de la suppression de la categorie.";
            }
        }
        include('../../views/categorie/delete_categorie.php');
    }

}
global $pdo;
require_once("../../config/config.php");
require_once("../../classes/models/categorieModel.php");
require_once("../../classes/dao/categorieDAO.php");
$categorieDAO = new CategorieDAO($pdo);
$controller = new DeleteCategorieController($categorieDAO);

$controller->deleteCategorie($_GET['id']);