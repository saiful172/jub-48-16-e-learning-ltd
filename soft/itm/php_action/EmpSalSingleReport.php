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
			 Employee Salary Report - Single
            </span>			 
			 </div>	   
<span style="font-size:18;">	
 <br>
				   
				  <?php 
				   $EmpId = $_POST['EmpId'];
				   $pq=mysqli_query($con,"select * from employees 
                   
				   WHERE id = '$EmpId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			      Employee ID :  <?php echo $pqrow['id']; ?> , 
			      Name :  <?php echo $pqrow['emp_name']; ?>,
			      Salary :  <?php echo $pqrow['salary']; ?> /-
				  
				   <?php }?>
          
<br>
Date  : <?php echo date("M d, Y") ;?> | 
Time : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
</span>		
</center>

 <br> 
   
 
<?php   
if($_POST) {

     $EmpId = $_POST['EmpId'];

	$sql = "SELECT * FROM employees_salary_details 
	Left JOIN employees ON employees.id = employees_salary_details.emp_id
	WHERE employees_salary_details.emp_id= '$EmpId'  order by  employees_salary_details.id desc";
	$query = $con->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
	    <tr>
                                <th>Date</th>
                                <th>Year </th>
                                <th>Month</th>
								<th> Salary</th>
								<th> Bonus</th>
								<th> Salary + Bonus</th>
								<th> Advance </th>
								<th> Paid </th>
								<th> Total Paid </th>
								<th> Recent </th>
                            </tr>
		<tr>';
		
		$GrandTotalPaid = "";
		
		while ($result = $query->fetch_assoc()) {
		
         $GrandTotalPaid = $result['adv_paid']+$result['full_paid'];
		 
			$table .= '<tr>
			    
				<td><center>'.date("M d,Y", strtotime($result['entry_date'])).'</center></td> 
				<td><center>'.$result['year'].'</center></td>
				<td><center>'.$result['month'].'</center></td> 
				<td><center>'.$result['salary'].'</center></td>
				<td><center>'.$result['bonus'].'</center></td>
				<td><center>'.$result['total_salary'].'</center></td>
				<td><center>'.$result['adv_paid'].'</center></td>
				<td><center>'.$result['full_paid'].'</center></td>
				<td><center>'.$GrandTotalPaid.'</center></td>
				<td><center>'.$result['recent_due'].'</center></td>
			</tr>'; 
		}
		$table .= '
		</tr>

		<tr style="display:none;">
			
			<td colspan="" style="text-align:right; "> Total = </td>
			<td><center>'.$countOrder.'</center></td>
			
			<td colspan="" style="text-align:right; ">  </td>
			<td><center>'.$countOrder.'</center></td>
		
			
		</tr>
		

	</table>
	';	

	echo $table;

}

?>
<!-- Total Product & Price End-->
 
</body>
</html>
