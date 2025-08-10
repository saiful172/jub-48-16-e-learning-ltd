<?php 
session_start();
require_once '../../includes/conn.php';
?>
<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
</head>
<body>
<div class="container" style="width:100%;">

 <center style="font-size:18px;"> <?php include('../../includes/report_title.php'); ?> <br> All   Sales  Report ( Date Wise ) <br></center> 
  <center style="font-size:16px;">  
 <?php
				 
				   $pq=mysqli_query($con,"select * from `user`  where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     User :  <?php echo $pqrow['username']; ?>
				  
				   <?php }?>
				  <br> 
				   <?php
				 
				   $UserId = $_POST['UserId'];
				   $pq=mysqli_query($con,"select distinct userid,stuff_name from stuff  where userid = '$UserId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			      Stuff  Id :  <?php echo $pqrow['userid']; ?> | 
			      Stuff   Name :  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
				   
	<br>			   <?php 
$startDate = $_POST['startDate']; $endDate = $_POST['endDate']; 
echo '  Date  From :  ' ; echo $startDate ; echo '  --  Date To : ' ; echo $endDate;
?> | 
Date :<?php echo date("M d,Y") ;?> |
Time :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </center> 
<hr>  
 
<?php  
if($_POST) {
     
	 $UserId = $_POST['UserId'];
	 
	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");

	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM orders left join `stuff` on stuff.userid=orders.user_id 
	WHERE orders.order_date >= '$start_date' AND orders.order_date <= '$end_date' and orders.user_id= '$UserId' and  orders.order_status = 1  order by orders.order_id desc";
	$query = $con->query($sql);
	$countOrder = $query->num_rows; 

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
		<tr>
		 <th colspan="2" > Invoice  </th>
		 <th colspan="1" > User  </th>
		 <th colspan="1" > Customer   </th>
		 <th colspan="3" > Ammount  </th>
		 <th colspan="2" > Paid  </th>
		  <th colspan="1" > Recent  </th>
	    <tr>
		
	    <tr>
                               
                                <th>Date </th>
                                <th>No </th>
                                <th>Name</th>
                                <th>Name</th>
								
			<th>Previous  Dues </th>
			<th> Today </th>
			<th> Grand Total </th>
			
			<th>Invoice.Date  </th>
			<th>DeliveryDate </th>
			
			<th>Dues </th>
                            </tr>

		<tr>';
		
		$PreDue = "";
		$TodayTotal = "";
		$GrandTotal= "";
		$Paid = "";
		$DDPaid = "";
		$RecDue = "";
				
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			<td><center>'.date("M d, Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['stuff_name'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
				<td><center>'.$result['pre_due'].'</center></td>
				<td><center>'.$result['today_total'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['deliver_date_paid'].'</center></td>
				<td><center>'.$result['due'].'</center></td>
			</tr>';	
			
			$PreDue += $result['pre_due'];
			$TodayTotal += $result['today_total'];
			$GrandTotal += $result['grand_total'];
			$Paid += $result['paid'];
			$DDPaid += $result['deliver_date_paid'];
			$RecDue += $result['due'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="1" style="text-align:right; "> <b>Total Invoice = </b></td>
			<td><center><b>'.$countOrder.'</center></td>
			<td colspan="2" style="text-align:right; "><b>  Grand Total  </b> = </td>
			<td><center><b>'.$PreDue.'</center></td>
			<td><center><b>'.$TodayTotal.'</center></td>
			<td><center><b>'.$GrandTotal.'</center></td>
			<td><center><b>'.$Paid.'</center></td>
			<td><center><b>'.$DDPaid.'</center></td>
			<td><center><b>'.$RecDue.'</center></td>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>

 
</body>
</html>
