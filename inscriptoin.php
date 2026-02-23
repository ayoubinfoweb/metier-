<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTISAN MAROC - Inscription</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="css/style-insc_login.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-success navbar-dark py-3">
        <div class="container">
            <a href="index.php" class="navbar-brand mx-auto text-danger">ARTISAN MAROC</a>
        </div>
    </nav>

    <!-- Formulaire inscription -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5">

                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Créer un compte</h4>
                    </div>

                    <div class="card-body">

                        <form action="code-insertoin.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" placeholder="Votre nom" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Prénom</label>
                                <input type="text" name="prenom" class="form-control" placeholder="Votre prénom"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Votre email"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mdp</label>
                                <input type="password" name="mot_de_passe" class="form-control"
                                    placeholder="Mot de passe" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Rôle</label>
                                <select name="role" class="form-select" required>
                                    <option value="">Choisir...</option>
                                    <option value="client">Client</option>
                                    <option value="artisan">Artisan</option>
                                    <option value="admin">Admin</option>
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
<?php include 'footer.php'; ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>