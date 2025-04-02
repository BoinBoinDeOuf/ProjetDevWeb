<?php
// models/Model.php

namespace App\Model;



class InscriptionModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function registerUser($email, $password, $tel, $nom, $prenom){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Compte (adresse_mail, mot_de_passe, telephone, nom, prenom) 
                VALUES (:email, :password, :telephone, :nom, :prenom)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':password' => $password,
            ':telephone' => $tel,
            ':nom' => $nom,
            ':prenom' => $prenom
        ]);
        return $this->pdo->lastInsertId();
    }

    public function registerStudent($email, $password, $tel, $nom, $prenom, $date_naissance, $campus) {
        $user_id = $this->registerUser($email, $password, $tel, $nom, $prenom);
        $sql = "INSERT INTO Etudiant (id_compte, date_naissance, campus) 
        VALUES (:id, :date_naissance, :campus)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id' => $user_id,
            ':date_naissance' => $date_naissance,
            ':campus' => $campus
        ]);
    }


    public function registerPilote($email, $password, $tel, $nom, $prenom, $campus) {
        $user_id = $this->registerUser($email, $password, $tel, $nom, $prenom);
        $sql = "INSERT INTO Pilote (id_compte, campus) 
        VALUES (:id, :campus)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id' => $user_id,
            ':campus' => $campus
        ]);
    }

    public function registerCompany($email, $password, $tel, $nom, $prenom, $nom_entreprise, $description, $num_siret) { 
        $user_id = $this->registerUser($email, $password, $tel, $nom, $prenom); 
        $sql = "INSERT INTO Entreprise (id_compte, nom_entreprise, description, numero_siret) 
        VALUES (:id, :nom_entreprise, :description, :num_siret)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id' => $user_id,
            ':nom_entreprise' => $nom_entreprise,
            ':description' => $description,
            ':num_siret' => $num_siret
        ]);
        exit();
    }

}
?>
