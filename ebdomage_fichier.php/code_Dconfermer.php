<?php
include 'connexion.php';

$service_id = $_POST['service_id'];
$client_id = $_POST['client_id'];

$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO demandes(client_id,service_id,date_demande,statut)
VALUES('$client_id','$service_id','$date','en attente')";

mysqli_query($conn,$sql);

echo "<script>
    alert(\"Demande envoyée avec succès !\");
    window.location.href = \"mes_demandes.php\";
</script>";
?>