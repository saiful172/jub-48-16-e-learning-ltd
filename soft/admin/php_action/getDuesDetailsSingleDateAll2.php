
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="css/table_data_center_with_border_black.css">

</head>
<body>

  <div class="container-fluid">
 <br>
<center><h4> <?php include('../name.php'); ?><br>Date Wise - Single Dues Report  <br>
<?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			    User / Stuff :  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
				   <br> 
				   <?php
				require_once 'core.php';
				   include('conn.php');
				   $CustId = $_POST['CustId'];
				   $pq=mysqli_query($con,"select distinct customer_id,client_name,client_contact from orders  WHERE customer_id = '$CustId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			      Customer  Id :  <?php echo $pqrow['customer_id']; ?> , 
			      Name :  <?php echo $pqrow['client_name']; ?>,
			      Phone :  <?php echo $pqrow['client_contact']; ?>
				  
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
Date : <?php echo date("M d, Y") ;?> | 
Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </h4>  
<hr>
<?php 

require_once 'core.php';

if($_POST) {

     $CustId = $_POST['CustId'];

	$sql = "SELECT * FROM orders_dues WHERE customer_id= '$CustId' ";
	$query = $connect->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
	    <tr>
		 <th colspan="9" style="font-size:18px; " > <b>  Main Dues   </b></th>
	    <tr>
		
	    <tr>
		  <th colspan="2">Date</th>
		  <th colspan="1">Invoice</th>
		  <th colspan="5" >Dues Information</th>
	    </tr>
		
	    <tr>
                               
                                <th>Date</th>
                                <th>Last Update</th>
								
                                <th> No</th>
								
								<th>Pre.Dues</th>
								<th> Today </th>
                                <th> Total  </th>
								<th>Paid</th>
								<th>Rec.Dues</th>
                            </tr>

		<tr>';
	
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				<td><center>'.date("M d,Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.date("M d,Y", strtotime($result['last_update'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['pre_due'].'</center></td>
				<td><center>'.$result['today_total'].'</center></td> 
				<td><center>'.$result['grand_total'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['recent_due'].'</center></td>
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

require_once 'core.php';

if($_POST) {

     $CustId = $_POST['CustId'];
	 
	 $startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM orders_details WHERE customer_id= '$CustId' AND order_date >= '$start_date' AND order_date <= '$end_date'  order by id desc ";
	$query = $connect->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
	    
     <tr>
		 <th colspan="10" style="font-size:18px;  "><b><br>  Dues History  </b> </th>
	    <tr>
		
		<tr>
		 <th colspan="1" > Last </th>
		 <th colspan="1" >Invoice  </th>
		 <th colspan="5" >Dues Information </th>
		 <th colspan="1" >Paid  </th>
	    <tr>
		
	    <tr>
                               
                                <th>Date</th>
                                <th>No</th>
								
								<th>Pre.Dues</th>
								<th> Today </th>
                                <th> Total  </th>
								<th>Paid</th>
								<th>Rec.Dues</th>
								
								<th>Causes</th>
                            </tr>

		<tr>';
		
		
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				<td><center>'.date("M d,Y", strtotime($result['order_date'])).'</center></td>
				<td><center>'.$result['order_id'].'</center></td>
				
				<td><center>'.$result['pre_due'].'</center></td>
				<td><center>'.$result['today_total'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['recent_due'].'</center></td>
				<td><center>'.$result['cuses'].'</center></td>
			</tr>';	
			
		}
		$table .= '
		</tr>

		<tr>
			
			<td colspan="11">  <center><b>Total = '.$countOrder.' </b> </center></td>
	
			
		</tr>
		

	</table>
	';	

	echo $table;

}

?>

<!-- Total Product & Price End-->
</div>
 
</body>
</html>
