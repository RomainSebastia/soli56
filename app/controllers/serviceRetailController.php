<?php

// Création d'un controller qui permet de récupérer
// les informations détaillées d'un service
namespace app\controllers;

use App\Models\Service;
use Exception;

// Vérification si l'ID existe ou non (message d'erreur s'il n'existe pas)
if (!isset($_GET['ID'])) {
    throw new Exception("L'ID n'est pas défini");
}
$id = $_GET['ID'];


// Appel de la méthode qui permet d'afficher les détails
// d'un service
$detailServices = Service::findServiceByID($id);


// Permet l'affichage personnalisé dans l'onglet 
// en fonction de la page visualisée
$titre = ("Mon service");


// Inclusion du visuel de la page d'un service
include('app/views/serviceRetail.php');