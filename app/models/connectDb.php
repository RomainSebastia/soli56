<?php

// Connexion à la base de données
namespace App\Models;

use PDO;
use PDOException;
use Exception;

abstract class ConnectDb
{
    private static $db = null;
    public static function connexionDb()
    {
        if (isset($_ENV["DB_PORT"]) && (empty($_ENV["DB_PORT"]))) {
            $port = ":" . $_ENV["DB_PORT"];
        } else {
            $port = "";
        }
        
        // Vérification si on est déjà connecté ou non à la Base De Données
        // Si connecté, ça renvoi true, reste à la connexion précédente
        // sinon retourne false et tente une connexion à la BDD "soli56"
        if (isset(self::$db)) {
            return self::$db;
        } else {
            try {
                
                self::$db = new PDO("mysql:dbname=" . $_ENV["DB_NAME"] . "; host = "
                    . $_ENV["DB_HOST"] . $port
                    . "; charset = utf8", $_ENV["DB_LOGIN"], $_ENV["DB_PASSWORD"]);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$db;
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
}