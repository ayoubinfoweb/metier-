<?php
session_start();
include 'connexion.php';

if ($_SESSION['role'] !== 'client') {
    echo json_encode(['success' => false, 'error' => 'Non autorisé']);
    exit;
}

$client_id   = intval($_POST['client_id']);
$artisan_id  = intval($_POST['artisan_id']);
$note        = intval($_POST['note']);
$commentaire = $_POST['commentaire'];

$stmt = $conn->prepare("INSERT INTO avis (client_id, artisan_id, note, commentaire) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiis", $client_id, $artisan_id, $note, $commentaire);

if ($stmt->execute()) {
    // Récupérer le nom du client pour l'afficher immédiatement
    $s = $conn->prepare("SELECT nom, prenom FROM utilisateurs WHERE id = ?");
    $s->bind_param("i", $client_id);
    $s->execute();
    $user = $s->get_result()->fetch_assoc();

    $etoiles = str_repeat('★', $note) . str_repeat('☆', 5 - $note);

    echo json_encode([
        'success'     => true,
        'nom'         => htmlspecialchars($user['nom']),
        'prenom'      => htmlspecialchars($user['prenom']),
        'commentaire' => htmlspecialchars($commentaire),
        'etoiles'     => $etoiles
    ]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}
?>