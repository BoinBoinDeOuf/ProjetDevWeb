<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: ../src/View/login_view.php');
    exit();
}

// Récupérez le nom d'utilisateur depuis la session
$username = $_SESSION['username'] ?? 'Guest'; // Utilisez 'Guest' ou une autre valeur par défaut si nécessaire
include(__DIR__ . '/../View/dashboard_view.php');
?>
