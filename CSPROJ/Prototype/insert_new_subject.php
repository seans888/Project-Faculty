<html>
<head>
	<title>Subject Offerings</title>
	<link href="css/tables.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
	<h1>Subject Offerings</h1>

	<form action="" method="post">
		<input type="submit" id="submitButton" name="submitInsertNewSubject" value="Insert New Subject" />
		<table id="subject" class="container" width="600" border="1" cellpadding="15" cellspacing="1" >
			<tr>
				<th>Subject ID</th>
				<th>Subject Name</th>
				<th>Subject Description</th>
				<th>Unit</th>
				<th>Start Time</th>
				<th>End Time</th>
			</tr>
				<td></td>
				<td><input type='text' id='textField' name='text_subject_name' placeholder='Subject Name' /></td>
				<td><input type='text' id='textField' name='text_subject_desc' placeholder='Subject Description' /></td>
				<td><input type='text' id='textField' name='text_unit' placeholder='Unit' /></td>
				<td><input type='text' id='textField' name='text_start_time' placeholder='Start Time' /></td>
				<td><input type='text' id='textField' name='text_end_time' placeholder='End Time' /></td>
			<tr>

			</tr>

			<?php
				include('db.php');

				if($_SERVER["REQUEST_METHOD"] == "POST") 
				{
					if (isset($_POST['submitInsertNewSubject']))
					{
						$insert = "INSERT INTO `subject`(`subject_name`, `subject_desc`, `unit`, `start_time`, `end_time`) VALUES";

						$subject_name = $_POST['text_subject_name'];
						$subject_desc = $_POST['text_subject_desc'];
						$unit = $_POST['text_unit'];
						$start_time = $_POST['text_start_time'];
						$end_time = $_POST['text_end_time'];

						$insert .= "(";
						$insert .= "'$subject_name',";
						$insert .= "'$subject_desc',";
						$insert .= $unit . ",";
						$insert .= "'$start_time',";
						$insert .= "'$end_time'";
						$insert .= ");";

						mysqli_query($db, $insert) or die("Error: ".mysqli_error($db));

						mysqli_close($db);

						echo "Subject Submitted";
					}
				}
			?>
		</table>
	</form>
	</center>
</body>
</html>