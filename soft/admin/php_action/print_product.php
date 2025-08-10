
<?php include('scripts.php'); ?>


<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/table_data_center.css">

<body>
    <div class="container-fluid">
<br>
						
			 <center> <span style="font-size:18px;"><b><?php include('../../includes/report_title.php'); ?></b><br> Product List - With Sales Rate<br></span>
Print Date : <?php echo date("M d, Y") ;?> |  Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>

<br>
<br>
								</center>

                   <?php  
require_once '../../includes/conn.php';

	$sql = "SELECT * FROM product 
	WHERE product.status = 1 order by id asc ";
	$query = $con->query($sql);
	$countProduct = $query->num_rows;

	$table = '
	  <table width="100%" class="table table-bordered" style="font-size:14px;">
		
		<tr>
			             
							 <th>Code</th> 
							 <th>Product Name</th>
							 <th>W.Sales Rate</th>
							 <th>Retail Rate</th>
							
		</tr>

		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
									
									<td><center>'.$result['product_id'].'</center></td>
									<td><center>'.$result['product_name'].'</center></td>
									<td><center>'.$result['rate'].'</center></td>
									<td><center>'.$result['retail_rate'].'</center></td>
				
			</tr>';	
			
		}
		$table .= '
		</tr>
		
	</table>
	';	

	echo $table;



?>	
				
	
</body>
</html>