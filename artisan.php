<?php
session_start();
include 'connexion.php';
?>

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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Formulaire de Contact</h4>
                    </div>
                    <div class="card-body">
                        <form action="code_artisan.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Téléphone</label>
                                <input type="tel" name="telephone" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Adresse</label>
                                <input type="text" name="adresse" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ville</label>
                                <input type="text" name="ville" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <select name="metier_id" class="form-select" required>
                                    <option value="">-- Choisir un métier --</option>
                                    <?php
                                    // Récupérer tous les métiers avec leur catégorie
                                    $stmt = $conn->query("
    SELECT m.id, m.nom_metier, c.nom_categorie
    FROM metiers m
    JOIN categories c ON m.categorie_id = c.id
    ORDER BY c.nom_categorie, m.nom_metier
");

                                    $current_cat = '';
                                    while ($row = $stmt->fetch_assoc()) {
                                        // Créer un optgroup par catégorie
                                        if ($current_cat != $row['nom_categorie']) {
                                            if ($current_cat != '')
                                                echo '</optgroup>'; // fermer le précédent
                                            echo '<optgroup label="' . htmlspecialchars($row['nom_categorie']) . '">';
                                            $current_cat = $row['nom_categorie'];
                                        }
                                        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nom_metier']) . '</option>';
                                    }
                                    if ($current_cat != '')
                                        echo '</optgroup>'; // fermer le dernier optgroup
                                    ?>

                                </select>
                            </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Envoyer
                    </button>

                    </form>
                </div>
            </div>
        </div>
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