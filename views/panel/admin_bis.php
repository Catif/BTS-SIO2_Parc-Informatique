<?php 
session_start();
$error = null;
$title = 'Ajout d\'équipement';
require dirname(__DIR__ , 2) . '/assets/components/header.php';


if($_SESSION['role'] === 'visitor' || $_SESSION['role'] === 'user'){
    header('Location: '. BASE_URL . '/');
    die();
}

$results = null;
if(isset($_GET['action'])){
    if(isset($_POST['option'])){
        if( $_POST['option'] === 'create-classe'){
            $query = $db->query("INSERT INTO classe (classe) 
            VALUES ( :classe )",
            [
            ':classe' => $_POST['classe']
            ]);
        }
        if($_POST['option'] === 'delete'){
            $query = $db->query("DELETE FROM classe WHERE classe = :id",[
                ':id' => $_POST['id']
            ]);
        }
    }


    if($_GET['action'] === 'utilisateur'){
        if(isset($_POST['id'], $_POST['option'])){
            if($_POST['option'] === 'delete'){
                $query = $db->query("DELETE FROM utilisateur WHERE id_utilisateur = :id",[
                    ':id' => $_POST['id']
                ]);
            }
        }

        if(!isset($_POST['search'])){
            $query = $db->query("SELECT * FROM utilisateur WHERE utilisateur.type = :type LIMIT 30",[
                ':type' => $_GET['recherche_type']
            ]);
            $results = $query->fetchAll();
        }else{
            $_POST['search'] = '%'. $_POST['search'] . '%';
            $query = $db->query("SELECT * FROM utilisateur WHERE utilisateur.type = :type AND (utilisateur.nom LIKE :search  OR utilisateur.prenom LIKE :search ) LIMIT 30",[
                ':type' => $_GET['recherche_type'],
                ':search' => $_POST['search'],
            ]);
            $results = $query->fetchAll();
        }
    } elseif($_GET['action'] === 'classes' || $_GET['action'] === 'compte'){
        $query = $db->query("SELECT * FROM classe",[]);
        $results = $query->fetchAll();
    }
    if(isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password'], $_POST['classe'], $_POST['role'])){
        $type = null;
        switch($_POST['role']){
            case 'Etudiant':
                $role = 'user'; break;
            case 'Professeur':
            case 'Administration':
            case 'RegionEst':
                $role = 'reader'; break;
            case 'Administrateur':
                $role = 'admin'; break;
        }
        $query = $db->query("INSERT INTO utilisateur (classe, type, nom, prenom, mail, mot_de_passe, role) 
        VALUES (:classe, :type, :nom, :prenom, :mail, :mot_de_passe, :role)",
        [
          ':classe' => !empty($_POST['classe']) ? $_POST['classe'] : null,
          ':type' => $_POST['role'],
          ':nom' => strtoupper($_POST['nom']),
          ':prenom' => ucfirst(strtolower($_POST['prenom'])),
          ':mail' => strtolower($_POST['email']),
          ':mot_de_passe' => password_hash($_POST['password'], PASSWORD_DEFAULT),
          ':role' => $role
        ]);
      }
}
?>
<!-- <?php
echo('<pre>');
var_dump($results);
echo('</pre>');
?> -->

