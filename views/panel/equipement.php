<?php 
session_start();
$title = '';
if($_SESSION['role'] === 'user'){
    $title = 'Mes équipement';
} else {
    $title = 'Equipement de $nom $prenom';
}
require dirname(__DIR__ , 2) . '/assets/components/header.php';


var_dump($db);
$sql = $db->query("SELECT * FROM utilisateur;");
var_dump($sql->fetchAll());










if($_SESSION['role'] === 'visitor'){
    header('Location: '. BASE_URL . '/');
    die();
}

if(isset($_POST['locate']) and $_POST['locate'] === 'add_equipement.php'){
    
}
?>

<div class="container pb-4">
    <h2 class="text-center mb-4"><?= $title ?></h2>

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 row-cols-xlg-6 g-4 d-flex justify-content-center">
        <?php
            create_box('Téléphone','telephone', 1);
            create_box('Téléphone','telephone', 2);
            create_box('Tablette','tablette', 1);
            create_box('PC Portable','laptop', 1);
            create_box('PC Fixe','computer', 1);
            create_box('PC Fixe','computer', 2);
        ?>
    </div>
    <div class="d-flex justify-content-center mt-5 ">
        <a class="card" href="./add_equipement.php">
            <div class="card-img-top text-center">
                <i class="bi bi-plus"></i>
            </div>
            <div class="card-body w-100">
                <h5 class="text-center card-title">Ajouter un équipement</h5>
            </div>
        </a>
    </div>
</div>




<?php 
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>