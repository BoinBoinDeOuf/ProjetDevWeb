<?php
session_start();

if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_unset();
    session_destroy();
    header('Location: ../../public/index.php?uri=index');
    exit();
}
?>
