
<?php include('scripts.php'); ?>


<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">

<body>
    <div class="container-fluid">
		<br>
            <div class="container-fluid">
				<div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-10">
						
			 <center> <span style="font-size:20px;">ITM-BAZAR <br> All Product List <br></span>
             <b>Current Date :</b> <?php echo date("M d,Y") ;?>
             <b> Current Time : </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>


								</center>
							
					</div>
					<div class="col-lg-2 pull-right noprint">
						<input style="font-size:20;" type="button" value="Print" onclick="printPage()"  />
						
					</div>					
				</div>
				</div>
				
				<br>
				<div class="row">
                <div class="col-lg-12">
                   <?php 

require_once 'core.php';

	$sql = "SELECT product.id, product.product_id, product.product_name, product.product_image, product.brand_id,
 		product.categories_id, product.quantity, product.rate,product.buy_rate, product.active, product.status,product.entry_date, 
 		brands.brand_name, categories.categories_name FROM product 
		
		INNER JOIN brands ON product.brand_id = brands.brand_id 
		INNER JOIN categories ON product.categories_id = categories.categories_id  
		WHERE product.status = 1 order by id desc ";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Product Id</th>
							<th>Product Image</th>
							<th>Product Name</th>
							<th>Brand </th>
							<th>Category </th>
							<th>Recent Stock</th>
							<th>Rate</th>
							<th>Buy Rate</th>
							<th>Total Sale Rate</th>
							<th>Total Buy Rate</th>
							<th>Profit</th>
							<th>Date</th>
		</tr>

		<tr>';
		$totalAmount1 = "";
		while ($result = $query->fetch_assoc()) {
			
			$x=$result['quantity'];  $y=$result['rate']; $z=$result['buy_rate'];
			$tsr = $x * $y; 
			$tbr = $x * $z; 
			$profit = $tsr - $tbr;
			
			$table .= '<tr>
			    
				<td><center>'.$result['product_id'].'</center></td>
				<td><center><img src="'.$result['product_image'].'" width="50px" alt="" /></center></td>
				<td><center>'.$result['product_name'].'</center></td>
				
				<td><center>'.$result['brand_name'].'</center></td>
				<td><center>'.$result['categories_id'].'</center></td>
				
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['rate'].'</center></td>
				<td><center>'.$result['buy_rate'].'</center></td>
				<td><center>'.$tsr.'</center></td>
				<td><center>'.$tbr.'</center></td>
				<td><center>'.$profit.'</center></td>
				
				<td><center>'.$result['entry_date'].'</center></td>
			</tr>';	
			$totalAmount1 += $result['rate'];
		}
		$table .= '
		</tr>
		<tr>
			<td colspan="6" style="text-align:right; "> Total Buy Rate  =  </td>
			<td><center>'.$totalAmount1.'</center></td>
		</tr>
	</table>
	';	

	echo $table;



?>	
					
				</div>
				</div>
           
			</div>
	</div>
	<br>

	
</body>
</html>