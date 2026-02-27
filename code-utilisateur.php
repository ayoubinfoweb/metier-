<?php
include 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $nom, $prenom, $email, $mot_de_passe, $role);

    if (mysqli_stmt_execute($stmt)) {
        if ($role === 'client') {
           echo "<script>alert('Inscription réussie !'); window.location.href='login.php';</script>";
        } elseif ($role === 'artisan') {
            echo "<script>alert('Inscription réussie !'); window.location.href='artisan.php';</script>";
        } elseif ($role === 'admin') {
            echo "<script>alert('Inscription réussie !'); window.location.href='login.php';</script>";
        }
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);


?>