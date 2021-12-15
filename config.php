<?php
// Chargement de la session
if( session_status() == PHP_SESSION_NONE ){
    session_start();
    if(!isset($_SESSION['role'])){
        $_SESSION['role'] = 'visitor';
    }
}

// Définir le chemin de l'application
define("BASE_URL", "http://localhost:3000");
define("SITE_ROOT", __DIR__);

// Initialisation de la base de donnée
require_once SITE_ROOT . "/assets/class/database.php";
$db_host = 'localhost';
$db_name = 'parc_informatique';
$db_user = 'root';
$db_pswd = '';
$db_parameter = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
];

$db = new Database($db_host, $db_name, $db_user, $db_pswd, $db_parameter);


// Chargement des fichiers de l'application
require_once  SITE_ROOT . "/assets/function.php";