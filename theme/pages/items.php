	<head>
					<title>Shop</title>
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
					<p>This is the shop!</p>
					<?php 
						if(isset($_SESSION['log'])){
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
							$username = $_SESSION['log'];
							
							$query = "SELECT id from users WHERE username = '$username'";
							$result = mysqli_query($conn,$query);
							$row = mysqli_fetch_assoc($result);
							
							
							//User data
							$userId = $row['id'];
							
							//Get ship
							$query = "SELECT cannons,crew,flags,gold,rum,sails,size from ship WHERE id = '$userId'";
							$result = mysqli_query($conn,$query);
							$row = mysqli_fetch_assoc($result);
							
							
							//Get Ship
							$cannons = $row['cannons'];
							$gold = $row['gold'];
							$flags = $row['flags'];
							$crew = $row['crew'];
							$rum = $row['rum'];
							$sails = $row['sails'];
							$size = $row['size'];
					?>
						<H3> Hello <?php echo $username; ?>  </H3>
						<div class = "battle-wrapper">
							<div class = "market">
							<h4>ITEMS IN THE SHOP</h4>
							<?php
                                    $querys = "SELECT * FROM items ORDER BY gold ASC";
                                    $results=mysqli_query($conn,$querys);
                                    $row_count=mysqli_num_rows($results);
                                    $row_users = mysqli_fetch_array($results);
									echo "<table border='1'>";
									//while ($row_users = mysqli_fetch_array($results)) {

									echo "<tr><td>";
									echo "NAME: ";
									echo $row_users['name'];
									echo "<br>";
									echo "GOLD: ";
									echo $row_users['gold'];
									echo "<br>";
									echo "CREW: ";
									echo $row_users['crew'];
									echo "<br>";
                                    echo "CANNONS: ";
                                    echo $row_users['cannons'];
                                    echo "<br>";
                                    echo "FLAGS: ";
                                    echo $row_users['flags'];
                                    echo "<br>";
                                    echo "RUM: ";
                                    echo $row_users['rum'];
                                    echo "<br>";
                                    echo "SIZE: ";
                                    echo $row_users['size'];
                                    echo "<br>";
									?>
									<form action="scripts/shop-handler.php" method="POST">
									<input type="hidden" name="username" value="<?php echo $username ?>">
									<button type="submit" value=<?php echo $row_users['id']?> name="buy"> Buy this! </button>
									</form>
									<?php
									echo "</td>";
									echo "<td>";
									}
									echo "</table>";
									echo "Your money is GOLD:" . $gold;
							?> <br>
							<br>
							<br>
							
						
							</div>
					<?php 

					?>
					</div>
				</div>
                    <?php include 'footer.php'; ?>
				</body>
			</div>
</html>