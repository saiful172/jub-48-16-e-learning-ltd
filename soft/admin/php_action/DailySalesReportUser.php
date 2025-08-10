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
<center style="font-size:18px;"> <?php include('../../includes/report_title.php'); ?> <br> Daily Sales Report </center> 
<center style="font-size:16px;"> 
 <?php
				 
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     Open By :  <?php echo $pqrow['username']; ?>
				  
				   <?php }?>
           <br> 
				 <?php
				 
				   $UserId = $_POST['UserId'];
				   $pq=mysqli_query($con,"select distinct userid,stuff_name from stuff  where userid = '$UserId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     
			      User  Name:  <?php echo $pqrow['stuff_name']; ?>
				  
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
Present Date : <?php echo date("M d, Y") ;?> | 
Present Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </h4> </center>   
<br>

<?php  
if($_POST) { 

    $UserId = $_POST['UserId'];

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM orders_details 
	Left JOIN stuff ON stuff.userid = orders_details.user_id
	WHERE order_date >= '$start_date' AND order_date <= '$end_date'  and orders_details.user_id= '$UserId' order by orders_details.id desc";
	$query = $con->query($sql);
	$countOrder = $query->num_rows;
	

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
		<tr>
		 <th colspan="2" > Invoice  </th>
		 <th colspan="1" > Customer </th>
		 <th colspan="3" > Amount </th>
		 <th colspan="2" > Collection  </th>
		 <th colspan="1" > Recent  </th>
		 <th colspan="1" > Cuses  </th>
	   </tr>
		
		<tr>
			<th>Date </th>
            <th>No </th>
			
            <th>Name </th> 
			
			<th>Pre.Dues </th>
			<th> Today </th>
			<th> Grand Total </th>
			<th>Amount</th>
			<th>By </th>
			<th>Dues </th>
			<th>For </th>
		</tr>
		
		<tr>';
		
		
		$TodayTotal = "";		
		$TotalCollection = "";		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.date("M d,Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td> 
				<td><center>'.$result['pre_due'].'</center></td> 
				<td><center>'.$result['today_total'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['stuff_name'].'</center></td>
				<td><center>'.$result['recent_due'].'</center></td>
				<td><center>'.$result['cuses'].'</center></td>
			</tr>';	
			
			$TodayTotal+= $result['today_total'];
			$TotalCollection+= $result['paid'];
			 
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="10"><center>
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
