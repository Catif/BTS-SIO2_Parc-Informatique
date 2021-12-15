<?php
session_start();
$_SESSION['role'] = 'visitor';
header('location:' . BASE_URL);
die();
?>