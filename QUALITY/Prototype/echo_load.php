<?php
	echo "<tr>";
	echo "<td>".$faculty['empid']."</td>";
	echo "<td>".$faculty['emp_first_name']."</td>";
	echo "<td>".$faculty['emp_middle_name']."</td>";
	echo "<td>".$faculty['emp_last_name']."</td>";
	echo "<td>".$faculty['emp_type']."</td>";
	echo "<td>".$faculty['specialization']."</td>";
	echo "<td>".$faculty['ote']."</td>";
	echo "<td>".$subject['subjectid']."</td>";
	echo "<td>".$subject['subject_name']."</td>";
	echo "<td>".$subject['subject_desc']."</td>";
	echo "<td>".$subject['unit']."</td>";
	echo "<td>".$subject['day1']."</td>";
	echo "<td>".$subject['day2']."</td>";
	echo "<td>".$subject['start_time']."</td>";
	echo "<td>".$subject['end_time']."</td>";
	echo "</tr>";

	$update = "UPDATE employee SET seven_thirty = 'y' where empid = ".$faculty['empid'];
	mysqli_query($db,$update);

	$update = "UPDATE subject SET occupied = 'y' where subjectid = ".$subject['subjectid'];
	mysqli_query($db,$update);
?>