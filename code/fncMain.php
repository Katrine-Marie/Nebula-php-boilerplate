<?php

// Funktion til at indsætte titel på header.php
function setPageTitle($page){
    
    $title = '';
    
    switch($page){
        case 'home':
            $title = 'Forside | Titel';
            break;
        case 'login':
            $title = 'Login | Titel';
            break;
        default:
            $title = 'Titel';
            break;
    }
    
    return $title;
    
}

// velkomst-besked til bruger efter login
function welcomeUser($name){
    return "Velkommen til kontrolpanelet, " . $name;
}

// check om required felter er udfyldt
function isRequired($required){
    if(empty($required) || !isset($required)){
        return true;
    }else {
        return false;
    }
}

// check om der er indtastet en korrekt email adresse
function emailValidate($e){
    if(filter_var($e, FILTER_VALIDATE_EMAIL)){
        return true;
    }else {
        return false;
    }
}