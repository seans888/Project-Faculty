<html>
<head>
	<title>Subject Offerings</title>
	<link href="css/tables.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
	<form action="" method="post">
		<select id="sort" name="sort">
			<option value="subjectid">Subject ID</option>
			<option value="subject_name">Subject Name</option>
			<option value="subject_desc">Subject Description</option>
			<option value="unit">Unit</option>
			<option value="start_time">Start Time</option>
			<option value="end_time">End Time</option>
		</select>

		<select id="ascdesc" name="ascdesc">
			<option value="ASC">Ascending</option>
			<option value="DESC">Descending</option>
		</select>
		<input type="submit" id="submitButton" name="submitSort" value="Sort!"></input><br />
		
		<input type="text" id="textField" name="textField" placeholder="Enter value here" />
		<input type="submit" id="submitButton" name="submitValue" value="Find!" />
	</form>
			
		<h1>Subject Offerings</h1>

		<table id="subject" class="container" width="600" border="1" cellpadding="15" cellspacing="1" >
			<tr>
				<th>Subject ID</th>
				<th>Subject Name</th>
				<th>Subject Description</th>
				<th>Unit</th>
				<th>Day 1</th>
				<th>Day 2</th>
				<th>Start Time</th>
				<th>End Time</th>
			</tr>
					
			<?php
				include('db.php');

				if($_SERVER["REQUEST_METHOD"] == "POST") 
				{
					if (isset($_POST['submitSort']))
					{
						$sort = $_POST['sort'];
						$ascdesc = $_POST['ascdesc'];

						$sql = "SELECT * FROM subject ORDER BY $sort $ascdesc";
						$result = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
					}

					if (isset($_POST['submitValue']))
					{
						$value = $_POST['textField'];

						$sql = "SELECT * FROM subject where '$value' IN 
						(subjectid, subject_name, subject_desc, unit
						,start_time, end_time)";
						$result = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
					}

					while ($subjectdata = mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
						echo "<tr>";
						echo "<td>".$subjectdata['subjectid']."</td>";
						echo "<td>".$subjectdata['subject_name']."</td>";
						echo "<td>".$subjectdata['subject_desc']."</td>";
						echo "<td>".$subjectdata['unit']."</td>";
						echo "<td>".$subjectdata['day1']."</td>";
						echo "<td>".$subjectdata['day2']."</td>";
						echo "<td>".$subjectdata['start_time']."</td>";
						echo "<td>".$subjectdata['end_time']."</td>";
						echo "</tr>";
					}
				}
			?>
		</table>

		<form action="insert_new_subject.php" method="post">
			<input type="submit" id="submitButton" name="submitNewSubject" value="Add New Subject" />
		</form>
	</center>
</body>
</html>