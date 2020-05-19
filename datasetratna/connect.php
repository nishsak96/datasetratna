<?php
	ob_start();
	$dbconnnect=@mysqli_connect('localhost','root','');
	if(!$dbconnnect)
	{
		die("Not connected");
	}
	
	$dbselect=@mysqli_select_db($dbconnnect,'datasetratna');
	if(!$dbselect)
	{
		die("Database cannot be accessed!");
	}
?>