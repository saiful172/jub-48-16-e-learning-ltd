
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
</head>
<body>
<div class="container" style="width:100%;">

<div class="container" style="width:100%;">
<br>
 <center style="font-size:18px;"> <?php include('../name.php'); ?> <br> Date Wise All  Report  <br></center> 
  <center style="font-size:16px;">  
 <?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from `user`  where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			      User  :  <?php echo $pqrow['username']; ?>
				  
				   <?php }?>
				   
	<br>		
	<?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date To :  ' ; echo date("M d, Y", strtotime( $endDate));
?><br>

Date :<?php echo date("M d,Y") ;?> |
Time :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </center> 
<hr>  
 
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
						
                            <tr>
                                
                               <th> Name </th>
			<th> Quantty </th>
								
                            </tr>
                        </thead>
                         <tbody id="tbody">

	
	
	<?php
	if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
	
	$eq=mysqli_query($con,"SELECT sum(quantity) as total,product_id,product_name
	         FROM `order_item`
			 
			 Left JOIN product ON order_item.product_id = product.product_id 
             
			 
			

			 "); 
	
	
	while($eqrow=mysqli_fetch_array($eq)){
	
	?>
			<tr>
			
			<td><?php echo $eqrow['product_id']; ?>  </td>
			<td><?php echo $eqrow['total']; ?>  </td>
			
          </tr>				
<?php
}
}
?>

</tbody>
</table>


 
</body>
</html>
