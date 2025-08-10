
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			      Customer Id :  <?php echo $pqrow['customer_id']; ?> , 
			      Name :  <?php echo $pqrow['client_name']; ?>,
			      Phone :  <?php echo $pqrow['client_contact']; ?>
				  
				   <?php }?>
           <br>
		 <?php 
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

echo ' Date From : ' ;
echo $startDate; 
echo ' |  Date To:  ' ;
echo $endDate  ;

?>
<br>
Date : <?php echo date("M d, Y") ;?> | 
Time : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </h4>  

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
		 <th colspan="9" style="font-size:17px; color:Green; " >   Main Dues  </th>
	    <tr>
		
	    <tr>
                               
                                <th>Invoice Date</th>
                                <th>Last Date</th>
                                <th>Invoice No</th>
								
								<th>Previous  Dues</th>
								<th> Today </th>
                                <th> Total  </th>
								
								<th>Paid</th>
								<th>Recent.Dues</th>
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
}?>

<br><br>

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

	$sql = "SELECT * FROM orders_details WHERE customer_id= '$CustId' AND order_date >= '$start_date' AND order_date <= '$end_date' and user_id='".$_SESSION['id']."' order by id desc ";
	$query = $connect->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
	    
     <tr>
		 <th colspan="8" style="font-size:17px; color:Green; "> Dues History </th>
	    <tr>
		
		<tr>
		 <th colspan="1" > Last </th>
		 <th colspan="1" >Invoice  </th>
		 
		 <th colspan="5" >Amount/Taka</th>
		 <th colspan="1" >Paid </th>
	    <tr>
		
	    <tr>
                               
                                <th>Date</th>
                                <th>No</th>
								
								<th>Previous Dues</th>
								<th> Today </th>
                               	<th> Total  </th>
								<th>Paid</th>
								<th>Recent.Dues</th>
								
								<th> Cuses </th>
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
			<td colspan="9">  <center><b>Total = '.$countOrder.' </b> </center></td>
		</tr>
		

	</table>
	';	

	echo $table;

}

?>
<br><br>
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
	WHERE orders.customer_id= '$CustId' and order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 and user_id='".$_SESSION['id']."' order by order_id desc";
	$query = $connect->query($sql);
	$countOrder = $query->num_rows;
	

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
		 
		 <tr>
		 <th colspan="9" style="font-size:17px; color:Green;">  Invoice </th>
	    <tr>
		
		<tr>
		 <th colspan="2" >  Invoice  </th>
		 <th colspan="5" > Amount/Taka </th>
	    <tr>
		
		<tr>
			<th>Date</th>
            <th>No </th>
			
			<th>Previous Dues</th>
								<th> Today </th>
                               	<th> Total  </th>
								<th>Paid</th>
								<th>Recent.Dues</th>
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
				<td><center>'.$result['due'].'</center></td>
			</tr>';	
			
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="9" "><center> <b>Total Invoice = '.$countOrder.' </b></center></td>
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
