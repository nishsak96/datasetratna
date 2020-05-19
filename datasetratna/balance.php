<!DOCTYPE html>
<html>
<head>
	<title>InsideDATA</title>
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
		    			</ul>
		    			<ul class="nav navbar-nav navbar-right"><li><a href="signout.php">Logout</a></li></ul>
		    		</div>';
	    		}
	    		else
	    		{
	    			echo '<script> alert("Please login first"); window.location.href="home.php"; </script>';
	    		}

	    		?>
	    	</div>

	    </div>
   </div>
   <div class="container" id="hh">
    <a href="#end">End</a>
  </div>
   <div class="container">
   <h2>Balance Check</h2>
  <form class="form-horizontal" name="regForm" method="post">
     <div class="form-group">
      <label class="control-label col-sm-1" >Name:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="name" placeholder="Enter name of party" maxlength="10">
      </div>
    </div>

     <div class="form-group">
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
    </form>

    </div>

    <div class="container-fluid">
   <?php  

   include 'connect.php';
   $name="";
   if(isset($_POST['name']))
   {
   	if(!empty($_POST['name']))
   	{
   		$name=$_POST['name'];
   	}
   }

   $query="SELECT SUM(pure_amount) FROM `Sheet2` WHERE name='$name'";
   $result=mysqli_query($dbconnnect,$query);
   $a=mysqli_fetch_array($result);
   ///print_r($a[0]);
   $query="SELECT SUM(pure_amount) FROM `Sheet1` WHERE name='$name'";
   $result=mysqli_query($dbconnnect,$query);
   $b=mysqli_fetch_array($result);
   echo "<br>";
   //print_r($b[0]);
   $c=(float)($a[0]-$b[0]);
   echo "<p align='center' style='color:red; font-size:36px;' ><b>$c</b></p>";



   $query1="SELECT * FROM `Sheet2` where name='$name' ORDER BY `date` desc";
		$query2="SELECT * FROM `Sheet1` where name = '$name' ORDER BY `date` desc";
		$result=mysqli_query($dbconnnect,$query1);
		//$issue=mysql_fetch_assoc($result);
		$issue = array();

		while($row = mysqli_fetch_assoc($result)){
		    array_push($issue, $row);
		    //print_r($issue);
		    //echo "<br>";
		}
		///echo $r=mysql_num_rows($result);
		$result=mysqli_query($dbconnnect,$query2);
		//$recept=mysql_fetch_array($result);
		//print_r($issue);
		$recept = array();

		while($row = mysqli_fetch_assoc($result)){
		    array_push($recept, $row);
		    //print_r($recept);
		    //echo "<br>";
		}
		//echo $a=count($issue);
		echo "<br>";

		//print_r($issue[0]);
		
		echo '<div class="col-sm-5">
		<h3><b>Issue</b></h3>
		<table class="table table-bordered">
	    <thead>
	      <tr>
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


		echo '<div class="col-sm-offset-1 col-sm-5">
		<h3><b>Receipt</b></h3>
		<table class="table table-bordered">
	    <thead>
	      <tr>
	        <th>Date</th>
	        <th>Name</th>
	        <th>Amount</th>
	        <th>Purity</th>
	        <th>PureAmount</th>
	        <th>Type</th>
	      </tr>
	    </thead>
	    <tbody>';
		for($i=0;$i<count($recept);$i++)
		{
			echo '<tr>
	        <td>'.$recept[$i]["date"].'</td>
	        <td>'.$recept[$i]["name"].'</td>
	        <td>'.$recept[$i]["amount"].'</td>
	        <td>'.$recept[$i]["purity"].'</td>
	        <td>'.$recept[$i]["pure_amount"].'</td>
	        <td>'.$recept[$i]["type"].'</td>
	      	</tr>';
		}
		echo '  </tbody>
	    </table>
		</div>';


   ?>
   

   </div>
   <div class="container" id="end">
   <a href="#hh">Home</a>
   </div>
   </body>
   </html>