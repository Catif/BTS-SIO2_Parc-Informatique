<?php 
session_start();
$title = 'Mes équipements';
$success = null;
$error = null;
$id = null;

require dirname(__DIR__ , 2) . '/assets/components/header.php';


if($_SESSION['role'] === 'visitor'){
    header('Location: '. BASE_URL . '/');
    die();
}

if(isset($_GET['id']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'reader')){
    $_SESSION['id_utilisateur_admin'] = $_GET['id'];
    $id = $_SESSION['id_utilisateur_admin'];
} else{
    if(isset($_SESSION['id_utilisateur'])){
        $id = $_SESSION['id_utilisateur'];
    }
}











/* ======================================================================
                        CREATION DES EQUIPEMENTS
====================================================================== */
if(isset($_POST['action']) and $_POST['action'] === 'add_equipement'){
    if($_POST['type'] === 'portable'){
        $sql = $db->query("INSERT INTO portable (ID_UTILISATEUR, MODELE, OS, PROCESSEUR, RAM, STOCKAGE, FAI, DATA_GO) 
        VALUES (:id_utilisateur, :modele, :os, :processeur, :ram, :stockage, :fai, :data_go)",[
            ':id_utilisateur' => $id,
            ':modele' => isset($_POST['modele']) ? $_POST['modele'] : null,
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':ram' => isset($_POST['goRAM']) ? (int)$_POST['goRAM'] : null,
            ':stockage' => isset($_POST['goStockage']) ? (int)$_POST['goStockage'] : null,
            ':fai' => isset($_POST['FAI']) ? $_POST['FAI'] : null,
            ':data_go' => isset($_POST['goData']) ? (float)$_POST['goData'] : null,
        ]);
    }

    if($_POST['type'] ==='tablette'){
        $sql = $db->query("INSERT INTO tablette (ID_UTILISATEUR, MODELE, OS, PROCESSEUR, RAM, STOCKAGE, FAI, DATA_GO) 
        VALUES (:id_utilisateur, :modele, :os, :processeur, :ram, :stockage, :fai, :data_go)",[
            ':id_utilisateur' => $id,
            ':modele' => isset($_POST['modele']) ? $_POST['modele'] : null,
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':ram' => isset($_POST['goRAM']) ? (int)$_POST['goRAM'] : null,
            ':stockage' => isset($_POST['goStockage']) ? (int)$_POST['goStockage'] : null,
            ':fai' => isset($_POST['FAI']) ? $_POST['FAI'] : null,
            ':data_go' => isset($_POST['goData']) ? (float)$_POST['goData'] : null,
        ]);
    }

    if($_POST['type'] === 'ordi_portable'){
        $sql = $db->query("INSERT INTO ordi_portable (ID_UTILISATEUR, REGION, OS, PROCESSEUR, CARTE_GRAPHIQUE, RAM, STOCKAGE) 
        VALUES (:id_utilisateur, :region, :os, :processeur, :carte_graphique, :ram, :stockage)",[
            ':id_utilisateur' => $id,
            ':region' => isset($_POST['region']) ? $_POST['region'] : 0,
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':carte_graphique' => isset($_POST['gpu']) ? $_POST['gpu'] : null,
            ':ram' => isset($_POST['goRAM']) ? (int)$_POST['goRAM'] : null,
            ':stockage' => isset($_POST['goStockage']) ? (int)$_POST['goStockage'] : null
        ]);
    }

    if($_POST['type'] === 'ordi_fixe'){
        $sql = $db->query("INSERT INTO ordi_fixe (ID_UTILISATEUR, OS, PROCESSEUR, CARTE_GRAPHIQUE, RAM, STOCKAGE) 
        VALUES (:id_utilisateur, :os, :processeur, :carte_graphique, :ram, :stockage)",[
            ':id_utilisateur' => $id,
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':carte_graphique' => isset($_POST['gpu']) ? $_POST['gpu'] : null,
            ':ram' => isset($_POST['goRAM']) ? (int)$_POST['goRAM'] : null,
            ':stockage' => isset($_POST['goStockage']) ? (int)$_POST['goStockage'] : null
        ]);
    }
}








