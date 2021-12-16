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
    $query = $db->query("SELECT COUNT(*), COUNT(region) FROM $equipement",[]);
    $equipements_user[$equipement] = $query->fetch();
}

?>

<div class="container pb-4">
    <h2 class="text-center pt-4">Administration</h2>
    
    <div class="d-flex justify-content-center">
        <div class="col-6 mb-5">
            <form action="./admin_recherche">
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
                            <input type="hidden" name="action" name="utilisateur">
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
            <form action="./admin_recherche">
                <p class="text-center">Vous aurez un tableau avec les différentes classes que vous pourrez supprimer ou ajouter.</p>
                
                <input type="hidden" name="action" value="classes">
                <button type="submit" class="btn btn-primary w-100">Gérer les classes</button>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-6 mb-5">
            <h2 class="text-center mt-5">Création de compte</h2>
            <form action="./admin_recherche">
                <p class="text-center">Vous pouvez créer des comptes pour les professeurs, l'admnistration ou bien un étudiant.</p>
                
                <input type="hidden" name="action" value="classes">
                <button type="submit" class="btn btn-primary w-100">Création d'un compte</button>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-6 mb-5">
            <h2 class="text-center mt-5">Statistiques</h2>
            <form action="./admin_recherche">
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
                            <td>Mark</td>
                        </tr>
                        <tr>
                            <th scope="row">Tablette</th>
                            <td>Jacob</td>
                        </tr>
                        <tr>
                            <th scope="row">PC Portable</th>
                            <td>Jacob</td>
                        </tr>
                        <tr>
                            <th scope="row">PC Fixe</th>
                            <td>Jacob</td>
                        </tr>
                        <tr>
                            <th scope="row">PC de la région</th>
                            <td>Jacob</td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>