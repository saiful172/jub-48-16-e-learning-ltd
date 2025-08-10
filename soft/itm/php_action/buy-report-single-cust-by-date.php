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

<div class="container" style="width:100%;">
<div><center>
<?php				  
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			 <span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>  <br>
			 </span>	
				   <?php }?>
      <span style="font-size:19;font-weight:bold;">Supplier Purchase Report - Date Wise( Single ) </span> 
<span style="font-size:18;">
<br>	
				   <?php
				  $CustId = $_POST['CustId'];
                  $pq=mysqli_query($con,"select distinct sup_id,client_name,client_contact from sup_orders  WHERE sup_id = '$CustId' ");				  
				  while($pqrow=mysqli_fetch_array($pq)){
				?>
			      Supplier Id :  <?php echo $pqrow['sup_id']; ?> , 
			      Name :  <?php echo $pqrow['client_name']; ?>,
			      Phone :  <?php echo $pqrow['client_contact']; ?>
				  
				   <?php }?>
				   
	<br>			
	
		 <?php 
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

echo ' Date From : ' ;
echo $startDate; 
echo ' |  Date To :  ' ;
echo $endDate  ;

?>
<br>
Date : <?php echo date("M d, Y") ;?> | 
Time  : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		 </span>	<br><br>
</center></div> 

<?php 
if($_POST) {
    
	$CustId = $_POST['CustId'];
	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM sup_orders_details 
	Left JOIN stuff ON stuff.userid = sup_orders_details.user_id
	WHERE sup_orders_details.sup_id= '$CustId' and order_date >= '$start_date' AND order_date <= '$end_date' order by sup_orders_details.id desc";
	$query = $con->query($sql);
	$countOrder = $query->num_rows;
	

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
		<tr>
		 <th colspan="1" > SL  </th>
		 <th colspan="2" > Invoice  </th>
		 <th colspan="3" > Amount </th>
		 <th colspan="2" > Payment  </th>
		 <th colspan="1" > Recent  </th>
		 <th colspan="1" > Cuses  </th>
	   </tr>
		
		<tr>
            <th>No </th>
			<th>Date </th>
            <th>No </th>
			
			<th>Previous  Dues </th>
			<th> Today </th>
			<th> Grand Total </th>
			<th>Amount</th>
			<th>By </th>
			<th>Dues </th>
			<th>For </th>
		</tr>
		
		<tr>';
		
		
		$TodayTotal = "";		
		$TotalPayment = "";		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			 <td><center>'.++$sl.'</center></td>
				<td><center>'.date("M d,Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['pre_due'].'</center></td>
				<td><center>'.$result['today_total'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['stuff_name'].'</center></td>
				<td><center>'.$result['recent_due'].'</center></td>
				<td><center>'.$result['cuses'].'</center></td>
			</tr>';	
			
			$TodayTotal+= $result['today_total'];
			$TotalPayment+= $result['paid'];
			 
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="10"><center>
			<b>Total Invoice = '.$countOrder.' <br>
			Total Purchase Today = '.$TodayTotal.' <br>
			Total Payment = '.$TotalPayment.' 
			
			</b></center></td>
		</tr>
		
	</table>
	';	

	echo $table;

}

?>

 
</body>
</html>
