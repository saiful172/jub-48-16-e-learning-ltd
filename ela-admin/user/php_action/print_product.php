<?php 
session_start();
require_once '../../includes/conn.php';
?>
 
 
<link rel="stylesheet" href="../css/table_data_center_with_border_black.css">

<body>
    <div class="container-fluid">
<br>

						
			 <center> <span style="font-size:18px;"><b><?php include('../../includes/report_title.php'); ?>
			   <br><?php
				 
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			  <?php echo $pqrow['stuff_name']; ?>
				  
	<?php }?></b>
	<br> Product List - With Sales Rate<br></span>
 
			 
			 Print Date : <?php echo date("M d, Y") ;?> |  Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>

<br>
<br>
								</center>

                   <?php  

	$sql = "SELECT * FROM product  WHERE user_id='".$_SESSION['id']."' order by product_id asc ";
	$query = $con->query($sql);
	$countProduct = $query->num_rows;
    
	$table = '
	  <table width="100%" class="table table-bordered">
		
		<tr>    
							 <th>SL</th>   
							 <th>Name</th>
							 <th>Price</th> 
							 <th> Comments</th> 
							
		</tr>

		<tr>';
		$sl=0;
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
									
									<td><center>'.++$sl.'</center></td> 
									<td><center>'.$result['product_name'].'</center></td>
									<td><center>'.$result['rate'].'</center></td> 
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