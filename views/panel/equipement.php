<?php 
$title = 'Connexion';
require dirname(__DIR__ , 2) . '/assets/components/header.php';

$_SESSION['role'] = 'user';

if($_SESSION['role'] === 'visitor'){
    header('Location: '. BASE_URL . '/');
    die();
}
?>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 row-cols-xlg-6 g-5 d-flex justify-content-center">
        <?php
            create_box('Téléphone','telephone', 1);
            create_box('Téléphone','telephone', 2);
            create_box('Tablette','tablette', 1);
            create_box('PC Portable','laptop', 1);
            create_box('PC Fixe','computer', 1);
            create_box('PC Fixe','computer', 2);
        ?>
    </div>
</div>




<?php 
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>