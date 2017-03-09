<?php
	include('index.php');
?>

<html>
<head>
	<title>Encode Specialization</title>
	<link href="css/tables.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	$sql = "SELECT * FROM employee WHERE tagged = 'checked'";
	$result = mysqli_query($db,$sql) or die("Error: " . mysqli_error($db));
?>
<h3 style="color:blue">Encode Specialization</h3>
<center>
	<form action="faculty_specialization.php" method="post">

		<input type="submit" id="submit" name="submit" value="Submit" /><br /><br />
		<table id="load" lass="container" width="600" border="1" cellpadding="15" cellspacing="1">
			<tr>
				<th>
					Faculty ID
				</th>
				<th>
					Faculty First Name
				</th>
				<th>
					Faculty Last Name
				</th>
				<th>
					Faculty Middle Name
				</th>
				<th>
					Specialization
				</th>
			</tr>
			<?php

			while ($faculty = mysqli_fetch_assoc($result))
			{
				echo "<tr>";
				echo "<td>";
				echo $faculty['empid'];
				echo "</td>";
				echo "<td>";
				echo $faculty['emp_first_name'];
				echo "</td>";
				echo "<td>";
				echo $faculty['emp_last_name'];
				echo "</td>";
				echo "<td>";
				echo $faculty['emp_middle_name'];
				echo "</td>";
				echo "<td>";
				echo "<select id='specialization' name='specialization[]'>";

				$sql = "SELECT * FROM specialization";
				$result2 = mysqli_query($db,$sql) or die("Error: " . mysqli_error($db));

				while ($specialization = mysqli_fetch_assoc($result2))
				{
					echo "<option value=" . $specialization['specializationid'] . ">";
					echo $specialization['specialization_name'];
					echo "</option>";
				}
				
				echo "</td>";
				echo "</tr>";
			}
			?>
		</table>
	</form>
</center>
</body>
</html>