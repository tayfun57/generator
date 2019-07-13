<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "generator";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Verbindung fehlgeschlagen: " . $e->getMessage();
    }
?>