
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
</head>
<body>
<div class="container" style="width:100%;">

<br>
<center style="font-size:18px;"> <?php include('name.php'); ?> <br>Sales Report - Date Wise ( Details ) </center> 
  <center style="font-size:16px;"> 
 <?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			    User / Stuff :  <?php echo $pqrow['stuff_name']; ?>
				  
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
Date : <?php echo date("M d, Y") ;?> | 
Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </h4> </center>  
<br>
 
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
	
	WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and user_id='".$_SESSION['id']."' order by order_id desc";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
		<tr>
		 <th colspan="1" >SL  </th>
		 <th colspan="2" >Invoice  </th>
		 <th colspan="2" >Customer  </th>
		 <th colspan="1" >Product  </th>
		 <th colspan="3" >Sales  </th>
	    <tr>
				
		<tr>
			<th> No</th>
			<th> Date</th>
			<th> No </th>
			
			<th> Name </th>
			<th> Phone </th>
			
			<th> Name </th>
			
			<th> Sales </th>
			<th> Quantty </th>
			<th> Total Price </th>
		</tr>

		<tr>';
		$sl=0;
		$totalAmount1 = "";
		$totalqty = "";
		$totalrate = "";
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    <td><center>'.++$sl.'</center></td>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				
				<td><center>'.$result['client_name'].'</center></td>
				<td><center>'.$result['client_contact'].'</center></td>
				
				
				<td><center>'.$result['product_name'].'</center></td>
				
				<td><center>'.$result['rate'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['total'].' </center></td>
			</tr>';	
			$totalAmount1 += $result['total'];
			$totalqty += $result['quantity'];
			$totalrate += $result['quantity'];
			
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="7" style="text-align:right; "><b> Total  = </td>
			<td><center><b>'.$totalqty.'</center></td>
			
			<td><center><b>'.$totalAmount1.'.00</center></td>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>

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
	
	WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and user_id='".$_SESSION['id']."' group by order_id desc";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
		
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
			<td><center><b>  Total Invoice = '.$countOrder.' </center></td>
		</tr>
	</table>
	';	

	echo $table;

}

?>
<!-- Total Invoice End -->

<!-- Total Price -->
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
	
	WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and user_id='".$_SESSION['id']."' ";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
		
		<tr>';
		$totalAmount1 = "";
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				
			</tr>';	
			$totalAmount1 += $result['total'];
			
		}
		$table .= '
		</tr>

		<tr>
					
			<td><center><b>  Total Price  = '.$totalAmount1.'.00</center></td>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>

<!-- Total Price End-->


<!-- Discount-->
<?php 
require_once 'core.php';
if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT  discount FROM  orders
	WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and user_id='".$_SESSION['id']."' ";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
		
		<tr>';
		$Discount = "";
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				
			</tr>';	
			$Discount += $result['discount'];
			
		}
		$table .= '
		</tr>

		<tr>
			<td><center><b> Discount = '.$Discount.'.00 </center></td>
		</tr>
	</table>
	';	
	echo $table;
}
?>
<!-- Discount End-->

<!-- Discount-->
<?php 
require_once 'core.php';
if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT  today_total FROM  orders
	WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and user_id='".$_SESSION['id']."' ";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
		
		<tr>';
		$TodayTotal = "";
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				
			</tr>';	
			$TodayTotal += $result['today_total'];
			
		}
		$table .= '
		</tr>

		<tr>
			<td><center><b>  Grand Total Price    = '.$TodayTotal.'.00 </center></td>
		</tr>
	</table>
	';	
	echo $table;
}
?>
<!-- Discount End-->

 
</body>
</html>
