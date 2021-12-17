<?php 

require dirname(__DIR__ , 3) . '/assets/components/header.php';

if(isset($_POST['verification'])){
    header('Location: ./replace_pw.php');
}
?>

<div class="container pb-3">
        <div class="d-flex justify-content-center">
            <div>
                <h2 class="text-center">Mot de passe oublié</h2>
                <p class="text-center">Inscrivez le code reçu par mail.</p>
                <form method="POST" action="./send_code.php">
                    <div class="form-group">
                        <label class="mb-2">Code :</label>
                        <input type="number" name="verification" placeholder="Code reçu par mail" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Confirmer</button>
                </form>
            </div>
        </div>
    </div>

<?php 

require dirname(__DIR__ , 3) . '/assets/components/footer.php';

?>