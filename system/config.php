<?php
//Basically my DB-Connect
$dbserver 		= "localhost";
$dbusername 	= "root";
$dbpassword 	= "ciamwa2511";
$db 			= "MMO";

//create connection
$conn = new mysqli($dbserver,$dbusername,$dbpassword, $db);

//check connection
if($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
}
?>