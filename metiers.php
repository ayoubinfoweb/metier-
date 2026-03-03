<?php
include 'connexion.php';

if (isset($_GET['categorie_id'])) {

    $categorie_id = $_GET['categorie_id'];

    $stmt = $conn->prepare("SELECT * FROM metiers WHERE categorie_id = ?");
    $stmt->bind_param("i", $categorie_id);
    $stmt->execute();
    $result = $stmt->get_result();
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
    <!--section categories-->
    <section class="categories section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12 ms-auto">
                    <div class="section-title-wrap d-flex justify-content-center align-items-center mb-4">
                        <h2 class="text-white ms-4 mb-0">metiers</h2>
                    </div>
                </div>

                <div class="clearfix"></div>
                <?php foreach ($result as $metier) { ?>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="projects-thumb">
                            <div class="projects-info">
                                <h3 class="projects-title"> <?php echo $metier['nom_metier']; ?></h3>
                            </div>
                            <a href="service-detail.php?metier_id=<?php echo $metier['id']; ?>" class="btn btn-success">
                                Voir services
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <footer>
        <?php include 'footer.php'; ?>
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