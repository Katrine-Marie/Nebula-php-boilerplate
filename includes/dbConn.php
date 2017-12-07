<?php

// inkluder config.php
require_once('config.php');

// opret database-forbindelse
$objConnection = new mysqli($host, $user, $password, $database);

// check forbindelsen
if($objConnection->connect_error){
    die('Der er ikke forbindelse til databasen: ' . $objConnection->connect_errno . " " . $objConnection->connect_error);
}

// charset
$objConnection->set_charset('utf8');