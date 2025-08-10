<?php 
session_start();
require_once '../../includes/conn.php';
?>
 
 
<link rel="stylesheet" href="../css/table_data_center_with_border_black.css">

<body>
    <div class="container-fluid">
<br>

						
			 <center>  <?php 
				  				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			<span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>   
			 </span>	
			<?php }?>
			
			</b>
	<br> <span style="font-size:19;">
	Product List - Low Stock <br>
	
			 
			 Print Date : <?php echo date("M d, Y") ;?> |  Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</span>
<br>
<br>
								</center>

                   <?php  

	$sql = "SELECT * FROM product  WHERE quantity < 10 and user_id='".$_SESSION['id']."' order by product_id asc ";
	$query = $con->query($sql);
	$countProduct = $query->num_rows;
    
	$table = '
	  <table width="100%" class="table table-bordered">
		
		<tr>    
							 <th>SL</th>   
							 <th>Name</th>
							 <th>Whole Sale Price</th> 
							 <th>Retail Price</th> 
							 <th> Stock Qty</th> 
							 <th> Comments</th> 
							
		</tr>

		<tr>';
		$sl=0;
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
									
									<td><center>'.++$sl.'</center></td> 
									<td><center>'.$result['product_name'].'</center></td>
									<td><center>'.$result['rate'].'</center></td> 
									<td><center>'.$result['retail_rate'].'</center></td> 
									<td><center>'.$result['quantity'].'</center></td> 
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