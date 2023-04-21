<?php

// CRUD la table "service"

namespace App\Models;

use App\Models\ConnectDb;
use PDOException;

// Permet de récupérer la fonction displayConfirm
require_once 'app/controllers/messageInfo.php';

// Création de la classe services qui hérite de l'objet connectDb
class Service extends ConnectDb
{
   // Retourne tous les services
    public static function findAll()
    {
        try{
        $connexionDb = self::connexionDb();
        $stmt = $connexionDb->prepare("SELECT `nom`, `resume` FROM `services`");
        $stmt->execute();
        }
        catch (PDOException $e){
            print "Erreur : " . $e->getMessage();
            die;
        }
        return $stmt;
    }


    // Création d'un service
    // CREER UN TABLEAU ASSOCIATIF
    public static function createService(array $detailService)
    {
        try{
        $connexionDb = self::connexionDb();
        $stmt = $connexionDb->prepare('INSERT INTO `services` (`nom`,`resume`,`num_rue`,`nom_rue`,`cp`,`ville`,`tel`,`mail`,`site_web`,`photo`) 
        VALUES (:nom,:resume,:numRue,:nomRue,:cp,:ville,:tel,:mail,:siteWeb,:photo)');
        $stmt->execute(
            array(
                ':nom' => $detailService['name'],
                ':resume' => $detailService['summary'],
                ':numRue' => $detailService['numStreet'],
                ':nomRue' => $detailService['nameStreet'],
                ':cp' => $detailService['cp'],
                ':ville' => $detailService['city'],
                ':tel' => $detailService['tel'],
                ':mail' => $detailService['mail'],
                ':siteWeb' => $detailService['website'],
                ':photo' => $detailService['photo']
            )
        );}
        catch (PDOException $e){
            print "Erreur : " . $e->getMessage();
            die;
        }
        // message de confirmation d'ajout du service
        displayConfirm("Le service  " . $detailService['nom'] . "a bien été ajouté.");
    }


    // Retourne les services à partir de son ID
    public static function findServiceByID(int $id) : array
    {
        try{
        $connexionDb = self::connexionDb();
        $stmt = $connexionDb->prepare("SELECT `nom`, `resume`, `num_rue`, `nom_rue`, `cp`,`ville`,`tel`,`mail`,`site_web`,`ouverture`, `photo` 
        FROM `services` 
        WHERE `ID`=:id");
        $stmt->execute(
            array(
                ':id' => $id
            )
        );
    }
    catch (PDOException $e){
        print "Erreur : " . $e->getMessage();
        die;
    }
        return $stmt->fetchAll();
    }



    // Retourne le titre et de la première ligne du résumé d'un service par l'ID de la catégorie
    public static function findAllByCategory(int $id) :array
    {
        try{
        $connexionDb = self::connexionDb();
        $stmt = $connexionDb->prepare('SELECT `services`.`ID`, `services`.`nom`, `services`.`resume` 
        FROM `services` 
        JOIN `appartenir` ON (`services`.`ID` = `appartenir`.`ID_service`) 
        JOIN `categories` ON (`appartenir`.`ID_categorie` = `categories`.`ID`) 
        WHERE `categories`.`ID` = :id');
        $stmt->execute(
            array(
                ':id' => $id
            )
        );
    }
    catch (PDOException $e){
        print "Erreur : " . $e->getMessage();
        die;
    }
        return $stmt->fetchAll();
    }
    
    
    
    // Mise à jour d'un service
    public static function updateService(int $id, array $detailService)
    {
        try{
        $connexionDb = self::connexionDb();
        $stmt = $connexionDb->prepare("UPDATE `services` SET  `nom`=:nom,`resume`=:resume,`num_rue`=:numRue,`nom_rue`=:nomRue,`cp`=:cp,`ville`=:ville,`tel`=:tel,`mail`=:mail,`site_web`=:siteWeb,`photo`=:photo WHERE `ID`=:id");
        $stmt->execute(
            array(
                ':id' => $id,
                ':nom' => $detailService[0],
                ':resume' => $detailService[1],
                ':numRue' => $detailService[2],
                ':nomRue' => $detailService[3],
                ':cp' => $detailService[4],
                ':ville' => $detailService[5],
                ':tel' => $detailService[6],
                ':mail' => $detailService[7],
                ':siteWeb' => $detailService[8],
                ':photo' => $detailService[9]
            )
        );
    }
    catch (PDOException $e){
        print "Erreur : " . $e->getMessage();
        die;
    }
        // message de confirmation d'ajout du service
        displayConfirm("Le service  " . $detailService['nom'] . "a bien été ajouté.");
    }


    // Suppresion d'un service et de toutes ses dépendances par son ID
    public static function deleteService($idservice)
    {
        try{
        $connexionDb = self::connexionDb();
        $stmt1 = $connexionDb->prepare('DELETE FROM `resume` 
        WHERE `ID_1` = :idservice');
        $stmt1->execute(
            array(
                ':idservice' => $idservice
            )
        );
        $stmt2 = $connexionDb->prepare('DELETE FROM `ouvrir` 
        WHERE `ID` = :idservice');
        $stmt2->execute(
            array(
                ':idservice' => $idservice
            )
        );
        $stmt3 = $connexionDb->prepare('DELETE FROM `favoriser` 
        WHERE `ID` = :idservice');
        $stmt3->execute(
            array(
                ':idservice' => $idservice
            )
        );
        $stmt4 = $connexionDb->prepare('DELETE FROM `appartenir` 
        WHERE `ID` = :idservice');
        $stmt4->execute(
            array(
                ':idservice' => $idservice
            )
        );
        $stmt5 = $connexionDb->prepare('DELETE FROM `services` 
        WHERE `ID` = :idservice');
        $stmt5->execute(
            array(
                ':idservice' => $idservice
            )
        );
    }
    catch (PDOException $e){
        print "Erreur : " . $e->getMessage();
        die;
    }
        // message de confirmation de lien entre le service et ses dépendances
        displayConfirm("Le service " . $idservice. " et ses dépendances on bien été supprimées ");
    }


    // Association d'un service à une catégorie
    public static function serviceJoinCategory($idservice, $idcategory)
    {
        try{
        $connexionDb = self::connexionDb();
        $stmt = $connexionDb->prepare('INSERT INTO `appartenir` (`ID`, `ID_1`)
    VALUES (:idservice,:idcategorie)');
        $stmt->execute(
            array(
                ':idservice' => $idservice,
                ':idcategorie' => $idcategory
            )
        );
    }
    catch (PDOException $e){
        print "Erreur : " . $e->getMessage();
        die;
    }
        // message de confirmation de lien entre le service et la catégorie
        displayConfirm ("Le service " . $idservice . " se trouve bien dans la catégorie " . $idcategory);
    }

}