<div class="container">
    <?php if(isset($_GET['action'])): ?>  
        <?php if($_GET['action'] === 'utilisateur' || $_GET['action'] === 'classes'): ?>
        
            <div class="d-flex justify-content-center">
                <div class="col-6 mb-5">
                    <h2 class="text-center mb-3">Parc Informatique : <?= isset($_GET['recherche_type']) ? $_GET['recherche_type'] : 'Classes' ?></h2>
                    <?php if($_GET['action'] === 'classes'): ?>
                        <div class="form-group">
                            <form action="" method="post">
                                <label class="mt-3">Création d'une classe :</label>
                                <div class="row">
                                    <div class="col-8">
                                        <input type="text" name="classe" class="form-control" placeholder="Nom de la classe">
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-primary w-100" type="submit">Créer la classe</button>
                                        <input type="hidden" name="option" value="create-classe">
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                    <?php if($_GET['action'] === 'utilisateur'): ?>
                        <div class="form-group">
                            <form action="" method="post">
                                <label class="mt-3">Recherche :</label>
                                <div class="row">
                                    <div class="col-8">
                                        <input type="text" name="search" class="form-control" placeholder="Nom ou prénom de la personne" autocomplete="off" required>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-primary w-100" type="submit">Faire une recherche</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>


                    <table class="table table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <?php if($_GET['action'] !== 'classes'): ?>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Nom</th>
                                <?php endif; ?>
                                <th scope="col">Classe</th>
                                <?php if(isset($_GET['recherche_type']) && $_GET['recherche_type'] === 'Etudiant'):?>
                                    <th scope="col">Editer</th>
                                <?php endif; ?>
                                <th scope="col d-flex justify-content-center">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($results as $result): ?>
                                <tr>
                                <?php
                                    if(isset($result['ID_UTILISATEUR'])){
                                        $id = $result['ID_UTILISATEUR'];
                                    } elseif(isset($result['CLASSE'])){
                                        $id = $result['CLASSE'];
                                    }
                                ?>
                                <?php if($_GET['action'] !== 'classes'): ?>
                                    <th><?= $result['PRENOM'] ?></th>
                                    <td><?= $result['NOM'] ?></td>
                                <?php endif; ?>
                                    <td><?= $result['CLASSE'] ?></td>
                                    <?php if(isset($_GET['recherche_type']) && $_GET['recherche_type'] === 'Etudiant'):?>
                                        <td>
                                            <a href="./equipement.php?id=<?= $id ?>"><i class="bi bi-pencil-fill me-2"></i>Editer</a>
                                        </td>
                                    <?php endif; ?>
                                    <td>
                                        <form action="" method="POST">
                                            <button class="btn btn-light w-100"><i class="bi bi-trash-fill me-2"></i></button>
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <input type="hidden" name="option" value="delete">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php elseif($_GET['action'] === 'compte'): ?>
            <h2 class="text-center mb-3">Création de compte</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <form method="POST" action=""> 
                      <div class="form-group">
                          <label for="" class="mb-2">Prénom :</label>
                          <input type="text" name="prenom" placeholder="Prénom" class="form-control" required>
                        </div>
                      <div class="form-group mt-3">
                          <label for="" class="mb-2">Nom :</label>
                          <input type="text" name="nom" placeholder="Nom" class="form-control" required>
                      </div>
                      <div class="form-group mt-3">
                          <label for="" class="mb-2 ">E-Mail :</label>
                          <input type="email" name="email" placeholder="Courrier électronique" class="form-control" required>
                      </div>
                      <div class="form-group mt-3">
                          <div class="d-flex justify-content-between">
                              <label class="mb-2">Mot de passe :</label>
                          </div>
                          <input type="password" name="password" placeholder="Mot de passe..." class="form-control" required>
                      </div>
                      <div class="form-group mt-3">
                        <label class="form-group" for="">Classe :</label>
                        <select class="form-select" name="classe">
                            <option value="">Choisir...</option>
                            <?php foreach($results as $result): ?>
                                <option value="<?= $result['CLASSE'] ?>"><?= $result['CLASSE'] ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group mt-3">
                        <label class="form-group" for="">Role :</label>
                        <select class="form-select" name="role" required>
                            <option value="">Choisir...</option>
                            <option value="Etudiant">Etudiant</option>
                            <option value="Professeur">Professeur</option>
                            <option value="Administration">Administration</option>
                            <option value="RegionEst">Region Grand Est</option>
                            <option value="Administrateur">Administrateur</option>
                        </select>
                      </div>
                      <input type="hidden" name="option" value="create-user">
                      <button type="submit" class="btn btn-primary w-100 mt-3">Confirmer</button>
                  </form>
                </div>
            </div>

        <?php else: ?>

        <div class="alert alert-danger text-center">Vous n'avez pas sélectionner d'option.<br>Veuillez cliquer <a href="./admin.php">ici</a> pour vous rediriger vers votre tableau de bord.</div>

        <?php endif; ?>
    <?php else: ?>

        <div class="alert alert-danger text-center">Il semble que l'action que vous avez essayé d'effectuer, n'est pas accepté.<br>Veuillez cliquer <a href="./admin.php"> ici</a> pour vous rediriger vers votre tableau de bord.</div>

    <?php endif; ?>
</div>




<?php
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>