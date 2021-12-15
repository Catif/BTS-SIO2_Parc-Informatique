<?php 

$title = "Mot de passe oublié";

require dirname(__DIR__ , 2) . '/assets/components/header.php';
require dirname(__DIR__ , 2) . '/assets/components/navbar.php';

?>

<?php 

$access = false;

$email = new Email();


?>

<section class="container pb-3">
    <div class="d-flex justify-content-center">
        <div>
            <h2 class="text-center">Mot de passe oublié</h2>
            <p class="text-center">Un code généré vous sera envoyé par mail pour pouvoir vous</br>créer un nouveau mot de passe.</p>
            <form method="POST" action="./">
                <div class="form-group">
                    <label for="" class="mb-2">Email :</label>
                    <input type="email" name="email" placeholder="Email du compte" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Envoyer</button>
            </form>
        </div>
    </div>
</section>

<?php 

require dirname(__DIR__ , 2) . '/assets/components/footer.php';

?>