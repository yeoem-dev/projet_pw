<?php
function checkUserSession() {
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        header("Location: ../../views/auth/login.php");
        exit;
    }
    // Ici, vous pouvez ajouter d'autres vérifications comme le rôle de l'utilisateur
}
