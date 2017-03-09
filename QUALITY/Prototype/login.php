<?php
	include("db.php");
	session_start();
    
	$error = "";
   
	if(isset($_POST['submit'])) 
	{

	$myusername = $_POST['username'];
	$mypassword = $_POST['password']; 
    
	$sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";

	$result = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));

	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	$active = $row['active'];
    
	$count = mysqli_num_rows($result);
		
		if($count == 1) 
		{
			$_SESSION['login_user'] = $myusername;

			header("location: index.php");
		}

		else 
		{
			$error = "<span style='text-decoration-color: red;'>Your Login Name or Password is invalid!</span>";
		}
	}
?>

<html>
<head>
	<title>Log In</title>
	<link href="css/login.css" rel="stylesheet" type="text/css">

	<style>
		body {
			background: url(img/login_background.jpg) no-repeat center center fixed; 
			background-size: 100% 100%;
		}
	</style>
</head>

<body>
	<div id="log_in_form">
		<center>
			<img src="img/apc_logo.png" />
			<p>Faculty Loading <br />System</p>
			<hr />
			<form id="form" action="" method="post">
				<p>
					<input type="text" name="username" placeholder="Username" /> <br />

					<input type="password" name="password" placeholder="Password" /> <br />

					<input type="submit" name="submit" value="Log In" />
					<div id ="error"> <?php echo $error ?> </div>
				</p>
			</form>
		</center>
	</div>
</body>
</html>