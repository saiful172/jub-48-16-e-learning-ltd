<?php
    require_once 'session.php';	 
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$StudentID = mysqli_real_escape_string($con, $_GET['c']);
		$student_pament = mysqli_query($con,"select * from orders_dues 
        left join `students` on students.student_id=orders_dues.student_id
		WHERE orders_dues.student_id = '$StudentID' ");
		
		if(mysqli_num_rows($student_pament) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$student_pament = mysqli_fetch_assoc($student_pament);
			$out->status = 'Found';
			$out->StId = $student_pament['student_id'];
			$out->Name = $student_pament['student_name'];
			$out->Batch = $student_pament['batch_no']; 
			$out->Course = $student_pament['course_name']; 
			$out->StPhone = $student_pament['student_phone']; 
			$out->StMail = $student_pament['student_email']; 
			$out->PresAddress = $student_pament['pre_vill']; 
			
			$out->customerOrderId = $student_pament['order_id'];
			$out->PreviousDue = $student_pament['pre_due'];
			$out->TodayTotal = $student_pament['today_total'];
			$out->GrandTotal = $student_pament['grand_total'];
			$out->customerDues = $student_pament['recent_due'];
		}
	}

	echo json_encode($out);
?>