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

  

   <div class="container">
  <h2>Receipt Form</h2>
  <form class="form-horizontal" name="regForm" method="post">


  <div class="form-group">
      <label class="control-label col-sm-1" >Date:</label>
      <div class="col-sm-5">
        <input type="date" class="form-control" name="date" placeholder="Enter date" >
      </div>
    </div>

   <div class="form-group">
      <label class="control-label col-sm-1" >Name:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="name" placeholder="Enter Name of the Party" maxlength="10">
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-1">Amount:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="amount" placeholder="Enter weight" maxlength="16" >
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-1" >Purity:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="purity" placeholder="Enter purity" maxlength="16">
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-1" >Type:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="type" placeholder="Enter type" maxlength="10">
      </div>
    </div>

     <div class="form-group">
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>

    </form>
    </div>


</body>
</html>

 <?php
    include 'connect.php';
    if(isset($_POST['name'])&&isset($_POST['amount'])&&isset($_POST['purity'])&&isset($_POST['type']))
    {
      $amount=number_format((float)(($_POST['amount'])),4,'.','');
      $name=($_POST['name']);
      $type=($_POST['type']);
      $purity=number_format((float)($_POST['purity']),4,'.','');
      $date=$_POST['date'];
      
      if(!empty($amount)&&!empty($name)&&!empty($purity)&&!empty($type))
      {
        //$today = date("y.m.d");   
        $pure_amount  =(float)($amount*($purity/100));
        $query="INSERT INTO `Sheet1`(`name`, `date`, `amount`, `purity`, `pure_amount`, `type`) VALUES ('$name','$date','$amount','$purity','$pure_amount','$type')";
        $result=mysqli_query($dbconnnect,$query);
        }
        else
        {
          echo "Fill all the fields properly";
        }
    }
?>
