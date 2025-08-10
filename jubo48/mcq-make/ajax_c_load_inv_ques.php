<?php
    require_once 'session.php';	
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found"; 
	}
	else{
		
		$InvComment = mysqli_real_escape_string($con, $_GET['c']);
		$load_comment = mysqli_query($con,"select * from questions_list WHERE id = '$InvComment' ");
		
		if(mysqli_num_rows($load_comment) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$load_comment = mysqli_fetch_assoc($load_comment);
			$out->status = 'Found';
			$out->QName = $load_comment['question']; 
			
			$out->Ans1 = $load_comment['ans1']; 
			$out->Ans2 = $load_comment['ans2']; 
			$out->Ans3 = $load_comment['ans3']; 
			$out->Ans4 = $load_comment['ans4']; 
			$out->RgtAns = $load_comment['right_ans']; 
		}
	}

	echo json_encode($out);
?>