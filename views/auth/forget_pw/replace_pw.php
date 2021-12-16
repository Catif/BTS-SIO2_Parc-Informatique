<?php 

require dirname(__DIR__ , 3) . '/assets/components/header.php';

$error = null;

if(isset($_POST['password'], $_POST['confirm_password'])){
    if($_POST['password'] === $_POST['confirm_password']){
    header('location:' . BASE_URL . '/views/auth/login.php');
    } else {
        $error = 'Les valeurs ne correspondent pas.';
    }
}

?>

<div class="container pb-3">
    <div class="d-flex justify-content-center">
        <div>
            <h2 class="text-center">Changement de mot de passe</h2>
            <p class="text-center">Choisissez un nouveau mot de passe</p>
            <form method="POST" action="./replace_pw.php">
                <?php if($error !== null): ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <label class="mb-2">Nouveau mot de passe</label>
                    <input type="password" name="password" placeholder="Ecrivez un nouveau mot de passe" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="mb-2 mt-3">Répéter votre nouveau mot de passe :</label>
                    <input type="password" name="confirm_password" placeholder="Votre mot de passe doit correspondre..." class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Changer</button>
            </form>
        </div>
    </div>
</div>

<?php 

require dirname(__DIR__ , 3) . '/assets/components/footer.php';

?>