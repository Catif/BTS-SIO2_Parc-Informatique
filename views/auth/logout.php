<?php
require_once dirname(__DIR__, 2) . '/config.php';
$_SESSION['role'] = 'visitor';
$_SESSION['id_utilisateur'] = '';
header('location:' . BASE_URL);
die();
?>