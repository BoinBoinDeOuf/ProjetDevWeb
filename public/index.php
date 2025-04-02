<?php

require '../vendor/autoload.php';
require_once '../config/database.php';

use App\Controller\HomeController;
if (isset($_GET['uri'])) {
    $uri = $_GET['uri'];
} else {
    $uri = '/';
}


$controller = new HomeController();

session_start();



$login = !(isset($_SESSION['user_id']));
//echo ($login && ($uri!='connexion' || $uri!='inscription'));
if ($login && $uri!='connexion' && $uri!='inscription'){
    $uri = 'connexion_inscription';
}

switch ($uri) {
    case 'index':  // Si l'URI est /accueil ou /index.php
        if ($_SESSION['type_compte']=="etudiant"){
            $controller->homeEtudiant();
        }
        if ($_SESSION['type_compte']=="pilote"){
            $controller->homePilote();
        }
        if ($_SESSION['type_compte']=="entreprise"){
            $controller->homeEntreprise();
        }
        


        //$controller->index();
        break;
    case 'mentions_legales':
        $controller->mentions();
        break;
    case 'inscription':
        $controller->formInscription();
        break;
    case 'connexion':
        $controller->formConnexion();
        break;
    case 'connexion_inscription':
        $controller->connexion_inscription();
        break;  
    case 'deconnexion':
        $controller->deconnexion();
        break;   
    case 'monprofil':
        $controller->mon_profil();
        break;  

    default:
        
        break;

}

?>

