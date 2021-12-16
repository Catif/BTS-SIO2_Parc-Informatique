<?php 

$title = 'S\'enregistrer';

require dirname(__DIR__ , 2) . '/assets/components/header.php';

$query = $db->query("SELECT * FROM classe", []);
$classes = $query->fetchAll();

$different_password = null;

if(isset($_POST['password'])){
  if($_POST['password'] === $_POST['confirmpassword']){
    if(isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password'], $_POST['select'])){
      $query = $db->query("INSERT INTO utilisateur (classe, type, nom, prenom, mail, mot_de_passe, role) VALUES (:classe, 'Etudiant', :nom, :prenom, :mail, :mot_de_passe, 'user')",
      [
        ':classe' => $_POST['select'],
        ':nom' => strtoupper($_POST['nom']),
        ':prenom' => ucfirst(strtolower($_POST['prenom'])),
        ':mail' => strtolower($_POST['email']),
        ':mot_de_passe' => password_hash($_POST['password'], PASSWORD_DEFAULT)
      ]);
    }
    require_once dirname(__DIR__, 2) . '/config.php';
    $_SESSION['role'] = 'user';
    $_SESSION['id_utilisateur'] = $db->returnLastInsertId();
    header('location:' . BASE_URL . '/views/panel/equipement.php');
    die();
  } else {
    $different_password = 'Les mots de passes ne correspondent pas !';
  } 
}
?>

<section class="container pb-4 mb-5">
    <div class="d-flex justify-content-center">
      <div>
      <div class="form-group">
          <h2 class="text-center">S'enregistrer</h2>
          <p>Veuillez créer votre compte pour accéder au site</p>
          <form method="POST" action="./register.php">
            <?php if($different_password !== null): ?>
              <div class="alert alert-danger">
                  <?= $different_password ?>
              </div>
            <?php endif; ?>  
              <div class="form-group">
                  <label for="" class="mb-2">Prénom</label>
                  <input type="text" name="prenom" placeholder="Prénom" class="form-control" value = "<?= isset($_POST['prenom']) ? $_POST['prenom']: '';?>" required>
                </div>
              <div class="form-group mt-3">
                  <label for="" class="mb-2">Nom</label>
                  <input type="text" name="nom" placeholder="Nom" class="form-control" value = "<?= isset($_POST['nom']) ? $_POST['nom']: '';?>" required>
              </div>
              <div class="form-group mt-3">
                  <label for="" class="mb-2 ">E-Mail</label>
                  <input type="email" name="email" placeholder="Courrier électronique" class="form-control" value = "<?= isset($_POST['email']) ? $_POST['email']: '';?>" required>
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
                  <input type="password" name="confirmpassword" placeholder="Confirmer son mot de passe..." class="form-control" required>
              </div>
              <label class="form-group mt-3" for="">Classe</label>
                <select class="form-select" name="select"?>" select>
                  <?php foreach($classes as $classe): ?>
                 <option value="<?= $classe['CLASSE'] ?>"><?= $classe['CLASSE'] ?></option>
                <?php endforeach; ?>
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

require dirname(__DIR__ , 2) . '/assets/components/footer.php';

?>