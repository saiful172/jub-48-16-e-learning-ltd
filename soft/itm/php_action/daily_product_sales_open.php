<?php 
session_start();
require_once '../../includes/conn.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/table_data_center_with_border_black.css"> 
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
 <div><center>
<?php
				  
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			 <span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>  <br>
			 </span>	
				   <?php }?>
      <span style="font-size:19;font-weight:bold;"> Daily  Product Sale - Item Wise  </span> 
<span style="font-size:18;">
	<br>			
				   
		
	<?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date To :  ' ; echo date("M d, Y", strtotime( $endDate));
?><br>

Date :<?php echo date("M d,Y") ;?> |
Time :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</span>	<br><br>
</center></div> 

<table width="100%" class="table table-bordered " id="dataTables-example"  >
                        <thead>
						
                            <tr> 
							 <th> SL </th>
                               <th> Name </th>
                               <th> Brand </th>
                               <th> Category </th>
			<th> Buy</th>
			<th> Ret.Sup</th>
			<th> Damg</th>
			<th> Sale</th>
			<th> Ret.Cust</th>
			<th> Price </th>
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
	$sl=0;
	$eq=mysqli_query($con,"SELECT Distinct brands.brand_name, categories.cat_name,product.product_name,order_item_all.rate,
	sum(order_item_all.buy_pro) as total_buy_qty,sum(order_item_all.ret_sup) as total_ret_sup,sum(order_item_all.dam_pro) as total_dam_pro,sum(order_item_all.sale_pro) as total_sale_pro,sum(order_item_all.back_qty) as total_back_qty,
	sum(order_item_all.total) as total_rate 
	 
	 FROM `order_item_all`
	
			 Left join product on product.product_id= order_item_all.product_id			 
			 Left JOIN brands ON brands.brand_id = product.brand_id 
		     Left JOIN categories ON categories.cat_id = product.categories_id 			 
			 Left join orders on orders.order_id= order_item_all.order_id
			 
             where order_item_all.entry_date >= '$start_date' AND order_item_all.entry_date <= '$end_date' and orders.user_id='".$_SESSION['id']."'
             group by order_item_all.product_id			 
			");
	
	
	while($eqrow=mysqli_fetch_array($eq)){
	
	?>
			<tr>
			<td><?php echo ++$sl; ?>  </td>
			<td><?php echo $eqrow['product_name']; ?>  </td>
			<td><?php echo $eqrow['brand_name']; ?>  </td>
			<td><?php echo $eqrow['cat_name']; ?>  </td>
			
			<td><?php echo $eqrow['total_buy_qty']; ?>  </td>
			<td><?php echo $eqrow['total_ret_sup']; ?>  </td>
			<td><?php echo $eqrow['total_dam_pro']; ?>  </td>
			<td><?php echo $eqrow['total_sale_pro']; ?>  </td>
			<td><?php echo $eqrow['total_back_qty']; ?>  </td>
			
			<td><?php echo $eqrow['rate']; ?>  </td>
			<td><?php echo $eqrow['total_rate']; ?>  </td>
			
          </tr>				
<?php
}
?>


<tr>
<td></td>
<td></td>
<td></td>
<td></td>
						
<!--						<td><b>Grand Total Product :  </b><?php //Total Product
$sql = $con->query("SELECT distinct count(`product_id`) as `total` FROM `order_item_all`
 Left join orders on orders.order_id= order_item_all.order_id
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and  orders.user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b><?php echo $TSQ ; ?></b></td>

-->
						<td> <b>G.T.Qty</b> : <?php //Total Product
$sql = $con->query("SELECT distinct sum(`order_quantity`) as `total` FROM `order_item_all`
 Left join orders on orders.order_id= order_item_all.order_id
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and  orders.user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b><?php echo $TSQ ; ?></b></td>

<td></td>

<td> <b>G.T.Price</b> : <?php //Total Product
$sql = $con->query("SELECT distinct sum(`total`) as `total` FROM `order_item_all`
 Left join orders on orders.order_id= order_item_all.order_id
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and  orders.user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b><?php echo $TSQ ; ?></b></td>

<tr>



</tbody>
</table>


 
</body>
</html>
