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
<br>
<center>
<?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			    <span style="font-size:21;font-weight:bold;">
			  <?php echo $pqrow['business_name']; ?><br>
				 </span> 
				   <?php }?>
  <span style="font-size:20;">        
 Daily Sales /  Delivery Report<br>
</span> 
<span style="font-size:19;"> 
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
</span>  </center>  
<br>

<?php  

if($_POST) { 

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM orders 
	Left JOIN stuff ON stuff.userid = orders.user_id
	left join `delivery` on delivery.id=orders.delivery_status
	left join `payment_type` on payment_type.pt_id=orders.payment_type
	WHERE orders.order_date >= '$start_date' AND orders.order_date <= '$end_date' and orders.user_id='".$_SESSION['id']."'  order by orders.id desc";
	$query = $con->query($sql);
	$countOrder = $query->num_rows;
	

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
		<tr>
		 <th colspan="1" > SL  </th>
		 <th colspan="2" > Invoice  </th>
		 <th colspan="1" > Customer </th>
		 <th colspan="3" > Amount </th> 
		 <th colspan="1" >Payment</th>
		 <th colspan="1" > Delivery  </th>
	   </tr>
		
		<tr>
			<th>No </th>
			<th>Date </th>
            <th>No </th>
			
            <th>Name </th> 
			 
			<th>Grand Total </th>
			<th>Paid</th> 
			<th>Due </th> 
			<th>Type </th> 
			<th>Status </th>
		</tr>
		
		<tr>';
		
		$sl=0;
		$TodayTotal = "";		
		$TotalCollection = "";		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				<td><center>'.++$sl.'</center></td>
				<td><center>'.date("M d,Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>  
				
				<td><center>'.$result['grand_total'].'</center></td>
				<td><center>'.$result['paid'].'</center></td> 
				<td><center>'.$result['due'].'</center></td> 
				<td><center>'.$result['pt_name'].'</center></td>
				<td><center>'.$result['dlvry_name'].'</center></td>
			</tr>';	
			
			$TodayTotal+= $result['today_total'];
			$TotalCollection+= $result['paid'];
			 
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="12"><center>
			<b>Total Invoice = '.$countOrder.' <br>
			Total Sale Today = '.$TodayTotal.' <br>
			Total Collection = '.$TotalCollection.' 
			
			</b></center></td>
		</tr>
		
	</table>
	';	

	echo $table;

}

?>

 
</body>
</html>
