<?php 
session_start();
require_once '../../includes/conn.php';
?>
 
 
<link rel="stylesheet" href="../css/table_data_center_with_border_black.css">

<body>
    <div class="container-fluid">
<br>

						
			 <center> <?php 
				  				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			<span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>   
			 </span>	
			<?php }?>
			
			</b>
	<br> <span style="font-size:19;">
	Service Charge Report<br>
	
			 
			 Print Date : <?php echo date("M d, Y") ;?> |  Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</span>
 
<br>
<br>
								</center>

                   <?php  

	$sql = "SELECT * from service_charge 
								left join customer on customer.customer_id=service_charge.client_id 
								left join service_category on service_category.scat_id=service_charge.product_type 
								where service_charge.user_id='".$_SESSION['id']."' and service_charge.status=1 ORDER BY id ASC ";
	$query = $con->query($sql);
	$countProduct = $query->num_rows;
    
	$table = '
	  <table width="100%" class="table table-bordered">
		
		<tr>    
							 <th>SL</th>
                                <th>Client Id</th>
                                <th>Client Name</th>
								<th>Product Type</th>
								
								<th>Service Charge</th>
							
		</tr>

		<tr>';
		$sl=0;
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
									
									<td><center>'.++$sl.'</center></td> 
									<td><center>'.$result['client_id'].'</center></td>
									<td><center>'.$result['customer_name'].'</center></td> 
									<td><center>'.$result['name'].'</center></td> 
									<td><center>'.$result['service_charge'].'</center></td> 
									<td> </td>
				
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