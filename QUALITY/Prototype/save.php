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
			<?php

			include('session.php');

			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				if (isset($_POST['submitSave']))
				{

					b:

					$sql = "SELECT * FROM employee ORDER BY emp_type ASC, ote DESC";
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

											$insert = "INSERT INTO `load`(`facultyID`, `faculty_first_name`, `faculty_middle_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES ";
											$insert .= "(";
											$insert .= $faculty['empid'].",";
											$insert .= "'$faculty[emp_first_name]',";
											$insert .= "'$faculty[emp_middle_name]',";
											$insert .= "'$faculty[emp_last_name]',";
											$insert .= "'$faculty[emp_type]',";
											$insert .= "'$specialization[specialization_name]',";
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
											$sql = "SELECT specialization_name FROM specialization where specializationid = " . $faculty['specialization'];
											$result3 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
											$specialization = mysqli_fetch_assoc($result3);

											$insert = "INSERT INTO `load`(`facultyID`, `faculty_first_name`, `faculty_middle_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES ";
											$insert .= "(";
											$insert .= $faculty['empid'].",";
											$insert .= "'$faculty[emp_first_name]',";
											$insert .= "'$faculty[emp_middle_name]',";
											$insert .= "'$faculty[emp_last_name]',";
											$insert .= "'$faculty[emp_type]',";
											$insert .= "'$specialization[specialization_name]',";
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
											$sql = "SELECT specialization_name FROM specialization where specializationid = " . $faculty['specialization'];
											$result3 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
											$specialization = mysqli_fetch_assoc($result3);

											$insert = "INSERT INTO `load`(`facultyID`, `faculty_first_name`, `faculty_middle_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES ";
											$insert .= "(";
											$insert .= $faculty['empid'].",";
											$insert .= "'$faculty[emp_first_name]',";
											$insert .= "'$faculty[emp_middle_name]',";
											$insert .= "'$faculty[emp_last_name]',";
											$insert .= "'$faculty[emp_type]',";
											$insert .= "'$specialization[specialization_name]',";
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
											$sql = "SELECT specialization_name FROM specialization where specializationid = " . $faculty['specialization'];
											$result3 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
											$specialization = mysqli_fetch_assoc($result3);

											$insert = "INSERT INTO `load`(`facultyID`, `faculty_first_name`, `faculty_middle_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES ";
											$insert .= "(";
											$insert .= $faculty['empid'].",";
											$insert .= "'$faculty[emp_first_name]',";
											$insert .= "'$faculty[emp_middle_name]',";
											$insert .= "'$faculty[emp_last_name]',";
											$insert .= "'$faculty[emp_type]',";
											$insert .= "'$specialization[specialization_name]',";
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
											$sql = "SELECT specialization_name FROM specialization where specializationid = " . $faculty['specialization'];
											$result3 = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
											$specialization = mysqli_fetch_assoc($result3);

											$insert = "INSERT INTO `load`(`facultyID`, `faculty_first_name`, `faculty_middle_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES ";
											$insert .= "(";
											$insert .= $faculty['empid'].",";
											$insert .= "'$faculty[emp_first_name]',";
											$insert .= "'$faculty[emp_middle_name]',";
											$insert .= "'$faculty[emp_last_name]',";
											$insert .= "'$faculty[emp_type]',";
											$insert .= "'$specialization[specialization_name]',";
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
