<?php
// controllers/Controller.php
namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Model\InscriptionModel; // Assure-toi que le chemin est correct

class InscriptionController {
    private $model;
    private $twig;

    public function __construct(InscriptionModel $model) {
        $this->model = $model; // Assigne l'objet modèle
        $loader = new FilesystemLoader('../src/View');
        $this->twig = new Environment($loader);
    }

    public function vueForm1(){
        echo $this->twig->render('form_type1.html.twig');
    }
    public function vueForm2(){
        echo $this->twig->render('form_type2.html.twig');

    }
    public function vueForm3(){
        echo $this->twig->render('form_type3.html.twig');

        
    }

    public function formulaire1() {
        if (isset($_POST['email'], $_POST['password'], $_POST['telephone'], $_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST['campus'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $tel = $_POST['telephone'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naissance = $_POST['date_naissance'];
            $campus = $_POST['campus'];
            $this->model->registerStudent($email, $password, $tel, $nom, $prenom, $date_naissance, $campus);
            header('Location: ../public/index.php');
            //echo "Données du formulaire 1 enregistrées avec succès!";
        }
    }

    public function formulaire2() {
        if (isset($_POST['email'], $_POST['password'], $_POST['telephone'], $_POST['nom'], $_POST['prenom'], $_POST['campus'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $tel = $_POST['telephone'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $campus = $_POST['campus'];
            $this->model->registerPilote($email, $password, $tel, $nom, $prenom, $campus);
            header('Location: ../../public/index.php?uri=index');
            //echo "Données du formulaire 2 enregistrées avec succès!";
        }
    }

    public function formulaire3() {
        if (isset($_POST['email'], $_POST['password'], $_POST['telephone'], $_POST['nom'], $_POST['prenom'], $_POST['nomEnt'], $_POST['description'], $_POST['num_siret'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $tel = $_POST['telephone'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $nomEnt = $_POST['nomEnt'];
            $description = $_POST['description'];
            $num_siret = $_POST['num_siret'];
            $this->model->registerCompany($email, $password, $tel, $nom, $prenom, $nomEnt, $description, $num_siret);
            header('Location: ../../public/index.php?uri=index');
            //echo "Données du formulaire 3 enregistrées avec succès!";
        }

    }
}
?>
