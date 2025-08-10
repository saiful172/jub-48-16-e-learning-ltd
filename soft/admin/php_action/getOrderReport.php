
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

 <b> Date :</b> <?php echo date("M d,Y") ;?>
<b>  Time : </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
<hr>


 <center><h3> <?php include('../name.php'); ?> <br> All Sales Report <hr>
 
           </h3></center>   
 
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM orders left join `user` on user.userid=orders.user_id WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 ";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th> Order Date </th>
			<th> Order Id </th>
			<th> Employee Id </th>
			<th> Customer Id </th>
			<th> Customer Name </th>
			<th> Phone    </th>
			<th> Taka </th>
		</tr>

		<tr>';
		$totalAmount1 = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['user_id'].'</center></td>
				<td><center>'.$result['customer_id'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
				<td><center>'.$result['client_contact'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
			</tr>';	
			$totalAmount1 += $result['grand_total'];
		}
		$table .= '
		</tr>
		<tr>
			<td colspan="6" style="text-align:right; "> Total Taka  =  </td>
			<td><center>'.$totalAmount1.'</center></td>
		</tr>
	</table>
	';	

	echo $table;

}

?>

 
</body>
</html>
