
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

<input style="font-size:20;" type="button" value="Print" onclick="printPage()"  />

<?php 
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

echo ' <b> Date Form : </b> ' ;
echo $startDate;
echo ' <b> Date To : </b> ' ;
echo $endDate;

?>

 <b>Current Date :</b> <?php echo date("M d,Y") ;?>
<b> Current Time : </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
<hr>


 <center><h3> <?php include('name.php'); ?> <br> Bogura<br>
 <?php
				require_once 'core.php';
				   include('conn.php');
				   $CustId = $_POST['CustId'];
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     User Id : <?php echo $pqrow['userid']; ?> | User Name :  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
				   
				    
           </h3></center>   
		   
		  
 
<?php 

require_once 'core.php';

if($_POST) {

    $CustId = $_POST['CustId'];
	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM orders 
	WHERE customer_id= '$CustId' and order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and dues_or_paid_status='3' and user_id='".$_SESSION['id']."' order by order_id desc";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;
	

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th> Order Date</th>
			<th> Order Id</th>
			<th> Customer Id</th>
			<th> Customer Name </th>
			<th> Phone </th>
			<th> Type</th>
			<th> Total Rate </th>
		</tr>

		<tr>';
		
		$totalAmount1 = "";
				
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['customer_id'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
				<td><center>'.$result['client_contact'].'</center></td>
				<td><center>'.$result['dues_or_paid'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
			</tr>';	
			$totalAmount1 += $result['grand_total'];
			
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="1" style="text-align:right; "> Total Invoice = </td>
			<td><center>'.$countOrder.'</center></td>
			<td colspan="4" style="text-align:right; "> Grand Total Rate = </td>
			<td><center>'.$totalAmount1.'</center></td>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>

 
</body>
</html>
