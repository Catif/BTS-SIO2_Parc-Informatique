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
    if($_GET['action'] === 'utilisateur'){
        $query = $db->query("SELECT * FROM utilisateur WHERE utilisateur.type = :type",[
            ':type' => $_GET['recherche_type']
        ]);
        $results = $query->fetchAll();
    } elseif($_GET['action'] === 'classes'){
        $query = $db->query("SELECT * FROM classe",[]);
        $results = $query->fetchAll();
    }
}


?>
<?php
echo('<pre>');
var_dump($results);
echo('</pre>');
?>

<div class="container">
    <?php if(isset($_GET['action'])): ?>  
        <?php if($_GET['action'] === 'utilisateur' || $_GET['action'] === 'classes'): ?>
        
            <div class="d-flex justify-content-center">
                <div class="col-6 mb-5">
                    <h2 class="text-center mt-5">Parc Informatique : <?= $_GET['recherche_type'] ?></h2>
                    <p class="text-center">Voici l'entiereté des statistiques utilisateurs :</p>
                    
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Editer</th>
                                <th scope="col d-flex justify-content-center">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($results as $result): ?>
                                <tr>
                                    <th><?= $result['PRENOM'] ?></th>
                                    <td><?= $result['NOM'] ?></td>
                                    <td><?= $result['CLASSE'] ?></td>
                                    <td>
                                        <a href=""><i class="bi bi-pencil-fill me-2"></i>Editer</a>
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href=""><i class="bi bi-trash-fill me-2"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>


        <?php elseif($_GET['action'] === 'compte'): ?>




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