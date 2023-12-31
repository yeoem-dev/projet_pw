<?php 

class AddLicencieController {
    
    private LicencieDAO $licenceDAO;
    private CategorieDAO $categorieDAO;


    public function __construct(LicencieDAO $licenceDAO, CategorieDAO $categorieDAO) {
        $this->licenceDAO = $licenceDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        // Include la vue pour afficher le formulaire
        $categories = $this->categorieDAO->getAll();
        include('../../views/licencie/add_licencie.php');
    }

    public function addLicencie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du controlleur
            $numLicencie = $_POST['numLicence'];
            $nomLicencie = $_POST['nomLicencie'];
            $prenomLicencie = $_POST['prenomLicencie'];
            $categorieId = $_POST['categorieId'];

            // Valider les données du formulaire

            $nouveauLicencie = new LicencieModel(0, $numLicencie, $nomLicencie, $prenomLicencie, $categorieId);

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
require_once("../../classes/models/CategorieModel.php");

require_once("../../classes/dao/LicencieDAO.php");
require_once("../../classes/dao/CategorieDAO.php");
global $pdo;
$licencieDAO = new LicencieDAO($pdo);
$categorieDAO = new CategorieDAO($pdo);
$controller = new AddLicencieController($licencieDAO, $categorieDAO);
if (!isset($_POST['action'])) {
    $controller->index();
} else {
    $controller->addLicencie();
}