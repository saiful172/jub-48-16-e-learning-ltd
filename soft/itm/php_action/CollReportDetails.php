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
  Date Wise Sales & Collection Report <br>
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
Present Date : <?php echo date("M d, Y") ;?> | 
Present Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </span> </center>   <br>
<?php

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT orders_details.order_date,orders_details.order_id,orders_details.client_name,orders.total_amount,orders.discount,orders_details.today_total,orders_details.pre_due,orders_details.grand_total,orders_details.paid,orders_details.recent_due,orders_details.paym_type,orders_details.cuses 
	FROM  orders_details
    Left join orders on orders.order_id = orders_details.order_id
	WHERE  orders_details.order_date >= '$start_date' AND orders_details.order_date <= '$end_date'  and  orders_details.user_id='".$_SESSION['id']."' order by orders_details.id desc ";
	$query = $con->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" >
	    
     <tr>
		 <th colspan="13" style="font-size:17px; color:Green; "> Sales & Collection Report </th>
	    <tr>
		
		<tr>
		 <th colspan="1" > SL </th> 
		 <th colspan="2" >Invoice / Transaction </th>
		 <th colspan="1" >Customer  </th>
		 <th colspan="7" >Amount / Taka</th>
		 <th colspan="1" >Payment </th>
		 <th colspan="1" >Transaction </th>
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
								<th>Collection</th>
								<th>Recent.Dues</th>
								
								<th> Type </th>
								<th> Type </th>
                            </tr>

		<tr>';
		$sl=0;
		
		$TotalAmt = "";
		$Discount = "";
		$TodayTotal = "";
		$PreDue = "";
		$GrandTotal = "";
		$totalPaid = "";
		$RecDue = "";
		
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
				<td><center>'.$result['paym_type'].'</center></td>
				<td><center>'.$result['cuses'].'</center></td>
			</tr>';	
			
			$TotalAmt += $result['total_amount'];
			$Discount += $result['discount'];
			$TodayTotal += $result['today_total'];
			$PreDue += $result['pre_due'];
			$GrandTotal += $result['grand_total'];
			$totalPaid += $result['paid'];
			$RecDue += $result['recent_due'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="13">  <center><b>Total Invoice = '.$countOrder.' <br>  Total Amount = '.$TotalAmt.' <br>  Discount = '.$Discount.' <br>  Today Total = '.$TodayTotal.' <br> Pre.Due = '.$PreDue.' <br> Grand Total = '.$GrandTotal.' <br>  Total Collection = '.$totalPaid.'  <br>  Recent Due = '.$RecDue.'  </b> </center></td>
		</tr>
		

	</table>
	';	

	echo $table;

}

?>




</div>
</body>
</html>
