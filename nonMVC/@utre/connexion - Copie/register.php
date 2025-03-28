<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"] ?? "";
    $prenom = $_POST["prenom"] ?? "";
    $age = $_POST["age"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $repassword = $_POST["re-password"] ?? "";
    
    if (empty($nom) || empty($prenom) || empty($age) || empty($email) || empty($password) || empty($repassword)) {
        echo json_encode(["success" => false, "message" => "Tous les champs sont obligatoires."]);
        exit;
    }
    // Vérifiez que les deux mots de passe correspondent
    if ($age < 15) {
        echo json_encode(["success" => false, "message" => "L'age n'est pas respecté"]);
        exit;
    }
    if ($password !== $repassword) {
        echo json_encode(["success" => false, "message" => "Les mots de passe ne correspondent pas."]);
        exit;
    }
    // Hachez le mot de passe uniquement après vérification
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $filename = "users.json";
    $users = [];

    if (file_exists($filename)) {
        $json = file_get_contents($filename);
        $users = json_decode($json, true) ?? [];
    }

    foreach ($users as $user) {
        if ($user["email"] === $email) {
            echo json_encode(["success" => false, "message" => "Cet email est déjà utilisé."]);
            exit;
        }
    }

    $users[] = [
        "nom" => $nom,
        "prenom" => $prenom,
        "age" => $age,
        "email" => $email,
        "password" => $password
    ];

    file_put_contents($filename, json_encode($users, JSON_PRETTY_PRINT));

    echo json_encode(["success" => true, "message" => "Inscription réussie !"]);
}
?>
