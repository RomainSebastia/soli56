<?php

// Création d'un controller qui permet de récupérer les 
// catégories 
namespace App\Controllers;

use App\Models\Category as Category;

//Appel des fonctions qui permettent de récupérer le nom des catégories et leur icône
$listCategory = Category::findAll();


// Permet l'affichage personnalisé dans l'onglet 
// en fonction de la page visualisée
$titre = ("Mes Catégories");


// Inclusion du visuel de la page des Categories
include_once('app/views/category.php');

