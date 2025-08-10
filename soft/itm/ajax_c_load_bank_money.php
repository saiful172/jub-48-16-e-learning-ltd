<?php
    require_once 'session.php';	 
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$BankId = mysqli_real_escape_string($con, $_GET['c']);
		$customer = mysqli_query($con,"select * from bank_money 
		left join bank_name on bank_name.id=bank_money.bank_id
		Where bank_name.id = '$BankId'  ");
		
		if(mysqli_num_rows($customer) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$customer = mysqli_fetch_assoc($customer);
			$out->status = 'Found';
			$out->customerName = $customer['name'];
			$out->AccNo = $customer['account_no'];
			$out->RecentAmt = $customer['recent_amt'];
		}
	}

	echo json_encode($out);
?>