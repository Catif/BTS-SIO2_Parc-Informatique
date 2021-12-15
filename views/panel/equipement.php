<?php 
session_start();
$title = '';
if($_SESSION['role'] === 'user'){
    $title = 'Mes équipement';
} else {
    $title = 'Equipement de $nom $prenom';
}
require dirname(__DIR__ , 2) . '/assets/components/header.php';


if($_SESSION['role'] === 'visitor'){
    header('Location: '. BASE_URL . '/');
    die();
}

/* ======================================================================
                        CREATION DES EQUIPEMENTS
====================================================================== */
if(isset($_POST['locate']) and $_POST['locate'] === 'add_equipement.php'){
    if($_POST['type'] === 'portable'){
        $sql = $db->query("INSERT INTO portable (ID_UTILISATEUR, MODELE, OS, PROCESSEUR, RAM, STOCKAGE, FAI, DATA_GO) 
        VALUES (:id_utilisateur, :modele, :os, :processeur, :ram, :stockage, :fai, :data_go)",[
            ':id_utilisateur' => $_SESSION['id_utilisateur'],
            ':modele' => isset($_POST['modele']) ? null : $_POST['modele'],
            ':os' => isset($_POST['os']) ? null : $_POST['os'],
            ':processeur' => isset($_POST['cpu']) ? null : $_POST['cpu'],
            ':ram' => (int)isset($_POST['goRAM']) ? null : $_POST['goRAM'],
            ':stockage' => (int)isset($_POST['goStockage']) ? null : $_POST['goStockage'],
            ':fai' => isset($_POST['FAI']) ? null : $_POST['FAI'],
            ':data_go' => (float)isset($_POST['goData']) ? null : $_POST['goData'],
        ]);
    }

    if($_POST['type'] ==='tablette'){
        $sql = $db->query("INSERT INTO tablette (ID_UTILISATEUR, MODELE, OS, PROCESSEUR, RAM, STOCKAGE, FAI, DATA_GO) 
        VALUES (:id_utilisateur, :modele, :os, :processeur, :ram, :stockage, :fai, :data_go)",[
            ':id_utilisateur' => $_SESSION['id_utilisateur'],
            ':modele' => isset($_POST['modele']) ? null : $_POST['modele'],
            ':os' => isset($_POST['os']) ? null : $_POST['os'],
            ':processeur' => isset($_POST['cpu']) ? null : $_POST['cpu'],
            ':ram' => (int)isset($_POST['goRAM']) ? null : $_POST['goRAM'],
            ':stockage' => (int)isset($_POST['goStockage']) ? null : $_POST['goStockage'],
            ':fai' => isset($_POST['FAI']) ? null : $_POST['FAI'],
            ':data_go' => (float)isset($_POST['goData']) ? null : $_POST['goData'],
        ]);
    }

    if($_POST['type'] === 'ordi_portable'){
        $sql = $db->query("INSERT INTO ordi_portable (ID_UTILISATEUR, REGION, OS, PROCESSEUR, CARTE_GRAPHIQUE, RAM, STOCKAGE) 
        VALUES (:id_utilisateur, :region, :os, :processeur, :carte_graphique, :ram, :stockage)",[
            ':id_utilisateur' => $_SESSION['id_utilisateur'],
            ':region' => isset($_POST['region']) ? 0 : $_POST['region'],
            ':os' => isset($_POST['os']) ? null : $_POST['os'],
            ':processeur' => isset($_POST['cpu']) ? null : $_POST['cpu'],
            ':carte_graphique' => isset($_POST['gpu']) ? null : $_POST['gpu'],
            ':ram' => (int)isset($_POST['goRAM']) ? null : $_POST['goRAM'],
            ':stockage' => (int)isset($_POST['goStockage']) ? null : $_POST['goStockage']
        ]);
    }

    if($_POST['type'] === 'ordi_fixe'){
        $sql = $db->query("INSERT INTO ordi_fixe (ID_UTILISATEUR, OS, PROCESSEUR, CARTE_GRAPHIQUE, RAM, STOCKAGE) 
        VALUES (:id_utilisateur, :os, :processeur, :carte_graphique, :ram, :stockage)",[
            ':id_utilisateur' => $_SESSION['id_utilisateur'],
            ':os' => isset($_POST['os']) ? null : $_POST['os'],
            ':processeur' => isset($_POST['cpu']) ? null : $_POST['cpu'],
            ':carte_graphique' => isset($_POST['gpu']) ? null : $_POST['gpu'],
            ':ram' => (int)isset($_POST['goRAM']) ? null : $_POST['goRAM'],
            ':stockage' => (int)isset($_POST['goStockage']) ? null : $_POST['goStockage']
        ]);
    }
}






?>

<div class="container pb-4">
    <h2 class="text-center mb-4"><?= $title ?></h2>

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 row-cols-xlg-6 g-4 d-flex justify-content-center">
        <?php
            create_box('Téléphone','portable', 1);
            create_box('Téléphone','portable', 2);
            create_box('Tablette','tablette', 1);
            create_box('PC Portable','ordi_portable', 1);
            create_box('PC Fixe','ordi_fixe', 1);
            create_box('PC Fixe','ordi_fixe', 2);
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