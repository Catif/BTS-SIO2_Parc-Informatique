<nav class="navbar navbar-expand-lg navbar-light mb-4">
    <p class="navbar-brand ms-2">Parc Informatique</p>
    <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav mx-auto text-center">
            <?php if($_SESSION['role'] === 'visitor'): ?>
                <a href="<?= BASE_URL .'/' ?>" class="nav-link">Accueil</a>
            <?php endif; ?>
            <?php if($_SESSION['role'] === 'user'): ?>
                <a href="<?= BASE_URL .'/views/panel/equipement.php' ?>" class="nav-link">Mes équipement</a>
            <?php endif; ?>
            <?php if($_SESSION['role'] === 'reader'): ?>
                <a href="<?= BASE_URL .'/views/panel/admin.php' ?>" class="nav-link">Visualisation</a>
            <?php endif; ?>
            <?php if($_SESSION['role'] === 'admin'): ?>
                <a href="<?= BASE_URL .'/views/panel/admin.php' ?>" class="nav-link">Administration</a>
            <?php endif; ?>
            <?php if($_SESSION['role'] !== 'visitor'): ?>
                <a href="<?= BASE_URL .'/views/panel/account.php' ?>" class="nav-link">Mon compte</a>
            <?php endif; ?>
            <?php if($_SESSION['role'] !== 'admin'): ?>
                <a href="<?= BASE_URL .'/views/contact.php' ?>" class="nav-link">Nous contacter</a>
            <?php endif; ?>
        </div>
        <div class="navbar-nav ml-auto">
            <?php if($_SESSION['role'] === 'visitor'): ?>
                <a href='<?= BASE_URL .'/views/auth/login.php' ?>' class="btn btn-primary mx-2">Connexion</a>
                <a href='<?= BASE_URL .'/views/auth/register.php' ?>' class="btn btn-light mx-2">Enregistement</a>
            <?php endif; ?>
            <?php if($_SESSION['role'] !== 'visitor'): ?>
                <a href='<?= BASE_URL .'/views/auth/logout.php' ?>' class="btn btn-light mx-2">Deconnexion</a>
            <?php endif; ?>
        </div>
    </div>
</nav>