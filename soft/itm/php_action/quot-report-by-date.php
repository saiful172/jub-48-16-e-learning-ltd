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
 Daily Quotation  Report<br>
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

	$sql = "SELECT * FROM quot_orders_details 
	Left JOIN stuff ON stuff.userid = quot_orders_details.user_id
	WHERE order_date >= '$start_date' AND order_date <= '$end_date' and quot_orders_details.user_id='".$_SESSION['id']."'  order by quot_orders_details.id desc";
	$query = $con->query($sql);
	$countOrder = $query->num_rows;
	

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
 
		<tr>
			<th>SL No </th>
			<th>Date </th>  
			<th>Quot No </th>  
            <th>Client </th> 
            <th>Phone </th> 
            <th>Email </th> 
            <th>Address </th> 
			<th>Price</th>  
			<th>Cuses For </th>
		</tr>
		
		<tr>';
		
		$sl=0;
		$GTotal = "";	 	
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				<td><center>'.++$sl.'</center></td>
				<td><center>'.date("M d,Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['custom_invoice'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>  
				<td><center>'.$result['client_contact'].'</center></td>  
				<td><center>'.$result['order_email'].'</center></td>  
				<td><center>'.$result['address'].'</center></td>  
				<td><center>'.$result['grand_total'].'</center></td> 
				<td><center>'.$result['cuses'].'</center></td>
			</tr>';	
			
			$GTotal+= $result['grand_total']; 
			 
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="11"><center> 
			Grand Total Price = '.$GTotal.' /-<br> 
			
			</b></center></td>
		</tr>
		
	</table>
	';	

	echo $table;

}

?>

 
</body>
</html>
