<?php
	include('index.php');
?>

<html>
<head>
	<title>Faculty Loading Reports</title>
	<link href="css/fieldset.css" rel="stylesheet" type="text/css">
</head>
<body>
<h3 style="color:blue">Faculty Loading Reports</h3>
<center>
	<form action="faculty_load.php" method="post">
		<fieldset>
		<table width="100%">
		<tr>
			<td>Employee: </td>
			<td width="80%"><select id="faculty" name="faculty">
					<?php
						include('db.php');
						$sql = "SELECT * from employee";
						$result = mysqli_query($db,$sql) or die("Error: " . mysqli_error($db));

						while ($faculty = mysqli_fetch_assoc($result))
						{
					?>
						<option value="<?php echo $faculty['empid']?>">
							<?php
								echo strtoupper($faculty['emp_last_name']) . ", ";
								echo strtoupper($faculty['emp_first_name']). " ";
								echo strtoupper($faculty['emp_middle_name']);
							?>
						</option>
					<?php
						}
					?>
				</td>
				</select>
			</tr>
			<tr>
			<td>Year:</td>
			<td><select id="year" name="year">
				<option value="2016">2016</option>
				<option value="2017">2017</option>
			</select>
			</td>
			</tr>
			<tr>
			<td>Term:</td>
			<td><select id="term" name="term">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
			</td>
			</tr>
			</table>
		<input type="submit" id="submit" name="submit" value="Submit" />
		</fieldset>
	</form>
</center>
</body>
</html>