<html>
			<head>				
					<title>Homepage</title>
					<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
					<meta charset="utf-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

					<!-- Bootstrap -->
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
					
					<!-- Body Font -->
					<link href="theme/css/font.css" rel="stylesheet" type = "text/css">
					
			</head>
			
				<body background="theme/assets/pirates_back.png">
			<div id="wrapper">
				<div class="layer">
					<?php include 'header.php'; ?>
				</div>
				
				<div class="layer">
					<div class = "content">
					<p>This is the homepage</p>
                        <?php

                        //Basically my DB-Connect
                        $dbserver = "localhost";
                        $dbusername = "root";
                        $dbpassword = "ciamwa2511";
                        $db = "MMO";

                        //create connection
                        $conn = new mysqli($dbserver,$dbusername,$dbpassword, $db);

                        //check connection
                        if($conn->connect_error){
                            die("connection failed: ".$conn->connect_error);
                        }
						if(isset($_SESSION['log'])){
						
							$username = $_SESSION['log'];
							$query = "SELECT id from users WHERE username = '$username'";
							$result = mysqli_query($conn,$query);
							$row = mysqli_fetch_assoc($result);

							//User data
							$userId = $row['id'];

							//Get STATS
							$query = "SELECT cannons, gold, flags, crew, rum, sails, size from ship WHERE id = '$userId'";
							$result = mysqli_query($conn,$query);
							$row = mysqli_fetch_assoc($result);
							
							
							//Ship stats
                            $cannons = $row['cannons'];

                            $gold = $row['gold'];
                            $flags = $row['flags'];
                            $crew = $row['crew'];
                            $rum = $row['rum'];
                            $sails = $row['sails'];
                            $size = $row['size'];

							//Get AI!
							$query = "SELECT name, cannons, flags, crew, rum, sails, size from AI WHERE id = '1'";
							$result = mysqli_query($conn,$query);
							$row = mysqli_fetch_assoc($result);
							//AI
                            $Eflags = $row['flags'];
                            $Ecrew = $row['crew'];
                            $Erum = $row['rum'];
                            $Esails = $row['sails'];
                            $Esize = $row['size'];
                            $Ename = $row['name'];




					?>
						<H3> Hello <?php echo $username; ?>  </H3>
						<div class = "battle-wrapper">
							<div class = "items">
							<h4>Stats</h4>
							    <?php echo "SIZE: " .$size; ?> <br>
							    <?php echo "GOLD: " .$gold; ?> <br>
							    <?php echo "CANNONS: " .$cannons; ?> <br>
							    <?php echo "CREW: " .$crew; ?> <br>
                                <?php echo "SAILS: " .$sails; ?> <br>
                                <?php echo "RUM: " .$rum; ?> <br>
                                <?php echo "FLAGS: " .$flags; ?> <br>
							<br>
							<br>


							</div>
							<div class = "AI">
							    <?php echo "SIZE: " .$Esize; ?> <br>
                                <?php echo "CANNONS: " .$Ecannons; ?> <br>
                                <?php echo "CREW: " .$Ecrew; ?> <br>
                                <?php echo "SAILS: " .$Esails; ?> <br>
                                <?php echo "RUM: " .$Erum; ?> <br>
                                <?php echo "FLAGS: " .$Eflags; ?> <br>
                                <?php echo "NAME: " .$Ename; ?> <br>


                            </div>
                        <?php}?>

                            <form action="scripts/attack-handler.php" method="POST">
                            <div class="container">
                                <br><br><button type="submit" value=<?php echo $userId ?> name="ID">Attack the ship!!!</button>
                            </div>
                        </form>
                    </div>
                    <?php } ?>


					</div>
				</div>
                    <?php include 'footer.php'; ?>
				</body>
			</div>
</html>