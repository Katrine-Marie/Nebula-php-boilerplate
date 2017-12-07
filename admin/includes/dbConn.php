<?php
// inkluder config.php med konfiguration af database
require_once('config.php');

// Opret forbindelse til databaseserver
$objConnection = new mysqli($host, $user, $password, $database);

// Test om databaseforbindelsen virker!
if($objConnection->connect_error){
    die('Der er ikke fobindelse til database: ' . 
            $objConnection->connect_errno . ' ' .  
            $objConnection->connect_error);
}

// Sæt korrekt karaktersæt
$objConnection->set_charset('utf8');