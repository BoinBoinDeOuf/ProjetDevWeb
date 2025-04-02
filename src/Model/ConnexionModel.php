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
}
?>
