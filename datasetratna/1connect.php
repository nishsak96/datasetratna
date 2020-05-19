<?php
	ob_start();
	$dbconnnect=@mysql_connect('mysql.hostinger.in','u887017777_nish9','nishit96');
	if(!$dbconnnect)
	{
		die("Not connected");
	}
	
	$dbselect=@mysql_select_db('u887017777_datas',$dbconnnect);
	if(!$dbselect)
	{
		die("Database cannot be accessed!");
	}
?>