<?php

require '../vendor/autoload.php';

use App\Controller\HomeController;
if (isset($_GET['uri'])) {
    $uri = $_GET['uri'];
} else {
    $uri = '/';
}

$controller = new HomeController();
echo $uri;
switch ($uri) {
    case 'index':  // Si l'URI est /accueil ou /index.php
        $controller->index(); // Appeler la méthode index()
        break;
    case 'mentions_legales':
        $controller->mentions();
        break;
    case 'inscription':
        $controller->inscription();
        break;
    

    default:
        $controller->index();
        break;
    }   
?>

