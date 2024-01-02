<?php 
class EditLicencieController {
    private LicencieDAO $licencieDAO;
    private CategorieDAO $categorieDAO;

    public function __construct(LicencieDAO $licencieDAO, CategorieDAO $categorieDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function editLicencie($id) {
        $licencie = $this->licencieDAO->getById($id);
        $categories = $this->categorieDAO->getAll();

        if (!$licencie) {
            // Le licencie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La licencie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nomLicencie = $_POST['nomLicencie'];
            $prenomLicencie = $_POST['prenomLicencie'];
            $categorieId = $_POST['categorieId'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du licencie
            $licencie->setNomLicencie($nomLicencie);
            $licencie->setPrenomLicencie($prenomLicencie);
            $licencie->setCategorieId($categorieId);
            

            // Appeler la méthode du modèle (LicencieDAO) pour mettre à jour le licencie
            if ($this->licencieDAO->update($licencie)) {
                // Rediriger vers la page de détails du licencie après la modification
                header('Location:HomeLicencieController.php');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du licencie
                echo "Erreur lors de la modification du licencie.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('../../views/licencie/edit_licencie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");

require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
global $pdo;
$licencieDAO = new LicencieDAO($pdo);
$categorieDAO = new CategorieDAO($pdo);
$controller = new EditLicencieController($licencieDAO, $categorieDAO);
$controller->editLicencie($_GET['id']);


