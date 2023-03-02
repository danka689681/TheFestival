<?php

class Database
{
    protected $connection;

    function __construct()
    {
            $serverName = "festival.mysql.database.azure.com";
            $username = "admin123";
            $password = "secret123.";
            $databaseName = "festival";

        try {
            $this->connection = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }
}