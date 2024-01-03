<?php 
global $pdo;
class AddEducateurController {
    
    private EducateurDAO $educateurDAO;


    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;   
    }

    public function index() {
        // Include la vue pour afficher le formulaire
        include('../../views/educateur/add_educateur.php');
    }

    public function addEducateur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            global $pdo;
            // Récupérer les données du controlleur
            $numLicence = $_POST['numLicence'];
            $emailEducateur = $_POST['emailEducateur'];
            $mdpEducateur = $_POST['mdpEducateur'];

            $licencie = new LicencieDAO($pdo);
            $licencieId = $licencie->getByNumLicence($numLicence);

            if (!is_null($licencieId)) {
                $licencieId = $licencieId->getIdLicencie();

                // Valider les données du formulaire

                $nouvelEducateur = new EducateurModel(0, $emailEducateur, $mdpEducateur, $licencieId);

                if ($this->educateurDAO->create($nouvelEducateur)) {
                    header("Location:../educateur/HomeEducateurController.php");
                    exit();
                } else {
                    echo "Erreur lors de l'ajout de l'educateur.";
                }
            } else {
                header("Location:../../erreur_ajout.php");
                exit();
            }
        }
        include('../../views/educateur/add_educateur.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/EducateurModel.php");
require_once("../../classes/dao/EducateurDAO.php");
require_once("../../classes/dao/LicencieDAO.php");

$educateurDAO = new EducateurDAO($pdo);

$controller = new AddEducateurController($educateurDAO);
if (!isset($_POST['action'])) {
    $controller->index();
} else {
    $controller->addEducateur();
}