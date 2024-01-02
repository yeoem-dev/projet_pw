<?php

class DeleteLicencieController {
    private LicencieDAO $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function deleteLicencie($id) {
        $licencie = $this->licencieDAO->getById($id);

        if (!$licencie) {
            echo "Le licencié n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->licencieDAO->deleteById($id)) {
                header('Location: HomeLicencieController.php');
                exit();
            } else {
                echo "Erreur lors de la suppression du licencie.";
            }
        }
        include('../../views/licencie/delete_licencie.php');
    }
}

global $pdo;
require_once("../../config/config.php");
require_once("../../classes/dao/LicencieDAO.php");
require_once("../../classes/models/LicencieModel.php");

$licencieDAO = new LicencieDAO($pdo);
$controller = new DeleteLicencieController($licencieDAO);

$controller->deleteLicencie($_GET['id']);