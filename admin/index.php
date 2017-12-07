<?php 
	ini_set('display_errors', 1);
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);

  session_start();
  require('code/session.php');

  function autoLoader($class){
    require_once("classes/" . strtolower($class) . ".php");
  }
  spl_autoload_register('autoLoader');
  
  require_once('includes/config.php');
  require_once('includes/dbConn.php');

  require('../code/fncMain.php');
	require('code/crud.php');
    
  require('includes/header.php');
    
  $page = $_GET['page'];
    
  if(isset($_GET['page'])){
    if(file_exists($pagesFolderPath . $page . '.php')){
    	include($pagesFolderPath . $page . '.php');
    }else{
      include($pagesFolderPath . '404.php');
    }
  }else {
    include($pagesFolderPath . $frontpage);
  }

  require('includes/footer.php');