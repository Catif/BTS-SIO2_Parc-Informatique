<?php 
require dirname(__DIR__ , 2) . '/assets/components/header.php';

$title = "Mot de passe oublié";
$code = null;
$change_password = null;
$_SESSION['verification'] = null;

if(isset($_POST['email'])){
    $code = 12345;
    $_POST['verification'] = $code;
}

if($_POST['verification'] === $code){
    $_SESSION['verification'] = TRUE;
}

?>

<?php if(isset($code)): ?>
    <div class="container pb-3">
        <div class="d-flex justify-content-center">
            <div>
                <h2 class="text-center">Mot de passe oublié</h2>
                <p class="text-center">Inscrivez le code reçu par mail.</p>
                <form method="POST" action="./forget_password.php">
                    <div class="form-group">
                        <label class="mb-2">Code :</label>
                        <input type="number"  name="verification" placeholder="Code reçu par mail" class="form-control"  value ="<?= $code ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Confirmer</button>
                </form>
            </div>
        </div>
    </div>

<?php else: ?>
<div class="container pb-3">
    <div class="d-flex justify-content-center">
        <div>
            <h2 class="text-center">Mot de passe oublié</h2>
            <p class="text-center">Un code généré vous sera envoyé par mail pour pouvoir vous</br>créer un nouveau mot de passe.</p>
            <form method="POST" action="./forget_password.php">
                <div class="form-group">
                    <label class="mb-2">Email :</label>
                    <input type="email" name="email" placeholder="Email du compte" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Envoyer</button>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($_SESSION['verification']): ?>
    <div class="container pb-3">
    <div class="d-flex justify-content-center">
        <div>
            <h2 class="text-center">Changement de mot de passe</h2>
            <p class="text-center">Choisissez un nouveau mot de passe</p>
            <form method="POST" action="./forget_password.php">
                <div class="form-group">
                    <label class="mb-2">Nouveau mot de passe</label>
                    <input type="password" name="email" placeholder="Ecrivez un nouveau mot de passe" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="mb-2">Répéter votre nouveau mot de passe :</label>
                    <input type="password" name="email" placeholder="Votre mot de passe doit correspondre..." class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Changer</button>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php 

require dirname(__DIR__ , 2) . '/assets/components/footer.php';

?>