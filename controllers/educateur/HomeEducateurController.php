<?php
global $pdo;
class HomeEducateurController {
    private EducateurDAO $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO ) {
        $this->educateurDAO = $educateurDAO;
    }

    public function index() {
        $educateurs = $this->educateurDAO->getAll();

        include("../../views/educateur/home.php");
        
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/EducateurModel.php");
require_once("../../classes/dao/EducateurDAO.php");
$educateurDAO = new EducateurDAO($pdo);
$controller = new HomeEducateurController($educateurDAO);
$controller->index();