<?php
require '../vendor/autoload.php';
//require_once 'Controller/InscriptionController.php';
//require_once 'Model/InscriptionModel.php';
require_once '../config/database.php';

use App\Controller\InscriptionController;
use App\Model\InscriptionModel;

$model = new InscriptionModel($pdo); // Crée une instance du modèle
$controller = new InscriptionController($model); // Passe l'instance au constructeur




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['compte'])) {
        $compte = $_POST['compte'];
        switch ($compte) {
            case 'type1':
                $controller->formulaire1();
                break;
            case 'type2':
                $controller->formulaire2();
                break;
            case 'type3':
                $controller->formulaire3();
                break;
            default:
                echo "Formulaire non reconnu.";
        }
    }
} elseif (isset($_GET['form'])) {
    $form = $_GET['form'];
    switch ($form) {
        case '1':
            $controller->vueForm1();
            break;
        case '2':
            $controller->vueForm2();
            break;
        case '3':
            $controller->vueForm3();
            break;
        default:
            echo "Formulaire non reconnu.";
    }
}
?>
