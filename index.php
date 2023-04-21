<?php

ini_set('error_reporting', 6135);

// Chargement du fichier autoload.php qui charge toutes les classes PHP nécessaires
require_once __DIR__ . '/vendor/autoload.php';
require_once "app/controllers/routeur.php";



// Création d'une instance de la classe Dotenv\Dotenv
// Cette classe permet de charger les variables d'environnement définies dans le fichier .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "defaut";
}

//Ajoute un controleur secondaire ($fichier) en fonction du metier ($action) :
$fichier = sendBack($action);
// $fichier = renvoie($action="defaut");
require_once $fichier;