<html>
<head>
	<title>Subject Offerings</title>
	<link href="css/tables.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
	<form action="" method="post">
		<select id="sort" name="sort">
			<option value="empid">Employee ID</option>
			<option value="emp_first_name">Employee First Name</option>
			<option value="emp_middle_name">Employee Middle Name</option>
			<option value="emp_last_name">Employee Last Name</option>
			<option value="emp_type">Employee Type</option>
			<option value="specialization">Specialization</option>
		</select>

		<select id="ascdesc" name="ascdesc">
			<option value="ASC">Ascending</option>
			<option value="DESC">Descending</option>
		</select>
		<input type="submit" id="submitButton" name="submitSort" value="Sort!" /><br />
		<input type="text" id="textField" name="textField" placeholder="Enter value here">
		<input type="submit" id="submitButton" name="submitValue" value="Find!" />
	</form>
			
		<h1>Faculty</h1>

		<table id="faculty" class="container" width="600" border="1" cellpadding="15" cellspacing="1" >
			<tr>
				<th>Employee ID</th>
				<th>Employee First Name</th>
				<th>Employee Middle Name</th>
				<th>Employee Last Name</th>
				<th>Employee Type</th>
				<th>Specialization</th>
			</tr>
			
			<?php
				include('db.php');

				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					if (isset($_POST['submitSort'])) 
					{
						$sort = $_POST['sort'];
						$ascdesc = $_POST['ascdesc'];
						$sql = "SELECT * FROM employee ORDER BY $sort $ascdesc";
						$result = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
					}

					if (isset($_POST['submitValue']))
					{	
						$value = $_POST['textField'];

						$sql = "SELECT * FROM employee where '$value' IN 
						(empid, emp_first_name, emp_middle_name, emp_last_name
						,emp_type, specialization)";
						$result = mysqli_query($db,$sql) or die("Error: ".mysqli_error($db));
					}
						
					while ($facultydata = mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
						echo "<tr>";
						echo "<td>".$facultydata['empid']."</td>";
						echo "<td>".$facultydata['emp_first_name']."</td>";
						echo "<td>".$facultydata['emp_middle_name']."</td>";
						echo "<td>".$facultydata['emp_last_name']."</td>";
						echo "<td>".$facultydata['emp_type']."</td>";
						echo "<td>".$facultydata['specialization']."</td>";
						echo "</tr>";
					}
				}
			?>
		</table>
	</center>
</body>
</html>