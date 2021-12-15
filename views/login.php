<?php 

$title = 'Connexion';

require '../assets/components/header.php';
require '../assets/components/navbar.php';
?>

<section class="container">
    <div style="margin-top:5%; margin-left:25%;">
        <h2>Connexion</h2>
        <p>Veuillez rentrer vos informations pour accéder au site</p>
        <form method="POST" action="./">
            <div class="w-50 form-group">
                <label for="" class="mb-2">E-Mail</label>
                <input type="email" name="email" placeholder="Courrier électronique" class="form-control" required>
            </div>
            <div class="w-50 form-group mt-3">
                <div class="d-flex justify-content-between">
                    <label class="mb-2">Mot de passe</label>
                    <small class="form-text text-muted">Entre 8 et 20 caractères de long.</small>
                </div>

                <input type="password" name="password" placeholder="Mot de passe..." class="form-control" required>
                
            </div>
            <p>
                <a class="form-text" href="<?= BASE_URL . '/forget_password.php' ?>">Mot de passe oublié ?</a>
            </p>

            <button type="submit" class="btn btn-primary w-50 mt-2">Connexion</button>
        </form>
    </div>
</section>

<?php 

require '../assets/components/footer.php';

?>