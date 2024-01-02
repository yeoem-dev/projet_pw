<?php 
class ViewLicencieController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function viewLicencie($id) {
        $licencie = $this->licencieDAO->getById($id);
        // Ajouter le ou les contacts du licencie
        include('../../views/licencie/view_licencie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");

global $pdo;
$licencieDAO = new LicencieDAO($pdo);
$controller = new ViewLicencieController($licencieDAO);
$controller->viewLicencie($_GET['id']);