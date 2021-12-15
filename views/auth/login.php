<?php 


$title = 'Connexion';

require dirname(__DIR__ , 2) . '/assets/components/header.php';

$erreur = null;

if(isset($_POST['email'], $_POST['password'])) {
    $query = $db->query('SELECT id_utilisateur, utilisateur.role  FROM utilisateur WHERE mail = :mail AND mot_de_passe = :mot_de_passe', [
        ':mail' => $_POST['email'],
        ':mot_de_passe' => $_POST['password']
    ]);
    $user = $query->fetch();
    if($user !== false){
        $_SESSION['role'] = $user->role;
        $_SESSION['id_utilisateur'] = $user->id_utilisateur;
        header('Location:'. BASE_URL .'/views/panel/equipement.php');
        exit();
    } else {
        $erreur = "Identifiant ou mot de passe incorrect";
    }
}
?>

<section class="container pb-3">
    <div class="d-flex justify-content-center">
        <div>
            <h2 class="text-center">Connexion</h2>
            <p>Veuillez rentrer vos informations pour accéder au site</p>
            <form method="POST" action="./login.php">
                <div class="form-group">
                    <?php if($erreur): ?>
                    <div class="alert alert-danger">
                        <?= $erreur ?>
                    </div>
                    <?php endif ?>
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