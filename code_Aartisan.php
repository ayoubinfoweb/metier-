<?php
session_start();
include "connexion.php";

$demande_id = $_POST['demande_id'] ;
$artisan_id = $_POST['artisan_id'];

    if (isset($_POST['acceptée'])) {
        $statut = "acceptée";
    } elseif (isset($_POST['refusée'])) {
        $statut = "refusée";
    }

    // UPDATE la demande (uniquement si elle appartient à cet artisan)
    $stmt = $conn->prepare("UPDATE demandes SET statut = ? WHERE id = ? AND artisan_id = ?");
    $stmt->bind_param("sii", $statut, $demande_id, $artisan_id);
    $stmt->execute();

    // Rafraîchir la page
    echo "<script>alert(' ajouté avec succès !'); window.location.href='Aartisan.php';</script>";

?>