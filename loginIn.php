
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		if (isset($_POST['loginIn'])){
			session_start();
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$servername = "sql.njit.edu";
			$username = "eo65";
			$password = "";
			$dbname = "eo65";
		
			//Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) die($conn->connect_error);

			$sql = "SELECT * FROM accounts where email = '$email'";
			$result = $conn->query($sql);
			$info = "";
			if ($result->num_rows == 0) {
	    		$info = "Email address does not exist.";
			} 
			else{
				while($row = mysqli_fetch_assoc($result)){
					$real_password = $row['password'];
					if($real_password != $_POST['password']){
						$info = "Incorrect password. Please try again.";
					}
					else{
						$_SESSION["fname"] = $row['fname'];
						$_SESSION["lname"] = $row['lname'];
						header("location:mainPage.php");
					}
				}
			}
		}
		else{
			$_POST=array();
			header("location:signUp.php");
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>OceanBox</title>
	<style type="text/css">
	
		h1 {
			text-align: center;
			color: white;
		}
		
		.page {
			width: 50%;
			height: 50px;
			text-align: center;
			margin: auto
		}

		.error {

		}
		
		body {
			background: linear-gradient(to bottom, #003366 0%, #00ccff 100%);
		}
		
		label, h2 {
			color: white;
		}
		
		form {
			background: linear-gradient(to top, #66ffff 0%, #003399 100%); !important;
			padding-bottom: 2em;
			border: 5px solid white;
			border-radius: 10px;
		}
		
	</style>
	
	<h1>OceanBox</h1>
</head>

<body>
	
	<div class="page">	
	
		<form action="loginIn.php" method="post">
        <h2>Please log in</h2>
        <label>Email Address<br />
			<input type="text" required name="email" /></label>
			<span class="error">* <?php echo $emailErr;?></span><br />
        <label>Password<br />
			<input type="text" required name="password"></label>
			<span class="error">* <?php echo $passErr;?></span><br /><br />
		<input type="submit" name="loginIn" value="Sign In"> <br /><br />
			
			<a href="signUp.php">Have an account already? Click here to Log in</a> <br /><br />
        
        <?php
          if ($info != ""){
            echo $info."<br>";
          }
        ?>
      </form>	
	</div>
	<!--<p>&copy; </p> -->
</body>
</html>