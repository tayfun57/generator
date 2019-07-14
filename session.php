<?php
session_start();
$location = "./login.php";
if(empty($_SESSION['userid'])){
  header("Location: " . $location);
  exit; 
}

 ?>