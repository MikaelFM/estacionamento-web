<?php
    define("HOST", "sql10.freesqldatabase.com");
    define("USER", "sql10516926");
    define("PASSWORD", "VIhxTumsSr");
    define("DB", "sql10516926");
    define("connection", connection());

    function connection()
    {
        try {
            return new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASSWORD);
        } catch (PDOException $e) {
            return false;
        }
    }

