<?php 
session_start();
require_once '../../includes/conn.php';
?>
<!DOCTYPE html>
<html>
<head>
<script>
function printPage() {
    window.print();
}
</script> 
<link rel="stylesheet" href="css/table_data_center_with_border_black.css"> 
</head>
<body>
 <div class="container-fluid">
 <br>
<center><h4>  <?php include('../../includes/report_title.php'); ?> <br> Date Wise Collection Report  <br>
<?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     User / Stuff :  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
           <br>
		 <?php 
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

echo ' Date From : ' ;
echo $startDate; 
echo ' |  Date To :  ' ;
echo $endDate  ;

?>
<br>
Present Date : <?php echo date("M d, Y") ;?> | 
Present Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </h4> </center>   
<?php

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM orders_details WHERE  order_date >= '$start_date' AND order_date <= '$end_date'  and  user_id='".$_SESSION['id']."' order by id desc ";
	$query = $con->query($sql);

	$countOrder = $query->num_rows;
    $sl=0;
	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
	    
     <tr>
		 <th colspan="8" style="font-size:17px; color:Green; "> Collection Report Short</th>
	    <tr>
		
		<tr>
		 <th colspan="1" > SL </th>
		 <th colspan="2" > Collection </th>
		 <th colspan="1" >Customer  </th>
		 <th colspan="1" >Last</th>
		 <th colspan="1" >Collection</th>
		 <th colspan="1" >Recent</th>
		 <th colspan="1" >Cuses</th>
	    <tr>
		
	    <tr>
                               
                                <th>No</th>
                                <th>Date</th>
                                <th>Invoice No</th>
								<th> Name  </th>
								<th>Due</th>
								<th>Amount</th>
								<th>Due</th>
								<th> For </th>
                            </tr>

		<tr>';
		
		$totalPaid = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    <td><center>'.++$sl.'</center></td>
				<td><center>'.date("M d,Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['recent_due'].'</center></td>
				<td><center>'.$result['cuses'].'</center></td>
			</tr>';	
			$totalPaid += $result['paid'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="8">  <center><b>Total = '.$countOrder.' |  Total Collection = '.$totalPaid.' </b> </center></td>
		</tr>
		

	</table>
	';	

	echo $table;

}

?>




</div>
</body>
</html>
