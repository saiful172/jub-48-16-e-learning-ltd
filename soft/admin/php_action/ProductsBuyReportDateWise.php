<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
</head>
<body>
 <div class="container-fluid">
 <br>


 <center><h4> <b>
 <?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from customer left join `user` on user.userid=customer.userid where customer.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     <?php echo $pqrow['shop_name']; ?>
				  
				   <?php }?>
          </b><br> Date Wise Product Buy Report
		  </h4>
		  <h5>
<?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo ' <b> Date Form : </b> ' ; echo date("d-M-Y", strtotime( $startDate));
echo ' | <b> Date To : </b> ' ; echo date("d-M-Y", strtotime( $endDate));
?> <br>
<b>Current Date :</b> <?php echo date("d-M-Y") ;?> |
<b> Current Time : </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</h5>
		  </center> 
 
<?php 

require_once 'core.php';
if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM products where entry_date >= '$start_date' AND entry_date <= '$end_date' and status = 1 and member_id='".$_SESSION['id']."' ORDER BY id DESC";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="width:100%;">
		<tr>
		<th colspan="5" > Product Information </th>
		<th colspan="3" > Price/Quantity </th>
		<th colspan="3" >Total Price </th>
		</tr>
		<tr>
			
							<th> ---- Date ---</th>
							<th> Supplier</th>
							<th>Invoice</th>
							<th>P.Code</th>
							<th>Product Name</th>
							
							<th> Buy</th>
							<th> Sale</th>
							<th>Qty </th>
							<th> Buy</th>
							<th> Sale</th>
							<th> Profit</th>
							
							
		</tr>

		<tr>';
		$totalqty = "";
		$total_bp = "";
		$total_sp = "";
		$totalprofit = "";	
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.date("d-m-Y", strtotime($result['entry_date'])).'</center></td>
				<td><center>'.$result['supplier'].'</center></td>
				<td><center>'.$result['invoice'].'</center></td>
				<td><center>'.$result['product_code'].'</center></td>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['buy_price'].'</center></td>
				<td><center>'.$result['sale_price'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['total_buy_price'].'</center></td>
				<td><center>'.$result['total_sale_price'].'</center></td>
				<td><center>'.$result['profit'].'</center></td>
			</tr>';	
			$totalqty+= $result['quantity'];
			$total_bp+= $result['total_buy_price'];
			$total_sp+= $result['total_sale_price'];
			$totalprofit+= $result['profit'];
		}
		$table .= '
		</tr>
          <tr>
			<td colspan="7" style="text-align:right; "> <b> Total = </b> </td>
			<td><center><b>'.$totalqty.'</b></center></td>
			<td><center><b>'.$total_bp.'.00</b></center></td>
			<td><center><b>'.$total_sp.'.00</b></center></td>
			<td><center><b>'.$totalprofit.'.00</b></center></td>
		</tr>
		<tr>
			<td  colspan="11" ><b>
			Total Qty : '.$totalqty.' <br>
			Total Buy Price : '.$total_bp.'.00<br>
			Total Sale Price : '.$total_sp.'.00<br>
			Total Profit : '.$totalprofit.'.00<br>
			</b></td>
		</tr>

		
	</table>
	';	

	echo $table;

}
?>

</div>
 
</body>
</html>
