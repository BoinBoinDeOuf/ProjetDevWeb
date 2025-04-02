<?php
session_start();
require_once __DIR__ . '/../Model/ConnexionModel.php';
require_once __DIR__ . '/../../config/database.php';

$userModel = new UserModel($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $userModel->authenticate($username, $password);

    if ($user) {
        session_regenerate_id(true);
        $id = $user['id_compte'];
        if ($userModel->etudiant($id)){
            $_SESSION['type_compte'] = "etudiant";
        }
        if ($userModel->pilote($id)){
            $_SESSION['type_compte'] = "pilote";
        }
        if ($userModel->entreprise($id)){
            $_SESSION['type_compte'] = "entreprise";
        } 

        $_SESSION['user_id'] = $user['id_compte'];
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $user['adresse_mail'];
        
        header('Location: ../../public/index.php?uri=index'); // Redirige vers le tableau de bord
        exit();
    } else {
        echo "Invalid username or password.";
    }
}

//include __DIR__ . '/../View/login_view.php';
?>
