<?php
// controllers/Controller.php

class Controller {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function vueForm1(){
        echo "Fct1";

    }
    public function vueForm2(){
        echo "Fct2";
        
    }
    public function vueForm3(){
        echo "Fct3";

        
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
            echo "Données du formulaire 1 enregistrées avec succès!";
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
            echo "Données du formulaire 2 enregistrées avec succès!";
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
            echo "Données du formulaire 3 enregistrées avec succès!";
        }
    }
}
?>
