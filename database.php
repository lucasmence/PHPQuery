<?php

class Database {
    private static $filePath = 'database.json';
    private static $connection = null;

    public static function connect() {

        if (null == self::$connection) {

            try {
                $fileRaw = file_get_contents(self::$filePath);

                $connectionData = json_decode($fileRaw);

                self::$connection = new PDO (
                    "mysql:host=" . $connectionData->hostname . ";" . 
                    "port=" . $connectionData->port . ";" . 
                    "dbname=" . $connectionData->databaseName, 
                    $connectionData->username, 
                    $connectionData->password);        
                
            } catch (PDOException $exception) {

                die( $exception->getMessage() );
            }
        }

        return self::$connection;
    }

    public static function disconnect() {

        self::$connection = null;

    }
}