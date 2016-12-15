<?php
	include('index.php');
?><html>
<head>
	<title>Load</title>
	<link href="css/tables.css" rel="stylesheet" type="text/css">

</head>

<body>
<h3>Tentative Load for Term 2 in year <?php echo date('Y');?></h3>
	<center>
		<form action="" method="post">

			<input type="submit" id="submitButton" name="submitMatch" value="Match!"></input>

		</form>
		<?php

		if (isset($_POST['submitMatch']))
		{
			echo "<form action='save.php' method='post'>";
			echo '<input type="submit" id="submitButton" name="submitSave" value="Save"></input>';
			echo '</form>';
		}
		?>
		<h1>Load</h1>
		<table id="load" lass="container" width="600" border="1" cellpadding="15" cellspacing="1">
			<tr>
				<th>Faculty ID</th>
				<th>Faculty First Name</th>
				<th>Faculty Middle Name</th>
				<th>Faculty Last Name</th>
				<th>Full-time/Part-time</th>
				<th>Specialization</th>
				<th>OTE</th>
				<th>Subject ID</th>
				<th>Subject Name</th>
				<th>Subject Description</th>
				<th>Unit</th>
				<th>Year</th>
				<th>Term</th>
				<th>M-TH</th>
				<th>T-F</th>
				<th>Start Time</th>
				<th>End Time</th>
			</tr>

			<?php

			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				if (isset($_POST['submitMatch']))
				{
					b:

					$sql = "SELECT * FROM employee ORDER BY emp_type";
					$records1 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));

					while ($faculty = mysqli_fetch_assoc($records1))
					{
						$year = date('Y');
						$sql = "SELECT * FROM subject WHERE year = '$year'";
						$records2 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));

						a:

						while ($subject = mysqli_fetch_assoc($records2))
						{
							if ($faculty['tagged'] == 'checked')
							{
								if ($faculty['specialization'] != $subject['specialized_subjectid'])
									goto a;
								else
								{
									if ($subject['start_time'] == "07:30" && $subject['occupied'] == 'n' && $faculty['seven_thirty'] == 'n')
									{
										if ($faculty['nine_thirty'] == 'y' && $faculty['eleven_thirty'] == 'y')
											goto a;

										else
										{
											$sql = "SELECT specialization_name FROM specialization where specializationid = " . $faculty['specialization'];
											$result3 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
											$specialization = mysqli_fetch_assoc($result3);

											echo "<tr>";
											echo "<td>".$faculty['empid']."</td>";
											echo "<td>".$faculty['emp_first_name']."</td>";
											echo "<td>".$faculty['emp_middle_name']."</td>";
											echo "<td>".$faculty['emp_last_name']."</td>";
											echo "<td>".$faculty['emp_type']."</td>";
											echo "<td>".$specialization['specialization_name']."</td>";
											echo "<td>".$faculty['ote']."</td>";
											echo "<td>".$subject['subjectid']."</td>";
											echo "<td>".$subject['subject_name']."</td>";
											echo "<td>".$subject['subject_desc']."</td>";
											echo "<td>".$subject['unit']."</td>";
											echo "<td>".$subject['year']."</td>";
											echo "<td>".$subject['term']."</td>";
											echo "<td>".$subject['MTH']."</td>";
											echo "<td>".$subject['TF']."</td>";
											echo "<td>".$subject['start_time']."</td>";
											echo "<td>".$subject['end_time']."</td>";
											echo "</tr>";

											$update = "UPDATE employee SET seven_thirty = 'y' where empid = ".$faculty['empid'];
											mysqli_query($db,$update);

											$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
											mysqli_query($db,$update);

											goto b;
										}
									}

									else if ($subject['start_time'] == "09:30" && $subject['occupied'] == 'n' && $faculty['nine_thirty'] == 'n')
									{
										if (($faculty['seven_thirty'] == 'y' && $faculty['eleven_thirty'] == 'y') ||
											($faculty['eleven_thirty'] == 'y' && $faculty['one_thirty'] == 'y'))
											goto a;

										else
										{
											$sql = "SELECT specialization_name FROM specialization where specializationid = " . $faculty['specialization'];
											$result3 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
											$specialization = mysqli_fetch_assoc($result3);

											echo "<tr>";
											echo "<td>".$faculty['empid']."</td>";
											echo "<td>".$faculty['emp_first_name']."</td>";
											echo "<td>".$faculty['emp_middle_name']."</td>";
											echo "<td>".$faculty['emp_last_name']."</td>";
											echo "<td>".$faculty['emp_type']."</td>";
											echo "<td>".$specialization['specialization_name']."</td>";
											echo "<td>".$faculty['ote']."</td>";
											echo "<td>".$subject['subjectid']."</td>";
											echo "<td>".$subject['subject_name']."</td>";
											echo "<td>".$subject['subject_desc']."</td>";
											echo "<td>".$subject['unit']."</td>";
											echo "<td>".$subject['year']."</td>";
											echo "<td>".$subject['term']."</td>";
											echo "<td>".$subject['MTH']."</td>";
											echo "<td>".$subject['TF']."</td>";
											echo "<td>".$subject['start_time']."</td>";
											echo "<td>".$subject['end_time']."</td>";
											echo "</tr>";

											$update = "UPDATE employee SET nine_thirty = 'y' where empid = ".$faculty['empid'];
											mysqli_query($db,$update);

											$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
											mysqli_query($db,$update);

											goto b;
										}
									}

									else if ($subject['start_time'] == "11:30" && $subject['occupied'] == 'n' && $faculty['eleven_thirty'] == 'n')
									{
										if (($faculty['seven_thirty'] == 'y' && $faculty['nine_thirty'] == 'y') ||
											($faculty['nine_thirty'] == 'y' && $faculty['one_thirty'] == 'y')
											||
											($faculty['one_thirty'] == 'y' & $faculty['three_thirty'] == 'y'))
											goto a;

										else
										{
											$sql = "SELECT specialization_name FROM specialization where specializationid = " . $faculty['specialization'];
											$result3 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
											$specialization = mysqli_fetch_assoc($result3);

											echo "<tr>";
											echo "<td>".$faculty['empid']."</td>";
											echo "<td>".$faculty['emp_first_name']."</td>";
											echo "<td>".$faculty['emp_middle_name']."</td>";
											echo "<td>".$faculty['emp_last_name']."</td>";
											echo "<td>".$faculty['emp_type']."</td>";
											echo "<td>".$specialization['specialization_name']."</td>";
											echo "<td>".$faculty['ote']."</td>";
											echo "<td>".$subject['subjectid']."</td>";
											echo "<td>".$subject['subject_name']."</td>";
											echo "<td>".$subject['subject_desc']."</td>";
											echo "<td>".$subject['unit']."</td>";
											echo "<td>".$subject['year']."</td>";
											echo "<td>".$subject['term']."</td>";
											echo "<td>".$subject['MTH']."</td>";
											echo "<td>".$subject['TF']."</td>";
											echo "<td>".$subject['start_time']."</td>";
											echo "<td>".$subject['end_time']."</td>";
											echo "</tr>";

											$update = "UPDATE employee SET eleven_thirty = 'y' where empid = ".$faculty['empid'];
											mysqli_query($db,$update);

											$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
											mysqli_query($db,$update);

											goto b;
										}
									}

									else if ($subject['start_time'] == "01:30" && $subject['occupied'] == 'n' && $faculty['one_thirty'] == 'n')
									{
										if (($faculty['nine_thirty'] == 'y' && $faculty['eleven_thirty'] == 'y') ||
											($faculty['eleven_thirty'] == 'y' && $faculty['three_thirty'] == 'y'))
											goto a;

										else
										{
											$sql = "SELECT specialization_name FROM specialization where specializationid = " . $faculty['specialization'];
											$result3 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
											$specializtion = mysqli_fetch_assoc($result3);

											echo "<tr>";
											echo "<td>".$faculty['empid']."</td>";
											echo "<td>".$faculty['emp_first_name']."</td>";
											echo "<td>".$faculty['emp_middle_name']."</td>";
											echo "<td>".$faculty['emp_last_name']."</td>";
											echo "<td>".$faculty['emp_type']."</td>";
											echo "<td>".$specializtion['specialization_name']."</td>";
											echo "<td>".$faculty['ote']."</td>";
											echo "<td>".$subject['subjectid']."</td>";
											echo "<td>".$subject['subject_name']."</td>";
											echo "<td>".$subject['subject_desc']."</td>";
											echo "<td>".$subject['unit']."</td>";
											echo "<td>".$subject['year']."</td>";
											echo "<td>".$subject['term']."</td>";
											echo "<td>".$subject['MTH']."</td>";
											echo "<td>".$subject['TF']."</td>";
											echo "<td>".$subject['start_time']."</td>";
											echo "<td>".$subject['end_time']."</td>";
											echo "</tr>";

											$update = "UPDATE employee SET one_thirty = 'y' where empid = ".$faculty['empid'];
											mysqli_query($db,$update);

											$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
											mysqli_query($db,$update);

											goto b;
										}
									}

									else if ($subject['start_time'] == "03:30" && $subject['occupied'] == 'n' && $faculty['three_thirty'] == 'n')
									{
										if ($faculty['eleven_thirty'] == 'y' && $faculty['one_thirty'] == 'y')
											goto a;

										else
										{
											$sql = "SELECT specialization_name FROM specialization where specializationid = " . $faculty['specialization'];
											$result3 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
											$specializtion = mysqli_fetch_assoc($result3);

											echo "<tr>";
											echo "<td>".$faculty['empid']."</td>";
											echo "<td>".$faculty['emp_first_name']."</td>";
											echo "<td>".$faculty['emp_middle_name']."</td>";
											echo "<td>".$faculty['emp_last_name']."</td>";
											echo "<td>".$faculty['emp_type']."</td>";
											echo "<td>".$specialization['specialization_name']."</td>";
											echo "<td>".$faculty['ote']."</td>";
											echo "<td>".$subject['subjectid']."</td>";
											echo "<td>".$subject['subject_name']."</td>";
											echo "<td>".$subject['subject_desc']."</td>";
											echo "<td>".$subject['unit']."</td>";
											echo "<td>".$subject['year']."</td>";
											echo "<td>".$subject['term']."</td>";
											echo "<td>".$subject['MTH']."</td>";
											echo "<td>".$subject['TF']."</td>";
											echo "<td>".$subject['start_time']."</td>";
											echo "<td>".$subject['end_time']."</td>";
											echo "</tr>";

											$update = "UPDATE employee SET three_thirty = 'y' where empid = ".$faculty['empid'];
											mysqli_query($db,$update);

											$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
											mysqli_query($db,$update);

											goto b;
										}
									}
								}
							}
						}
					}
				}

			$sql = "UPDATE employee SET seven_thirty= 'n', nine_thirty='n', eleven_thirty='n', one_thirty='n', three_thirty='n'";
			$records1 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
			$sql = "UPDATE subject SET  occupied='n'";
			$records1 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));

			mysqli_close($db);

			}
			?>
		<form>
	</center>

</body>

</html>
