
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
</head>
<body>
 <div class="container-fluid">
 
<br>
 <center><h4> <?php include('../name.php'); ?><br>তারিখ অনুযায়ী - সাপ্লাইয়ার রিপোর্ট <br>


		<?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			       ইউজার :  <?php echo $pqrow['username']; ?>
				  
				   <?php }?>
<br>
<?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  তারিখ হতে  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  তারিখ পর্যন্ত :  ' ; echo date("M d, Y", strtotime( $endDate));
?> <br>
বর্তমান তারিখ : <?php echo date("M d, Y") ;?> | 
বর্তমান সময়   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</h4> </center>   
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM supplier WHERE join_date >= '$start_date' AND join_date <= '$end_date' order by supplier_id desc ";
	$query = $connect->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
	    <tr>
							<th> নং</th>
							<th>আইডি</th>
							<th> নাম</th>
							<th> ঠিকানা </th>
							<th> মোবাইল </th>
							<th> যোগদানের তারিখ </th>
						  <tr>
                                
                               
		<tr>';
		
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				
				
				<td><center>'.$result['supplier_no'].'</center></td>
				<td><center>'.$result['supplier_id'].'</center></td>
				<td><center>'.$result['supplier_name'].'</center></td>
				<td><center>'.$result['address'].'</center></td>
				<td><center>'.$result['contact_info'].'</center></td>
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
