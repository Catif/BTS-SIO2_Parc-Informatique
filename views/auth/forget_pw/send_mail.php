<?php 

require dirname(__DIR__ , 3) . '/assets/components/header.php';

if(isset($_POST['email'])){
    header('Location: ./send_code.php'); 
}
?>



<div class="container pb-3">
    <div class="d-flex justify-content-center">
        <div>
            <h2 class="text-center">Mot de passe oublié</h2>
            <p class="text-center">Un code généré vous sera envoyé par mail pour pouvoir vous</br>créer un nouveau mot de passe.</p>
            <form method="POST" action="./send_mail.php">
                <div class="form-group">
                    <label class="mb-2">Email :</label>
                    <input type="email" name="email" placeholder="Email du compte" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Envoyer</button>
            </form>
        </div>
    </div>
</div>

<?php 

require dirname(__DIR__ , 3) . '/assets/components/footer.php';

?>