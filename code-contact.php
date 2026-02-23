<?php
include 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO contacts (nom, prenom, email, sujet, message, date_envoi) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $nom, $prenom, $email, $sujet, $message, $date);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Message envoyé avec succès !'); window.location.href='contact.php';</script>";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>