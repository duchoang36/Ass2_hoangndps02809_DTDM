<?php

$servername = "host1.vietnix.vn";
$username = "cornerco";
$password = "7q7tkMZj06";
$dbname = "cornerco_t3hdbnew";

try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    	die("Undefined");
    }

?>
