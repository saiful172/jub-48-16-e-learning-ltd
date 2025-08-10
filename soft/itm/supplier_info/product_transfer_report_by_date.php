
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
</head>
<body>
<div class="container" style="width:100%;">
<hr>
 <center style="font-size:18px;"> <?php include('name.php'); ?> <br> </center> 
  <center style="font-size:16px;">  Product Transfer Report<br>
 <?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			  User Name :  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
				   
	<br>			   <?php 
$startDate = $_POST['startDate']; $endDate = $_POST['endDate']; 
echo '  Date Form :  ' ; echo $startDate ; echo '  --  Date To : ' ; echo $endDate;
?><br>
Current Date :<?php echo date("M d,Y") ;?> |
Current Time :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
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

	$sql = "SELECT * FROM product_transfer 
	left JOIN stuff ON stuff.userid = product_transfer.user_id 
	
	WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and admin_id='".$_SESSION['id']."' order by id desc";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;
	

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
		<tr>
			<th>Date</th>
			<th>To</th>
			<th>Id</th>
							<th>Name</th>
							<th>Quantity </th>
							<th>Rate</th>
		</tr>

		<tr>';
		
		$TodayTotal = "";
		$GrandTotal= "";
		$Paid = "";
		$RecDue = "";
				
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    <td><center>'.date("d-M-Y", strtotime($result['entry_date'])).'</center></td>
				<td><center>'.$result['stuff_name'].'</center></td>
				<td><center>'.$result['product_id'].'</center></td>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['add_qty'].'</center></td>
				<td><center>'.$result['rate'].'</center></td>
			</tr>';	
			
			
		}
		$table .= '
		</tr>

	</table>
	';	

	echo $table;

}

?>

 
</body>
</html>
