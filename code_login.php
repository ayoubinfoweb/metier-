<?php
session_start();
include 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // On cherche seulement par email
    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        // Vérifier le mot de passe hashé
        if (password_verify($mot_de_passe, $row['mot_de_passe'])) {

            $_SESSION['utilisateur_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role']; // IMPORTANT
            echo "<script>window.location.href = 'index.php';</script>";
            exit();

        } else {
            echo "Mot de passe incorrect.";
        }

    } else {
        echo "Email introuvable.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>