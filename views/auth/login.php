<?php 

$title = 'Connexion';

require dirname(__DIR__ , 2) . '/assets/components/header.php';
?>

<section class="container pb-3">
    <div class="d-flex justify-content-center">
        <div>
            <h2 class="text-center">Connexion</h2>
            <p>Veuillez rentrer vos informations pour accéder au site</p>
            <form method="POST" action="./">
                <div class="form-group">
                    <label for="" class="mb-2">E-Mail</label>
                    <input type="email" name="email" placeholder="Courrier électronique" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <div class="d-flex justify-content-between">
                        <label class="mb-2">Mot de passe</label>
                    </div>

                    <input type="password" name="password" placeholder="Mot de passe..." class="form-control" required>
                    
                </div>
                <p>
                    <a class="form-text" href="<?= BASE_URL . '/views/auth/forget_password.php'?>">Mot de passe oublié ?</a>
                </p>

                <button type="submit" class="btn btn-primary w-100 mt-2">Connexion</button>
            </form>
        </div>
    </div>
</section>

<?php 

require dirname(__DIR__ , 2) . '/assets/components/footer.php';

?>