<?php
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    // Traitement de l'image
    $imagePath = 'images/arisants-img/' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $imagePath);

    // Insertion dans la base de données
    $stmt = $conn->prepare("INSERT INTO services (titre, prix, description, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$titre, $prix, $description, $imagePath]);

    // Redirection après l'insertion
    echo "<script>alert('Service ajouté avec succès!'); window.location.href='index.php';</script>";
}