<?php 
session_start();
require_once '../../includes/conn.php';
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
</head>
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
	<?php }?> <br>
	<span style="font-size:19;">
Date Wise Service Charge Report
</span>
<br>
<span style="font-size:18;">
<?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date To :  ' ; echo date("M d, Y", strtotime( $endDate));
?> <br>
Date : <?php echo date("M d, Y") ;?> | 
Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </span>
		 </center> <br>
 
<?php 
 
if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "select * from service_charge_paid 
								left join customer on customer.customer_id=service_charge_paid.client_id 
								left join service_category on service_category.scat_id=service_charge_paid.product_type
								where service_charge_paid.entry_date >= '$start_date' AND service_charge_paid.entry_date <= '$end_date'  and service_charge_paid.user_id='".$_SESSION['id']."' and service_charge_paid.status=1 ORDER BY id DESC  ";
	
	$query = $con->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="width:100%;">
		<tr>
							 <th>SL</th>
                                <th>Date</th>
                                <th>Id</th>
                                <th>Name</th>
								<th>Year</th>
                                <th>Month</th>
								<th>Product Type</th>
								<th>Service Charge</th>
								<th>paid</th>
								<th>Dues</th>
								<th>Comments</th>
							
		</tr>

		<tr>';
	 
$sl=0;		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.++$sl.'</center></td>
				<td><center>'.date("d-M-Y", strtotime($result['entry_date'])).'</center></td>
				<td><center>'.$result['client_id'].'</center></td>
				<td><center>'.$result['customer_name'].'</center></td>
				<td><center>'.$result['year'].'</center></td>
				<td><center>'.$result['month'].'</center></td>
				<td><center>'.$result['name'].'</center></td>
				<td><center>'.$result['service_charge'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['due'].'</center></td>
				<td><center>'.$result['comments'].'</center></td>
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
