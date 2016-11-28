<?php
	include('db.php');

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['submit']))
		{
			$faculty = $_POST['faculty'];
			$year = $_POST['year'];
			$term = $_POST['term'];

			$sql = "SELECT * FROM `load` WHERE `facultyID` = $faculty AND `year` = '$year' AND `term` = $term";

			$result = mysqli_query($db, $sql) or die("Error: " . mysqli_error($db));

			$empid = "SELECT * FROM `employee` WHERE `empid` = $faculty";

			$emp = mysqli_query($db, $empid) or die("Error: " . mysqli_error($db));

			while ($emp2 = mysqli_fetch_assoc($emp))
			{
				$facultylastname = $emp2['emp_last_name'];
				$facultyfirstname = $emp2['emp_first_name'];
				$facultymiddlename = $emp2['emp_middle_name'];
			}
		}
	}
?>

<html>
<head>
	<title>Load</title>	 
	<link href="css/load.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<center>
	Asia Pacific College<br /><br />
	<strong>Faculty Loading Per Instructor</strong><br />
	School Year: <?php echo $year;?><br />
	Semester <?php echo $term;?><br /><br />
	</center>

	<fieldset id="fieldset1">
		<table>
			<tr>
				<td>
					Employee ID 
				</td>
				<td>
					: <strong><?php echo $faculty; ?></strong>
				</td>
			</tr>
			<tr>
				<td>
					Employee Name 
				</td>
				<td>
					: <strong><?php echo strtoupper($facultylastname) . ", "; 
					echo strtoupper($facultyfirstname) . " ";
					echo strtoupper($facultymiddlename);
					?>
					</strong>
				</td>
			</tr>
		</table>
	</fieldset>

	<center>
	<fieldset id="fieldset2">
	<strong>TEACHING LOAD</strong>
	<table>
		<div id="th">
		<thead>
		<tr>
			<th>
				Subject
			</th>
			<th>
				Schedule
			</th>
			<th>
				Section
			</th>
			<th>
				Units
			</th>
		</tr>
		</thead>
		<?php
		$unit = 0;
			while ($tablecontent = mysqli_fetch_assoc($result))
			{
		?>
		<tr align="center">
			<div id="tablecontent">
			<td>
				<?php echo $tablecontent['subject_name'];?>
			</td>
			<td>
				<?php echo $tablecontent['start_time'];?> - <?php echo $tablecontent['end_time']?>
			</td>
			<td>
				CSIT01
			</td>
			<td>
				3.0
			</td>
			</div>
		</tr>
		<?php
			$unit += 3;
			}
		?>
		</div>
	</table>
	<div id="total_unit">
		Total number of units: <?php echo $unit . ".0";?>	
	</div>
	</fieldset>
	</center>
</body>
</html>