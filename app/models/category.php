<?php

// CRUD de la table "categorie"
namespace App\Models;

use App\Models\ConnectDb;
use PDOException;

// Permet de récupérer la fonction displayConfirm
require_once 'app/controllers/messageInfo.php';


// Création d'une classe Category qui hérite de la classe ConnectDb
class Category extends ConnectDb
{
    // Retourne l'id, le nom et l'icône de toutes les catégories
    public static function findAll()
    {
        try {
            $connexionDb = self::connexionDb();
            $stmt = $connexionDb->prepare("SELECT `ID`,`nom`, `icone` FROM `categories`");
            $stmt->execute();
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
            die;
        }
        return $stmt->fetchAll();
    }


    // Retourne le nom et l'icône de la catégorie à partir de  son ID
    public static function findByID(int $id): array
    {
        try {
            $connexionDb = self::connexionDb();
            $stmt = $connexionDb->prepare("SELECT `nom`, `icone` FROM `categories` WHERE `ID`= :id");
            $stmt->execute(
                array(
                    ':id' => $id,
                )
            );
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
            die;
        }
        return $stmt->fetch();
    }



    //  Retourne le nom d'une catégorie et de son icone à partir de son nom
    public static function getByName(string $name): array
    {
        try {
            $connexionDb = self::connexionDb();
            $stmt = $connexionDb->prepare("SELECT `nom`, `icone` FROM `categories` WHERE `nom` = :nom");
            $stmt->execute(
                array(
                    ':nom' => $name,
                )
            );
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
            die;
        }
        return $stmt->fetch();
    }


    //  Création d'une catégorie
    public static function create(string $name, string $icon)
    {
        try {
            $connexionDb = self::connexionDb();
            $stmt = $connexionDb->prepare('INSERT INTO `categories` (`nom`,`icone`) VALUES (:nom,:icone)');
            $stmt->execute(
                array(
                    ':nom' => $name,
                    ':icone' => $icon
                )
            );
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
            die;
        }
        // message de confirmation d'ajout de la categorie
        displayConfirm("La catégorie " . $name . " et son icône " . $icon . " ont bien été ajoutées.");
    }


    // Mise à jour d'une catégorie par son ID
    public static function update(int $id, string $newName, string $newIcon)
    {
        try {
            $connexionDb = self::connexionDb();
            $stmt = $connexionDb->prepare("UPDATE `categories` SET `nom` = :nom, `icone` = :nomIcone WHERE `ID` = :id");
            $stmt->execute(
                array(
                    ':nom' => $newName,
                    ':nomIcone' => $newIcon,
                    ':id' => $id
                )
            );
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
            die;
        }
        // message de confirmation de modification du nom de la catégorie et/ou de son icone
        displayConfirm("Vous avez remplacé la catégorie numéro : " . $id . " par le nouveau nom : "
            . $newName . " et son icone par : " . $newIcon);
    }



    // Suppression d'une catégorie par son ID
    public static function delete(string $idcategory)
    {
        try {
            $connexionDb = self::connexionDb();
            $stmt1 = $connexionDb->prepare('DELETE FROM `appartenir` WHERE `ID_1` = :idcategorie');
            $stmt1->execute(
                array(
                    ':idcategorie' => $idcategory
                )
            );
            $stmt2 = $connexionDb->prepare("DELETE FROM `categories` WHERE `ID` = :id");
            $stmt2->execute(
                array(
                    ':id' => $idcategory
                )
            );
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
            die;
         }
        // message de confirmation de suppression de la categorie
        displayConfirm("Vous avez bien supprimé la catégorie numéro : " . $idcategory);
   
}
}