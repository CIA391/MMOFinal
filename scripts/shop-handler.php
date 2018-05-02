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

$sql = "SELECT * FROM ship";
$result = $conn->query($sql);

$id = $_POST['buy'];
$count = 0;
while($row = $result->fetch_assoc())
{
    $sql = "SELECT cannons, gold, flags, crew, rum, sails, size from items WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    //STATS
    $cannons = $row['cannons'];
    $gold = $row['gold'];
    $flags = $row['flags'];
    $crew = $row['crew'];
    $rum = $row['rum'];
    $sails = $row['sails'];
    $size = $row['size'];

    $username = $_POST['username'];
    $query = "SELECT id from users WHERE username = '$username'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);

    $userId = $row ['id'];

    $sql =  "UPDATE ship SET gold = gold - '$gold' WHERE id = '$userId'";
    $sql1 = "UPDATE ship SET cannons = cannons + '$cannons' WHERE id = '$userId'";
    $sql2 = "UPDATE ship SET flags = flags + '$flags' WHERE id = '$userId'";
    $sql3 = "UPDATE ship SET crew = crew + '$crew' WHERE id = '$userId'";
    $sql4 = "UPDATE ship SET rum = rum + '$rum' WHERE id = '$userId'";
    $sql5 = "UPDATE ship SET sails = sails + '$sails' WHERE id = '$userId'";
    $sql6 = "UPDATE ship SET size = size + '$size' WHERE id = '$userId'";
    mysqli_query($conn,$sql1);
    mysqli_query($conn,$sql2);
    mysqli_query($conn,$sql3);
    mysqli_query($conn,$sql4);
    mysqli_query($conn,$sql5);
    mysqli_query($conn,$sql6);
    if(mysqli_query($conn,$sql)){
        ("Location: ../index?page=market.php");
        echo "Check";
    }else{
        echo "Nah";
    }
}