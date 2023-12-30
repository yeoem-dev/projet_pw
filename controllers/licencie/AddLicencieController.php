<?php 

class AddLicencieController {
    
    private LicencieDAO $licenceDAO;
    public function __construct(LicencieDAO $licenceDAO) {
        $this->licenceDAO = $licenceDAO;
    }

    public function index() {
        // Include la vue pour afficher le formulaire
        include('../../views/licencie/add_licencie.php');
    }

    public function addLicencie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du controlleur
            $nomLicencie = $_POST['nomLicencie'];
            $prenomLicencie = $_POST['prenomLicencie'];
            $categorieId = $_POST['categorieId'];

            // Valider les données du formulaire

            $nouveauLicencie = new LicencieModel(0, 0, $nomLicencie, $prenomLicencie, $categorieId);

            if ($this->licenceDAO->create($nouveauLicencie)) {
                header('Location: HomeLicencieController.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout du licencié";
            }
        }
        include('../../views/licencie/add_licencie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");
global $pdo;
$licencieDAO = new LicencieDAO($pdo);
$controller = new AddLicencieController($licencieDAO);
if (!isset($_POST['action'])) {
    $controller->index();
} else {
    $controller->addLicencie();
}