<?php

// Création d'un controller qui permet de récupérer les 
// services en fonction de la catégorie choisie par l'utilisateur
namespace app\controllers;

use App\Models\Service;
use Exception;

// Vérification si l'ID existe ou non (message d'erreur s'il n'existe pas)
if (!isset($_GET['ID'])) {
    throw new Exception("L'ID n'est pas défini");
}
$id = $_GET['ID'];


// Appel de la méthode qui permet d'afficher les services 
// en fonction de la catégorie sélectionnée
$listService = Service::findAllByCategory($id);


// Permet l'affichage personnalisé dans l'onglet 
// en fonction de la page visualisée
$titre = ("Mes Services");


// Inclusion du visuel de la page des services en fonction de la
// la catégorie sélectionnée
include('app/views/service.php');