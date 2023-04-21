<?php

// Fonction qui permet d'afficher la page en fonction de l'action 
// écrite dans le lien 
function sendBack($action = "defaut")
{
    $actions = array();
    $actions["defaut"] = "app/controllers/accueilController.php";
    $actions["category"] = "app/controllers/categoryController.php";
    $actions["service"] = "app/controllers/serviceController.php";
    $actions["retail"] = "app/controllers/serviceRetailController.php";
    $actions["mentions"] = "app/controllers/mentionsLegalesController.php";
    $actions["politique"] = "app/controllers/politiqueDeConfidentialiteController.php";
    $actions["info"] = "app/controllers/messageInfo.php";
    $actions["erreur"] = "app/controllers/404Controller.php";


 
    // Affectation de l'action à la variable qui sera utilisée
    // dans le fichier index.php
    $controler_id = $actions[$action];


    // Affectation par défaut pour afficher la page d'accueil
    // s'il n'y a pas d'affectation
    if (isset($actions[$action]) && $actions[$action] != "") {
        return $controler_id;
    } else {
        return $actions["defaut"];
    }



}







?>