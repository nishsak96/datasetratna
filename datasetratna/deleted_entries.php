<!DOCTYPE html>
<html>
<head>
	<title>Deleted Entries</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	
</head>
<body>
	<div class="container-fluid" >
	    <div class=" navbar navbar-default">
	    	<div class="container">
	    		<div class="navbar-header">
	    			<a href="inside.php" class="navbar-brand">Data</a>
	    		</div>
	    		<?php
	    		$z=$_COOKIE['login'];
	    		if($z==1)
	    		{
		    		echo '<div>
		    			<ul class="nav navbar-nav">
		    				<li><a href="inside.php">Home</a></li>
		    				<li><a href="issue.php">Issue</a></li>
		    				<li><a href="recept.php">Recept</a></li>
		    				<li><a href="balance.php">CheckBalance</a></li>
		    				<li><a href="party_balance.php">Party Balance</a></li>
		    				<li><a href="delete_entry.php">DeleteEntry</a></li>
		    				<li><a href="edit_entry.php">EditEntry</a></li>
		    			</ul>
		    			<ul class="nav navbar-nav navbar-right"><li><a href="signout.php">Logout</a></li></ul>
		    		</div>';
	    		}
	    		else
	    		{
	    			echo '<script> alert("Please login first"); window.location.href="index.php"; </script>';
	    		}

	    		?>
	    	</div>

	    </div>
   </div>
	    	</div>
	    </div>
    </div>

    <div class="container-fluid" id="hh">

    <form class="form-horizontal" name="regForm" method="post" action="#end">	
     <div class="form-group">
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" class="btn btn-default">End</button>
      </div>
    </div>
    </form>
    </div>

    <div class="container-fluid">
	


    <?php
		
		include 'connect.php';

		$query1='SELECT * FROM `delete_log` ORDER BY `id` desc';
		$result=mysqli_query($dbconnnect,$query1);
		//$issue=mysql_fetch_assoc($result);
		$issue = array();

		while($row = mysqli_fetch_assoc($result)){
		    array_push($issue, $row);
		    //print_r($issue);
		    //echo "<br>";
		}
		///echo $r=mysql_num_rows($result);
		//echo $a=count($issue);
		echo "<br>";

		//print_r($issue[0]);
		
		echo '<div class="col-sm-5">
		<h3><b>Deleted Entries</b></h3>
		<table class="table table-bordered">
	    <thead>
	      <tr>
	      	<th>Id</th>
	      	<th>Bill Type</th>
	        <th>Date</th>
	        <th>Name</th>
	        <th>Amount</th>
	        <th>Purity</th>
	        <th>PureAmount</th>
	        <th>Type</th>
	      </tr>
	    </thead>
	    <tbody>';
		
		for($i=0;$i<count($issue);$i++)
		{
			echo '<tr>
			<td>'.$issue[$i]["id"].'</td>
			<td>'.$issue[$i]["bill_type"].'</td>
	        <td>'.$issue[$i]["date"].'</td>
	        <td>'.$issue[$i]["name"].'</td>
	        <td>'.$issue[$i]["amount"].'</td>
	        <td>'.$issue[$i]["purity"].'</td>
	        <td>'.$issue[$i]["pure_amount"].'</td>
	        <td>'.$issue[$i]["type"].'</td>
	      	</tr>';
		}

		echo '  </tbody>
	    </table>
		</div>';
				

		// if(isset($_POST['uniqueid'])&&isset($_POST['password']))
		// {
		// 	$uni=mysql_real_escape_string($_POST['uniqueid']);
		// 	$password=mysql_real_escape_string($_POST['password']);
		// 	//setcookie('name',$uni,time()+36000);

		// 	if(!empty($uni)&&!empty($password))
		// 	{	
		// 			$password=sha1($password);
		// 			//$query='SELECT `password` FROM `applicantbasic` WHERE `UniqueId`=\''.$uni.'\'';
		// 			//$result=mysql_query($query);

		// 			// if(mysql_num_rows($result)==0)
		// 			// {
		// 			// 	echo '<br><p align="center">ID not Registered. Please <a href="registration.php">register</a> now!</p>';
		// 			// }
		// 			//else if(mysql_num_rows($result)==1)
		// 			{
		// 				//$data=mysql_fetch_assoc($result);
						
		// 				if($password==sha1("anshshubh")&&$uni=="alpesh76")
		// 				{
		// 					setcookie('login',1,time()+36000);
		// 					// setcookie('add',2,time()+36000);
		// 					// setcookie('name',$uni,time()+36000);
		// 					header('Location: inside.php');
		// 				}
		// 				else
		// 				{
		// 					echo '<br><p align="center">Username and password do not match. Try again</p>';
		// 				}
		// 			}
		// 	}
		// 	else
		// 	{
		// 		echo '<br><p align="center">Fill all the fields properly!</p>';
		// 	}
		// }
	?>

  
  </div>

  <br>
  <div id="end">
  	<div class="container-fluid">

    <form class="form-horizontal" name="regForm" method="post" action="#hh">	
     <div class="form-group">
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" class="btn btn-default">Home</button>
      </div>
    </div>
    </form>
    </div>

  </div>
</body>
</html>