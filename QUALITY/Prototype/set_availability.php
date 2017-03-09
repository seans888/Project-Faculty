<?php
	include('index.php');
?>

<html>
<head>
	<title></title>
	<link href="css/tables.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php 
if (isset($_POST['submit']))
{
	$empid =  $_POST['faculty'];
	$sql = "SELECT * FROM employee WHERE empid=" . $empid;
	$result = mysqli_query($db,$sql) or die("Error: " . mysqli_error($db));

	$faculty = mysqli_fetch_assoc($result);
	
	$first_name = $faculty['emp_first_name'];
	$last_name = $faculty['emp_last_name'];
}
?>

<h3 style="color:blue">Set Availability For <?php echo $first_name . " " . $last_name;?></h3>

</body>
</html>