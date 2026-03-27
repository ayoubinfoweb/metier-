<?php
session_start();
include 'connexion.php';

$artisan_id = $_POST['artisan_id'];
$_SESSION['artisan_id'] = $artisan_id;


$stmt = $conn->prepare("
        SELECT 
            utilisateurs.nom,
            utilisateurs.prenom,
            utilisateurs.email,
            utilisateurs.role,
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
        SELECT titre,
         description,
          prix,
          image,
          id
        FROM services
        WHERE artisan_id = ?
    ");
$stmt1->bind_param("i", $artisan_id);
$stmt1->execute();
$result1 = $stmt1->get_result();
$services = $result1->fetch_assoc(); // 🔥 une seule ligne   


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
            <h2 class="text-white me-4 mb-0">mon service</h2>

            <img src="<?php echo htmlspecialchars($services['image']); ?>" class="avatar-image img-fluid" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                    <div class="about-thumb">
                        <h3 class="pt-2 mb-3">
                            a little bit about
                            <span class="text-success">
                                <?php echo htmlspecialchars($artisan['nom'] . " " . $artisan['prenom']); ?>
                            </span>
                        </h3>
                        <p>adresse : <?php echo htmlspecialchars($artisan['adresse']); ?></p>
                        <p>ville : <?php echo htmlspecialchars($artisan['ville']); ?></p>
                        <p>email : <?php echo htmlspecialchars($artisan['email']); ?></p>
                        <br><br>
                        <p>description : </p>
                        <?php echo htmlspecialchars($services['description']); ?>
                    </div>
                </div>

                <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                    <div class="about-thumb">
                        <div class="row">
                            <div class="col-lg-6 col-6 featured-border-bottom py-2">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bouton POST vers Dconfermer.php sans passer l'id dans l'URL -->
        <div class="text-center mt-4">
            <form action="Dconfermer.php" method="POST">

                <input type="hidden" name="service_id" value="<?php echo $services['id']; ?>">

                <button type="submit" class="custom-btn mt-auto">
                    Demander ce service
                </button>

            </form>
        </div>

    </section>
    <!-- SECTION AVIS -->
<div class="container mt-5">

    <h4 class="text-white mb-4">⭐ Avis des clients</h4>

    <!-- Zone d'affichage des avis -->
    <div id="avis-container">
        <?php
        $stmt_avis = $conn->prepare("
            SELECT avis.note, avis.commentaire, utilisateurs.nom, utilisateurs.prenom
            FROM avis
            JOIN utilisateurs ON avis.client_id = utilisateurs.id
            WHERE avis.artisan_id = ?
            ORDER BY avis.id DESC
        ");
        $stmt_avis->bind_param("i", $artisan_id);
        $stmt_avis->execute();
        $result_avis = $stmt_avis->get_result();

        if ($result_avis->num_rows === 0): ?>
            <p class="text-muted" id="no-avis">Aucun avis pour cet artisan pour l'instant.</p>
        <?php else:
            while ($avis = $result_avis->fetch_assoc()): ?>
                <div class="card text-white mb-3 p-3 rounded"
                     style="background-color:#1a5c2a; border-left:5px solid #c0392b;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong style="color:#ff6b6b;">
                            <?php echo htmlspecialchars($avis['nom'] . ' ' . $avis['prenom']); ?>
                        </strong>
                        <span class="fs-5" style="color:#ffc107;">
                            <?php echo str_repeat('★', $avis['note']) . str_repeat('☆', 5 - $avis['note']); ?>
                        </span>
                    </div>
                    <p class="mb-0 text-white"><?php echo htmlspecialchars($avis['commentaire']); ?></p>
                </div>
            <?php endwhile;
        endif; ?>
    </div>

    <!-- Formulaire -->
    <?php if (isset($_SESSION['utilisateur_id']) && $_SESSION['role'] === 'client'): ?>
        <h4 class="text-white mt-5 mb-3">✍️ Laisser un avis</h4>
        <div class="card text-white p-4 rounded"
             style="background-color:#c0392b; border-left:5px solid #1a5c2a;">
            <form id="form-avis">
                <input type="hidden" name="artisan_id" value="<?php echo $artisan_id; ?>">
                <input type="hidden" name="client_id" value="<?php echo $_SESSION['utilisateur_id']; ?>">

                <!-- Note -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Note</label>
                    <div class="d-flex gap-2 fs-4" id="star-rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <span class="star" data-value="<?php echo $i; ?>"
                                  style="cursor:pointer; color:#6c757d;">★</span>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" name="note" id="note-value" required>
                </div>

                <!-- Commentaire -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Commentaire</label>
                    <textarea name="commentaire" id="commentaire" rows="4"
                              placeholder="Votre avis..." required
                              style="width:100%; background-color:#1a5c2a; color:white;
                                     border:none; border-bottom:2px solid #1a5c2a;
                                     border-radius:6px; padding:10px;"></textarea>
                </div>

                <button type="submit" class="btn fw-bold px-4 py-2"
                        style="background-color:#1a5c2a; color:white; border:none; border-radius:8px;">
                    Envoyer mon avis
                </button>

                <!-- Message retour -->
                <div id="msg-retour" class="mt-3 fw-bold"></div>
            </form>
        </div>
    <?php elseif (!isset($_SESSION['utilisateur_id'])): ?>
        <p class="mt-4" style="color:#ff6b6b;">
            <a href="login.php" style="color:#2ecc71; font-weight:bold;">Connectez-vous</a>
            pour laisser un avis.
        </p>
    <?php endif; ?>

</div>

<!-- Script étoiles + AJAX -->
<script>
    // ⭐ Étoiles
    const stars = document.querySelectorAll('.star');
    const noteInput = document.getElementById('note-value');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const val = star.dataset.value;
            noteInput.value = val;
            stars.forEach(s => {
                s.style.color = s.dataset.value <= val ? '#ffc107' : '#6c757d';
            });
        });
        star.addEventListener('mouseover', () => {
            stars.forEach(s => {
                s.style.color = s.dataset.value <= star.dataset.value ? '#ffc107' : '#6c757d';
            });
        });
        star.addEventListener('mouseout', () => {
            const current = noteInput.value;
            stars.forEach(s => {
                s.style.color = current && s.dataset.value <= current ? '#ffc107' : '#6c757d';
            });
        });
    });

    // 📨 AJAX submit
    const formAvis = document.getElementById('form-avis');
    if (formAvis) {
        formAvis.addEventListener('submit', function(e) {
            e.preventDefault(); // ❌ Empêche le rechargement

            const formData = new FormData(this);
            const msg = document.getElementById('msg-retour');

            fetch('soumettre_avis.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // ✅ Ajouter le nouvel avis en haut sans recharger
                    const container = document.getElementById('avis-container');
                    const noAvis = document.getElementById('no-avis');
                    if (noAvis) noAvis.remove();

                    const newCard = `
                        <div class="card text-white mb-3 p-3 rounded"
                             style="background-color:#1a5c2a; border-left:5px solid #c0392b;">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <strong style="color:#ff6b6b;">${data.nom} ${data.prenom}</strong>
                                <span class="fs-5" style="color:#ffc107;">${data.etoiles}</span>
                            </div>
                            <p class="mb-0 text-white">${data.commentaire}</p>
                        </div>`;

                    container.insertAdjacentHTML('afterbegin', newCard);

                    // Reset formulaire
                    formAvis.reset();
                    stars.forEach(s => s.style.color = '#6c757d');
                    noteInput.value = '';

                    msg.style.color = '#2ecc71';
                    msg.textContent = '✅ Avis envoyé avec succès !';
                } else {
                    msg.style.color = '#ff6b6b';
                    msg.textContent = '❌ Erreur : ' + data.error;
                }

                setTimeout(() => msg.textContent = '', 3000);
            });
        });
    }
</script>



    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <script src="js/custom.js"></script>

</body>
<footer>
    <div class="container">
        <p class="text-center">&copy; 2023 Mon Site. Tous droits réservés.</p>
    </div>
</footer>

</html>