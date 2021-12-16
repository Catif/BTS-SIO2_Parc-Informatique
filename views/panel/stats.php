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














<?php
require dirname(__DIR__ , 2) . '/assets/components/footer.php';
?>