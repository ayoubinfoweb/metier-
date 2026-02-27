<?php
session_start();
include 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM utilisateurs WHERE email = ? AND mot_de_passe = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $mot_de_passe);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            // Connexion réussie
            $_SESSION['user'] = mysqli_fetch_assoc($result);
            echo "<script>window.location.href = 'index.php';</script>";
            exit();
        } else {
            echo "Identifiants invalides.";
        }
    } else {
        echo "Erreur lors de l'exécution de la requête.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);