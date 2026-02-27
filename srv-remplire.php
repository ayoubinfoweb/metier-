<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'artisan') {
    echo '<script>window.location.href = "index.php"</script>';
    exit();
} ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="TemplateMo">

    <title>Une plateforme de services artisanaux </title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/magnific-popup.css" rel="stylesheet">

    <link href="css/templatemo-first-portfolio-style.css" rel="stylesheet">
    <link rel="stylesheet" href="css\style-insc_login.css">
</head>

<body>

    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="text-center text-success mb-4">Ajouter un Service</h3>

            <form action="code-remplire.php" method="POST" enctype="multipart/form-data">
                <!-- titre -->
                <div class="mb-3">
                    <label class="form-label text-success">titre</label>
                    <input type="text" name="titre" class="form-control" required>
                </div>
                <!-- Prix -->
                <div class="mb-3">
                    <label class="form-label text-success">Prix (DH)</label>
                    <input type="number" name="prix" class="form-control" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label text-success">Description</label>
                    <textarea name="description" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label class="form-label text-success">Image du service</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>

                <!-- Bouton -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success w-50">Ajouter</button>
                </div>

            </form>
        </div>
    </div>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>