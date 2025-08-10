<?php 
session_start();
require_once '../../includes/conn.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
</head>
<body>
<div class="container-fluid">
	   <center>  <div> 

                  <?php 
				 $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			<span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>  <br>
			 </span>	
			<?php }?>
			<span style="font-size:19;">
			 Date Wise Employee Report
            </span>			 
			 </div>	   
<span style="font-size:18;">	
   
		 <?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  To  :  ' ; echo date("M d, Y", strtotime( $endDate));
?> 
<br>			   
Present Date  :</b> <?php echo date("M d,Y") ;?> |
Present Time: </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</span>		
</center>

 <br> 
 

<?php 
 
if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM employees where user_id='".$_SESSION['id']."' and  join_date >= '$start_date' AND join_date <= '$end_date'  order by id desc ";
	$query = $con->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="width:100%;">
		
		<tr> 
								<th>SL</th>
								<th>Emp Id</th>
                                <th>Name</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Nid</th>
								<th> Salary</th>
								<th> Position</th>
								<th>Join Date</th> 
		</tr>

		<tr>';
		$sl=0;
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr> 
				<td><center>'.++$sl.'</center></td>
				<td><center>'.$result['id'].'</center></td>
				<td><center>'.$result['emp_name'].'</center></td>
				<td><center>'.$result['address'].'</center></td>
				<td><center>'.$result['phone'].'</center></td>
				<td><center>'.$result['email'].'</center></td>
				<td><center>'.$result['national_id'].'</center></td>
				<td><center>'.$result['salary'].'</center></td>
				<td><center>'.$result['position'].'</center></td>
				<td><center>'.date("M d,Y", strtotime($result['join_date'])).'</center></td>
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
