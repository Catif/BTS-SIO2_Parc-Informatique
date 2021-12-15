<?php 

$title = 'S\'enregistrer';

require dirname(__DIR__ , 2) . '/assets/components/header.php';
require dirname(__DIR__ , 2) . '/assets/components/navbar.php';
?>

<section class="container pb-4 mb-5">
    <div class="d-flex justify-content-center">
      <div>
          <h2 class="text-center">S'enregistrer</h2>
          <p>Veuillez créer votre compte pour accéder au site</p>
          <form method="POST" action="./">
              <div class="form-group">
                  <label for="" class="mb-2">Prénom</label>
                  <input type="text" name="prenom" placeholder="Prénom" class="form-control" required>
              </div>
              <div class="form-group mt-3">
                  <label for="" class="mb-2">Nom</label>
                  <input type="text" name="nom" placeholder="Nom" class="form-control" required>
              </div>
              <div class="form-group mt-3">
                  <label for="" class="mb-2 ">E-Mail</label>
                  <input type="email" name="email" placeholder="Courrier électronique" class="form-control" required>
              </div>
              <div class="form-group mt-3">
                  <div class="d-flex justify-content-between">
                      <label class="mb-2">Mot de passe</label>
                      <small class="form-text text-muted">Entre 8 et 20 caractères de long.</small>
                  </div>
                  <input type="password" name="password" placeholder="Mot de passe..." class="form-control" required>
              </div>
              <div class="form-group mt-3">
                  <label for="" class="mb-2">Confirmation du mot de passe</label>
                  <input type="password" name="password" placeholder="Confirmer son mot de passe..." class="form-control" required>
              </div>
              <label class="form-group mt-3" for="">Classe</label>
                <select class="form-select" select>
                  <option selected>Choisir...</option>
                  <option value="1">SIO SLAM</option>
                  <option value="2">SIO SISR</option>
                  <option value="3">MCO</option>
                </select>
              <div class="form-group mt-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                  <label class="form-check-label" for="invalidCheck2" required>
                    J'accepte les termes de confidentialité
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100 mt-3">Confirmer</button>
          </form>
        </div>
    </div>
</section>

<?php 

require dirname(__DIR__ , 2) . '/assets/components/header.php';

?>