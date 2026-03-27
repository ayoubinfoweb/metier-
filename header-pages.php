</head>
<section class="preloader">
    <div class="spinner">
        <span class="spinner-rotate"></span>
    </div>
</section>
<!-- section header-->
<nav class="navbar navbar-expand-lg bg-success">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="index.php" class="navbar-brand mx-auto mx-lg-0 text-danger">ARTISAN MAROC</a>



        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5">
                <li class="nav-item">
                    <a class="nav-link " href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <?php if ((!isset($_SESSION['email']) || isset($_SESSION['email']) && $_SESSION['role'] == 'client')) { ?>
                        <a class="nav-link" href="services.php">services</a>
                    <?php } ?>
                </li>

                <li class="nav-item">
                    <?php if (!isset($_SESSION['email'])) { ?>
                        <a class="nav-link" href="utilisateur.php">inscription</a>
                    <?php } ?>
                </li>

                <li class="nav-item">
                    <?php if (!isset($_SESSION['email'])) { ?>
                        <a class="nav-link " href="login.php">login</a>
                    <?php } ?>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="contact.php">Contact</a>
                </li>

                <li class="nav-item">
                    <?php if (isset($_SESSION['email']) && $_SESSION['role'] == 'artisan') { ?>
                        <a class="nav-link" href="srv-remplire.php">Ajouter un service</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['email']) && !isset($_SESSION['artisan_id'])  && $_SESSION['role'] == 'artisan') { ?>
                        <a class="nav-link " href="artisan.php">plus de formatoin</a>
                    <?php } ?>
                </li>
                
                <li class="nav-item">
                    <?php if (isset($_SESSION['email']) && $_SESSION['role'] == 'artisan') { ?>
                        <a class="nav-link " href="Aartisan.php">gerer votre demande</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['email']) && $_SESSION['role'] == 'client') { ?>
                        <a class="nav-link " href="Sclient.php">votre demande</a>
                    <?php } ?>
                </li>

                <li class="nav-item">
                    <?php if (isset($_SESSION['email'])) { ?>
                        <a class="nav-link" href="logout.php">Déconnexion</a>
                    <?php } ?>
                </li>
            </ul>

        </div>

    </div>
</nav>