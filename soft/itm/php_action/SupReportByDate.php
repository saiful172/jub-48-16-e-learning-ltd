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
  
 <center> 
  <div> 

                  <?php 
				  				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			<span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>  <br>
			 </span>	
			<?php }?>
			<span style="font-size:19;">
			Date Wise Supplier Report
            </span>			 
			 </div>	   
<span style="font-size:18;">
 
		 <?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Start Date  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  End Date :  ' ; echo date("M d, Y", strtotime( $endDate));
?> 
<br>
Present Date : <?php echo date("M d, Y") ;?> | 
Present Time : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
</span>	<br><br> </center>   

<?php 
 
if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");

    $sl=0;
	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM supplier where join_date >= '$start_date' AND join_date <= '$end_date' and user_id='".$_SESSION['id']."' order by sup_id desc ";
	$query = $con->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="width:100%;">
		
		<tr>
							 
                               
                             <th>SL</th>
                             <th>Id</th>
                                <th>Name</th>
								<th>Address</th>
								<th>Position</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Join Date</th>
							
		</tr>

		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				 
				<td><center>'.++$sl.'</center></td>
				<td><center>'.$result['sup_id'].'</center></td>
				<td><center>'.$result['supplier_name'].'</center></td>
				<td><center>'.$result['position'].'</center></td>
				<td><center>'.$result['address'].'</center></td>
				<td><center>'.$result['contact_info'].'</center></td>
				<td><center>'.$result['email'].'</center></td>
				<td><center>'.date("M d, Y", strtotime($result['join_date'])).'</center></td>
			</tr>';	
			
			
		}
		$table .= '
		</tr>
	
		
	</table>
	';	

	echo $table;

}
?>



</div>
</body>
</html>
