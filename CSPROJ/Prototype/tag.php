<?php
include('index.php');

$sql = 'SELECT * FROM employee';
$result = mysqli_query($db,$sql) or die ("Error: ".mysqli_error($db));
?>

<html>
<head>
	<link href="css/index2.css" rel="stylesheet" type="text/css">
</head>
<body>
<h3>Tag Faculty Below</h3><br />
	<form action="" method="post">
	<?php
		while($faculty = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			echo "<input type='checkbox' name='tagged[]' value=" 
			. $faculty['username'] . " " 
			. $faculty['tagged'] . ">" 
			. $faculty['emp_last_name'] . ", "
			. $faculty['emp_first_name'] . " "
			. $faculty['emp_middle_name'] . "<br>";
		}
	?>
		<input type="submit" value="Submit">
	</form>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(!empty($_POST['tagged']))
	{
		foreach($_POST['tagged'] as $selected)
		{
			$sql = "UPDATE employee SET tagged = 'checked ' WHERE username = '$selected'";
			$result = mysqli_query($db,$sql) or die ("ERROR: " . mysqli_error($db));
		}

		echo "Tagged.";
	}

	else
	{
		$sql = "UPDATE employee SET tagged = 'unchecked '";
		$result = mysqli_query($db,$sql) or die ("ERROR: " . mysqli_error($db));

		echo "Untagged.";
	}
}
?>