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
            ':modele' => isset($_POST['modele']) ? $_POST['modele'] : null,
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':ram' => (int)isset($_POST['goRAM']) ? $_POST['goRAM'] : null,
            ':stockage' => (int)isset($_POST['goStockage']) ? $_POST['goStockage'] : null,
            ':fai' => isset($_POST['FAI']) ? $_POST['FAI'] : null,
            ':data_go' => (float)isset($_POST['goData']) ? $_POST['goData'] : null,
        ]);
    }

    if($_POST['type'] ==='tablette'){
        $sql = $db->query("INSERT INTO tablette (ID_UTILISATEUR, MODELE, OS, PROCESSEUR, RAM, STOCKAGE, FAI, DATA_GO) 
        VALUES (:id_utilisateur, :modele, :os, :processeur, :ram, :stockage, :fai, :data_go)",[
            ':id_utilisateur' => $_SESSION['id_utilisateur'],
            ':modele' => isset($_POST['modele']) ? $_POST['modele'] : null,
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':ram' => (int)isset($_POST['goRAM']) ? $_POST['goRAM'] : null,
            ':stockage' => (int)isset($_POST['goStockage']) ? $_POST['goStockage'] : null,
            ':fai' => isset($_POST['FAI']) ? $_POST['FAI'] : null,
            ':data_go' => (float)isset($_POST['goData']) ? $_POST['goData'] : null,
        ]);
    }

    if($_POST['type'] === 'ordi_portable'){
        $sql = $db->query("INSERT INTO ordi_portable (ID_UTILISATEUR, REGION, OS, PROCESSEUR, CARTE_GRAPHIQUE, RAM, STOCKAGE) 
        VALUES (:id_utilisateur, :region, :os, :processeur, :carte_graphique, :ram, :stockage)",[
            ':id_utilisateur' => $_SESSION['id_utilisateur'],
            ':region' => isset($_POST['region']) ? $_POST['region'] : 0,
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':carte_graphique' => isset($_POST['gpu']) ? $_POST['gpu'] : null,
            ':ram' => (int)isset($_POST['goRAM']) ? $_POST['goRAM'] : null,
            ':stockage' => (int)isset($_POST['goStockage']) ? $_POST['goStockage'] : null
        ]);
    }

    if($_POST['type'] === 'ordi_fixe'){
        $sql = $db->query("INSERT INTO ordi_fixe (ID_UTILISATEUR, OS, PROCESSEUR, CARTE_GRAPHIQUE, RAM, STOCKAGE) 
        VALUES (:id_utilisateur, :os, :processeur, :carte_graphique, :ram, :stockage)",[
            ':id_utilisateur' => $_SESSION['id_utilisateur'],
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':carte_graphique' => isset($_POST['gpu']) ? $_POST['gpu'] : null,
            ':ram' => (int)isset($_POST['goRAM']) ? $_POST['goRAM'] : null,
            ':stockage' => (int)isset($_POST['goStockage']) ? $_POST['goStockage'] : null
        ]);
    }
}















/* ======================================================================
            CREATION DES TABLEAUX DES EQUIPEMENTS POSSEDE
====================================================================== */
$equipements_user = [];
$list_equipement = ['portable', 'tablette', 'ordi_portable', 'ordi_fixe'];
foreach($list_equipement as $equipement){
    $query = $db->query("SELECT * FROM $equipement WHERE id_utilisateur = :id", [
        ":id" => $_SESSION['id_utilisateur']
    ]);
    $equipements_user[$equipement] = $query->fetchAll();
}















?>

<div class="container pb-4">
    <h2 class="text-center mb-4"><?= $title ?></h2>

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 row-cols-xlg-6 g-4 d-flex justify-content-center">
        <?php
            foreach($equipements_user as $type_equipement => $equipements){
                foreach($equipements as $k => $equipement){
                    create_box($equipement, $type_equipement, $k);
                }
            }
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