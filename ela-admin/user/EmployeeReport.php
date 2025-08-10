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
 
<br>
 <center><h4> <?php include('../includes/report_title.php'); ?><br>Employee Report - All<br>
  
Date : <?php echo date("M d, Y") ;?> | 
Time : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </h4> </center>   

<?php 
 
if($_POST) { 

	$sql = "SELECT * FROM employees ";
	$query = $con->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="width:100%;">
		
		<tr>
							 
								 <th>Id</th>
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
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				 
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
