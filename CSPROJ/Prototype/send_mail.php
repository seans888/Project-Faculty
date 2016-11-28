<?php
include('db.php');
?>

<html>
<head>
	<link href="css/index2.css" rel="stylesheet" type="text/css">
</head>
<body>
<p><h3>Send Mail</h3></p><br />
<center>
	<form action="" method="post" id="form">
	To: <input type="text" name="email" /><br />
	Subject: <input type="text" name="subject" /><br />
	</form>
	<textarea name="message" rows="10" cols="100" form="form" placeholder="Enter Message Here... "></textarea><br />
	<input type="submit" name="submit" value="Send Mail" form="form" />
</center>
</body>
</html>

<?php
?>