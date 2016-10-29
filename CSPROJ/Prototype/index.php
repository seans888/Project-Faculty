<?php
   include('session.php');
?>

<html>
<head>
	<title>Faculty Loading System</title>
	<link href="css/index2.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="skin"></div>
	<div id="header">
		<div id="header-text">
			PROJECT: ALFAFARA - Faculty Loading System
		</div>
	</div>
	<div id="navbar">
		<ul>
			<li><a href="#">HOME</a></li>
			<li><a href="fl.php" target="target">FACULTY LOADING SYSTEM</a></li>
			<li><a href="#">PROFILE</a></li>
			<li><a href="#">HELP</a></li>
			<li><a href="logout.php">LOGOUT</a></li>
			<div id="username">
				<div id="logged-in-as">
					You are logged in as: <?php echo "<span style='color: #c60000; font-weight: bold'>$login_session</span>" ?>
				</div>
			</div>
		</ul>
	</div>
	<div id="welcome-user">
		Welcome to your control center, <?php echo "$user_firstname " . "$user_lastname" ?>
	</div>
	<div id="iframe">
		<iframe name="target" id="target">
		</iframe>
	</div>
</body>
</html>