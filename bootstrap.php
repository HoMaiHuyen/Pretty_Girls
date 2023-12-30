<?php 
require_once __DIR__."/mvc/core/DotEnvironment.php";
require_once __DIR__ ."/mvc/core/functions.php";
  
session_start();
$evn = new DotEnvironment();
$evn->load();
?>