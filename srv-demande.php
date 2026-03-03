<?php
include 'connexion.php';

if (isset($_GET['artisan_id'])) {

    $artisan_id = $_GET['artisan_id'];

    $stmt = $conn->prepare("
        SELECT 
            utilisateurs.nom,
            utilisateurs.prenom,
            utilisateurs.email,
            artisans.telephone,
            artisans.adresse,
            artisans.ville
        FROM artisans
        JOIN utilisateurs 
        ON artisans.utilisateur_id = utilisateurs.id
        WHERE artisans.id = ?
    ");

    $stmt->bind_param("i", $artisan_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $artisan = $result->fetch_assoc(); // 🔥 une seule ligne

    $stmt1 = $conn->prepare("
        SELECT titre, description, prix,image
        FROM services
        WHERE artisan_id = ?
    ");
    $stmt1->bind_param("i", $artisan_id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $services = $result1 ->fetch_assoc(); // 🔥 une seule ligne


}

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
</head>

<body>
    <?php include 'header-pages.php'; ?>

    <!--section services-->

    <section class="about section-padding">
        <div class="section-title-wrap d-flex justify-content-end align-items-center mb-4">

            <h2 class="text-white me-4 mb-0">mon servivce</h2>

            <img src="<?php echo $services['image']; ?>" class="avatar-image img-fluid" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                    <div class="about-thumb">
                        <!-- 🔥 une seule ligne -->
                        <h3 class="pt-2 mb-3">
                            a little bit about
                            <span class="text-success">
                                <?php echo $artisan['nom'] . " " . $artisan['prenom']; ?>
                            </span>
                        </h3>
                        <p>
                            <p>adresse : <?php  echo $artisan['adresse']; ?></p>
                            <p>ville : <?php  echo $artisan['ville']; ?></p>
                            <p>email : <?php echo $artisan['email']; ?></p>
                            <br>
                            <br>
                            <p>description : </p><?php echo $services['description']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                    <div class="about-thumb">
                        <div class="row">
                            <div class="col-lg-6 col-6 featured-border-bottom py-2">
                                <form action="" method="post">
                                    <strong class="featured-numbers">20+</strong>

                                    <p class="featured-text">Years of Experiences</p>
                            </div>

                            <div class="col-lg-6 col-6 featured-border-start featured-border-bottom ps-5 py-2">
                                <strong class="featured-numbers">245</strong>

                                <p class="featured-text">Happy Customers</p>
                            </div>

                            <div class="col-lg-6 col-6 pt-4">
                                <strong class="featured-numbers">640</strong>

                                <p class="featured-text">Project Finished</p>
                            </div>

                            <div class="col-lg-6 col-6 featured-border-start ps-5 pt-4">
                                <strong class="featured-numbers">72+</strong>

                                <p class="featured-text">Digital Awards</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center">
        <input type="submit" value="demande" class="btn btn-primary center btn btn-success">
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