<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	
</head>
<body>
	<div class="container-fluid" >
	    <div class=" navbar navbar-default">
	    	<div class="container">
	    		<div class="navbar-header">
	    			<a href="#" class="navbar-brand">Data</a>
	    		</div>
	    	</div>
	    </div>
    </div>


    <?php
		setcookie('login',1,time()-36000);
		//include 'connect.php';
		
		if(isset($_POST['uniqueid'])&&isset($_POST['password']))
		{
			$uni=($_POST['uniqueid']);
			$password=($_POST['password']);
			//setcookie('name',$uni,time()+36000);

			if(!empty($uni)&&!empty($password))
			{	
					$password=sha1($password);
					//$query='SELECT `password` FROM `applicantbasic` WHERE `UniqueId`=\''.$uni.'\'';
					//$result=mysql_query($query);

					// if(mysql_num_rows($result)==0)
					// {
					// 	echo '<br><p align="center">ID not Registered. Please <a href="registration.php">register</a> now!</p>';
					// }
					//else if(mysql_num_rows($result)==1)
					{
						//$data=mysql_fetch_assoc($result);
						
						if($password==sha1("anshshubh")&&$uni=="alpesh76")
						{
							setcookie('login',1,time()+36000);
							// setcookie('add',2,time()+36000);
							// setcookie('name',$uni,time()+36000);
							header('Location: inside.php');
						}
						else
						{
							echo '<br><p align="center">Username and password do not match. Try again</p>';
						}
					}
			}
			else
			{
				echo '<br><p align="center">Fill all the fields properly!</p>';
			}
		}
	?>


	<div class="container">
		<h2>LogIn:</h2>
		 <form class="form-horizontal" method="post" >
		    <div class="form-group">
		      <label class="control-label col-sm-1">ID:</label>
		      <div class="col-sm-5">
		        <input type="text" class="form-control" name="uniqueid" placeholder="Enter Unique ID" maxlength="10">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-1" for="pwd">Password:</label>
		      <div class="col-sm-5">
		        <input type="password" class="form-control" name="password" placeholder="Enter password">
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