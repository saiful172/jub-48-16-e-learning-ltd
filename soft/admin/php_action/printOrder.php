
<?php  session_start();
require_once '../../includes/conn.php';
?>

<!DOCTYPE html>
<html>
<head>

<style type="text/css"> 
hr{border:0.5px solid gray; margin:2px;} 
.font{font-weight: normal;}
.border{border-top:1px solid gray;}
</style>
<script>
function printPage() {
    window.print();
}
</script>
</head>
<body>

<br>

 <input type="button" value="Print" onclick="printPage()"  /> 
 <center> <p1 style="font-size:20;"> <b> <?php include('../../includes/report_title.php'); ?></b> </p1><br>

 <p1 style="font-size:14;"></p1>   <p1 style="font-size:14;"> </p1> 
 <p1 style="font-size:15;"> </p1>  
 
<br>
 <p1 style="font-size:15;font-weight:bold;"> Date : <?php echo date("M d, Y") ;?> | 
 Time : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?> 
 <?php
			 
				   $orderId = $_POST['orderId'];
				   
				   $pq=mysqli_query($con,"select * from orders left join `stuff` on stuff.userid=orders.user_id where orders.order_id='$orderId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			   | Invoice By : <?php echo $pqrow['stuff_name']; ?>
				  </p1>
				   <?php }?><hr>
				   
	<!--			   
 -->
				   
				  </b><br>
</center>

<table border="1" cellspacing="0" cellpadding="5" width="100%" style="border:1px solid black;">
	<thead>
		<tr >
			<td>
			 <center>   
				 <?php
				 
				   
				   $orderId = $_POST['orderId'];
				   
				   $pq=mysqli_query($con,"select distinct * from orders where order_id='$orderId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			 
			  <p1 style="font-size:15; font-weight:bold;">
			   Invoice No : <?php echo $pqrow['order_id']; ?> <br>
			 Invoice Date : <?php echo date("d-M-Y", strtotime($pqrow['order_date'])); ?>
		<!--	 Invoice Date : <?php echo date("d-M-Y | h:i:sa ", strtotime($pqrow['order_date'])); ?>  -->
			 
			     
			</p1> 
				  
				   <?php }?>  
				</center> 
				
			</td>
			
			<td>
			 <center>   
				 <?php
				 
				   
				   $orderId = $_POST['orderId'];
				   
				   $pq=mysqli_query($con,"select distinct * from orders left join `customer` on customer.customer_id=orders.customer_id where orders.order_id='$orderId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			   <p1 style="font-size:15; font-weight:bold;">
			   Name : <?php echo $pqrow['client_name']; ?> <br>
			  Phone : <?php echo $pqrow['client_contact']; ?> <br>
			Address : <?php echo $pqrow['address']; ?>
			</p1> 
				  
				   <?php }?>  
		  
				</center> 
				
			</td>
				
		</tr>		
	</thead>
</table>
<br>
<?php 	 

$orderId = $_POST['orderId'];

$sql = "SELECT * FROM orders  WHERE order_id = $orderId";

$orderResult = $con->query($sql);
$orderData = $orderResult->fetch_array();


$OrderId = $orderData[0];
$EmpId = $orderData[1];
$CustId = $orderData[2];
$orderDate = $orderData[3];
$DeliverDate = $orderData[4];
$clientName = $orderData[5];
$clientContact = $orderData[6]; 

$subTotal = $orderData[7];
$vat = $orderData[8];
$totalAmount = $orderData[9]; 
$discount = $orderData[10];
$PreDue = $orderData[11];
$TodayTotal = $orderData[12];
$GTotal = $orderData[13];

$paid = $orderData[14];
$DeliverDatePaid = $orderData[15];
$RecDue = $orderData[16];
$Due_or_paid = $orderData[17];


$orderD= date("M d, Y", strtotime( $orderDate));
$DeliverD= date("M d, Y", strtotime( $DeliverDate));
$GrandTotalPaid = $paid + $DeliverDatePaid;

$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item
	INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $con->query($orderItemSql);

 $table = '
 
<table border="0" width="100%;" cellpadding="5" style=" border:1px solid black;border-top-style:1px solid black;border-bottom-style:1px solid black;">

	<tbody>
		<tr>
			<th><p1 style="font-size:15;">SL</p1></th>
			<th style="text-align:left;"><p1 style="font-size:15;">Product </p1> </th>
			<th><p1 style="font-size:15;">Qty </p1></th>
			<th><p1 style="font-size:15;">Price </p1></th>
			<th><p1 style="font-size:15;">Total </p1></th>
		</tr>';

		$x = 1;
		while($row = $orderItemResult->fetch_array()) {			
						
			$table .= '<tr >
				<th class="font border">'.$x.'</th>
<th class="font border" style="text-align:left;">'.$row[4].'</th>
				<th class="font border">'.$row[2].'</th>
				<th class="font border">'.$row[1].'</th>
				<th class="font border" >'.$row[3].'</th>
			</tr>
			';
		$x++;
		} // /while

		$table .= '<tr >
			<th class="border"> </th>
			<th class="border"></th>
			<th class="border"></th>
			<th class="border"></th>
			<th class="border">'.$subTotal.'</th>
		</tr>

		<tr>
			<th></th>
		</tr>
         
		 <tr>
					
		</tr>
		
		<tr>
	     	
			<th><p1 style="font-size:15;">Discount</p1></th>
			<th><p1 style="font-size:15;">Previous Due</p1></th>
			<th><p1 style="font-size:15;">Grand Total </p1></th>
			<th><p1 style="font-size:15;">Total Paid </p1></th>
			<th><p1 style="font-size:15;">Recent Due </p1></th>
		</tr>

		

		<tr>
					
		</tr>	

		<tr>
						
		</tr>

		<tr> 
     <!--    <th>'.$subTotal.'</th>
			 <th>'.$TodayTotal.'</th>  -->
			 
			 <th>'.$discount.'</th>	
			 <th>'.$PreDue.'</th>
			 <th>'.$GTotal.'</th>
			 <th>'.$GrandTotalPaid.'</th>
			 <th>'.$RecDue.'</th>
	
             		 
		</tr>
		
		<tr>
						
		</tr>
      

	</tbody>
</table>
 ';


$con->close();

echo $table;

?>
<!--
<br>
<br>
<br>
<br>
<div style="float:left; text-align:center;">........................................<br>Customer Signature</div> 
<div style="float:right;text-align:center;">........................................<br>Company Signature</div>

-->
	
	</body>
</html>