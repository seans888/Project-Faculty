<?php
$comm =mysqli_connect ("localhost", "root","","") or die ("Could not connect");
mysqli_select_db($comm,"faculty") or die("Error in connecting database");
$output='';
$count;

if(isset($_POST ['search'])) 
    {
			$searchq =$_POST{'search'};
			$searchq = preg_replace("#[^0-9a-z]#i","", $searchq);
			
			$query = "SELECT * FROM employee WHERE emp_first_name LIKE 'searchq' OR emp_last_name LIKE 'searchq'" or die ("Cant Select database");
			$result =mysqli_query($comm, $query);
			$count = mysqli_num_rows($result) or die ("Query Error");
	    if($query != FALSE) 
		  {
			$output ='Error';
		  }
		      else
			{
				echo "We passed thru lmao";
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
				{
					$fname = $row['emp_first_name'];
					$lname = $row['emp_last_name'];
					$id = $row['emp_id'];
					
					$output .= '<div> '.$fname.' '.$lname.'</div>';									
				}
		}	
		  
	}

?>


<html>
<body>
<head>
<title> Search module </title>
<form action ="dbconnect.php"  method ="post">
     <input type="text" name ="search" placeholder=" Search for Faculty"/>
	 <input type ="submit" value="Go" />
</form>	 
<?php 
print $output;
?>



</body>
</html>
