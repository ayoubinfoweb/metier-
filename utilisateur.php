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
    <div class="row justify-content-center">
        <a href="index.php" class="navbar-brand mx-auto text-center text-danger">ARTISAN MAROC</a>
    </div>


    <!-- Formulaire inscription -->
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5">

            <div class="card shadow-lg">
                <div class="card-header bg-success text-white text-center">
                    <h4>Créer un compte</h4>
                </div>

                <div class="card-body">

                    <form action="code-utilisateur.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" placeholder="Votre nom" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prénom</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Votre prénom" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Votre email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mdp</label>
                            <input type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rôle</label>
                            <select name="role" class="form-select" required>
                                <option value="">Choisir...</option>
                                <option value="client" name="client">Client</option>
                                <option value="artisan" name="artisan">Artisan</option>
                                <option value="admin" name="admin">Admin</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">S'inscrire</button>
                        </div>

                        <p class="mt-3 text-center">Déjà inscrit ?
                            <a href="login.php" class="text-link">Connectez-vous</a>
                        </p>

                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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