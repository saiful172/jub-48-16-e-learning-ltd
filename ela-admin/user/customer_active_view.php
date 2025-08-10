<?php 
session_start();
require_once '../includes/conn.php'; 
?>

<link rel="stylesheet" href="css/table_data_center_with_border_black.css">

<center><h3> <?php include('../includes/report_title.php'); ?>

<?php 
				  				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			 <br> <?php echo $pqrow['stuff_name']; ?>  <br>
				  
				   <?php }?>
			 Customer List ( Active )  </h3>	   
				   
Present Date  :</b> <?php echo date("M d,Y") ;?> |
Present Time: </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
		   </center> 
<body>
    <div class="container-fluid">
		<br>
            <div class="container-fluid">
			
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered center">
						<thead>
                            <tr>
							 
							<th colspan="5"><center>Customer Informetion</center></th>
							<th colspan="1"><center>Join</th>
							
                            </tr>
                            <tr>
								 
                                <th>SL</th>
                                <th>Id</th>
                                <th>Name</th>
								<th>Address</th>
								<th>Phone</th>
                                
                                <th>Date</th>
								
								                            </tr>
                        </thead>
                       <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from customer  where member_id='".$_SESSION['id']."' and  status=1 ORDER BY customer_id asc  ");
								while($eqrow=mysqli_fetch_array($eq)){
									?>
										<tr>
											 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['customer_id']; ?></td>
											<td><?php echo $eqrow['customer_name']; ?></td>
											
											<td> <?php echo $eqrow['address']; ?> </td>
											<td><?php echo $eqrow['contact_info']; ?></td>
									<td><?php echo date("M d, Y", strtotime($eqrow['join_date'])); ?></td>
								</tr>
								<?php
								}
							?>
						</tbody>
					</table>					
				</div>
				</div>
           
			</div>
	</div>
	<hr>
	      <?php
			require_once 'php_action/db_connect.php';  
				   $pq=mysqli_query($con,"select count(customer_id) as total from  `customer`   where member_id='".$_SESSION['id']."' and  status=1");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			<center><b> Total Customer:  <?php echo $pqrow['total']; ?> </b></center>
				  
				   <?php }?>
	<hr>

	
<?php include('../includes/footer.php'); ?>