/* ======================================================================
        Mise à jour des éléments en fonction de $_POST['action']
====================================================================== */
if(isset($_POST['action']) and $_POST['action'] === 'detient'){
    $sql = $db->query('UPDATE detient SET MICROPHONE = :microphone, CAMERA = :camera, FAI = :fai WHERE id_utilisateur = :id', [
        ':id' => $id,
        ':microphone' => (int)$_POST['mic'],
        ':camera' => (int)$_POST['camera'],
        ':fai' => (int)$_POST['fai']
    ]);
    $success = 'Vos informations ont bien été mis à jour.';
}


if(isset($_POST['action']) and $_POST['action'] === 'delete'){
    try{
        $sql = $db->query("DELETE FROM ". $_POST['type'] ." WHERE ID = :id AND id_utilisateur = :id_user", [
            ':id' => (int)$_POST['id'],
            ':id_user' => $id
        ]);
        $success = 'Votre équipement a bien été supprimé.';
    } catch(PDOException $e){
        $error = "Requête pour la suppression de l'équipement a échoué.<br>Contactez nos administrateurs si cela ne fonctionne pas après plusieurs essais.";
    }
}


if(isset($_POST['action']) and $_POST['action'] === 'edit'){
    if($_POST['type'] === 'portable'){
        $sql = $db->query("UPDATE portable SET MODELE = :modele, OS = :os, PROCESSEUR = :processeur, RAM = :ram, STOCKAGE = :stockage, FAI = :fai, DATA_GO = :data_go WHERE ID = :id AND id_utilisateur = :id_user",[
            ':id_user' => $id,
            ':id' => $_POST['id'],
            ':modele' => isset($_POST['modele']) ? $_POST['modele'] : null,
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':ram' => isset($_POST['goRAM']) ? (int)$_POST['goRAM'] : null,
            ':stockage' => isset($_POST['goStockage']) ? (int)$_POST['goStockage'] : null,
            ':fai' => isset($_POST['FAI']) ? $_POST['FAI'] : null,
            ':data_go' => isset($_POST['goData']) ? (float)$_POST['goData'] : null,
        ]);
        $success = 'Vos informations ont bien été mis à jour.';
    }

    if($_POST['type'] ==='tablette'){
        $sql = $db->query("UPDATE tablette SET MODELE = :modele, OS = :os, PROCESSEUR = :processeur, RAM = :ram, STOCKAGE = :stockage, FAI = :fai, DATA_GO = :data_go WHERE ID = :id AND id_utilisateur = :id_user",[
            ':id_user' => $id,
            ':id' => $_POST['id'],
            ':modele' => isset($_POST['modele']) ? $_POST['modele'] : null,
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':ram' => isset($_POST['goRAM']) ? (int)$_POST['goRAM'] : null,
            ':stockage' => isset($_POST['goStockage']) ? (int)$_POST['goStockage'] : null,
            ':fai' => isset($_POST['FAI']) ? $_POST['FAI'] : null,
            ':data_go' => isset($_POST['goData']) ? (float)$_POST['goData'] : null,
        ]);
        $success = 'Vos informations ont bien été mis à jour.';
    }

    if($_POST['type'] === 'ordi_portable'){
        $sql = $db->query("UPDATE ordi_portable SET REGION = :region, OS = :os, PROCESSEUR = :processeur, CARTE_GRAPHIQUE = :carte_graphique, RAM = :ram, STOCKAGE = :stockage WHERE ID = :id AND id_utilisateur = :id_user",[
            ':id_user' => $id,
            ':id' => $_POST['id'],
            ':region' => isset($_POST['region']) ? $_POST['region'] : 0,
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':carte_graphique' => isset($_POST['gpu']) ? $_POST['gpu'] : null,
            ':ram' => isset($_POST['goRAM']) ? (int)$_POST['goRAM'] : null,
            ':stockage' => isset($_POST['goStockage']) ? (int)$_POST['goStockage'] : null
        ]);
        $success = 'Vos informations ont bien été mis à jour.';
    }

    if($_POST['type'] === 'ordi_fixe'){
        $sql = $db->query("UPDATE ordi_fixe SET OS = :os, PROCESSEUR = :processeur, CARTE_GRAPHIQUE = :carte_graphique, RAM = :ram, STOCKAGE = :stockage WHERE ID = :id AND id_utilisateur = :id_user",[
            ':id_user' => $id,
            ':id' => $_POST['id'],
            ':os' => isset($_POST['os']) ? $_POST['os'] : null,
            ':processeur' => isset($_POST['cpu']) ? $_POST['cpu'] : null,
            ':carte_graphique' => isset($_POST['gpu']) ? $_POST['gpu'] : null,
            ':ram' => isset($_POST['goRAM']) ? (int)$_POST['goRAM'] : null,
            ':stockage' => isset($_POST['goStockage']) ? (int)$_POST['goStockage'] : null
        ]);
        $success = 'Vos informations ont bien été mis à jour.';
    }
}











