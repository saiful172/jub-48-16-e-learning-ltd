<?php  session_start();
require_once '../../includes/conn.php';
?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css"> 
#head{width:100%;margin-bottom:10px;float:left;border-bottom:1px solid gray;}
#left{float:left;width:30%;}
#right{float:left;width:70%;text-align:right;}
#invoice{float:left;width:100%;margin-bottom:15px;}
#invoice-to{float:left;width:70%;}
#invoice-from{float:right;width:30%;}

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
 <div class="container">
 <?php 	    
				   $pq=mysqli_query($con,"select * from stuff where userid ='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
<div style="width:100%;text-align:center;font-size:25px;float:left;"><?php echo $pqrow['business_name']; ?> </div>
<div><center> Phone : <?php echo $pqrow['contact_info']; ?>  | Email : <?php echo $pqrow['business_email']; ?> <br>  Address : <?php echo $pqrow['business_address']; ?></center></div> 

				
 <div id="head">  
 <div id="left"> 
<img src="../<?php if($pqrow['photo']==""){echo "../img/user.jpg";}else{echo $pqrow['photo'];} ?>"  width="120px;"><br>
 </div>
 <?php }?> 
 
 <div id="right">  
 <?php 	   
				   $orderId = $_POST['orderId']; 
				   $pq=mysqli_query($con,"select * from orders where order_id = $orderId ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
<div style="font-size:30px;font-weight:bold;">Invoice</div>
 <div>Invoice No : <b>itm-<?php echo $pqrow['custom_invoice_no']; ?> </b><br>  
	Date & Time : <?php date_default_timezone_set("Asia/Dhaka"); echo date("d-M-Y h:i:sa", strtotime($pqrow['invoice_time'])); ?>
</div>
 </div> 
 
  <?php }?> 
 </div> 
  
  <div id="invoice">
  <div id="invoice-to">
  Invoice To,<br>
   <?php 
				   $orderId = $_POST['orderId']; 
				   $pq=mysqli_query($con,"select distinct customer.customer_name,customer.position,customer.contact_info,customer.email from orders
    left join `customer` on customer.customer_id=orders.customer_id
				   where order_id='$orderId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
	?> 
			   <div><b><?php echo $pqrow['customer_name']; ?></b></div>
			   <div> <?php echo $pqrow['position']; ?></div> 
			   <div> Phone : <?php echo $pqrow['contact_info']; ?></div> 
			   <div> Email : <?php echo $pqrow['email']; ?></div> 
	<?php }?>
  </div>
  
  <div id="invoice-from">
  Invoice From,<br>
   <?php  
				   $pq=mysqli_query($con,"select distinct * from stuff where userid ='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?> 
			   <div><b><?php echo $pqrow['stuff_name']; ?></b></div>
			   <div> <?php echo $pqrow['position']; ?></div> 
			   <div> Phone : <?php echo $pqrow['business_phone']; ?></div> 
			   <div> Email : <?php echo $pqrow['business_email']; ?></div> 
	<?php }?>
  </div>
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
$InvoiceTime = $orderData[26];


$orderD= date("M d, Y", strtotime( $orderDate));
$DeliverD= date("M d, Y", strtotime( $DeliverDate));
$GrandTotalPaid = $paid + $DeliverDatePaid;

$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name,order_item.short_details FROM order_item
left JOIN product ON order_item.product_id = product.product_id 
WHERE order_item.order_id = $orderId";
$orderItemResult = $con->query($orderItemSql);

 $table = '
 
<table border="0" cellpadding="5" style="width:100%;float:left;border:1px solid black;border-top-style:1px solid black;border-bottom-style:1px solid black;">

	<tbody>
		<tr>
			<th><p1 style="font-size:15;">SL</p1></th>
			<th style="text-align:left;"><p1 style="font-size:15;">Services </p1> </th>
			<th><p1 style="font-size:15;">Qty </p1></th>
			<th><p1 style="font-size:15;">Price </p1></th>
			<th><p1 style="font-size:15;">Total </p1></th>
		</tr>';

		$x = 1;
		while($row = $orderItemResult->fetch_array()) {			
						
			$table .= '
			<tr >
				<th class="font border">'.$x.'</th>
<th class="font border" style="text-align:left;">'.$row[4].'<br>'.$row[5].'</th>
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
			<th class="border"></th>
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
			<th class="border text-left">'.$TodayTotal.'</th>
		</tr>
		
		
		 

	</tbody>
</table>
 ';


//$con->close();

echo $table;

?>
 
<div  style="width:100%;float:left;text-align:center;border:1px solid white;margin-top:50px;margin-bottom:5px;color:white;">11</div>

<div style="float:left; text-align:center;">........................................<br>Customer Signature</div> 
<div style="float:right;text-align:center;">........................................<br>Company Signature</div>

<div id="remark" style="width:100%;float:left;text-align:center;border:1px solid gray;margin-top:50px;margin-bottom:5px;"> 
<p style="padding:10px;">
<?php 	    
				   $pq=mysqli_query($con,"select invoice_welcome from stuff where userid ='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
?>
<?php echo $pqrow['invoice_welcome']; ?>
 <?php }?> 
</p>
</div>

</div>
	
	</body>
</html>