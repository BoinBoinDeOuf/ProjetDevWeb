<?php
// src/models/HomeModel.php

namespace App\Model;
require_once 'database.php';


class HomeModel{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    
    public function getOffre(){
        //$sql = "INSERT INTO Compte (adresse_mail, mot_de_passe, telephone, nom, prenom)


    }
}


?>