<?php
    require_once 'session.php';	
    require_once '../includes/conn.php';	
	 
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{ 
		$customerID = mysqli_real_escape_string($con, $_GET['c']);
		$customer = mysqli_query($con,"select * from stuff WHERE userid ='$customerID' and status=1  ");
		
		if(mysqli_num_rows($customer) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$customer = mysqli_fetch_assoc($customer);
			$out->status = 'Found';  
			$out->Name = $customer['business_name'];  
		}
	}

	echo json_encode($out);
?>