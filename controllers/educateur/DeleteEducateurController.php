<?php

class DeleteEducateurController {
    private EducateurDAO $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function deleteEducateur($id) {
        $educateur = $this->educateurDAO->getById($id);

        if (!$educateur) {
            echo "Le educateur n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($this->educateurDAO->deleteById($id)) {
                header('Location:HomeEducateurController.php');
                exit();
            } else {
                echo "Erreur lors de la suppression du categorie.";
            }
        }
        include('../../views/educateur/delete_educateur.php');
    }

}
global $pdo;
require_once("../../config/config.php");
require_once("../../classes/models/educateurModel.php");
require_once("../../classes/dao/educateurDAO.php");
$educateurDAO = new EducateurDAO($pdo);
$controller = new DeleteEducateurController($educateurDAO);

$controller->deleteEducateur($_GET['id']);