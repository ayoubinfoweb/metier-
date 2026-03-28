<?php
session_start();
include 'connexion.php';

// ✅ التحقق من تسجيل الدخول أولاً
if (!isset($_SESSION['email'])) {
    echo "<script>alert('login ou inscription pour faire la demande !'); window.location.href = 'login.php';</script>";
    exit;
}

// ✅ جلب الخدمة خارج الشرط حتى تكون متاحة في الـ HTML
$service_id = $_POST['service_id'];

$stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
$stmt->bind_param("i", $service_id);
$stmt->execute();
$result = $stmt->get_result();
$service = $result->fetch_assoc();

if (!$service) {
    echo "<script>alert('Service introuvable.'); window.location.href = 'services.php';</script>";
    exit;
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
    </head>

    <div class="container mt-5">

        <h2 class="text-center mb-4">Confirmation de la demande</h2>

        <div class="card p-4">

            <h4><?php echo htmlspecialchars($service['titre']); ?></h4>

            <p><strong>Prix :</strong> <?php echo htmlspecialchars($service['prix']); ?> DH</p>

            <!-- POST vers code_Dconfermer.php, aucun id dans l'URL -->

            <form action="code_Dconfermer.php" method="POST">
                <input type="hidden" name="artisan_id" value="<?php echo $service['artisan_id']; ?>">
                <input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">

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