/* ======================================================================
            CREATION DES TABLEAUX DES EQUIPEMENTS POSSEDE
====================================================================== */
$equipements_user = [];
$list_equipement = ['portable', 'tablette', 'ordi_portable', 'ordi_fixe'];
foreach($list_equipement as $equipement){
    $query = $db->query("SELECT * FROM $equipement WHERE id_utilisateur = :id", [
        ":id" => $id
    ]);
    $equipements_user[$equipement] = $query->fetchAll();
}

$query = $db->query("SELECT * FROM detient WHERE id_utilisateur = :id", [
    ":id" => $id
]);
$detient = $query->fetch();














?>


<!-- <?php
echo('<pre>');
var_dump($_POST);
echo('</pre>');
?> -->

<div class="container pb-4">
    <h2 class="text-center mb-4"><?= $title ?></h2>
    
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

    <?php
    // var_dump($equipements_user); 
    if($equipements_user !== null): ?>
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4 d-flex justify-content-center">
            <?php
                foreach($equipements_user as $type_equipement => $equipements){
                    foreach($equipements as $k => $equipement){
                        create_box($equipement, $type_equipement, $k);
                    }
                }
            ?>
        </div>
    <?php endif; ?>
    <div class="row row-cols-1 row-cols-md-3 d-flex justify-content-center mt-5">
        <button class="card card-ext mx-1" data-bs-toggle="modal" data-bs-target="#modals-divers">
            <div class="card-img-top text-center">
                <i class="bi bi-headset"></i>
            </div>
            <div class="card-body w-100">
                <h5 class="text-center card-title">Equipements divers</h5>
            </div>
        </button>
        <a class="card card-ext mx-1" href="./add_equipement.php">
            <div class="card-img-top text-center">
                <i class="bi bi-plus"></i>
            </div>
            <div class="card-body w-100">
                <h5 class="text-center card-title">Ajouter un équipement</h5>
            </div>
        </a>
    </div>
</div>
<div class="modal fade" id="modals-divers" tabindex="-1" aria-hidden="true">
    <form method="POST" action="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Equipements divers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mb-2">Possession d'un microphone :</label>
                        <select name="mic" class="form-select" required>
                            <option value="0" <?= ($detient['MICROPHONE'] === '0')? 'selected' : '' ?>>Non</option>
                            <option value="1" <?= ($detient['MICROPHONE'] === '1')? 'selected' : '' ?>>Oui</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Possession d'une caméra :</label>
                        <select name="camera" class="form-select" required>
                            <option value="0" <?= ($detient['CAMERA'] === '0')? 'selected' : '' ?>>Non</option>
                            <option value="1" <?= ($detient['CAMERA'] === '1')? 'selected' : '' ?>>Oui</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Possession d'une connexion internet à la maison :</label>
                        <select name="fai" class="form-select" required>
                            <option value="0" <?= ($detient['FAI'] === '0')? 'selected' : '' ?>>Non</option>
                            <option value="1" <?= ($detient['FAI'] === '1')? 'selected' : '' ?>>Oui</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" value="detient">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </div>
            </div>
        </div>
    </form>
</div>



<?php 
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>