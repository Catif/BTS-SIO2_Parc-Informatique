<?php 
session_start();
$error = null;
$title = 'Tableau de bord - Parc Informatique';
require dirname(__DIR__ , 2) . '/assets/components/header.php';


if($_SESSION['role'] === 'visitor' || $_SESSION['role'] === 'user'){
    header('Location: '. BASE_URL . '/');
    die();
}

$equipements_users = [];
$list_equipement = ['portable', 'tablette', 'ordi_portable', 'ordi_fixe'];
foreach($list_equipement as $equipement){
    if($equipement === 'ordi_portable'){
        $query = $db->query("SELECT COUNT(*) FROM ordi_portable",[]);
        $equipements_users['ordi_portable'][] = $query->fetch();
        $query2 = $db->query("SELECT COUNT(region) FROM ordi_portable WHERE region = '1'",[]);
        $equipements_users['ordi_portable'][] = $query2->fetch();
    }else{
        $query = $db->query("SELECT COUNT(*) FROM $equipement",[]);
        $equipements_users[$equipement] = $query->fetch();
    }
}
$query = $db->query('SELECT SUM(fai), SUM(camera), SUM(microphone) FROM detient', []);
$equipements_users['detient'] = $query->fetch();

$query = $db->query('SELECT * FROM utilisateur WHERE id_utilisateur = :id', [
    ':id' => $_SESSION['id_utilisateur']
]);
$user = $query->fetch();


$classe = null;
if($_SESSION['type'] === 'Professeur'){
    $query = $db->query('SELECT NOM, PRENOM, MAIL FROM utilisateur WHERE TYPE = "Etudiant" && CLASSE = :classe', [
        ':classe' => $user['CLASSE']
    ]);
    $classe = $query->fetchAll();
}

?>



