<?php
$icon = null;
if(isset($type)){
    switch ($type){
        case 'portable':
            $title = 'Téléphone';
            $icon = 'phone'; 
            break;
        case 'tablette':
            $title = 'Tablette';
            $icon = 'phone-landscape';
            break;
        case 'ordi_portable':
            $title = 'PC Portable';
            $icon = 'laptop';
            break;
        case 'ordi_fixe':
            $title = 'PC Fixe';
            $icon = 'pc-display';
            break;
        default:
            $icon = 'question'; break;
    }
}
?>

<?php if($type !== null): ?>
    <button class="card mx-1" data-bs-toggle="modal" data-bs-target="#modals-<?= $type . '-' . $id ?>">
        <div class="card-img-top">
            <i class="bi bi-<?= $icon ?>"></i>
        </div>
        <div class="card-body w-100">
            <h5 class="text-center card-title"><?= $title ?> n°<?= $id ?></h5>
        </div>
    </button>



    <div class="modal fade" id="modals-<?= $type . '-' . $id ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $title ?> n°<?= $id ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <?php if($type === 'portable'): ?>
                            <div class="form-group">
                                <label class="mb-2">Modèle du téléphone<span class="input-required">*</span> :</label>
                                <input type="text" name="modele" placeholder="Samsung, Iphone, Xiaomi..." class="form-control" value="<?= $equipement['MODELE'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">OS du téléphone<span class="input-required">*</span> :</label>
                                <select name="os" class="form-select" required>
                                    <?= ($equipement['OS'] === null)? '<option selected>Choisir...</option>' : '' ?>
                                    <option value="Android" <?= ($equipement['OS'] === 'Android')? 'selected' : '' ?>>Android</option>
                                    <option value="iOS" <?= ($equipement['OS'] === 'iOS')? 'selected' : '' ?>>iOS</option>
                                    <option value="autre" <?= ($equipement['OS'] === 'autre')? 'selected' : '' ?>>Autre</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Processeur du téléphone :</label>
                                <input type="text" name="cpu" placeholder="Snapdragon 888, Exynos 2100, Apple A15..." class="form-control" value="<?= $equipement['PROCESSEUR'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Nombre de Go de RAM du téléphone :</label>
                                <input type="text" name="goRAM" placeholder="0.5, 3, 2..." class="form-control" value="<?= $equipement['RAM'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Nombre de Go de stockage du téléphone :</label>
                                <input type="text" name="goStockage" placeholder="8, 128, 32..." class="form-control" value="<?= $equipement['STOCKAGE'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Opérateur téléphonique :</label>
                                <input type="text" name="FAI" placeholder="Orange, Red by SFR, Free..." class="form-control" value="<?= $equipement['FAI'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Nombre de Go d'internet fournis par l'opérateur :</label>
                                <input type="text" name="goData" placeholder="5, 100, 50..." class="form-control" value="<?= $equipement['DATA_GO'] ?>" required>
                            </div>
                        <?php endif; ?>

                    <?php if($type === 'tablette'): ?>
                            <div class="form-group">
                                <label class="mb-2">Modèle de la tablette<span class="input-required">*</span> :</label>
                                <input type="text" name="modele" placeholder="Samsung Note, Ipad, Xiaomi Mi Pad..." class="form-control" value="<?= $equipement['MODELE'] ?>"required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">OS de la tablette<span class="input-required">*</span> :</label>
                                <select name="os" class="form-select" required>
                                    <?= ($equipement['OS'] === null)? '<option selected>Choisir...</option>' : '' ?>
                                    <option value="Android" <?= ($equipement['OS'] === 'Android')? 'selected' : '' ?>>Android</option>
                                    <option value="iOS" <?= ($equipement['OS'] === 'iOS')? 'selected' : '' ?>>iOS</option>
                                    <option value="autre" <?= ($equipement['OS'] === 'autre')? 'selected' : '' ?>>Autre</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Processeur de la tablette :</label>
                                <input type="text" name="cpu" placeholder="Snapdragon 888, Exynos 2100, Apple A15..." class="form-control" value="<?= $equipement['PROCESSEUR'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Nombre de Go de RAM de la tablette :</label>
                                <input type="text" name="goRAM" placeholder="0.5, 3, 2..." class="form-control" value="<?= $equipement['RAM'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Nombre de Go de stockage de la tablette :</label>
                                <input type="text" name="goStockage" placeholder="8, 128, 32..." class="form-control" value="<?= $equipement['STOCKAGE'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Opérateur téléphonique :</label>
                                <input type="text" name="FAI" placeholder="Orange, Red by SFR, Free..." class="form-control" value="<?= $equipement['FAI'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Nombre de Go d'internet fournis par l'opérateur :</label>
                                <input type="text" name="goData" placeholder="5, 100, 50..." class="form-control" value="<?= $equipement['DATA_GO'] ?>" required>
                            </div>
                        <?php endif; ?>

                        <?php if($type === 'ordi_portable'): ?>
                            <div class="form-group mt-3">
                                <label class="mb-2">Ordinateur de la région :</label>
                                <select name="region" class="form-select" required>
                                    <option value="0" selected>Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">OS du PC Portable<span class="input-required">*</span> :</label>
                                <select name="os" class="form-select" value="<?= $equipement['OS'] ?>" required>
                                    <?= ($equipement['OS'] === null)? '<option selected>Choisir...</option>' : '' ?>
                                    <option value="Windows" <?= ($equipement['OS'] === 'Windows')? 'selected' : '' ?>>Windows</option>
                                    <option value="Mac" <?= ($equipement['OS'] === 'Mac')? 'selected' : '' ?>>Mac</option>
                                    <option value="Linux" <?= ($equipement['OS'] === 'Linux')? 'selected' : '' ?>>Linux</option>
                                    <option value="autre" <?= ($equipement['OS'] === 'autre')? 'selected' : '' ?>>autre</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Processeur du PC Portable :</label>
                                <input type="text" name="cpu" placeholder="Intel i7-10900, Apple M1 Pro, AMD-5600X..." class="form-control" value="<?= $equipement['PROCESSEUR'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Carte graphique du PC Portable :</label>
                                <input type="text" name="gpu" placeholder="NVIDIA GTX 3080, AMD 6700XT..." class="form-control" value="<?= $equipement['CARTE_GRAPHIQUE'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Nombre de Go de RAM du PC Portable :</label>
                                <input type="text" name="goRAM" placeholder="4, 16, 8..." class="form-control" value="<?= $equipement['RAM'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Nombre de Go de stockage du PC Portable :</label>
                                <input type="text" name="goStockage" placeholder="128, 512, 256..." class="form-control" value="<?= $equipement['STOCKAGE'] ?>" required>
                            </div>
                        <?php endif; ?>

                        <?php if($type === 'ordi_fixe'): ?>
                            <div class="form-group">
                                <label class="mb-2">OS du PC Fixe<span class="input-required">*</span> :</label>
                                <select name="os" class="form-select" required>
                                    <?= ($equipement['OS'] === null)? '<option selected>Choisir...</option>' : '' ?>
                                    <option value="Windows" <?= ($equipement['OS'] === 'Windows')? 'selected' : '' ?>>Windows</option>
                                    <option value="Mac" <?= ($equipement['OS'] === 'Mac')? 'selected' : '' ?>>Mac</option>
                                    <option value="Linux" <?= ($equipement['OS'] === 'Linux')? 'selected' : '' ?>>Linux</option>
                                    <option value="autre" <?= ($equipement['OS'] === 'autre')? 'selected' : '' ?>>autre</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Processeur du PC Fixe :</label>
                                <input type="text" name="cpu" placeholder="Intel i7-10900, Apple M1 Pro, AMD-5600X..." class="form-control" value="<?= $equipement['PROCESSEUR'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Carte graphique du PC Fixe :</label>
                                <input type="text" name="gpu" placeholder="NVIDIA GTX 3080, AMD 6700XT..." class="form-control" value="<?= $equipement['CARTE_GRAPHIQUE'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Nombre de Go de RAM du PC Fixe :</label>
                                <input type="text" name="goRAM" placeholder="4, 16, 8..." class="form-control" value="<?= $equipement['RAM'] ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="mb-2">Nombre de Go de stockage du PC Fixe :</label>
                                <input type="text" name="goStockage" placeholder="128, 512, 256..." class="form-control" value="<?= $equipement['STOCKAGE'] ?>" required>
                            </div>
                        <?php endif; ?>
                    </form>
            </div>
            <div class="modal-footer">
                <form action="" method="POST">
                    <button type="button" class="btn btn-danger">Supprimer</button>
                    <input type="hidden" name="id" value="<?= $id ?>">
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Sauvegarder</button>
            </div>
            </div>
        </div>
    </div>

<?php endif; ?>