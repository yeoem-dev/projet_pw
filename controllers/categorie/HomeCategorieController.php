<?php
global $pdo;
class HomeCategorieController {
    private CategorieDAO $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO ) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        //$categories = $this->categorieDAO->getAll();
        $categories = CategorieDAO::getAll();
        require_once("../../views/categorie/home.php");
        var_dump($categories);
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
$categorieDAO = new CategorieDAO($pdo);
$controller = new HomeCategorieController($categorieDAO);
$controller->index();