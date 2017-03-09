<?php
	include('session.php');

	if ($usertype == 0)
	{
		echo '$type';
		header('location: fl_admin.php');
	}

	else
	{
		header('location: fl_user.php');
	}
?>