<?php
session_start();
include 'connexion.php';


    $utilisateur_id =  $_SESSION['utilisateur_id'];
    $metier_id = $_POST['metier_id'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];

    $sql = "INSERT INTO artisans (utilisateur_id, metier_id, telephone, adresse, ville) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "iisss", $utilisateur_id, $metier_id, $telephone, $adresse, $ville);

    if (mysqli_stmt_execute($stmt) ) {
     
        echo "<script>alert('Artisan ajouté avec succès !'); window.location.href='login.php';</script>";
    

    } else {
        echo "Erreur lors de l'ajout";
    }

    mysqli_stmt_close($stmt);


mysqli_close($conn);
?>