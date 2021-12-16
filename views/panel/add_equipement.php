<?php 
session_start();
$error = null;
$title = 'Ajout d\'équipement';
require dirname(__DIR__ , 2) . '/assets/components/header.php';


if($_SESSION['role'] === 'visitor'){
    header('Location: '. BASE_URL . '/');
    die();
}
if(isset($_POST['type'])){
    if($_POST['type'] === 'default'){
        unset($_POST['type']);
        $error = 'Vous devez choisir une valeur parmis celle proposer.';
    }
}
?>

<div class="container pb-4">
    

    <?php if(!isset($_POST['type'])): ?>
        <h2 class="text-center mb-4">Choix de l'équipement :</h2>
        <?php if($error !== null): ?>
            <div class="alert alert-danger text-center">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <div class="row d-flex justify-content-center">
            <form class="col-6" action="./add_equipement.php" method="POST">
                <div class="row">
                    <div class="col-8">
                        <label class="form-label">Equipement</label>
                        <select name='type' class="form-select" required>
                            <option value="default" selected>Choisir...</option>
                            <option value="portable">Téléphone</option>
                            <option value="tablette">Tablette</option>
                            <option value="ordi_portable">PC Portable</option>
                            <option value="ordi_fixe">PC Fixe</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    <div class="col-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Voir le formulaire</button>
                    </div>
                </div>
            </form>
        </div>
    










    <?php else: ?>
        <form method="POST" action="./equipement.php">

        <?php if($_POST['type'] === 'portable'): ?>
            <h2 class="text-center mb-4">Ajout d'un équipement : Téléphone</h2>
            <div class="form-group">
                <label class="mb-2">Modèle du téléphone<span class="input-required">*</span> :</label>
                <input type="text" name="modele" placeholder="Samsung, Iphone, Xiaomi..." class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">OS du téléphone<span class="input-required">*</span> :</label>
                <select name="os" class="form-select" required>
                    <option selected>Choisir...</option>
                    <option value="Android">Android</option>
                    <option value="iOS">iOS</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Processeur du téléphone :</label>
                <input type="text" name="cpu" placeholder="Snapdragon 888, Exynos 2100, Apple A15..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Nombre de Go de RAM du téléphone :</label>
                <input type="text" name="goRAM" placeholder="0.5, 3, 2..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Nombre de Go de stockage du téléphone :</label>
                <input type="text" name="goStockage" placeholder="8, 128, 32..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Opérateur téléphonique :</label>
                <input type="text" name="FAI" placeholder="Orange, Red by SFR, Free..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Nombre de Go d'internet fournis par l'opérateur :</label>
                <input type="text" name="goData" placeholder="5, 100, 50..." class="form-control" >
            </div>
        <?php endif; ?>










        <?php if($_POST['type'] === 'tablette'): ?>
            <h2 class="text-center mb-4">Ajout d'un équipement : Tablette</h2>
            <div class="form-group">
                <label class="mb-2">Modèle de la tablette<span class="input-required">*</span> :</label>
                <input type="text" name="modele" placeholder="Samsung Note, Ipad, Xiaomi Mi Pad..." class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">OS de la tablette<span class="input-required">*</span> :</label>
                <select name="os" class="form-select" required>
                    <option selected>Choisir...</option>
                    <option value="Android">Android</option>
                    <option value="iOS">iOS</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Processeur de la tablette :</label>
                <input type="text" name="cpu" placeholder="Snapdragon 888, Exynos 2100, Apple A15..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Nombre de Go de RAM de la tablette :</label>
                <input type="text" name="goRAM" placeholder="0.5, 3, 2..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Nombre de Go de stockage de la tablette :</label>
                <input type="text" name="goStockage" placeholder="8, 128, 32..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Opérateur téléphonique :</label>
                <input type="text" name="FAI" placeholder="Orange, Red by SFR, Free..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Nombre de Go d'internet fournis par l'opérateur :</label>
                <input type="text" name="goData" placeholder="5, 100, 50..." class="form-control" >
            </div>
        <?php endif; ?>










        <?php if($_POST['type'] === 'ordi_portable'): ?>
            <h2 class="text-center mb-4">Ajout d'un équipement : PC Portable</h2>
            <div class="form-group mt-3">
                <label class="mb-2">Ordinateur de la région<span class="input-required">*</span> :</label>
                <select name="region" class="form-select" required>
                    <option value="0" selected>Non</option>
                    <option value="1">Oui</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">OS du PC Portable<span class="input-required">*</span> :</label>
                <select name="os" class="form-select" required>
                    <option selected>Choisir...</option>
                    <option value="Mac">Mac</option>
                    <option value="Windows">Windows</option>
                    <option value="Linux">Linux</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Processeur du PC Portable :</label>
                <input type="text" name="cpu" placeholder="Intel i7-10900, Apple M1 Pro, AMD Ryzen 5 5600X..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Carte graphique du PC Portable :</label>
                <input type="text" name="gpu" placeholder="NVIDIA GTX 3080, AMD 6700XT..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Nombre de Go de RAM du PC Portable :</label>
                <input type="text" name="goRAM" placeholder="4, 16, 8..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Nombre de Go de stockage du PC Portable :</label>
                <input type="text" name="goStockage" placeholder="128, 512, 256..." class="form-control" >
            </div>
        <?php endif; ?>










        <?php if($_POST['type'] === 'ordi_fixe'): ?>
            <h2 class="text-center mb-4">Ajout d'un équipement : PC Fixe</h2>
            <div class="form-group">
                <label class="mb-2">OS du PC Fixe<span class="input-required">*</span> :</label>
                <select name="os" class="form-select" required>
                    <option selected>Choisir...</option>
                    <option value="Mac">Mac</option>
                    <option value="Windows">Windows</option>
                    <option value="Linux">Linux</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Processeur du PC Fixe :</label>
                <input type="text" name="cpu" placeholder="Intel i7-10900, Apple M1 Pro, AMD-5600X..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Carte graphique du PC Fixe :</label>
                <input type="text" name="gpu" placeholder="NVIDIA GTX 3080, AMD 6700XT..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Nombre de Go de RAM du PC Fixe :</label>
                <input type="text" name="goRAM" placeholder="4, 16, 8..." class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label class="mb-2">Nombre de Go de stockage du PC Fixe :</label>
                <input type="text" name="goStockage" placeholder="128, 512, 256..." class="form-control" >
            </div>
        <?php endif; ?>





            <input type='hidden' name="type" value="<?= $_POST['type'] ?>">
            <input type='hidden' name="action" value="add_equipement">
            <button type="submit" class="btn btn-primary w-100 mt-3">Ajouter l'appareil</button>
        </form>
    <?php endif; ?>











</div>













<?php 
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>