<?php
	include('index.php');
?>

<html>
<head>
	<title>Load</title>
	<link href="css/tables.css" rel="stylesheet" type="text/css">

</head>

<body>
	<center>
		<form action="load.php" method="post">
		<input type="submit" id="submitButton" name="submitMatch" value="Match!"></input>
		</form>
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
				<th>Day 1</th>
				<th>Day 2</th>
				<th>Start Time</th>
				<th>End Time</th>
			</tr>

			<?php
			
			include('session.php');

			if($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				if (isset($_POST['submitSave']))
				{

					b:

					$sql = "SELECT * FROM employee";
					$records1 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));

					while ($faculty = mysqli_fetch_assoc($records1))
					{
						$year = "2015";

						$sql = "SELECT * FROM subject WHERE year = '$year'";
						$records2 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
						
						a:

						while ($subject = mysqli_fetch_assoc($records2))
						{

							if ($faculty['tagged'] == 'checked')
							{
								if ($subject['start_time'] == "07:30" && $subject['occupied'] == 'n' && $faculty['seven_thirty'] == 'n')
								{
									if ($faculty['nine_thirty'] == 'y' && $faculty['eleven_thirty'] == 'y')
										goto a;

									else
									{
										$insert = "INSERT INTO `load`(`facultyID`, `faculty_first_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES ";
										$insert .= "(";
										$insert .= $faculty['empid'].",";
										$insert .= "'$faculty[emp_first_name]',";
										$insert .= "'$faculty[emp_last_name]',";
										$insert .= "'$faculty[emp_type]',";
										$insert .= "'$faculty[specialization]',";
										$insert .= $faculty['ote'].",";
										$insert .= $subject['subjectid'].",";
										$insert .= "'$subject[subject_name]',";
										$insert .= "'$subject[subject_desc]',";
										$insert .= $subject['unit'].",";
										$insert .= "'$subject[year]'".",";
										$insert .= "'$subject[term]',";
										$insert .= "'$subject[start_time]',";
										$insert .= "'$subject[end_time]',";
										$insert .= "'$login_session'";
										$insert .= ");";

										mysqli_query($db,$insert) or die("Error: ".mysqli_error($db));

										$insert = "";

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
										$insert = "INSERT INTO `load`(`facultyID`, `faculty_first_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES ";
										$insert .= "(";
										$insert .= $faculty['empid'].",";
										$insert .= "'$faculty[emp_first_name]',";
										$insert .= "'$faculty[emp_last_name]',";
										$insert .= "'$faculty[emp_type]',";
										$insert .= "'$faculty[specialization]',";
										$insert .= $faculty['ote'].",";
										$insert .= $subject['subjectid'].",";
										$insert .= "'$subject[subject_name]',";
										$insert .= "'$subject[subject_desc]',";
										$insert .= $subject['unit'].",";
										$insert .= "'$subject[year]'".",";
										$insert .= "'$subject[term]',";
										$insert .= "'$subject[start_time]',";
										$insert .= "'$subject[end_time]',";
										$insert .= "'$login_session'";
										$insert .= ");";

										mysqli_query($db,$insert) or die("Error: ".mysqli_error($db));

										$insert = "";

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
										($faculty['nine_thirty'] == 'y' && $faculty['one_thirty'] == 'y'))
										goto a;

									else
									{
										$insert = "INSERT INTO `load`(`facultyID`, `faculty_first_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES ";
										$insert .= "(";
										$insert .= $faculty['empid'].",";
										$insert .= "'$faculty[emp_first_name]',";
										$insert .= "'$faculty[emp_last_name]',";
										$insert .= "'$faculty[emp_type]',";
										$insert .= "'$faculty[specialization]',";
										$insert .= $faculty['ote'].",";
										$insert .= $subject['subjectid'].",";
										$insert .= "'$subject[subject_name]',";
										$insert .= "'$subject[subject_desc]',";
										$insert .= $subject['unit'].",";
										$insert .= "'$subject[year]'".",";
										$insert .= "'$subject[term]',";
										$insert .= "'$subject[start_time]',";
										$insert .= "'$subject[end_time]',";
										$insert .= "'$login_session'";
										$insert .= ");";

										mysqli_query($db,$insert) or die("Error: ".mysqli_error($db));
										
										$insert = "";

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
										$insert = "INSERT INTO `load`(`facultyID`, `faculty_first_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES ";
										$insert .= "(";
										$insert .= $faculty['empid'].",";
										$insert .= "'$faculty[emp_first_name]',";
										$insert .= "'$faculty[emp_last_name]',";
										$insert .= "'$faculty[emp_type]',";
										$insert .= "'$faculty[specialization]',";
										$insert .= $faculty['ote'].",";
										$insert .= $subject['subjectid'].",";
										$insert .= "'$subject[subject_name]',";
										$insert .= "'$subject[subject_desc]',";
										$insert .= $subject['unit'].",";
										$insert .= "'$subject[year]'".",";
										$insert .= "'$subject[term]',";
										$insert .= "'$subject[start_time]',";
										$insert .= "'$subject[end_time]',";
										$insert .= "'$login_session'";
										$insert .= ");";

										mysqli_query($db,$insert) or die("Error: ".mysqli_error($db));
										
										$insert = "";

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
										$insert = "INSERT INTO `load`(`facultyID`, `faculty_first_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES ";
										$insert .= "(";
										$insert .= $faculty['empid'].",";
										$insert .= "'$faculty[emp_first_name]',";
										$insert .= "'$faculty[emp_last_name]',";
										$insert .= "'$faculty[emp_type]',";
										$insert .= "'$faculty[specialization]',";
										$insert .= $faculty['ote'].",";
										$insert .= $subject['subjectid'].",";
										$insert .= "'$subject[subject_name]',";
										$insert .= "'$subject[subject_desc]',";
										$insert .= $subject['unit'].",";
										$insert .= "'$subject[year]'".",";
										$insert .= "'$subject[term]',";
										$insert .= "'$subject[start_time]',";
										$insert .= "'$subject[end_time]',";
										$insert .= "'$login_session'";
										$insert .= ");";
										
										mysqli_query($db,$insert) or die("Error: ".mysqli_error($db));
										
										$insert = "";

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

			$sql = "UPDATE employee SET seven_thirty= 'n', nine_thirty='n', eleven_thirty='n', one_thirty='n', three_thirty='n'";
			mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
			$sql = "UPDATE subject SET  occupied='n'";
			mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));

			echo "<script type='text/javascript'>alert('Saved!');</script>";
			mysqli_close($db);

			}
			?>
		<form>
	</center>

</body>

</html>