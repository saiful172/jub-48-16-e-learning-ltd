<?php 
require_once 'core.php';
include('conn.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
</head>
<body>

<br>


 <center><h4> <?php include('../name.php'); ?> <br> Supplier Dues Report - (Single)<br>
               <?php
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			      User :  <?php echo $pqrow['username']; ?>
				  
				   <?php }?>
           <br>
 Date : <?php echo date("M d, Y") ;?> | 
 Time : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
          <br>  <br> 
		  <?php 
		   $SupId = $_POST['SupId'];
				   $pq=mysqli_query($con,"select distinct product_buy.supplier_id, product_buy.supplier_name, product_buy.phone,supplier.address
				   from product_buy left join `supplier` on supplier.supplier_id=product_buy.supplier_id where product_buy.supplier_id= '$SupId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
			?>
			      Supplier Id :  <?php echo $pqrow['supplier_id']; ?>, 
			             Name :  <?php echo $pqrow['supplier_name']; ?>, 
			          Phone :  <?php echo $pqrow['phone']; ?>,   
			          Address :  <?php echo $pqrow['address']; ?>  
				  
				   <?php }?>
		  
		   </h4></center>   
 
 
 <?php 
 
  if($_POST) {

     $SupId = $_POST['SupId'];

	$sql = "SELECT * FROM product_buy WHERE supplier_id= '$SupId' ";
	$query = $connect->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:16px;">
	   
		<tr>';
		
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				
				<td><b><center>Recent Total Dues  : '.$result['recent_due'].'</center></b></td>
			</tr>';	
			 
		}
		$table .= '
		</tr> 

	</table>
	';	

	echo $table; 
} 
?>

<?php  
if($_POST) {

     $SupId = $_POST['SupId'];

	$sql = "SELECT * FROM product_buy_details WHERE supplier_id= '$SupId' order by id desc ";
	$query = $connect->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
	    <tr>
                                
                                <th colspan="2"> Date </th>
                                <th colspan="1"> Invoice </th>
                                <th colspan="5"> Ammount</th>
                                <th colspan="2"> Paid </th>
                               
								
                            </tr>
							
						  <tr>
                                
                                <th>Invoice </th>
                                <th>Last Update</th>
								
                                <th>No</th>
								
								<th>Previous Dues</th> 
								<th>Today</th>
								<th>Grand Total</th>
								<th>Paid</th>
								<th>Recent  Dues</th>
								
								<th>Comment</th>
								<th>Causes</th>
								
                            </tr>
		<tr>';
	
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				<td><center>'.date("M d, Y", strtotime($result['invoice_date'])).'</center></td>
				<td><center>'.date("M d, Y", strtotime($result['last_update'])).'</center></td>
				
				<td><center>'.$result['invoice_no'].'</center></td>
				
				<td><center>'.$result['pre_due'].'</center></td>
				<td><center>'.$result['today_total'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['recent_due'].'</center></td>
				
				<td><center>'.$result['comments'].'</center></td>
				<td><center>'.$result['cuses'].'</center></td>
			</tr>';	 
			
		}
		$table .= '
		</tr>

	</table>
	'; 
	echo $table;

} 
?>



<!-- Total Product & Price End-->
 
</body>
</html>
