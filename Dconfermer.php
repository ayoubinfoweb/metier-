<?php
session_start();
include 'connexion.php';

if(isset($_GET['id'])){
    $service_id = $_GET['id'];

    $sql = "SELECT * FROM services WHERE id = $service_id";
    $result = mysqli_query($conn,$sql);
    $service = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Confirmation de demande</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">Confirmation de la demande</h2>

<div class="card p-4">

<h4><?php echo $service['titre']; ?></h4>

<p><strong>Prix :</strong> <?php echo $service['prix']; ?> DH</p>

<form action="code_Dconfermer.php" method="POST">

<input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">

<input type="hidden" name="client_id" value="<?php echo $_SESSION['utilisateur_id']; ?>">

<div class="text-center mt-4">
<button type="submit" class="btn btn-success">
Confirmer la demande
</button>

<a href="services.php" class="btn btn-secondary">
Annuler
</a>
</div>

</form>

</div>

</div>

</body>
</html>