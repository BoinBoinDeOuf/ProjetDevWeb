<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'devweb';
$user = 'root';
$pass = 'Mqmc1009';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hachage du mot de passe

    // Insertion dans la base de données
    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $stmt->execute([
        ':email' => $email,
        ':password' => $password
    ]);

    echo "Inscription réussie !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
