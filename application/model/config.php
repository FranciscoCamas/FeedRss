<?php
/*
 function EnServer(){

  $EnServerDB = false;
   return $EnServerDB;
 }
 $EnServerDB =  is_file( "Mahshoki.php" );
 $EnServerDB = include("Mahshoki.php");
*/

//$EnServerDB = file_exists( "./Mahshoki.php" );
//$EnServerDB =  is_file( "Mahshoki.php" );
 //echo  "EnServerDB [".$EnServerDB."]"; die();
$EnServerDB = true;
return array(
    "db"       => "mysql:host=localhost;dbname=FeedRSS",
    "username" => ( $EnServerDB ) ? "root" : "UnServerUser", 
    "password" => ( $EnServerDB ) ? ""     : "Unconfidencial" ,
    "baseg"    => "FeedRSS",
    "servidor" => "localhost"
);
?>