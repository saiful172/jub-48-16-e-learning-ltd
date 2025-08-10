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

<div class="container" style="width:100%;">
 <br>
 <center style="font-size:18px;">  <?php include('../../includes/report_title.php'); ?> <br> Retail Customer Statement Report  </center> 
  <center style="font-size:16px;"> 
 <?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			    User / Stuff :  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
				   <br> 
				   <?php
				   $CustId = $_POST['CustId'];
				   $pq=mysqli_query($con,"select distinct customer_id,client_name,client_contact from orders  WHERE client_contact = '$CustId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			      Customer Id :  <?php echo $pqrow['customer_id']; ?> , 
			      Name :  <?php echo $pqrow['client_name']; ?>,
			      Phone :  <?php echo $pqrow['client_contact']; ?>
				  
				   <?php }?>
				   
	
<br>
Date : <?php echo date("M d, Y") ;?> | 
Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </h4> </center>  
<br>

<?php 

if($_POST) {
    
	$CustId = $_POST['CustId'];
	
	$sql = "SELECT * FROM orders_details 
	Left JOIN stuff ON stuff.userid = orders_details.user_id
	WHERE orders_details.client_contact= '$CustId' 
	order by orders_details.order_id desc";
	
	$query = $con->query($sql);
	$countOrder = $query->num_rows;
	

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
<tr>
			<th>Invoice Date </th>
            <th>Invoice No </th>
			<th>Collection Amount</th>
			<th>Cuses</th>
			<th>Collection By</th>
		</tr>
		
		<tr>';
			
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.date("M d,Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['cuses'].'</center></td>
				<td><center>'.$result['stuff_name'].'</center></td>
			</tr>';	
			
		}
		$table .= '
		</tr>
        
		<tr>
			<td colspan="1" style="text-align:right; "> <b>Total Invoice = </b></td>
			<td><center><b>'.$countOrder.'</center></td>
						
		</tr>
		
	</table>
	';	

	echo $table;

}

?>
 
</body>
</html>
