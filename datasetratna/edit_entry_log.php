<?php
    include 'connect.php';
    
   	echo $id=$_COOKIE['edit_id'];
   	echo $option=$_COOKIE['edit_option'];
   	echo $edit_amount=$_POST['amount'];
   	echo $edit_type=$_POST['type'];
   	echo $edit_purity=$_POST['purity'];
   	echo $edit_pure_amount=(float)($edit_amount*($edit_purity/100));

   	if(empty($edit_amount)||empty($edit_purity))
	{
		exit("Amount or Purity cannot be empty");
	}

   	echo '<script>console.log("ID :'.$id.'")</script>';
   	echo '<script>console.log("Option :'.$option.'")</script>';

   	if($option == "Issue")
	{
		$table="Sheet2";
		echo $query_get="SELECT * FROM `Sheet2` WHERE id='$id'";
	}
	if($option == "Receipt")
	{
		$table="Sheet1";
		echo $query_get="SELECT * FROM `Sheet1` WHERE id='$id'";
	}
	
	$result=mysqli_query($dbconnnect,$query_get);
		//$issue=mysql_fetch_assoc($result);
		$issue = array();

		while($row = mysqli_fetch_assoc($result)){
		    array_push($issue, $row);
		    //print_r($issue);
		    //echo "<br>";
		}
		$i=0;
		$date=$issue[$i]["date"];
		$name=$issue[$i]["name"];
		$amount=$issue[$i]["amount"];
		$purity=$issue[$i]["purity"];
		$pure_amount=$issue[$i]["pure_amount"];
		$type=$issue[$i]["type"];

		echo  $query_update="UPDATE `$table` SET `amount`='$edit_amount',`purity`='$edit_purity',`pure_amount`='$edit_pure_amount',`type`='$edit_type' WHERE `id`='$id' ";

	    echo  $query_insert="INSERT INTO `edit_log`(`name`, `date`, `amount`, `purity`, `pure_amount`, `type`, `bill_type`, `old_id`) VALUES ('$name','$date','$amount','$purity','$pure_amount','$type','$option','$id')";

	    $result=mysqli_query($dbconnnect,$query_insert);

	    $result=mysqli_query($dbconnnect,$query_update);
	    echo '<script type="text/javascript">location.href = "http://localhost/datasetratna/edit_entry.php";</script>';
    
?>
