<?php 
// Environment
define("ENV","development"); // [production,development]
// session
if (isset($_COOKIE["User"])){
	setcookie("PHPSESSID",md5($_COOKIE["User"]),0,"/");
}
session_start();
//error reporting
if (ENV == "production"){
	error_reporting(0);	
}
// Site Config
define("TITLE","OSC");
define("HOME_PATH",explode("index.php",$_SERVER["SCRIPT_NAME"])[0]);
// Database Config
define("DB_HOST","127.0.0.1");
define("DB_USER","root");
define("DB_PWD","786");
define("DB_NAME","shakir");
// Load Main Files
define("FUNCTIONS","function.php");
define("BOOTSTRAP","bootstrap.php");
// Includes
require FUNCTIONS;
require BOOTSTRAP;
//$_SESSION['cart'] = array();
?>