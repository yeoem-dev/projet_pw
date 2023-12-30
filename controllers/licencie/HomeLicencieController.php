<?php
global $pdo;
class HomeLicencieController {
    private LicencieDAO $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO ) {
        $this->licencieDAO = $licencieDAO;
    }

    public function index() {
        $licencies = $this->licencieDAO->getAll();

        include("../../views/licencie/home.php");
        
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");
$licencieDAO = new LicencieDAO($pdo);
$controller = new HomeLicencieController($licencieDAO);
$controller->index();