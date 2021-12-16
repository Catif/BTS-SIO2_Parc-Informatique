<?php 
session_start();
$error = null;
$title = 'Tableau de bord - Parc Informatique';
require dirname(__DIR__ , 2) . '/assets/components/header.php';


if($_SESSION['role'] === 'visitor' || $_SESSION['role'] === 'user'){
    header('Location: '. BASE_URL . '/');
    die();
}
?>


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




<?php
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>