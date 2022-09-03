<?php
    define("HOST", "sql10.freesqldatabase.com");
    define("USER", "sql10516926");
    define("PASSWORD", "VIhxTumsSr");
    define("DB", "sql10516926");

    function connection()
    {
        try {
            return new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASSWORD);
            print("Conectado");
        } catch (PDOException $e) {
            print("Error: " . $e->getMessage());
        }
    }
