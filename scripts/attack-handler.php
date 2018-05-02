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
		
		$userId = $_POST['ID'];

		$sql = "SELECT * FROM AI WHERE id = '1'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
			//Ship stats
			$Ecannons = $row['cannons'];
			$Eflags = $row['flags'];
			$Ecrew = $row['crew'];
			$Erum = $row['rum'];
			$Esails = $row['sails'];
			$Esize = $row['size'];
			$NOTotal = $size + $sails + $rum + $crew +$flags + $cannons;

		$sql = "SELECT * from ships WHERE id = '$userId'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);

            //Ship stats
			$cannons = $row['cannons'];
            $gold = $row['gold'];
            $flags = $row['flags'];
            $crew = $row['crew'];
            $rum = $row['rum'];
            $sails = $row['sails'];
            $size = $row['size'];
            $YESTotal = $size + $sails + $rum + $crew +$flags + $cannons;

            if ($YESTotal < $NOTotal){
            	$sql =  "UPDATE ship SET gold = gold + '30' WHERE id = '$userId'";
            	} else {
            	$sql =  "UPDATE ship SET gold = gold + '100' WHERE id = '$userId'";
            }
			if(mysqli_query($conn,$sql)){
			if (isset($_POST['attack'])) {
				header("Location: ../index.php");
			} else {
				header("Location: ../index.php");
			}
			die();
			}else{
			header("Location: ../index.php");
			die();

		}
?>

