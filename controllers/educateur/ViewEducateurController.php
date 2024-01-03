<?php
class ViewEducateurController {
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function viewEducateur($educateurId) {
        // Récupérer le educateur à afficher en utilisant son ID
        $educateur = $this->educateurDAO->getById($educateurId);

        // Inclure la vue pour afficher les détails du educateur
        include('../../views/educateur/view_educateur.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/EducateurModel.php");
require_once("../../classes/dao/EducateurDAO.php");
global $pdo;
$educateurDAO = new EducateurDAO($pdo);
$controller = new ViewEducateurController($educateurDAO);
$controller->viewEducateur($_GET['id']);


