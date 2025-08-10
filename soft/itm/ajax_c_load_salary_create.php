<?php
    require_once 'session.php';	
	 
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$customerID = mysqli_real_escape_string($con, $_GET['c']);
		$customer = mysqli_query($con,"select * from employees 
		Where employees.id = '$customerID'  ");
		
		if(mysqli_num_rows($customer) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$customer = mysqli_fetch_assoc($customer);
			$out->status = 'Found';
			$out->empId = $customer['id'];
			$out->empName = $customer['emp_name'];
			$out->empPosi = $customer['position'];
			$out->empSalary = $customer['salary'];
			$out->empContact = $customer['phone'];
		}
	}

	echo json_encode($out);
?>