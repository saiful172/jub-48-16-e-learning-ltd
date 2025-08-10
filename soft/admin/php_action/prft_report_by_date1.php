
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
</head>
<body>
<div class="container" style="width:100%;">

 <center style="font-size:18px;"> <?php include('../name.php'); ?> <br> সমস্ত  সেলস  রিপোর্ট  ( তারিখ  অনুযায়ী ) <br></center> 
  <center style="font-size:16px;">  
 <?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from `user`  where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			      ইউজার   :  <?php echo $pqrow['username']; ?> 
				  
				   <?php }?>
				   
	<br>			   		 <?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  তারিখ হতে  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  তারিখ পর্যন্ত :  ' ; echo date("M d, Y", strtotime( $endDate));
?>  <br>
বর্তমান  তারিখ :<?php echo date("M d,Y") ;?> |
বর্তমান  সময় :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </center> 
<hr>  
 
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "select * from product
    Left join order_item on order_item.product_id= product.product_id
	WHERE order_item.entry_date => '$start_date' AND order_item.entry_date <= '$end_date' order by order_item.order_item_id  DESC ";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;
	

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
			
		<tr>
						<th colspan="1">বিক্রয়</th>
						<th colspan="3">পন্যের তথ্য</th>
						<th colspan="2">মুল্য </th>
						<th colspan="3">মোট মুল্য / লাভ</th>
                        </tr>
                        <tr>
							<th>তারিখ</th>
							<th>কোড</th>
							<th>নাম</th>
							<th>পরিমান</th>
							
							<th>ক্রয় </th>
							<th>বিক্রয়</th>
							
							<th>ক্রয় </th>
							<th>বিক্রয়</th>
							<th>লাভ</th>
                        </tr>

		<tr>';
		
		$PreDue = "";
		$TodayTotal = "";
		$GrandTotal= "";
		$Paid = "";
		$DDPaid = "";
		$RecDue = "";
				
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			<td><center>'.date("M d, Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['product_id'].'</center></td>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['buy_rate'].'</center></td>
				<td><center>'.$result['rate'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['deliver_date_paid'].'</center></td>
				<td><center>'.$result['due'].'</center></td>
			</tr>';	
			
			$PreDue += $result['pre_due'];
			$TodayTotal += $result['today_total'];
			$GrandTotal += $result['grand_total'];
			
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="1" style="text-align:right; "> <b>মোট ইনভয়েস = </b></td>
			<td><center><b>'.$countOrder.'</center></td>
			<td colspan="2" style="text-align:right; "><b>  সর্বমোট  </b> = </td>
			<td><center><b>'.$PreDue.'</center></td>
			<td><center><b>'.$TodayTotal.'</center></td>
			<td><center><b>'.$GrandTotal.'</center></td>
			<td><center><b>'.$Paid.'</center></td>
			<td><center><b>'.$DDPaid.'</center></td>
			<td><center><b>'.$RecDue.'</center></td>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>

 
</body>
</html>
