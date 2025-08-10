<?php 
session_start();
require_once '../../includes/conn.php';
?>
<!DOCTYPE html>
<html>
<head>
<script>
function printPage() {
    window.print();
}
</script>
<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
</head>
<body>
 <div class="container-fluid">
 <br>
<center><h4> <?php include('../../includes/report_title.php'); ?><br>Date Wise Collection Report  <br>
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
<?php  
if($_POST) {
	
	$UserId = $_POST['UserId'];

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT orders_details.order_date,orders_details.order_id,orders_details.client_name,orders.total_amount,orders.discount,orders_details.today_total,orders_details.pre_due,orders_details.grand_total,orders_details.paid,orders_details.recent_due,orders_details.cuses 
	FROM  orders_details
    Left join orders on orders.order_id = orders_details.order_id
	WHERE  orders_details.order_date >= '$start_date' AND orders_details.order_date <= '$end_date'  and orders_details.user_id= '$UserId' order by orders_details.id desc ";
	$query = $con->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
	    
     <tr>
		 <th colspan="11" style="font-size:17px; color:Green; "> Collection Report Details </th>
	    <tr>
		
		<tr>
		 <th colspan="1" > Last </th>
		 <th colspan="1" >Invoice  </th>
		 <th colspan="1" >Customer  </th>
		 <th colspan="7" >Amount/Taka</th>
		 <th colspan="1" >Paid </th>
	    <tr>
		
	    <tr>
                               
                                <th>Date</th>
                                <th>No</th>
								<th> Name  </th>
								<th> Total Amt </th>
								<th> Dis </th>
                               	<th>Today Total  </th>
								<th>Pre.Dues</th>
                               	<th>Grand Total  </th>
								<th>Collection</th>
								<th>Recent.Dues</th>
								
								<th> Cuses </th>
                            </tr>

		<tr>';
		
		$totalPaid = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				<td><center>'.date("M d,Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
				
				<td><center>'.$result['total_amount'].'</center></td>
				<td><center>'.$result['discount'].'</center></td>
				<td><center>'.$result['today_total'].'</center></td>
				<td><center>'.$result['pre_due'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['recent_due'].'</center></td>
				<td><center>'.$result['cuses'].'</center></td>
			</tr>';	
			$totalPaid += $result['paid'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="11">  <center><b>Total = '.$countOrder.' |  Total Collection = '.$totalPaid.' </b> </center></td>
		</tr>
		

	</table>
	';	

	echo $table;

}

?>




</div>
</body>
</html>
