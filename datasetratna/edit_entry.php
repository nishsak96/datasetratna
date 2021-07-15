<!DOCTYPE html>
<html>
<head>
	<title>EditEntry</title>
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
		    				<li><a href="edited_entries.php">EditedEntries</a></li>
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
   <h2>Edit Entry</h2>
  <form class="form-horizontal" name="regForm" method="post">

  	<div class="form-group">
      <label class="control-label col-sm-1" >Name:</label>
      <div class="col-sm-5">
        <!--<input type="text" class="form-control" name="name" placeholder="Enter Name of the Party" maxlength="10">-->
  <select class="form-control" id="sel1" name="option">
    <option>Issue</option>
    <option>Receipt</option>
  </select>

      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-1" >Id:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="id" placeholder="Enter Id of entry to edit" maxlength="10">
      </div>
    </div>

     <div class="form-group">
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" class="btn btn-default" >Submit</button>
      </div>
    </div>
    </form>

    </div>

    <div class="container-fluid">
   <?php  

   include 'connect.php';
   setcookie('edit_id',"",time()-36000);
   setcookie('edit_option',"",time()-36000);

    $name="";
    $option="";
    $amount="";
	$purity="";
	$type="";
   if(isset($_POST['id']))
   {
   	if(!empty($_POST['id']))
   	{
   		$name=$_POST['id'];
   		$option=$_POST['option'];
   	
   setcookie('edit_id',$name,time()+36000);
   setcookie('edit_option',$option,time()+36000);
   echo $z=@$_COOKIE['edit_id'];
   echo $z=@$_COOKIE['edit_option'];

   if($option == "Issue")
   {
   	$query="SELECT * FROM `Sheet2` WHERE id='$name'";
   }
   if($option == "Receipt")
   {
   	$query="SELECT * FROM `Sheet1` WHERE id='$name'";
   }
		$result=@mysqli_query($dbconnnect,$query);
		$issue = array();

		while($row = @mysqli_fetch_assoc($result)){
		    array_push($issue, $row);
		}
		echo "<br>";
		echo '<div class="col-sm-7">
		<h3><b>'.$option.'</b></h3>
		<table class="table table-bordered">
	    <thead>
	      <tr>
	      	<th>Id</th>
	        <th>Date</th>
	        <th>Name</th>
	        <th>Amount</th>
	        <th>Purity</th>
	        <th>PureAmount</th>
	        <th>Type</th>
	      </tr>
	    </thead>
	    <tbody>';
		@$id_edit=$issue[0]["id"];
		for($i=0;$i<count($issue);$i++)
		{
			@$amount=$issue[$i]["amount"];
			@$purity=$issue[$i]["purity"];
			@$type=$issue[$i]["type"];
			echo '<tr>
			<td><font color="red">'.$issue[$i]["id"].'</font></td>
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
		

		echo @$x=$_POST['editForm'];

		if(isset($_POST['editForm']))
		{
			if(isset($_POST['amount'])&&isset($_POST['purity'])&&isset($_POST['type']))
		    {
		     if(!empty($amount)&&!empty($purity)&&!empty($type))
		      {
		       
		        }
		        else
		        {
		          echo "Fill all the fields properly";
		        }
		    }
		}
	}
   }
   ?>

   </div>
   <form class="form-horizontal" name="editForm" method="post" action="edit_entry_log.php">
   	<div class="container">
  <h2><?php echo $option ?> Form</h2>
  <form class="form-horizontal" name="regForm" method="post">

     <div class="form-group">
      <label class="control-label col-sm-1">Amount:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="amount" placeholder="Enter weight" maxlength="16" value="<?php echo $amount ?>" >
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-1" >Purity:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="purity" placeholder="Enter purity" maxlength="16" value="<?php echo $purity ?>">
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-1" >Type:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="type" placeholder="Enter type" maxlength="10" value="<?php echo $type ?>" >
      </div>
    </div>

   <div class="form-group">
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" class="btn btn-default" onclick="return confirm('Are you sure?')" >Edit Entry</button>
      </div>
    </div>
    </form>
	</div>
   </body>
   </html>