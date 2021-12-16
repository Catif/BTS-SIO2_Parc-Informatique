<?php 
session_start();
$error = null;
$title = 'Ajout d\'équipement';
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


?>



<div class="container pb-4">
    <h2 class="text-center pt-4">Administration</h2>
    
    <div class="d-flex justify-content-center">
        <div class="col-6 mb-5">
            <form action="./admin_bis.php">
                <p>Vous pouvez sélectionner un type de rang qui permettra de modifier ou de consulter les données profil d'un étudiant.</p>
                <div class="row d-flex justify-content-center">
                    <div class="col-10 row">
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
                            <button type="submit" class="btn btn-primary w-100">Exécuter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
    <div class="d-flex justify-content-center">
        <div class="col-6 mb-5">
            <h2 class="text-center mt-5">Statistiques</h2>
            <p class="text-center">Voici l'entiereté des statistiques utilisateurs :</p>
            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Appareil</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Téléphone</th>
                        <td><?= $equipements_users['portable'][0] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tablette</th>
                        <td><?= $equipements_users['tablette'][0] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">PC Portable</th>
                        <td><?= $equipements_users['ordi_portable'][0][0] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">PC Fixe</th>
                        <td><?= $equipements_users['ordi_portable'][1][0] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">PC de la région</th>
                        <td><?= $equipements_users['ordi_fixe'][0] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>






<?php
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>