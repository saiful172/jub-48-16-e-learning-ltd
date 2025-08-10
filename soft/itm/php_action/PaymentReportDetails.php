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
<div><center>
<?php
				  
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			 <span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>  <br>
			 </span>	
				   <?php }?>
      <span style="font-size:19;font-weight:bold;">  Date Wise Payment Report - Details</span> 
<span style="font-size:18;">
	 
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
		</span>	<br><br>
</center></div> 
<?php

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT sup_orders_details.order_date,sup_orders_details.order_id,sup_orders_details.client_name,sup_orders.total_amount,sup_orders.discount,sup_orders_details.today_total,sup_orders_details.pre_due,sup_orders_details.grand_total,sup_orders_details.paid,sup_orders_details.recent_due,sup_orders_details.cuses 
	FROM  sup_orders_details
    Left join sup_orders on sup_orders.order_id = sup_orders_details.order_id
	WHERE  sup_orders_details.order_date >= '$start_date' AND sup_orders_details.order_date <= '$end_date'  and  sup_orders_details.user_id='".$_SESSION['id']."' order by sup_orders_details.id desc ";
	$query = $con->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" >
	    
     <tr>
		 <th colspan="11" style="font-size:17px; color:Green; "> Payment Report Details </th>
	    <tr>
		
		<tr>
		 <th colspan="1" > SL </th>
		 <th colspan="1" > Last </th>
		 <th colspan="1" >Invoice  </th>
		 <th colspan="1" >Supplier  </th>
		 <th colspan="7" >Amount/Taka</th>
		 <th colspan="1" >Paid </th>
	    <tr>
		
	    <tr>
                           <th>No</th>    
                                <th>Date</th>
                                <th>No</th>
								<th> Name  </th>
								<th> Total Amt </th>
								<th> Dis </th>
                               	<th>Today Total  </th>
								<th>Pre.Dues</th>
                               	<th>Grand Total  </th>
								<th>Payment</th>
								<th>Recent.Dues</th>
								
								<th> Cuses </th>
                            </tr>
		<tr>';
		
		$totalPaid = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    <td><center>'.++$sl.'</center></td>
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
			<td colspan="12">  <center><b>Total = '.$countOrder.' |  Total Payment = '.$totalPaid.' </b> </center></td>
		</tr>
		

	</table>
	';	

	echo $table;

}

?>




</div>
</body>
</html>
