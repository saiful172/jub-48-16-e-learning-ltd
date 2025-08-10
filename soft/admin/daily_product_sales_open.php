<?php 
session_start();
require_once '../includes/conn.php';
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/table_data_center.css">
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding:4px;
  
}
</style>
</head>
<body>
<div class="container" style="width:100%;">

<div class="container" style="width:100%;">
<br>
 <center style="font-size:16px;"> <?php include('../includes/report_title.php'); ?> <br> Daily  Product Sale - Item Wise  <br></center> 
  <center style="font-size:14px;">  
 <?php
				 
				   $pq=mysqli_query($con,"select * from `user`  where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			      <?php //echo $pqrow['username']; ?>
				  
				   <?php }?>
				   
		
	<?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date To :  ' ; echo date("M d, Y", strtotime( $endDate));
?><br>

Date :<?php echo date("M d,Y") ;?> |
Time :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </center> 

<table width="100%" class="table table-bordered " id="dataTables-example"  >
                        <thead>
						
                            <tr>
                                
                               <th> Name </th>
			<th> Total Qty </th>
			<th>  Price </th>
			<th> Total Price </th>
								
                            </tr>
                        </thead>
                         <tbody id="tbody">

	
	
	<?php
	
	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
	
	$eq=mysqli_query($con,"SELECT Distinct product.product_name,order_item.rate,sum(order_item.quantity) as total_qty,sum(order_item.total) as total_rate FROM `order_item`
	
			 Left join product on product.product_id= order_item.product_id
			 Left join orders on orders.order_id= order_item.order_id
             where order_item.entry_date >= '$start_date' AND order_item.entry_date <= '$end_date'
             group by order_item.product_id			 
			");
	
	
	while($eqrow=mysqli_fetch_array($eq)){
	
	?>
			<tr>
			
			<td><?php echo $eqrow['product_name']; ?>  </td>
			<td><?php echo $eqrow['total_qty']; ?>  </td>
			<td><?php echo $eqrow['rate']; ?>  </td>
			<td><?php echo $eqrow['total_rate']; ?>  </td>
			
          </tr>				
<?php
}
?>


<tr>
						
						<td><b>Grand Total Product :  </b><?php //Total Product
$sql = $con->query("SELECT distinct count(`product_id`) as `total` FROM `order_item`
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date'  ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b><?php echo $TSQ ; ?></b></td>


						<td> <b>Grand Total Quantity</b> : <?php //Total Product
$sql = $con->query("SELECT distinct sum(`quantity`) as `total` FROM `order_item`
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b><?php echo $TSQ ; ?></b></td>

<td></td>

<td> <b>Grand Total Price</b> : <?php //Total Product
$sql = $con->query("SELECT distinct sum(`total`) as `total` FROM `order_item`
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b><?php echo $TSQ ; ?></b></td>

<tr>



</tbody>
</table>


 
</body>
</html>
