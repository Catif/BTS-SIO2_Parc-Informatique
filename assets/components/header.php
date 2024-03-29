<?php
require_once dirname(__DIR__,2) . '/config.php';

if(!isset($title)){
    $title = "Parc Informatique - G1";
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE_URL .'/assets/css/style.css' ?>">
    </head>
    <body>
        
    <?php require __DIR__ . '/navbar.php'; ?>
