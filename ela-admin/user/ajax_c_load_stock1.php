<?php
    require_once 'session.php';	
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$productID = mysqli_real_escape_string($con, $_GET['c']);
		$product = mysqli_query($con,"select * from product 
		INNER JOIN brands ON product.brand_id = brands.brand_id 
		INNER JOIN categories ON product.categories_id = categories.categories_id  WHERE  product_id = '$productID' and status=1 and active=1 ");
		
		if(mysqli_num_rows($product) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$product = mysqli_fetch_assoc($product);
			$out->status = 'Found';
			$out->productName = $product['product_name'];
			$out->brandId1 = $product['brand_name'];
			$out->brandId = $product['brand_id'];
			$out->categoriesId1 = $product['categories_name'];
			$out->categoriesId = $product['categories_id'];
			$out->productQty = $product['quantity'];
			$out->saleRate = $product['rate'];
			$out->totalSaleRate = $product['total_rate'];
			$out->buyRate = $product['buy_rate'];
			$out->totalBuyRate = $product['total_buy_rate'];
		}
	}

	echo json_encode($out);
?>