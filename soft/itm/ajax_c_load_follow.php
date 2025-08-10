<?php
    require_once 'session.php';	
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{ 
		$customerID = mysqli_real_escape_string($con, $_GET['c']);
		$Lead = mysqli_query($con,"select * from phone_book WHERE lead_id = '$customerID' ");
		
		if(mysqli_num_rows($Lead) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$Lead = mysqli_fetch_assoc($Lead);
			$out->status = 'Found';
			
			$out->CName = $Lead['lead_name'];
			$out->CPhone = $Lead['contact_info'];
			$out->Cat = $Lead['category'];
			$out->Addrs = $Lead['address'];
			$out->BizInfo = $Lead['org_name'];
			
		}
	}

	echo json_encode($out);
?>