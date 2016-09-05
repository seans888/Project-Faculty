<html>
<head>

</head>

<body>
	<form action="" method="post">

	<input type="text" id="emp_name" name="emp_name" placeholder="Enter an employee first name" style="width: 200px"></input><br>
	<input type="submit" id="submitButton" name="submit1" value="Search Subject!"></input><br>

	<input type="submit" id="submitButton" name="submit2" value="Display All"></input>
	</form>
	<center>
		<h1>Faculty</h1>
		<table width="600" border="1" cellpadding="15" cellspacing="1" >
		<tr>
			<th>ID</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Employee Type</th>
			<th>Specialization</th>
			<th>OTE</th>
		</tr>
					
		<?php

		include('dbconnect.php');

		if ($DBConnect != FALSE)
		{
			$records = null;
			if (isset($_POST['submit1']))
			{
				if (isset($_POST['emp_name']))
				{
					$employee = $_POST['emp_name'];
					$sql = "SELECT * from employee where emp_first_name = '$employee'";
					$records = mysql_query($sql);

					while ($faculty = mysql_fetch_array($records))
					{
						echo "<tr>";
						echo "<td>".$faculty['empid']."</td>";
						echo "<td>".$faculty['emp_last_name']."</td>";
						echo "<td>".$faculty['emp_first_name']."</td>";
						echo "<td>".$faculty['emp_middle_name']."</td>";
						echo "<td>".$faculty['emp_type']."</td>";
						echo "<td>".$faculty['specialization']."</td>";
						echo "<td>".$faculty['ote']."</td>";
						echo "</tr>";
					}
				}
			}

			if (isset($_POST['submit2']))
			{
				$sql = "SELECT * from employee";

				$records = mysql_query($sql);

				while ($faculty = mysql_fetch_array($records))
				{
					echo "<tr>";
					echo "<td>".$faculty['empid']."</td>";
					echo "<td>".$faculty['emp_last_name']."</td>";
					echo "<td>".$faculty['emp_first_name']."</td>";
					echo "<td>".$faculty['emp_middle_name']."</td>";
					echo "<td>".$faculty['emp_type']."</td>";
					echo "<td>".$faculty['specialization']."</td>";
					echo "<td>".$faculty['ote']."</td>";
					echo "</tr>";
				}
			}

			mysql_close($DBConnect);
		}
		?>
		</table>
	</center>

	<form action="" method="post">

	<input type="text" id="subject_name" name="subject_name" placeholder="Enter a subject name" style="width: 200px"></input><br>
	<input type="submit" id="submitButton" name="submit3" value="Search Subject!"></input><br>

	<input type="submit" id="submitButton" name="submit4" value="Display All"></input>
	</form>
	<center>
		<h1>Subject</h1>
		<table width="600" border="1" cellpadding="15" cellspacing="1" >
		<tr>
			<th>ID</th>
			<th>Subject Name</th>
			<th>Subject Description</th>
			<th>Unit</th>
			<th>Start Time</th>
			<th>End Time</th>
		</tr>
					
		<?php

		include('dbconnect.php');

		if ($DBConnect != FALSE)
		{
			$records = null;
			if (isset($_POST['submit3']))
			{
				if (isset($_POST['subject_name']))
				{
					$subject = $_POST['subject_name'];
					$sql = "SELECT * from subject where subject_name = '$subject'";
					$records = mysql_query($sql);

					while ($subject = mysql_fetch_array($records))
					{
						echo "<tr>";
						echo "<td>".$subject['subjectid']."</td>";
						echo "<td>".$subject['subject_name']."</td>";
						echo "<td>".$subject['subject_desc']."</td>";
						echo "<td>".$subject['unit']."</td>";
						echo "<td>".$subject['start_time']."</td>";
						echo "<td>".$subject['end_time']."</td>";
						echo "</tr>";
					}
				}
			}

			if (isset($_POST['submit4']))
			{
				$sql = "SELECT * from subject";

				$records = mysql_query($sql);

				while ($subject = mysql_fetch_array($records))
				{
					echo "<tr>";
					echo "<td>".$subject['subjectid']."</td>";
					echo "<td>".$subject['subject_name']."</td>";
					echo "<td>".$subject['subject_desc']."</td>";
					echo "<td>".$subject['unit']."</td>";
					echo "<td>".$subject['start_time']."</td>";
					echo "<td>".$subject['end_time']."</td>";
					echo "</tr>";
				}
			}

			mysql_close($DBConnect);
		}
		?>
		</table>
	</center>
		<form action="" method="post">
		<input type="submit" id="submitButton" name="submit5" value="Match!"></input>
		</form>

	<center>
		<h1>Load</h1>
		<table width="600" border="1" cellpadding="15" cellspacing="1">
			<tr>
				<th>Faculty ID</th>
				<th>Faculty First Name</th>
				<th>Faculty Last Name</th>
				<th>Faculty Middle Name</th>
				<th>Full-time/Part-time</th>
				<th>Specialization</th>
				<th>OTE</th>
				<th>Subject ID</th>
				<th>Subject Name</th>
				<th>Subject Description</th>
				<th>Unit</th>
				<th>Start Time</th>
				<th>End Time</th>
			</tr>

			<?php

			include('dbconnect.php');

			if ($DBConnect != FALSE)
			{
				if (isset($_POST['submit5']))
				{

					b:

					$sql1 = "SELECT * FROM employee";
					$records1 = mysql_query($sql1);

					while ($faculty = mysql_fetch_assoc($records1))
					{

						$sql2 = "SELECT * FROM subject";
						$records2 = mysql_query($sql2);
						
						a:

						while ($subject = mysql_fetch_assoc($records2))
						{
							if ($subject['start_time'] == "07:30" && $subject['occupied'] == 'n' && $faculty['seven_thirty'] == 'n')
							{
								if ($faculty['nine_thirty'] == 'y' && $faculty['eleven_thirty'] == 'y')
									goto a;

								else
								{
									echo "<tr>";
									echo "<td>".$faculty['empid']."</td>";
									echo "<td>".$faculty['emp_last_name']."</td>";
									echo "<td>".$faculty['emp_first_name']."</td>";
									echo "<td>".$faculty['emp_middle_name']."</td>";
									echo "<td>".$faculty['emp_type']."</td>";
									echo "<td>".$faculty['specialization']."</td>";
									echo "<td>".$faculty['ote']."</td>";
									echo "<td>".$subject['subjectid']."</td>";
									echo "<td>".$subject['subject_name']."</td>";
									echo "<td>".$subject['subject_desc']."</td>";
									echo "<td>".$subject['unit']."</td>";
									echo "<td>".$subject['start_time']."</td>";
									echo "<td>".$subject['end_time']."</td>";
									echo "</tr>";

									$update = "UPDATE employee SET seven_thirty = 'y' where empid = ".$faculty['empid'];
									mysql_query($update);

									$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
									mysql_query($update);

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
									echo "<tr>";
									echo "<td>".$faculty['empid']."</td>";
									echo "<td>".$faculty['emp_last_name']."</td>";
									echo "<td>".$faculty['emp_first_name']."</td>";
									echo "<td>".$faculty['emp_middle_name']."</td>";
									echo "<td>".$faculty['emp_type']."</td>";
									echo "<td>".$faculty['specialization']."</td>";
									echo "<td>".$faculty['ote']."</td>";
									echo "<td>".$subject['subjectid']."</td>";
									echo "<td>".$subject['subject_name']."</td>";
									echo "<td>".$subject['subject_desc']."</td>";
									echo "<td>".$subject['unit']."</td>";
									echo "<td>".$subject['start_time']."</td>";
									echo "<td>".$subject['end_time']."</td>";
									echo "</tr>";

									$update = "UPDATE employee SET nine_thirty = 'y' where empid = ".$faculty['empid'];
									mysql_query($update);

									$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
									mysql_query($update);

									goto b;
								}
							}

							else if ($subject['start_time'] == "11:30" && $subject['occupied'] == 'n' && $faculty['eleven_thirty'] == 'n')
							{
								if (($faculty['seven_thirty'] == 'y' && $faculty['nine_thirty'] == 'y') ||
									($faculty['nine_thirty'] == 'y' && $faculty['one_thirty'] == 'y'))
									goto a;

								else
								{
									echo "<tr>";
									echo "<td>".$faculty['empid']."</td>";
									echo "<td>".$faculty['emp_last_name']."</td>";
									echo "<td>".$faculty['emp_first_name']."</td>";
									echo "<td>".$faculty['emp_middle_name']."</td>";
									echo "<td>".$faculty['emp_type']."</td>";
									echo "<td>".$faculty['specialization']."</td>";
									echo "<td>".$faculty['ote']."</td>";
									echo "<td>".$subject['subjectid']."</td>";
									echo "<td>".$subject['subject_name']."</td>";
									echo "<td>".$subject['subject_desc']."</td>";
									echo "<td>".$subject['unit']."</td>";
									echo "<td>".$subject['start_time']."</td>";
									echo "<td>".$subject['end_time']."</td>";
									echo "</tr>";

									$update = "UPDATE employee SET eleven_thirty = 'y' where empid = ".$faculty['empid'];
									mysql_query($update);

									$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
									mysql_query($update);

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
									echo "<tr>";
									echo "<td>".$faculty['empid']."</td>";
									echo "<td>".$faculty['emp_last_name']."</td>";
									echo "<td>".$faculty['emp_first_name']."</td>";
									echo "<td>".$faculty['emp_middle_name']."</td>";
									echo "<td>".$faculty['emp_type']."</td>";
									echo "<td>".$faculty['specialization']."</td>";
									echo "<td>".$faculty['ote']."</td>";
									echo "<td>".$subject['subjectid']."</td>";
									echo "<td>".$subject['subject_name']."</td>";
									echo "<td>".$subject['subject_desc']."</td>";
									echo "<td>".$subject['unit']."</td>";
									echo "<td>".$subject['start_time']."</td>";
									echo "<td>".$subject['end_time']."</td>";
									echo "</tr>";

									$update = "UPDATE employee SET one_thirty = 'y' where empid = ".$faculty['empid'];
									mysql_query($update);

									$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
									mysql_query($update);

									goto b;
								}
							}

							else if ($subject['start_time'] == "03:30" && $subject['occupied'] == 'n' && $faculty['three_thirty'] == 'n')
							{
								if ($faculty['eleven_thirty'] == 'y' && $faculty['one_thirty'] == 'y')
									goto a;
								
								else
								{
									echo "<tr>";
									echo "<td>".$faculty['empid']."</td>";
									echo "<td>".$faculty['emp_last_name']."</td>";
									echo "<td>".$faculty['emp_first_name']."</td>";
									echo "<td>".$faculty['emp_middle_name']."</td>";
									echo "<td>".$faculty['emp_type']."</td>";
									echo "<td>".$faculty['specialization']."</td>";
									echo "<td>".$faculty['ote']."</td>";
									echo "<td>".$subject['subjectid']."</td>";
									echo "<td>".$subject['subject_name']."</td>";
									echo "<td>".$subject['subject_desc']."</td>";
									echo "<td>".$subject['unit']."</td>";
									echo "<td>".$subject['start_time']."</td>";
									echo "<td>".$subject['end_time']."</td>";
									echo "</tr>";

									$update = "UPDATE employee SET three_thirty = 'y' where empid = ".$faculty['empid'];
									mysql_query($update);

									$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
									mysql_query($update);

									goto b;
								}
							}
						}
					}
				}


			mysql_close($DBConnect);

			}
			?>
		</table>
	</center>
</body>

</html>