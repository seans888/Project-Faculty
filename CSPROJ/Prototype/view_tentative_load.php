<?php
	include('index.php');
?><html>
<head>
	<title>Tentative Load</title>
	<link href="css/tables.css" rel="stylesheet" type="text/css">
</head>
<body>
	<center>
		<form action="download.php" method="post">
			<input type="submit" id="submitButton" name="submitDownload" value="Download as Excel File"></input>
		</form>
		<h1>Your Tentative Load</h1>
		<table id="load" lass="container" width="600" border="1" cellpadding="15" cellspacing="1">
			<tr>
				<th>Subject ID</th>
				<th>Subject Name</th>
				<th>Subject Description</th>
				<th>Unit</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Load Creator</th>
			</tr>

			<?php

				$select = "SELECT * FROM `load` WHERE facultyID = '$empID'";
				$result = mysqli_query($db, $select) or die("Error: ".mysqli_error($db));
				
				while ($load = mysqli_fetch_assoc($result))
				{
					echo "<td>".$load['subjectid']."</td>";
					echo "<td>".$load['subject_name']."</td>";
					echo "<td>".$load['subject_desc']."</td>";
					echo "<td>".$load['unit']."</td>";
					echo "<td>".$load['start_time']."</td>";
					echo "<td>".$load['end_time']."</td>";
					echo "<td>".$load['load_creator']."</td>";
					echo "</tr>";
				}
			
			mysqli_close($db);
			?>

		</table>
	</center>
</body>
</html>