<?php
session_start();
include 'connexion.php';

// Récupération depuis la session
$client_id  = $_SESSION['utilisateur_id'];
$artisan_id = $_POST['artisan_id'];
$service_id = $_POST['service_id'];

// Stocker client_id dans la session
$date = date("Y-m-d H:i:s");

$stmt = $conn->prepare("INSERT INTO demandes (client_id, service_id ,artisan_id, date_demande, statut) VALUES (?,?,?,?, 'en attente')");
$stmt->bind_param("iiis", $client_id, $service_id ,$artisan_id, $date);
if ($stmt->execute()) {
    


    echo "<script>
        alert('Demande envoyée avec succès !');
        window.location.href = 'Sclient.php';

    </script>";
}
?>
