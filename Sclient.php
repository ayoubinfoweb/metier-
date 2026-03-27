<?php
session_start();
include "connexion.php";

$client_id = $_SESSION["utilisateur_id"];

$sql = "SELECT 
utilisateurs.nom,
utilisateurs.prenom,
services.titre,
artisans.telephone,
demandes.statut,
demandes.date_demande,
demandes.id

FROM demandes
JOIN services ON demandes.service_id = services.id
JOIN artisans ON services.artisan_id = artisans.id
JOIN utilisateurs ON artisans.utilisateur_id = utilisateurs.id
WHERE demandes.client_id = $client_id";

$result = $conn->query($sql);




?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="TemplateMo">

    <title>First Portfolio Bootstrap 5 Theme</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/magnific-popup.css" rel="stylesheet">

    <link href="css/templatemo-first-portfolio-style.css" rel="stylesheet">

    <!--

TemplateMo 578 First Portfolio

https://templatemo.com/tm-578-first-portfolio

-->
</head>

<body>
    <?php include 'header-pages.php'; ?>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="col-lg-6 col-12">
                        <div class="profile-thumb">
                            <div class="profile-title">
                                <h4 class="mb-0">Information</h4>
                            </div>
                            <div class="profile-body">
                                <p>
                                    <span class="profile-small-title">nom d'artisant</span>
                                    <span> <?php echo $row['nom'] . " " . $row['prenom'] . " - "; ?></span>
                                </p>

                                <p>
                                    <span class="profile-small-title">titre de service</span>
                                    <span><?php echo $row['titre'] . " - "; ?></span>
                                </p>

                                <p>
                                <p>
                                    <span class="profile-small-title">leur telephone</span>
                                    <span>
                                        <?php
                                        if ($row['statut'] == 'acceptée') {
                                            echo $row['telephone'];
                                        } else {
                                            echo "Non disponible";
                                        }
                                        ?>
                                    </span>
                                </p>

                                </p>
                                <p>
                                    <span class="profile-small-title">date_demande</span>
                                    <span> <?php echo $row['date_demande'] . "<br>"; ?></span>
                                </p>

                                <p>
                                    <span class="profile-small-title">statut</span>
                                    <span> <?php echo $row['statut'] . "<br>"; ?></span>
                                </p>
                                <form action="suprimer.php" method="post">
                                    <input type="hidden" name="demande_id" value="<?php echo $row['id']; ?>">
                                    <input type="submit" value="suprimer" name="supprimer" class="btn btn-danger">
                                </form>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <div class="copyright-text-wrap">
                        <p class="mb-0">
                            <span class="copyright-text">Copyright © 2036 <a href="#">First Portfolio</a> Company. All
                                rights reserved.</span>
                            Design:
                            <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

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