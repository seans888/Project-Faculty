<?php 
require_once 'path.php';
init_cobalt();
init_var($_POST['btn_submit']);
$html = cobalt_load_class('employee_html');

$html = new employee_html;
$html->draw_header('Generate Tentative Load');
$html->draw_container_div_start();
$html->draw_fieldset_header('Generated List');
$html->draw_fieldset_body_start();
echo '<table border = 1>';
echo '<tr>';
echo '<th>Employee Number</th>';
echo '<th>First Name</th>';
echo '<th>Last Name</th>';
echo '<th>Subject Code</th>';
echo '<th>Subject Name</th>';
// echo '<th>Section</th>';
echo '<th>Day</th>';
echo '<th>Start time</th>';
echo '<th>End Time</th>';
echo '<th>Room</th>';
echo '<th>Room Type</th>';
echo '</tr>';

if($_POST['btn_submit'])
{
	$emp = cobalt_load_class('employee');
	$emp_details = $emp->execute_query("SELECT * FROM `employee` LEFT JOIN `taggedemployee` ON `employee`.`emp_id` = `taggedemployee`.`emp_id` where `taggedemployee`.`tag_id` order by emp_status asc")->result;

	$emp_result = array();

	while($row = $emp_details->fetch_assoc())
	{
		$emp_result[] = $row;
	} 

	$param = array();

	for($i = 0; $i < count($emp_result); ++$i)
	{

			$flag = array(
					'MON' => array(
					'07:30 AM' => 'Y',
					'09:30 AM' => 'Y',
					'11:30 AM' => 'Y',
					'01:30 PM' => 'Y',
					'03:30 PM' => 'Y',
					'05:30 PM' => 'Y'
					),
					'TUE' => array(
					'07:30 AM' => 'Y',
					'09:30 AM' => 'Y',
					'11:30 AM' => 'Y',
					'01:30 PM' => 'Y',
					'03:30 PM' => 'Y',
					'05:30 PM' => 'Y'
					),
					'WED' => array(
					'07:30 AM' => 'Y',
					'09:30 AM' => 'Y',
					'11:30 AM' => 'Y',
					'01:30 PM' => 'Y',
					'03:30 PM' => 'Y',
					'05:30 PM' => 'Y'
					),
					'THU' => array(
					'07:30 AM' => 'Y',
					'09:30 AM' => 'Y',
					'11:30 AM' => 'Y',
					'01:30 PM' => 'Y',
					'03:30 PM' => 'Y',
					'05:30 PM' => 'Y'
					),
					'FRI' => array(
					'07:30 AM' => 'Y',
					'09:30 AM' => 'Y',
					'11:30 AM' => 'Y',
					'01:30 PM' => 'Y',
					'03:30 PM' => 'Y',
					'05:30 PM' => 'Y'
					),
					'SAT' => array(
					'07:30 AM' => 'Y',
					'09:30 AM' => 'Y',
					'11:30 AM' => 'Y',
					'01:30 PM' => 'Y',
					'03:30 PM' => 'Y',
					'05:30 PM' => 'Y'
					)
				);

		extract($emp_result[$i]);

		$sub = cobalt_load_class('subject');
		$subject = $sub->execute_query("SELECT * FROM `subject` WHERE specialization_master_id IN (SELECT 
			specialization_master_id FROM `specialization` WHERE emp_id = '$emp_id')")->result;
		$sub_result = array();

		while($row = $subject->fetch_assoc())
		{
			$sub_result[] = $row;
		}

		for ($j = 0; $j < count($sub_result); ++$j)
		{
			extract($sub_result[$j]);

			// $sub_header = cobalt_load_class('refsubjectofferinghdr');
			// echo $subject_id;
			// $subject_header = $sub_header->execute_query("SELECT section FROM `refsubjectofferinghdr` where subject_id = $subject_id")->result;

			// $hdr = array();

			// while($row = $subject_header->fetch_assoc())
			// {
			// 	$hdr[] = $row;
			// }

			// extract($hdr[$j]);

			$sub_details = cobalt_load_class('refsubjectofferingdtl');
			$subject_details = $sub_details->execute_query("SELECT * FROM `refsubjectofferingdtl` where subject_offering_id = (SELECT subject_offering_id FROM `refsubjectofferinghdr` where subject_id = $subject_id) AND occupied = 'N'")->result;

			$dtl = array();

			while($row = $subject_details->fetch_assoc())
			{
				$dtl[] = $row;
			}

			for($k = 0; $k < count($dtl); ++$k)
			{
				extract($dtl[$k]);
				$sub_day = $day;

				$avail = cobalt_load_class('availability');
				$availability = $avail->execute_query("SELECT * FROM `availability` WHERE emp_id = '$emp_id'")->result;

				$schedule = array();

				while($row = $availability->fetch_assoc())
				{
					$schedule[] = $row;
				}

				for($m = 0; $m < count($schedule); ++$m)
				{
					extract($schedule[$m]);
					$emp_day = $day;

					$within_schedule = within_schedule($start_time, $end_time, $time_start, $time_end, $emp_day, $sub_day);

					consecutive_class($flag ,$emp_day);

					if ($within_schedule && $flag[$emp_day][$time_start] == 'Y')
					{
						$flag[$emp_day][$time_start] = 'N';
						extract($sub_result[$j]);
						echo '<tr>';
						echo '<th>'.$emp_id.'</th>';
						echo '<th>'.$emp_first_name.'</th>';
						echo '<th>'.$emp_last_name.'</th>';
						echo '<th>'.$subject_code.'</th>';
						echo '<th>'.$subject_name.'</th>';
						// echo '<th>'.$section.'</th>';
						echo '<th>'.$sub_day.'</th>';
						echo '<th>'.$time_start.'</th>';
						echo '<th>'.$time_end.'</th>';
						echo '<th>'.$room.'</th>';
						echo '<th>'.$room_type.'</th>';
						echo '</tr>';

						// $param[$i][$j][$k][$m]['occupied'] = 'Y';
						// $param[$i][$j][$k][$m]['subject_dtl_id'] = $subject_dtl_id;
						// $sub_details = cobalt_load_class('refsubjectofferingdtl');
						// $sub_details->edit_occupied($param[$i][$j][$k][$m]);	
					}
				}
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

function within_schedule($emp_t1, $emp_t2, $sub_t1, $sub_t2, $emp_day, $sub_day)
{
	if (date('H:i:s',strtotime($emp_t1)) <= date('H:i:s',strtotime($sub_t1)) && date('H:i:s',strtotime($emp_t2)) >= date('H:i:s',strtotime($sub_t2)) && $emp_day == $sub_day)
	{
		return true;
	}
	return false;
}

function consecutive_class($flag, $emp_day)
{
	// 7AM class combinations
	if ($flag[$emp_day]['07:30 AM'] == 'N' && $flag[$emp_day]['09:30 AM'] == 'N')
		$flag[$emp_day]['11:30 AM'] = 'N';
	if ($flag[$emp_day]['07:30 AM'] == 'N' && $flag[$emp_day]['11:30 AM'] == 'N')
		$flag[$emp_day]['09:30 AM'] = 'N';

	// 9AM class combinations
	if ($flag[$emp_day]['09:30 AM'] == 'N' && $flag[$emp_day]['11:30 AM'] == 'N')
	{
		$flag[$emp_day]['07:30 AM'] = 'N';
		$flag[$emp_day]['01:30 PM'] = 'N';
	}
	if ($flag[$emp_day]['09:30 AM'] == 'N' && $flag[$emp_day]['01:30 PM'] == 'N')
		$flag[$emp_day]['11:30 AM'] = 'N';

	// 11AM class combinations
	if ($flag[$emp_day]['11:30 AM'] == 'N' && $flag[$emp_day]['01:30 PM'] == 'N')
	{
		$flag[$emp_day]['09:30 AM'] = 'N';
		$flag[$emp_day]['03:30 PM'] = 'N';
	}
	if ($flag[$emp_day]['11:30 AM'] == 'N' && $flag[$emp_day]['03:30 PM'] == 'N')
		$flag[$emp_day]['01:30 AM'] = 'N';

	//1PM class combinations
	if ($flag[$emp_day]['01:30 PM'] == 'N' && $flag[$emp_day]['03:30 PM'] == 'N')
	{
		$flag[$emp_day]['11:30 AM'] = 'N';
		$flag[$emp_day]['05:30 PM'] = 'N';
	}
	if ($flag[$emp_day]['01:30 PM'] == 'N' && $flag[$emp_day]['05:30 PM'] == 'N')
		$flag[$emp_day]['03:30 PM'] = 'N';

	//3PM class combinations
	if ($flag[$emp_day]['03:30 PM'] == 'N' && $flag[$emp_day]['05:30 PM'] == 'N')
		$flag[$emp_day]['01:30 PM'] = 'N';
}

// debug($_POST);
?>
<!--  -->
