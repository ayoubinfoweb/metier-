<?php
/*connexion.php*/
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "metiers";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/*utf8*/
mysqli_set_charset($conn, "utf8");

?>

