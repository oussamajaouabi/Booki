<?php 

$db_name = "mysql:host=localhost:3307;dbname=booki_db";
$username = "root";
$password = "root";

try{
	$conn = new PDO($db_name, $username, $password);
}
catch (PDOException $e){
	print "Erreur : " . $e->getMessage(); die();
}
?>