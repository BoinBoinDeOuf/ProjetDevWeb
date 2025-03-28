<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    // Connexion à la base de données (exemple avec MySQLi)
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO users (nom, email, mot_de_passe, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nom, $email, $mot_de_passe, $role);

    if ($stmt->execute()) {
        echo "Utilisateur créé avec succès!";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
