<?php
    require_once 'session.php';	
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$PaymentType = mysqli_real_escape_string($con, $_GET['c']);
		$load_comment = mysqli_query($con,"select * from payment_type WHERE pt_id = '$PaymentType' ");
		
		if(mysqli_num_rows($load_comment) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$load_comment = mysqli_fetch_assoc($load_comment);
			$out->status = 'Found';
			$out->PmntName = $load_comment['pt_name']; 
		}
	}

	echo json_encode($out);
?>