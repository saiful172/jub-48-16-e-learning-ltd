<?php
    require_once 'session.php';	
	 
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$supplierID = mysqli_real_escape_string($con, $_GET['c']);
		$supplier = mysqli_query($con,"select supplier.sup_id,supplier.supplier_name,supplier.contact_info, supplier.address, sup_orders_dues.recent_due
		from supplier left join sup_orders_dues on sup_orders_dues.sup_id=supplier.sup_id  WHERE supplier.sup_id = '$supplierID' ");
		
		if(mysqli_num_rows($supplier) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$supplier = mysqli_fetch_assoc($supplier);
			$out->status = 'Found';
			$out->supplierIdd = $supplier['sup_id'];
			$out->supplierName = $supplier['supplier_name'];
			$out->supplierContact = $supplier['contact_info'];
			$out->supplierAddress = $supplier['address'];
			$out->preDues = $supplier['recent_due'];
		}
	}

	echo json_encode($out);
?>