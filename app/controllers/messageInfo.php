<?php


// Message d'information pour l'administrateur
// lorsqu'il veut créer, mettre à jour, supprimer
// une catégorie ou un service
  function displayConfirm($message)
  {
    include_once("app/views/messageInfo.php");
  }

  function displayError($erreur)
  {
    include_once("app/views/messageInfo.php");
  }