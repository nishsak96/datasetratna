<?php
    include 'connect.php';
    
   	echo $id=$_COOKIE['del_id'];
   	echo $option=$_COOKIE['del_option'];

   	echo '<script>console.log("ID :'.$id.'")</script>';
   	echo '<script>console.log("Option :'.$option.'")</script>';

   	if($option == "Issue")
	{
		echo $query_delete="DELETE from `Sheet2` WHERE id='$id'";
		echo $query_get="SELECT * FROM `Sheet2` WHERE id='$id'";
	}
	if($option == "Receipt")
	{
		echo $query_delete="DELETE from `Sheet1` WHERE id='$id'";
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

	    echo  $query_insert="INSERT INTO `delete_log`(`name`, `date`, `amount`, `purity`, `pure_amount`, `type`, `bill_type`) VALUES ('$name','$date','$amount','$purity','$pure_amount','$type','$option')";

	    $result=mysqli_query($dbconnnect,$query_insert);

	    $result=mysqli_query($dbconnnect,$query_delete);
	    echo '<script type="text/javascript">location.href = "http://localhost/datasetratna/delete_entry.php";</script>';
    
?>
