<?php
//ARCHIVO PARA LA CONEXION A LA BBDD
$servername = "localhost";
$username = "peto";
$password = "zap";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=dwebguru", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
