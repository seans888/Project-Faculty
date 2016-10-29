<?php
	include('db.php');

	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$sql = "UPDATE employee SET seven_thirty= 'n', nine_thirty='n', eleven_thirty='n', one_thirty='n', three_thirty='n'";
		$records1 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
		$sql = "UPDATE subject SET  occupied='n'";
		$records1 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
	}

	echo "Reset done";
?>