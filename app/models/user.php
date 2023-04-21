<?php

// Connexion de l'utilisateur (administrateur

namespace App\Models;

use App\Models\ConnectDb;
use PDO;
use PDOException;

// création d'une classe User
class User extends ConnectDb{
    
    // Permet à l'utilisateur, s'il est administrateur, de se connecter
    
    public static function getUser() {
    
        try {
            $connexionDb = self::connexionDb();
            $stmt = $connexionDb->prepare("select * from utilisateur");
            $stmt->execute();    
            $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $stmt;
    }
    


    public static function getUserByMailU($mailAdmin) {
       
        try {
            $connexionDb = self::connexionDb();
            $stmt = $connexionDb->prepare("select * from utilisateur where mailU=:mailU");
            $stmt->bindValue(':mailU', $mailAdmin, PDO::PARAM_STR);
            $stmt->execute();    
            $stmt->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $stmt;
    }


}
    

