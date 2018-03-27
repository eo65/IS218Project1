<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['signUp'])){		
	session_start();

	$email = $_POST['email'];
	$fname = $_POST['first'];
	$lname = $_POST['last'];
	$phone = $_POST['number'];
	$birthday = $_POST['birthday'];
	$gender = $_POST['gender'];
	$password = $_POST['password'];	
	
	$servername = "sql.njit.edu";
	$username = "eo65";
	$password = "";
	$dbname = "eo65";
		
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) die($conn->connect_error);

	$sql = "SELECT * FROM accounts WHERE email = '$email'";
	$result = $conn->query($sql);
	$info = "";
	
	if ($result->num_rows > 0) {
    	$info = "Email address already exists.";
	}
	else {
		$sql = "INSERT INTO accounts VALUES" . "('$email', '$fname', '$lname', '$phone', '$birthday', '$gender', '$password')";
		$result = $conn->query($sql);
		$_SESSION["fname"] = $fname;
		$_SESSION["fname"] = $lname;
		header("location:loginIn.php");
	}
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
	
		<form action="signUp.php" method="post">
			<!--<legend><h2>Sign Up</h2></legend> -->
			<h2>Sign Up</h2>
			<label>First Name<br />
				<input type="text" required name="first" /></label><br />
			<label>Last Name<br />
				<input type="text" required name="last"></label><br />
			<label>Email Address<br />
				<input type="text" required name="email" /></label><br />
			<label>Phone Number<br />
				<input type="text" required name="number"></label><br />
			<label>Birthday<br />
				<input type="text" required name="birthday"></label><br />
			<label>Gender<br />
				<input type="text" required name="gender"></label><br />
			<label>Password<br />
				<input type="text" required name="password"></label><br /><br />
			<input type="submit" value="Sign Up" name="signUp"> <br /><br />
			<a href="loginIn.php">Have an account already? Click here to Log in</a><br /><br />

			<?php
				if ($info != "")
				{
				 	echo $info."<br>";
				}
			?>
		</form>		
	</div>
	<!--<p>&copy; </p> -->
</body>
</html>