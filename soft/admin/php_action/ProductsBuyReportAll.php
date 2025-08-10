
<!DOCTYPE html>
<html>
<head>
<script>
function printPage() {
    window.print();
}
</script>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/table_data_center.css">

</head>
<body>
 <div class="container-fluid">
 <br>
<input style="font-size:20;" type="button" value="Print" onclick="printPage()"  />

<center><h3> <b>
 <?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from customer left join `user` on user.userid=customer.userid where customer.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     <?php echo $pqrow['shop_name']; ?>
				  
				   <?php }?>
          </b><br> Date Wise Product Buy Report
		  </h3>
		  <h4> <b>Current Date :</b> <?php echo date("M d,Y") ;?>
<b> Current Time : </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</h4> 
		  </center>   
 
<?php 

require_once 'core.php';

	$sql = "SELECT * FROM products where status = 1 and member_id='".$_SESSION['id']."'";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="width:100%;">
		
		
			
		<tr>
							<th>Buy Date</th>
							<th>Voucher / Product Code</th>
							<th>Product Name</th>
							<th>Buy Price</th>
							<th> Sales Price </th>
							<th> Qty</th>
							<th> Total Buy Price</th>
							<th> Total Sales Price</th>
							<th> Profit</th>
							
		</tr>

		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['entry_date'].'</center></td>
				<td><center>'.$result['product_code'].'</center></td>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['buy_price'].'</center></td>
				<td><center>'.$result['sale_price'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['total_buy_price'].'</center></td>
				<td><center>'.$result['total_sale_price'].'</center></td>
				<td><center>'.$result['profit'].'</center></td>
			</tr>';	
			//$totalpaid+= $result['paid_taka'];
			//$totaldue+= $result['due_taka'];
			//$totalqty+= $result['quantity'];
			//$totalAmount+= $result['total_price'];
		}
		$table .= '
		</tr>

		
	</table>
	';	

	echo $table;


?>

</div>
 
</body>
</html>
