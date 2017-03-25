<?php 
require_once 'path.php';
init_cobalt();
init_var($_POST['btn_submit']);
$html = cobalt_load_class('employee_html');

$html = new employee_html;
$html->draw_header('Sample');
$html->draw_container_div_start();
$html->draw_fieldset_header('Sample');
$html->draw_fieldset_body_start();
echo '<table border = 1>';
echo '<tr>';
echo '<th>Employee Number</th>';
echo '<th>First Name</th>';
echo '<th>Last Name</th>';
echo '<th>Subject Code</th>';
echo '<th>Subject Name</th>';
echo '</tr>';

if($_POST['btn_submit'])
{
	$emp = cobalt_load_class('employee');
	$tag = cobalt_load_class('taggedemployee');
	$sub = cobalt_load_class('subject');
	$subheader = cobalt_load_class('refsubjectofferinghdr');
	$specialization = cobalt_load_class('specialization');

	$tag_result = $tag->execute_query("SELECT * FROM `taggedemployee`")->result;

	$arr_result = array();
	while($row = $tag_result->fetch_assoc())
	{
		$arr_result[] = $row;
	} 

	for ($i = 0; $i < count($arr_result); ++$i)
	{
		extract($arr_result[$i]);
		$emp_details = $emp->execute_query("SELECT * FROM `employee` WHERE emp_id = '$emp_id'")->result;

		$emp_result = array();
		while($row = $emp_details->fetch_assoc())
		{
			$emp_result[] = $row;
		} 

		for($i = 0; $i < count($emp_result); ++$i)
		{
			extract($emp_result[$i]);
			$subject = $sub->execute_query("SELECT * FROM `subject` WHERE specialization_id = $specialization_id")->result;

			$sub_result = array();
			while($row = $subject->fetch_assoc())
			{
				$sub_result[] = $row;
			}

			for ($i = 0; $i < count($sub_result); ++$i)
			{
				extract($sub_result[$i]);
				echo '<tr>';
				echo '<th>'.$emp_id.'</th>';
				echo '<th>'.$emp_first_name.'</th>';
				echo '<th>'.$emp_last_name.'</th>';
				echo '<th>'.$subject_code.'</th>';
				echo '<th>'.$subject_name.'</th>';
				echo '</tr>';
			}
		}
	}
}

echo '</table>';

$html->draw_fieldset_body_end();
$html->draw_fieldset_footer_start();
$html->draw_button('submit');
$html->draw_fieldset_footer_end();
$html->draw_container_div_end();


// debug($_POST);
?>
<!--  -->
