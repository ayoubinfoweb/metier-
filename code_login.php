<?php
session_start();
include 'connexion.php';


$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

$sql = "SELECT * FROM utilisateurs WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {

    // Vérifier le mot de passe en clair
    if ($mot_de_passe == $row['mot_de_passe']) {
        $_SESSION['utilisateur_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        if ($row['role'] === 'artisan') {

            $stmt2 = $conn->prepare("SELECT id FROM artisans WHERE utilisateur_id = ?");
            $stmt2->bind_param("i", $row['id']);
            $stmt2->execute();
            $res2 = $stmt2->get_result();
            $artisan = $res2->fetch_assoc();

            if ($artisan) {
                $_SESSION['artisan_id'] = $artisan['id']; 

            }

        }


        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "Mot de passe incorrect.";
    }

} else {
    echo "Email introuvable.";
}


?>