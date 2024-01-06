<?php

// Inclure les dépendances
require_once("../../classes/dao/EducateurDAO.php");
require_once("../../config/config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];


    $admin = EducateurDAO::authentification($email, $mdp);

    if ($admin) {
        $_SESSION['admin_id'] = $admin;
        header('Location: ../../index.php');
        exit;
    } else {
        $_SESSION['error'] = "Accès refusé";
        header("Location: ../../views/auth/login.php");
        exit;
    }
}

if (isset($_SERVER['admin_id'])) {
    header('Location: index.php');
    exit;
}