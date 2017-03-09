<?php
	if (isset($_POST['submit']))
	{
		$sql = "SELECT * FROM employee WHERE tagged = 'checked'";
		$result = mysqli_query($db,$sql) or die("Error: " . mysqli_error($db));

		$spec = $_POST['specialization'];
		$count = 0;
		while ($faculty = mysqli_fetch_assoc($result))
		{
			$update = "UPDATE employee SET specialization = $spec[$count] where empid = ".$faculty['empid'];
			mysqli_query($db,$update);
			$count++;
		}
		
		mysqli_close($db);
		header('location: specialization.php');
		echo "<script type='text/javascript'>alert('Saved!');</script>";
	}
?>