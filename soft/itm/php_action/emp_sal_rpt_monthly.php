<?php 
session_start();
require_once '../../includes/conn.php';
error_reporting(0);
?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
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
			 Monthly Employee Salary Report
            </span>			 
			 </div>	   
<span style="font-size:18;">  
<?php 	 
				   $Year= $_POST['Year'];
				   $Month= $_POST['Month'];
				   $pq=mysqli_query($con,"select distinct year,month from employees_salary  WHERE year = '$Year' and month = '$Month' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			      Year :  <?php echo $pqrow['year']; ?> | 
			      Month :  <?php echo $pqrow['month']; ?> 
				  
				   <?php }?>
				   
				   <br>
Date : <?php echo date("d-M-Y") ;?> |
Time : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
				   
				   
	</span>		<br><br> </center>  
 
<?php  
if($_POST) {

	 $Year = $_POST['Year'];
	 $Month= $_POST['Month'];

	$sql = "SELECT * FROM employees_salary 
	Left JOIN employees ON employees.id = employees_salary.emp_id
	WHERE employees_salary.year= '$Year' and employees_salary.month = '$Month' and employees_salary.status = 0 ";
	$query = $con->query($sql);
	$countRow = $query->num_rows;

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="width:100%;">
		
						   <tr>
                              
                            <th>SL</th>
                            <th>Date</th>
                            <th>Id</th>
                            <th>Name</th>
								
							<th>Salary </th>
		</tr>

		<tr>';
		
		
		$total_sal = "";
		$sl=0;
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			
				<td><center>'.++$sl.'</center></td>
				<td><center>'.date("d-M-Y", strtotime($result['entry_date'])).'</center></td>
				<td><center>'.$result['emp_id'].'</center></td>
				<td><center>'.$result['emp_name'].'</center></td>
				
				<td><center>'.$result['salary'].'</center></td>
			</tr>';	
			
			
			$total_sal+= $result['salary'];
			
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="4" style="text-align:right;font-weight:bold;"> Total =  </td>
			
			<td><b><center>'.$total_sal.' /-</center></b></td>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>


 </div>
</body>
</html>
