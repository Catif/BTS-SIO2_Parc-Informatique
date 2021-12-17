<?php
session_start();
$title = null;
$success = null;
$error = null;

require_once dirname(__DIR__,2) . '/config.php';
if($_SESSION['role'] === 'visitor'){
    header('Location: '. BASE_URL . '/');
    die();
}
require dirname(__DIR__ , 2) . '/assets/components/header.php';

if(isset($_POST['action'])){
    if($_POST['action'] === 'change_mail'){
        $query = $db->query("UPDATE utilisateur SET mail = :mail WHERE id_utilisateur = :id", [
            ":id" => $_SESSION['id_utilisateur'],
            ":mail" => $_POST['email']
        ]);
        $success = "Votre email à bien été mis à jour.";
    }
    if($_POST['action'] === 'change_password'){
        $query = $db->query('SELECT mot_de_passe FROM utilisateur WHERE id_utilisateur = :id', [
            ":id" => $_SESSION['id_utilisateur']
        ]);
        $password_db = $query->fetch()[0];
        if(password_verify($_POST['password_actuel'],$password_db)){
            if($_POST['new_password'] === $_POST['new_password_deux']){
                $query = $db->query("UPDATE utilisateur SET mot_de_passe = :mot_de_passe WHERE id_utilisateur = :id", [
                    ":id" => $_SESSION['id_utilisateur'],
                    ":mot_de_passe" => password_hash($_POST['new_password'], PASSWORD_DEFAULT)
                ]);
                $success = "Votre mot de passe à bien été mis à jour.";
            }else{
                $error = "Les deux mots de passes ne correspondent pas.";
            }
        } else {
            $error = "Mot de passe actuel rentré est incorrecte";
        }
    }
}


$query = $db->query("SELECT * FROM utilisateur WHERE id_utilisateur = :id", [
    ":id" => $_SESSION['id_utilisateur']
]);
$user = $query->fetch();

?>



<div class="container pb-4">
    <h2 class="text-center mb-4">Informations du compte</h2>

    <?php if($success !== null): ?>
        <div class="alert alert-success text-center">
            <?= $success ?>
        </div>
    <?php endif; ?>
    <?php if($error !== null): ?>
        <div class="alert alert-danger text-center">
            <?= $error ?>
        </div>
    <?php endif; ?>


    <div class="row">
        <div class="col-6">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="" class="mb-2">Prénom :</label>
                    <input type="text" name="prenom" value="<?= $user['PRENOM'] ?>" class="form-control " disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="" class="mb-2">Nom :</label>
                    <input type="text" name="nom" value="<?= $user['NOM'] ?>" class="form-control" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="" class="mb-2 ">E-Mail :</label>
                    <input type="email" name="email" value="<?= $user['MAIL'] ?>" class="form-control" required>
                </div>
                <?php if($_SESSION['role'] === 'user' && $_SESSION['type'] === 'Professeur'): ?>
                    <div class="form-group mt-3">
                        <label for="" class="mb-2">Classe :</label>
                        <input type="text" name="classe" value="<?= $user['CLASSE'] ?>" class="form-control" disabled>
                    </div>
                <?php endif; ?>
                <div class="text-center w-100">
                    <input type="hidden" name="action" value="change_mail">
                    <button type="submit" class="btn btn-primary mt-3">Sauvegarder</button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <div class="box px-5 pb-4">
                <form method="POST" action="">
                    <h3 class="text-center mb-4">Changer de mot de passe</h2>
                    <div class="form-group">
                        <label for="" class="mb-2">Mot de passe actuel :</label>
                        <input type="password" name="password_actuel" placeholder="Inscrivez votre mot de passe actuelle" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="mb-2">Nouveau mot de passe :</label>
                        <input type="password" name="new_password" placeholder="Ecrivez un nouveau mot de passe" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="mb-2">Répéter le nouveau mot de passe :</label>
                        <input type="password" name="new_password_deux" placeholder="Reécrivez votre nouveau mot de passe " class="form-control">
                    </div>
                    <div class="text-center w-100">
                        <input type="hidden" name="action" value="change_password">
                        <button type="submit" class="btn btn-primary mt-3">Changer de mot de passe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




























<?php 
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>