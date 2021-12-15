<nav class="navbar navbar-expand-lg navbar-light mb-4">
    <p class="navbar-brand ms-2">Parc informatique - Lycée Frédéric Chopin</p>
    <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav mx-auto text-center">
            <a href="<?= BASE_URL .'/' ?>" class="nav-link active">Accueil</a>
            <a href="<?= BASE_URL .'/views/contact.php' ?>" class="nav-link">Nous contacter</a>
        </div>
        <div class="navbar-nav ml-auto">
            <a href='<?= BASE_URL .'/views/auth/login.php' ?>' class="btn btn-primary mx-2">Connexion</a>
            <a href='<?= BASE_URL .'/views/auth/register.php' ?>' class="btn btn-light mx-2">Enregistement</a>
        </div>
    </div>
</nav>