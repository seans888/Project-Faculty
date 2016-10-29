<?php

	include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if (isset($_POST['submitDownload']))
		{
			$select = "SELECT * FROM `load` WHERE facultyID = '$empID'";
			$result = mysqli_query($db, $select) or die("Error: ".mysqli_error($db));

			if (mysqli_num_rows($result) > 0)
			{

				$output = "<table class='table' border='1px solid'>
								<tr>
									<th>Subject ID</th>
									<th>Subject Name</th>
									<th>Subject Description</th>
									<th>Unit</th>
									<th>Start Time</th>
									<th>End Time</th>
								</tr>";

				while ($load = mysqli_fetch_assoc($result))
				{
					$output .= '
						<tr> 
							<td>'.$load['subjectid'].'</td>
							<td>'.$load['subject_name'].'</td>
							<td>'.$load['subject_desc'].'</td>
							<td>'.$load['unit'].'</td>
							<td>'.$load['start_time'].'</td>
							<td>'.$load['end_time'].'</td>
						</tr>';
				}

				$output .= "</table>";

				header("Content-Type: application/xlsx");
				header("Content-Disposition: attacthment; filename=load_$user_lastname.xls");
				echo $output;
			}
			else
			{
				echo "Nothing to download!";
			}
		}
		mysqli_close($db);

	}
?>