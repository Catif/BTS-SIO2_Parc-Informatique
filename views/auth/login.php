<?php 
session_start();
require dirname(__DIR__ , 2) . '/config.php';
if($_SESSION['role'] !== 'visitor'){
    if($_SESSION['role'] === 'reader'){
        header('Location: '. BASE_URL . '/views/panel/admin.php');
    } else{
        header('Location: '. BASE_URL . '/views/panel/equipement.php');
    }
    die();
}

$title = 'Connexion';

require dirname(__DIR__ , 2) . '/assets/components/header.php';

$erreur = null;

if(isset($_POST['email'], $_POST['password'])) {
    $query = $db->query('SELECT id_utilisateur, utilisateur.role, utilisateur.type, mot_de_passe FROM utilisateur WHERE mail = :mail', [
        ':mail' => $_POST['email'],
    ]);
    $user = $query->fetch();

    if($user === false){
        $erreur = 'Identifiant incorrect';
    } else{
        if(password_verify($_POST['password'], $user['mot_de_passe'])){
            $_SESSION['role'] = $user['role'];
            $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
            $_SESSION['type'] = $user['type'];
            if($user['role'] === 'user'){
                header('Location:'. BASE_URL .'/views/panel/equipement.php');
                exit();
            } else{
                header('Location:'. BASE_URL .'/views/panel/admin.php');
                exit();
            }
        } else {
            $erreur = "Identifiant ou mot de passe incorrect";
        }
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
                    <a class="form-text" href="<?= BASE_URL . '/views/auth/forget_pw/send_mail.php'?>">Mot de passe oublié ?</a>
                </p>

                <button type="submit" class="btn btn-primary w-100 mt-2">Connexion</button>
            </form>
        </div>
    </div>
</section>

<?php 

require dirname(__DIR__ , 2) . '/assets/components/footer.php';

?>