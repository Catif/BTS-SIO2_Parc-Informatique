<?php 

$title = 'S\'enregistrer';

require '../assets/components/header.php';
require '../assets/components/navbar.php';
?>

<section class="container">
    <div style="margin-top:5%; margin-left:25%;">
        <h2>S'enregistrer</h2>
        <p>Veuillez créer votre compte pour accéder au site</p>
        <form method="POST" action="">
            <div class="w-50 form-group">
                <label for="" class="mb-2">Prénom</label>
                <input type="text" name="prenom" placeholder="Prénom" class="form-control" required>
            </div>
            <div class="w-50 form-group">
                <label for="" class="mb-2">Nom</label>
                <input type="text" name="nom" placeholder="Nom" class="form-control" required>
            </div>
            <div class="w-50 form-group">
                <label for="" class="mb-2 mt-3">E-Mail</label>
                <input type="email" name="email" placeholder="Courrier électronique" class="form-control" required>
            </div>
            <div class="w-50 form-group mt-3">
                <label for="" class="mb-2">Mot de passe</label>
                <input type="password" name="password" placeholder="Mot de passe..." class="form-control" required>
                <small id="passwordHelpBlock" class="form-text text-muted">
                Entre 8 et 20 caractères de long.
                </small>
            </div>
            <div class="w-50 form-group mt-3">
                <label for="" class="mb-2">Confirmation du mot de passe</label>
                <input type="password" name="password" placeholder="Confirmer son mot de passe..." class="form-control" required>
            </div>
            <label class="w-50 form-group" for="">Classe</label>
              <select class="custom-select w-50 id="select">
                <option selected>Choisir...</option>
                <option value="1">SIO</option>
              </select>
            <div class="form-group mt-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2" required>
                  J'accepte les termes de confidentialité
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary w-50 mt-2">Confirmer</button>
        </form>
    </div>
</section>

<?php 

require '../assets/components/header.php';

?>