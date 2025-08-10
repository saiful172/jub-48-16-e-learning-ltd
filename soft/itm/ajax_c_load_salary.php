<?php
    require_once 'session.php'; 
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$customerID = mysqli_real_escape_string($con, $_GET['c']);
		$customer = mysqli_query($con,"select * from employees_salary 
		Left JOIN employees ON employees.id = employees_salary.emp_id
		Where employees_salary.emp_id = '$customerID' and employees_salary.status=1 ");
		
		if(mysqli_num_rows($customer) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$customer = mysqli_fetch_assoc($customer);
			$out->status = 'Found';
			$out->empName = $customer['emp_name'];
			$out->empPosi = $customer['position'];
			$out->empYear = $customer['year'];
			$out->empMonth = $customer['month'];
			$out->empSalary = $customer['salary'];
			$out->empBonus = $customer['bonus'];
			$out->empTotalSal = $customer['total_salary'];
			$out->empAdvPaid = $customer['adv_paid'];
			$out->empFullPaid = $customer['full_paid'];
			$out->empRecDue = $customer['recent_due'];
		}
	}

	echo json_encode($out);
?>