<div class="container pb-4">
        <?php if($_SESSION['role'] === 'admin'): ?>
            <h1 class="text-center pt-4">Administration</h2>
        <?php elseif($_SESSION['role'] === 'reader'): ?>
            <h1 class="text-center pt-4">Visualisation</h2>
        <?php endif; ?>
        
    <?php if($_SESSION['type'] !== 'RegionEst'): ?>
        <div class="d-flex justify-content-center">
            <div class="col-6 mb-5">
                <?php if($_SESSION['role']  === 'admin' || $_SESSION['type']  === 'Administration'): ?>
                    <form action="./admin_bis.php" class="pb-5">
                        <?php if($_SESSION['role'] === 'admin'): ?>
                            <p class='text-center'>Vous pouvez sélectionner un type de rang qui permettra de modifier ou de consulter les données profil d'un étudiant.</p>
                        <?php elseif($_SESSION['type'] === 'Administration'): ?>
                            <p class='text-center'>Vous pouvez sélectionner un type de rang qui permettra d'afficher dans un tableau les différents utilisateurs de ce type.</p>
                        <?php endif; ?>
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 row">
                                <label>Choisir un rang :</label>
                                <div class="col-8">
                                    <select name="recherche_type" class="form-select" required>
                                        <option value="Etudiant" selected>Etudiant</option>
                                        <option value="Professeur">Professeur</option>
                                        <option value="Administration">Administration</option>
                                        <option value="Administrateur">Administrateur</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <input type="hidden" name="action" value="utilisateur">
                                    <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
                <?php if($_SESSION['type'] === 'Professeur'): ?>
                    <h2 class="text-center mt-5 ">Liste étudiants en BTS <?= $user['CLASSE'] ?></h2>
                    <table class="table table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($classe as $etudiant): ?>
                                <tr>
                                    <th><?= $etudiant['PRENOM'] ?></th>
                                    <td><?= $etudiant['NOM'] ?></td>
                                    <td><?= $etudiant['MAIL'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if($_SESSION['role'] === 'admin'): ?>
        <div class="d-flex justify-content-center">
            <div class="col-6 mb-5">
                <h2 class="text-center mt-5 ">Gérer les classes</h2>
                <form action="./admin_bis.php">
                    <p class="text-center">Vous aurez un tableau avec les différentes classes que vous pourrez supprimer ou ajouter.</p>
                    
                    <input type="hidden" name="action" value="classes">
                    <button type="submit" class="btn btn-primary w-100">Gérer les classes</button>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-6 mb-5">
                <h2 class="text-center mt-5">Création de compte</h2>
                <form action="./admin_bis.php">
                    <p class="text-center">Vous pouvez créer des comptes pour les professeurs, l'admnistration ou bien un étudiant.</p>
                    
                    <input type="hidden" name="action" value="compte">
                    <button type="submit" class="btn btn-primary w-100">Création d'un compte</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <div class="col-8 mb-5">
            <h2 class="text-center mt-5">Statistiques</h2>
            <p class="text-center">Statistiques divers sur les différents possesions des utilisateurs :</p>
            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Appareil</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Visualiser</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($_SESSION['type'] !== 'RegionEst'): ?>
                        <tr>
                            <th scope="row">Téléphone</th>
                            <td><?= $equipements_users['portable'][0] ?></td>
                            <td><a class="btn btn-primary w-100" href="./stats.php?categorie=appareil&q=portable&name=téléphones<?= ($_SESSION['type'] === 'Professeur')? '&classe=' . $user['CLASSE'] : '' ?>"><i class="bi bi-eye-fill me-2"></i>Voir liste</a></td>
                        </tr>
                        <tr>
                            <th scope="row">Tablette</th>
                            <td><?= $equipements_users['tablette'][0] ?></td>
                            <td><a class="btn btn-primary w-100" href="./stats.php?categorie=appareil&q=tablette&name=tablettes<?= ($_SESSION['type'] === 'Professeur')? '&classe=' . $user['CLASSE'] : '' ?>"><i class="bi bi-eye-fill me-2"></i>Voir liste</a></td>
                        </tr>
                        <tr>
                            <th scope="row">PC Portable</th>
                            <td><?= $equipements_users['ordi_portable'][0][0] ?></td>
                            <td><a class="btn btn-primary w-100" href="./stats.php?categorie=appareil&q=ordi_portable&name=PC portables<?= ($_SESSION['type'] === 'Professeur')? '&classe=' . $user['CLASSE'] : '' ?>"><i class="bi bi-eye-fill me-2"></i>Voir liste</a></td>
                        </tr>
                        <tr>
                            <th scope="row">PC Fixe</th>
                            <td><?= $equipements_users['ordi_fixe'][0] ?></td>
                            <td><a class="btn btn-primary w-100" href="./stats.php?categorie=appareil&q=ordi_fixe&name=PC fixes<?= ($_SESSION['type'] === 'Professeur')? '&classe=' . $user['CLASSE'] : '' ?>"><i class="bi bi-eye-fill me-2"></i>Voir liste</a></td>
                        </tr>
                    <?php endif; ?>
                        <tr>
                            <th scope="row">PC de la région</th>
                            <td><?= $equipements_users['ordi_portable'][1][0] ?></td>
                            <td><a class="btn btn-primary w-100" href="./stats.php?categorie=appareil&q=region&name=PC portables de la région<?= ($_SESSION['type'] === 'Professeur')? '&classe=' . $user['CLASSE'] : '' ?>"><i class="bi bi-eye-fill me-2"></i>Voir liste</a></td>
                        </tr>
                    <?php if($_SESSION['type'] !== 'RegionEst'): ?>
                        <tr>
                            <th scope="row">Webcam</th>
                            <td><?= $equipements_users['detient'][1] ?></td>
                            <td><a class="btn btn-primary w-100" href="./stats.php?categorie=detient&q=camera&name=webcams<?= ($_SESSION['type'] === 'Professeur')? '&classe=' . $user['CLASSE'] : '' ?>"><i class="bi bi-eye-fill me-2"></i>Voir liste</a></td>
                        </tr>
                        <tr>
                            <th scope="row">Microphone</th>
                            <td><?= $equipements_users['detient'][2] ?></td>
                            <td><a class="btn btn-primary w-100" href="./stats.php?categorie=detient&q=microphone&name=microphones<?= ($_SESSION['type'] === 'Professeur')? '&classe=' . $user['CLASSE'] : '' ?>"><i class="bi bi-eye-fill me-2"></i>Voir liste</a></td>
                        </tr>
                        <tr>
                            <th scope="row">Connexion internet</th>
                            <td><?= $equipements_users['detient'][0] ?></td>
                            <td><a class="btn btn-primary w-100" href="./stats.php?categorie=detient&q=fai&name=connexion internet<?= ($_SESSION['type'] === 'Professeur')? '&classe=' . $user['CLASSE'] : '' ?>"><i class="bi bi-eye-fill me-2"></i>Voir liste</a></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>