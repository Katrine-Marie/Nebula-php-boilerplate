<?php 
	ini_set('display_errors', 1);
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);

  function autoLoader($class){
    require_once("classes/" . strtolower($class) . ".php");
  }
  spl_autoload_register('autoLoader');

 	require_once('includes/config.php');
  require_once('includes/dbConn.php');
    
  $page = $_GET['page'];

	require_once('code/fncMain.php');

	require_once('includes/header.php');
    
  if(isset($_GET['page'])){
    if(file_exists($pagesFolderPath . $page . '.php')){
      include($pagesFolderPath . $page . '.php');
    }else{
      include($pagesFolderPath . '404.php');
    }
  }else {
    include($pagesFolderPath . $frontpage);
  }

	require_once('includes/footer.php');