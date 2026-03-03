<?php
include 'connexion.php';

if (isset($_GET['metier_id'])) {
    $metier_id = $_GET['metier_id'];

    $stmt = $conn->prepare("
        SELECT s.*, a.id AS artisan_id
        FROM services s
        JOIN artisans a ON s.artisan_id = a.id
        WHERE a.metier_id = ?
    ");
    $stmt->bind_param("i", $metier_id);
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

    <section class="services section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 mx-auto">
                    <div class="section-title-wrap d-flex justify-content-center align-items-center mb-5">
                        <img src="images/handshake-man-woman-after-signing-business-contract-closeup.jpg"
                            class="avatar-image img-fluid" alt="">

                        <h2 class="text-white ms-4 mb-0">Services</h2>
                    </div>

                    <div class="row pt-lg-4">
            <?php foreach ($result as $service) { ?>
                <div class="col-lg-6 col-12">
                    <div class="services-thumb">
                        <div class="d-flex flex-wrap align-items-center border-bottom mb-4 pb-3">
                            <h3 class="mb-0"><?php echo $service['titre']; ?></h3>

                            <div class="services-price-wrap ms-auto">
                                <p class="services-price-text mb-0"><?php echo $service['prix']; ?> DH</p>
                                <div class="services-price-overlay"></div>
                            </div>
                        </div>

                        <?php echo "<p>" . substr($service['description'], 0, 100) . "...</p>"; ?>

                        <a href='srv-demande.php' class="custom-btn custom-border-btn btn mt-3">Discover
                            More</a>

                        <div class="services-icon-wrap d-flex justify-content-center align-items-center">
                            <i class="services-icon bi-globe"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
    </div>
</section>
    </section>
<?php include 'footer.php'; ?>

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