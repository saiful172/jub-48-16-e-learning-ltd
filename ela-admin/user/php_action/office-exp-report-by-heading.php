<?php 
session_start();
require_once '../../includes/conn.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
</head>
<body> 
<div class="container" style="width:100%;">
<br>
 <center> 
 
 <?php
				 
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
				 <span style="font-size:21;font-weight:bold;">
			  <?php echo $pqrow['business_name']; ?>
				 </span> 
	<?php }?> <br>
 <span style="font-size:19;">
  Office Expense Report By Category <br>
  
 
				   <?php 
				   $ExpId = $_POST['ExpId'];
				   $pq=mysqli_query($con,"select distinct of_id,name from office_exp_name  where of_id = '$ExpId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			    <b> Expense Name : <?php echo $pqrow['name']; ?></b>
				  
				   <?php }?>
	 </span> 			   
				   <br>
	<span style="font-size:18;">			   
	 			   <?php 
$startDate = $_POST['startDate']; $endDate = $_POST['endDate']; 
echo '  Date  From :  ' ; echo $startDate ; echo '  --  Date To : ' ; echo $endDate;
?> <br>
Date :<?php echo date("M d,Y") ;?> |
Time :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </span> 
 </center> 
<br> <br>  
 
<?php  
if($_POST) {
	
	 $ExpId = $_POST['ExpId'];

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM expense 
	left join office_exp_name on office_exp_name.of_id=expense.expense_name 
	
	WHERE expense.entry_date  >= '$start_date' AND expense.entry_date  <= '$end_date' and  expense.expense_name= '$ExpId'  order by expense.id desc";
	$query = $con->query($sql);
	$countOrder = $query->num_rows;

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
      <tr> 
		 <th>SL  </th>
		 <th>Date  </th>
		 <th>Details  </th>
		 <th>Amount (Qty)  </th>
		 <th>Taka  </th>
		 <th>Reference  </th>
	 <tr>
		 

		<tr>';
		$totalAmount1 = ""; 
		$sl=0;
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
		      	<td><center>'.++$sl.'</center></td>
			    <td><center>'.date("d-M-Y", strtotime($result['entry_date'])).'</center></td>
				
				<td><center>'.$result['exp_details'].'</center></td>
				<td><center>'.$result['ammount'].'</center></td>
				<td><center>'.$result['expense_cost'].'</center></td> 
				<td><center>'.$result['reference'].'</center></td> 
			</tr>';	
			$totalAmount1 += $result['expense_cost']; 
			
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="4" style="text-align:right; "><b> Total  = </td> 
			<td><center><b>'.$totalAmount1.'.00</center></td>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>




 
</body>
</html>

