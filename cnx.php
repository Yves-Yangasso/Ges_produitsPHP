<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gesproduits";

try {
  
  $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //echo "Connection : ";
} catch(PDOException $e) {

  // echo "Connection failed: " . $e->getMessage();

 // header("location: ./bd/erreurConnexion.php" );

 // include_once "./bd/erreurConnexion.php";
  
  die();
}

?>