<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController
{
    private $twig;
    private bool $loggedin;

    public function __construct()
    {
        $loader = new FilesystemLoader('../src/View');
        $this->loggedin = false;
        $this->twig = new Environment($loader);
    }

    public function homeEtudiant()

    {
        echo $this->twig->render('home_etudiant.html.twig', [ 'loggedin' => isset($_SESSION['authenticated']) && $_SESSION['authenticated']]);
    }
    public function homePilote()

    {
        echo $this->twig->render('home_pilote.html.twig', [ 'loggedin' => isset($_SESSION['authenticated']) && $_SESSION['authenticated']]);
    }
    public function homeEntreprise()

    {
        echo $this->twig->render('home_entreprise.html.twig', [ 'loggedin' => isset($_SESSION['authenticated']) && $_SESSION['authenticated']]);
    }
    public function mentions()
    {
        echo $this->twig->render('mentions_legales.html.twig', [ 'loggedin' =>isset($_SESSION['authenticated']) && $_SESSION['authenticated']]);
    }
    public function formInscription()
    {
        echo $this->twig->render('choix_inscription.html.twig', [ 'loggedin' => isset($_SESSION['authenticated']) && $_SESSION['authenticated']]);
    }
    public function formConnexion()
    {
        echo $this->twig->render('connexion.html.twig', [ 'loggedin' => isset($_SESSION['authenticated']) && $_SESSION['authenticated']]);
    }
    public function connexion_inscription(){
        echo $this->twig->render('connexion_inscription.html.twig', [ 'loggedin' => isset($_SESSION['authenticated']) && $_SESSION['authenticated']]);
    }
    public function deconnexion(){
        echo $this->twig->render('deconnexion.html.twig', [ 'loggedin' => isset($_SESSION['authenticated']) && $_SESSION['authenticated']]);
    }
    public function mon_profil(){
        echo $this->twig->render('mon_profil.html.twig', [ 'loggedin' => isset($_SESSION['authenticated']) && $_SESSION['authenticated']]);
    }

    

}
?>
