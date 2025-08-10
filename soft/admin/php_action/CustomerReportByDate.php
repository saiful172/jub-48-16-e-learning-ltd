
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
</head>
<body>
<div class="container-fluid">
 
<br>
 <center><h4> <?php include('../name.php'); ?><br>Customer Report Date Wise  <br>


		<?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     User / Stuff :  <?php echo $pqrow['username']; ?>
				  
				   <?php }?>
           <br>
		 <?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date To :  ' ; echo date("M d, Y", strtotime( $endDate));
?> 
<br>
Date : <?php echo date("M d, Y") ;?> | 
Time : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </h4> </center>   

<?php 

require_once 'core.php';
if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM customer where join_date >= '$start_date' AND join_date <= '$end_date'   order by customer_id desc ";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="width:100%;">
		
		<tr>
							 
                               
                             <th>No</th>
                             <th>Id</th>
                                <th>Name</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Join Date</th>
							
		</tr>

		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				 
				<td><center>'.$result['customer_no'].'</center></td>
				<td><center>'.$result['customer_id'].'</center></td>
				<td><center>'.$result['customer_name'].'</center></td>
				<td><center>'.$result['address'].'</center></td>
				<td><center>'.$result['contact_info'].'</center></td>
				<td><center>'.date("M d, Y", strtotime($result['join_date'])).'</center></td>
			</tr>';	
			
			
		}
		$table .= '
		</tr>
	
		
	</table>
	';	

	echo $table;

}
?>



</div>
</body>
</html>
