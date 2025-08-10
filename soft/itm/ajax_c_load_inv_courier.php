<?php
    require_once 'session.php';	
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$InvCourier = mysqli_real_escape_string($con, $_GET['c']);
		$load_comment = mysqli_query($con,"select * from courier WHERE id = '$InvCourier' ");
		
		if(mysqli_num_rows($load_comment) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$load_comment = mysqli_fetch_assoc($load_comment);
			$out->status = 'Found';
			$out->CurName = $load_comment['courier_name']; 
		}
	}

	echo json_encode($out);
?>