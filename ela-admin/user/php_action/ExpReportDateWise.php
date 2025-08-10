<?php 
session_start();
require_once '../../includes/conn.php';
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
</head>
<body>
 <div class="container-fluid">
 <br>

<center> <?php
				 
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
				 <span style="font-size:21;font-weight:bold;">
			  <?php echo $pqrow['business_name']; ?>
				 </span> 
	<?php }?> <br>
	<span style="font-size:19;">
Date Wise Office Expense Report
</span>
<br>
<span style="font-size:18;">
<?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date To :  ' ; echo date("M d, Y", strtotime( $endDate));
?> <br>
Date : <?php echo date("M d, Y") ;?> | 
Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </span>
		 </center> <br>
 
<?php 
 
if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM expense 
	left join office_exp_name on office_exp_name.of_id=expense.expense_name
	where expense.entry_date >= '$start_date' AND expense.entry_date <= '$end_date'  and expense.user_id='".$_SESSION['id']."' ";
	$query = $con->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="width:100%;">
		<tr>
							<th>Sl</th>
							<th>Date</th>
							<th>Name</th>
							<th>Details</th>
							<th>Qty</th>
							<th>Taka</th>
							<th>Reference</th>
							
		</tr>

		<tr>';
		$exp_cost = "";	
$sl=0;		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.++$sl.'</center></td>
				<td><center>'.date("d-M-Y", strtotime($result['entry_date'])).'</center></td>
				<td><center>'.$result['name'].'</center></td>
				<td><center>'.$result['exp_details'].'</center></td>
				<td><center>'.$result['ammount'].'</center></td>
				<td><center>'.$result['expense_cost'].'</center></td>
				<td><center>'.$result['reference'].'</center></td>
			</tr>';	
			
			$exp_cost+= $result['expense_cost'];
		}
		$table .= '
		</tr>
		
        <tr>
			<td colspan="5" style="text-align:right; "><b> Total = </b></td>
			<td><center><b> '.$exp_cost.'</b></center></td>
		</tr>
		
	</table>
	';	

	echo $table;

}
?>

</div>
 
</body>
</html>
