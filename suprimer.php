<?php

include 'connexion.php';

 $demande_id = $_POST['demande_id'];

    $stmt = $conn->prepare("DELETE FROM demandes WHERE id = ?");
    $stmt->bind_param("i", $demande_id);

    if($stmt->execute()){
        echo "Demande supprimée avec succès";
    }else{
        echo "Erreur de suppression";
    }

    $stmt->close();











?>