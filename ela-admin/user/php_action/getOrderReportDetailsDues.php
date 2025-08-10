
<!DOCTYPE html>
<html>
<head>
<script>
function printPage() {
    window.print();
}
</script>
</head>
<body>
<div class="container-fluid">
 <br>
<center><h4> <?php include('../name.php'); ?><br>তারিখ অনুযায়ী  বাকীর রিপোর্ট   <br>
<?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     User Name :  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
           <br>
		 <?php 
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

echo ' তারিখ হতে : ' ;
echo $startDate; 
echo ' |  তারিখ পর্যন্ত :  ' ;
echo $endDate  ;

?>
<br>
বর্তমান তারিখ : <?php echo date("M d, Y") ;?> | 
বর্তমান সময়   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </h4> </center>   
 
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT order_item.total,order_item.product_id,order_item.quantity,order_item.rate,
	orders.order_date,orders.order_id,orders.customer_id,orders.client_name,orders.client_contact,orders.dues_or_paid,
	 product.product_name FROM  order_item
	
	INNER JOIN orders ON orders.order_id  = order_item.order_id
	INNER JOIN product ON order_item.product_id = product.product_id 
	
	WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and dues_or_paid_status='4' and  user_id='".$_SESSION['id']."' order by order_id desc";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th> Order Date</th>
			<th> Invoice No</th>
			<th> Customer Id </th>
			<th> Customer Name </th>
			<th> Phone </th>
			<th> Product Id </th>
			<th> Product Name </th>
			<th> Type </th>
			<th> Quantity </th>
			<th> Rate </th>
			<th> Total Rate </th>
		</tr>

		<tr>';
		$totalAmount1 = "";
		$totalqty = "";
		$totalrate = "";
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['customer_id'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
				<td><center>'.$result['client_contact'].'</center></td>
				<td><center>'.$result['product_id'].'</center></td>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['dues_or_paid'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['rate'].' /-</center></td>
				<td><center>'.$result['total'].' /-</center></td>
			</tr>';	
			$totalAmount1 += $result['total'];
			$totalqty += $result['quantity'];
			$totalrate += $result['quantity'];
			
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="8" style="text-align:right; "> Grand Total  = </td>
			<td><center>'.$totalqty.'</center></td>
			<td colspan="" style="text-align:right; ">  </td>
			<td><center>'.$totalAmount1.'.00 /-</center></td>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>

<br><br>
<!-- Total Invoice Start-->
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT order_item.total,order_item.product_id,order_item.quantity,order_item.rate,
	orders.order_date,orders.order_id,orders.customer_id,orders.client_name,orders.client_contact,
	 product.product_name FROM  order_item
	
	INNER JOIN orders ON orders.order_id  = order_item.order_id
	INNER JOIN product ON order_item.product_id = product.product_id 
	
	WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and dues_or_paid_status='4' and user_id='".$_SESSION['id']."' group by order_id desc";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th> Grand Total Invoice</th>
		</tr>

		<tr>';
		$totalAmount1 = "";
		$totalqty = "";
		$totalrate = "";
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				
			</tr>';	
			$totalAmount1 += $result['total'];
			$totalqty += $result['quantity'];
			$totalrate += $result['quantity'];
			
		}
		$table .= '
		</tr>

		<tr>
			
			<td><center>'.$countOrder.'</center></td>
		</tr>
	</table>
	';	

	echo $table;

}

?>
<!-- Total Invoice End -->

<!-- Total Product & Price Start-->
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT order_item.total,order_item.product_id,order_item.quantity,order_item.rate,
	orders.order_date,orders.order_id,orders.customer_id,orders.client_name,orders.client_contact,
	 product.product_name FROM  order_item
	
	INNER JOIN orders ON orders.order_id  = order_item.order_id
	INNER JOIN product ON order_item.product_id = product.product_id 
	
	WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and dues_or_paid_status='4' and user_id='".$_SESSION['id']."' ";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			
			<th> Grand Total Product Quantity</th>
			<th> Grand Total Rate </th>
		</tr>

		<tr>';
		$totalAmount1 = "";
		$totalqty = "";
		$totalrate = "";
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				
			</tr>';	
			$totalAmount1 += $result['total'];
			$totalqty += $result['quantity'];
			$totalrate += $result['quantity'];
			
		}
		$table .= '
		</tr>

		<tr>
			
			
			
			<td><center>'.$totalqty.'</center></td>
		
			<td><center>'.$totalAmount1.'.00 /-</center></td>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>
<!-- Total Product & Price End-->
 
</body>
</html>
