<?php

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function authenticate($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM Compte WHERE adresse_mail = ?");
        
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            return $user;
        }
        echo "ok";
        return false;
    }
    public function etudiant($id_compte) {
        // Préparer la requête SQL avec un paramètre lié
        $stmt = $this->db->prepare("SELECT * FROM Compte JOIN Etudiant ON Compte.id_compte = Etudiant.id_compte WHERE Etudiant.id_compte = :id_compte");
    
        // Lier le paramètre pour éviter les injections SQL
        $stmt->bindParam(':id_compte', $id_compte, PDO::PARAM_INT);
    
        // Exécuter la requête
        $stmt->execute();
    
        // Retourner le résultat
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function pilote($id_compte) {
        // Préparer la requête SQL avec un paramètre lié
        $stmt = $this->db->prepare("SELECT * FROM Compte JOIN Pilote ON Compte.id_compte = Pilote.id_compte WHERE Pilote.id_compte = :id_compte");
    
        // Lier le paramètre pour éviter les injections SQL
        $stmt->bindParam(':id_compte', $id_compte, PDO::PARAM_INT);
    
        // Exécuter la requête
        $stmt->execute();
    
        // Retourner le résultat
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function entreprise($id_compte) {
        // Préparer la requête SQL avec un paramètre lié
        $stmt = $this->db->prepare("SELECT * FROM Compte JOIN Entreprise ON Compte.id_compte = Entreprise.id_compte WHERE Entreprise.id_compte = :id_compte");
    
        // Lier le paramètre pour éviter les injections SQL
        $stmt->bindParam(':id_compte', $id_compte, PDO::PARAM_INT);
    
        // Exécuter la requête
        $stmt->execute();
    
        // Retourner le résultat
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
