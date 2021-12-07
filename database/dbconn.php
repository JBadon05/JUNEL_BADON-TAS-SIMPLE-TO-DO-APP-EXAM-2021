<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "todos";

try {
	$conn = new PDO("mysql: host=$server; dbname=$database", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Connection Error: ".$e->getMessage();
}

?>