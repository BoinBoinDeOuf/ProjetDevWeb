<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController
{
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('../src/View');
        $this->twig = new Environment($loader);
    }

    public function index()
    {
        echo $this->twig->render('home.html.twig');
    }
    public function mentions()
    {
        echo $this->twig->render('mentions_legales.html.twig');
    }
    public function formInscription()
    {
        echo $this->twig->render('choix_inscription.html.twig');
    }
    public function formConnexion()
    {
        echo $this->twig->render('connexion.html.twig');
    }
    public function connexion_inscription(){
        echo $this->twig->render('connexion_inscription.html.twig');
    }

    

}
?>
