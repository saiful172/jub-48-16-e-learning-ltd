
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
</head>
<body>
<div class="container-fluid">
 <br>
<center><h4> <?php include('../name.php'); ?><br>Dues Single Report<br>
<?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     User / Stuff :  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
           <br>

<br>
Date : <?php echo date("M d, Y") ;?> | 
Time : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </h4> </center>  
 
<?php 

require_once 'core.php';

if($_POST) {

     $CustId = $_POST['CustId'];

	$sql = "SELECT * FROM orders_dues WHERE customer_id= '$CustId' AND user_id='".$_SESSION['id']."' ";
	$query = $connect->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
	    <tr>
		 <th colspan="2" >Invoice  </th>
		 <th colspan="3" >Customer  </th>
		 <th colspan="3" >Ammount  </th>
	    <tr>
		
	    <tr>
                               
                                <th>Date</th>
                                <th>No</th>
								
                                <th>Id</th>
                                <th>Name</th>
								<th>Phone</th>
								
								<th>Previous  Dues</th>
								<th>Paid</th>
								<th>Recent Dues</th>
                            </tr>

		<tr>';
		
		$totalAmount2 = "";
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				<td><center>'.date("M d,Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				
				<td><center>'.$result['customer_id'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
				
				<td><center>'.$result['client_contact'].'</center></td>
				<td><center>'.$result['pre_due'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['recent_due'].'</center></td>
			</tr>';	
			
			
			
			
			$totalAmount2 += $result['recent_due'];
			
			
			
		
			
		}
		$table .= '
		</tr>

		<tr>
			
			<td colspan="1" style="text-align:right; "> Total = </td>
			<td><center>'.$countOrder.'</center></td>
			
			<td colspan="5" style="text-align:right; ">  </td>
			<td><center>'.$totalAmount2.'</center></td>
			
		

			

			
		</tr>
		

	</table>
	';	

	echo $table;

}

?>
<!-- Total Product & Price End-->
 
</body>
</html>
