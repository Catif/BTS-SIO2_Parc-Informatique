<?php 
$show_tab = false;
$error = null;
$title = 'Tableau de bord - Parc Informatique';
require dirname(__DIR__ , 2) . '/assets/components/header.php';


if($_SESSION['role'] === 'visitor' || $_SESSION['role'] === 'user'){
    header('Location: '. BASE_URL . '/');
    die();
}

$title = null;
$results = null;
if(isset($_GET['possede'])){
    $possede = $_GET['possede'];
    $categorie = $_GET['categorie'];
    $show_tab = true;
    $table = $_GET['q'];

    $sql_classe = '';
    if(isset($_GET['classe'])){
        $classe = $_GET['classe'];
        $sql_classe = '&& utilisateur.classe like "%' . $classe.'%"';
    }

    $query = null;
    if($categorie === 'appareil'){
        if($possede === '1'){
            $title = 'Liste des élèves possédant des ' . $_GET['name'] . ' :'; 
            $query = $db->query("SELECT PRENOM, NOM, CLASSE FROM utilisateur WHERE EXISTS ( SELECT $table.id_utilisateur FROM $table where utilisateur.id_utilisateur = $table.id_utilisateur) && TYPE = 'Etudiant' $sql_classe", []);
        } else {
            $title = 'Liste des élèves ne possédant pas de ' . $_GET['name'] . ' :'; 
            $query = $db->query("SELECT PRENOM, NOM, CLASSE FROM utilisateur WHERE NOT EXISTS ( SELECT $table.id_utilisateur FROM $table where utilisateur.id_utilisateur = $table.id_utilisateur) && TYPE = 'Etudiant' $sql_classe", []);
        }
    } elseif ($categorie === 'detient'){
        $query = $db->query("SELECT PRENOM, NOM, CLASSE FROM utilisateur INNER JOIN $categorie ON $categorie.id_utilisateur = utilisateur.id_utilisateur WHERE utilisateur.type = 'Etudiant' && $categorie.$table = $possede", []);
        if($possede === '1'){
            $title = 'Liste des élèves possédant de ' . $_GET['name'] . ' :'; 
        } else{
            $title = 'Liste des élèves ne possédant pas de ' . $_GET['name'] . ' :'; 
        }
    }
    $results = $query -> fetchAll();
    $success='Affichage de '. count($results) .' éléments.';
}


?>
<div class="container pb-4">

        <?php if($show_tab): ?>
            <h2 class="text-center pt-4 mb-4"><?= $title ?></h2>
            <?php if($success !== null): ?>
                <div class="alert alert-success text-center">
                    <?= $success ?>
                </div>
            <?php endif; ?>
            <?php if($error !== null): ?>
                <div class="alert alert-danger text-center">
                    <?= $error ?>
                </div>
            <?php endif; ?>

                <div class="d-flex justify-content-center">
                    <div class="col-8">
                        <form action="">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 row">
                                    <label>Choisir une classe :</label>
                                    <div class="col-8">
                                        <input type="hidden" name="categorie" value="<?= $_GET['categorie'] ?>">
                                        <input type="hidden" name="q" value="<?= $_GET['q'] ?>">
                                        <input type="hidden" name="name" value="<?= $_GET['name'] ?>">
                                        <input type="hidden" name="possede" value="<?= $_GET['possede'] ?>">
                                        <input type="text" class="form-control" name="classe" placeholder="Nom de la classe à rechercher...">
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped table-hover mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Classe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($results as $result): ?>
                                    <tr>
                                        <th><?= $result['PRENOM'] ?></th>
                                        <td><?= $result['NOM'] ?></td>
                                        <td><?= $result['CLASSE'] ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php else: ?>
                        <h2 class="text-center pt-4 mb-4">Voir la liste des étudiants pour les <?= $_GET['name'] ?></h2>
                        <div class="d-flex justify-content-center">
                            <div class="row w-100">
                                <div class="col-6">
                                    <form action=''>
                                        <input type="hidden" name="categorie" value="<?= $_GET['categorie'] ?>">
                                        <input type="hidden" name="q" value="<?= $_GET['q'] ?>">
                                        <input type="hidden" name="name" value="<?= $_GET['name'] ?>">
                                        <input type="hidden" name="possede" value="0">
                                        <button type="submit" class="btn btn-secondary w-100">Etudiant ne possédant pas</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form action=''>
                                        <input type="hidden" name="categorie" value="<?= $_GET['categorie'] ?>">
                                        <input type="hidden" name="q" value="<?= $_GET['q'] ?>">
                                        <input type="hidden" name="name" value="<?= $_GET['name'] ?>">
                                        <input type="hidden" name="possede" value="1">
                                        <button type="submit" class="btn btn-primary w-100">Etudiant possédant</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        <?php endif; ?>
</div>

        



<?php
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>