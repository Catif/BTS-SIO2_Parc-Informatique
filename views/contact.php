<?php

$title = "Nous contacter";

require '../assets/components/header.php'; 
?>

<section class="container pb-3">
    <div class="d-flex justify-content-center">
        <div>
        <h2 class="text-center">Connexion</h2>
        <p>Veuillez rentrer vos informations pour accéder au site</p>
        <form method="POST" action="./contact.php">
            <div class="mb-3 form-group">
                <label for="" class="mb-2">Adresse électronique</label>
                <input type="email" name="email" placeholder="Entrez votre adresse mail" class="form-control" required>
            </div>
            <div class="mb-3 form-group">
                <label for="" class="mb-2">Adresse électronique :</label>
                <input type="text" name="name-firstname" placeholder="Entrez votre nom et prénom" class="form-control" required>
            </div>
            <div class="mb-3 form-group">
                <label for="" class="mb-2">Objet :</label>
                <input type="text" name="objet" placeholder="Votre objet" class="form-control" required>
            </div>
            <div class="mb-3 form-group">
                <label class="mb-2">Votre message :</label>
                <textarea class="form-control" name="message" placeholder="Décrire votre situation..." rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2 w-100">Envoyer</button>
        </form>
        </div>
    </div>
</section>

<?php require '../assets/components/footer.php'; ?>