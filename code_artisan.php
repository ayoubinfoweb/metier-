<?php
include 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $utilisateur_id = $_POST['utilisateur_id']; // IMPORTANT
    $metier_id = $_POST['metier']; // ton select metier
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];

    $sql = "INSERT INTO artisans (utilisateur_id, metier_id, telephone, adresse, ville) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iisss", $utilisateur_id, $metier_id, $telephone, $adresse, $ville);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Artisan ajouté avec succès !'); window.location.href='srv-remplire.php';</script>";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>