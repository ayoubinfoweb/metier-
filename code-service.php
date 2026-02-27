<?php
include 'connexion.php';
 // Redirection après l'insertion
    $stmt = $conn->prepare("SELECT * FROM services WHERE artisant_id = ? AND nom_service = ? AND categorie = ? AND prix = ? AND description = ? AND image = ?");
    $stmt->execute([$nom_service, $categorie, $prix, $description, $imagePath]);
    echo "<script>alert('Service ajouté avec succès!'); window.location.href='service.php';</script>";


?>