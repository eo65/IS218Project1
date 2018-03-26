<?php
	$dsn = 'mysql:host=sql.njit.edu;dbname=eo65';
	$username = 'eo65';
	$password = 'MwLK7hWv1';

	try
	{
		$db = new PDO($dsn, $username, $password);
	}
	
	catch (PDOException $e)
	{
		$error_message = $e->getMessage();
    	echo $error_message;
    	exit();
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
	
		<form action="db.php" method="post">
			<!--<legend><h2>Sign Up</h2></legend> -->
			<h2>Sign Up</h2>
			<label>First Name<br />
				<input type="text" name="first" /></label><br />
			<label>Last Name<br />
				<input type="text" name="last"></label><br />
			<label>Email Address<br />
				<input type="text" name="email" /></label><br />
			<label>Phone Number<br />
				<input type="text" name="number"></label><br />
			<label>Birthday<br />
				<input type="text" name="birthday"></label><br />
			<label>Gender<br />
				<input type="text" name="gender"></label><br /><br />
			<input type="submit" value="Sign In"> <br /> <br />
			<a href="#">Have an account already? Click here to Log in</a>
		</form>		
	</div>
	<!--<p>&copy; </p> -->
</body>
</html>