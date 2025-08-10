<?php  session_start();
require_once '../../includes/conn.php';
?>

<!DOCTYPE html>
<html>
<head>

<style type="text/css"> 
#head{width:100%;margin-bottom:10px;float:left;border-bottom:1px solid gray;}
#left{float:left;width:10%;}
#right{float:left;width:90%;text-align:center;}
#invoice{float:left;width:100%;}

hr{border:0.5px solid gray; margin:2px;} 
.font{font-weight: normal;}
.border{border-top:1px solid gray;}
.text-right{text-align:right;}
.text-left{text-align:left;}
</style>
<script>
function printPage() {
    window.print();
}
</script>
</head>
<body>

<br>

 <!--<input type="button" value="Print" onclick="printPage()"  /> -->
 
 <div id="head"> 
 <?php 	   
				   $orderId = $_POST['orderId'];
				   
				   $pq=mysqli_query($con,"select * from orders left join `stuff` on stuff.userid=orders.user_id where orders.order_id='$orderId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
 <div id="left"><b><h2>
<img src="../<?php if($pqrow['photo']==""){echo "../img/user.jpg";}else{echo $pqrow['photo'];} ?>" height="70px;" width="70px;"><br>
</h2></b>
</div>
 
 <div id="right"> 
<b><h2><?php echo $pqrow['position']; ?></h2></b>
<h3>Invoice</h3>
 </div> 
 
 <?php }?> 
 </div> 
  
  <div id="invoice">
   <?php 
				   $orderId = $_POST['orderId']; 
				   $pq=mysqli_query($con,"select distinct * from orders where order_id='$orderId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?> 
			   <div>Invoice No : <b>itm-<?php echo $pqrow['custom_invoice_no']; ?> </b> </div>
			   <div> Date : <?php echo date("d-M-Y", strtotime($pqrow['order_date'])); ?></div>  <br>
			   <div> Client : <b><?php echo $pqrow['client_name']; ?></b></div>
			   <div> Address : <?php echo $pqrow['address']; ?> Dhaka City</div> <br>
	<?php }?>  

  </div>
 
<?php 	 
$orderId = $_POST['orderId'];

$sql = "SELECT * FROM orders  WHERE order_id = $orderId";

$orderResult = $con->query($sql);
$orderData = $orderResult->fetch_array();


$OrderId = $orderData[1];
$EmpId = $orderData[2];
$CustId = $orderData[3];
$orderDate = $orderData[4];
$DeliverDate = $orderData[5];
$clientName = $orderData[6];
$clientContact = $orderData[7]; 
$clientAddress = $orderData[8]; 

$subTotal = $orderData[10];
$vat = $orderData[11];
$totalAmount = $orderData[12]; 
$discount = $orderData[13];
$PreDue = $orderData[14];
$TodayTotal = $orderData[15];
$GTotal = $orderData[16];

$paid = $orderData[17];
$DeliverDatePaid = $orderData[18];
$RecDue = $orderData[19];
$Due_or_paid = $orderData[20];
$CustomInvoice = $orderData[25];


$orderD= date("M d, Y", strtotime( $orderDate));
$DeliverD= date("M d, Y", strtotime( $DeliverDate));
$GrandTotalPaid = $paid + $DeliverDatePaid;

$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item
	left JOIN product ON order_item.product_id = product.product_id 
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
						
			$table .= '
			<tr >
				<th class="font border">'.$x.'</th>
<th class="font border" style="text-align:left;">'.$row[4].'</th>
				<th class="font border">'.$row[2].'</th>
				<th class="font border">'.$row[1].'</th>
				<th class="font border text-left" >'.$row[3].'</th>
			</tr>
			';
		$x++;
		} // /while

		$table .= '
	    <tr>
			<th class="border"> </th>
			<th class="border"></th>
			<th class="border"></th>
			<th class="border text-right">Subtotal :</th>
			<th class="border text-left">'.$subTotal.'</th>
		</tr>

		<tr>
			<th class="border"> </th>
			<th class="border"></th>
			<th class="border"></th>
			<th class="border text-right">Discount :</th>
			<th class="border text-left">'.$discount.'</th>
		</tr>
         
		<tr>
			<th class="border"> </th>
			<th class="border"></th>
			<th class="border"></th>
			<th class="border text-right"> Total :</th>
			<th class="border text-left">'.$GTotal.'</th>
		</tr>
		
		<tr>
			<th class="border"> </th>
			<th class="border"></th>
			<th class="border"></th>
			<th class="border text-right">Previous Due :</th>
			<th class="border text-left">'.$PreDue.'</th>
		</tr>
		
		<tr>
			<th class="border"> </th>
			<th class="border"></th>
			<th class="border"></th>
			<th class="border text-right">Grand Total :</th>
			<th class="border text-left">'.$GTotal.'</th>
		</tr>
		
		<tr>
			<th class="border"> </th>
			<th class="border"></th>
			<th class="border"></th>
			<th class="border text-right">Total Payment:</th>
			<th class="border text-left">'.$paid.'</th>
		</tr>
		
		<tr>
			<th class="border"> </th>
			<th class="border"></th>
			<th class="border"></th>
			<th class="border text-right">Recent Due:</th>
			<th class="border text-left">'.$RecDue.'</th>
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