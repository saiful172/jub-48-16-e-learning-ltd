<?php
    require_once 'session.php';	
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$InvComment = mysqli_real_escape_string($con, $_GET['c']);
		$load_comment = mysqli_query($con,"select * from invoice_comments WHERE id = '$InvComment' ");
		
		if(mysqli_num_rows($load_comment) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$load_comment = mysqli_fetch_assoc($load_comment);
			$out->status = 'Found';
			$out->ComName = $load_comment['comments_name']; 
		}
	}

	echo json_encode($out);
?>