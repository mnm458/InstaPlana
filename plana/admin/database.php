<?php 
$pasth = getcwd();
require_once($pasth.'/app/config/db.config.php');
/*$server = DB_HOST; //define("DB_HOST", "NP_DB_HOST"); 
$db     =  define("DB_NAME", "NP_DB_NAME"); 
$user   =  define("DB_USER", "NP_DB_USER"); 
$pass   =  define("DB_PASS", "NP_DB_PASS"); 
           define("DB_ENCODING", "utf8");*/ // DB connnection charset
 

// connecion
//echo $dbname;
//echo getcwd();
//echo "han";
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die("error of db");