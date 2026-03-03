<?php
session_start();
?>
<section class="preloader">
    <div class="spinner">
        <span class="spinner-rotate"></span>
    </div>
</section>
<!-- section header-->
<nav class="navbar navbar-expand-lg ">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="index.php" class="navbar-brand mx-auto mx-lg-0 text-danger">ARTISAN MAROC </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="categorie.php">categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="utilisateur.php">inscription</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="login.php">login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="contact.php">Contact</a>
                </li>
               
                    <li class="nav-item">
                         <?php if (  isset($_SESSION['email']) && $_SESSION['role'] =='artisan') { ?>
                        <a class="nav-link " href="artisan.php">Ajouter un service</a>
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