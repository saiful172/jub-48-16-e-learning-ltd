<?php include('session.php'); ?>
<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
<br>
<center> <?php 
				  				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			<span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>  <br>
			 </span>	
			<?php }?>
			<span style="font-size:19;">
			 All Dues Report<br>
            </span>			 
			 </div>	   
<span style="font-size:18;">
		 
Present Date  :</b> <?php echo date("M d,Y") ;?> |
Present Time: </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</span>	

 </center> 
<body>
    <div class="container-fluid">
		<br>
            <div class="container-fluid">
			
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered">
						<thead>
								 
								<tr>
									<th>SL</th> 
									<th>Customer</th> 
									<th>Address</th> 
									<th>Phone</th>  
								 
									<th>Rec.Dues</th> 
									<th>Last Paid Date</th>
									<th>Comments</th>
								</tr>
						</thead>
						<tbody>
							<?php
								$eq=mysqli_query($con,"select * from orders_dues 								
								Left JOIN customer ON customer.customer_id = orders_dues.customer_id
								where orders_dues.recent_due !=0  and orders_dues.user_id='".$_SESSION['id']."' ");
								while($eqrow=mysqli_fetch_array($eq)){
								?>
								<tr>
								    <td><?php echo ++$sl; ?>  </td> 
									<td><?php echo $eqrow['client_name']; ?></td>
									<td><?php echo $eqrow['address']; ?></td>
									<td><?php echo $eqrow['client_contact']; ?></td> 
									<td><?php echo $eqrow['recent_due']; ?></td> 
									
									<td><?php echo date("d-M-Y", strtotime($eqrow['last_update'])); ?></td>
									<td> </td>
								</tr>
							
								<?php
								}
							?>
						</tbody>
						
						<tr><td colspan="9">
						 
<?php
				   $pq=mysqli_query($con,"select sum(recent_due) as total from  `orders_dues`   where user_id='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			<b> Total Recent Dues :  <?php echo $pqrow['total']; ?> </b></center>
				  
				   <?php }?>

				</td>		
						
						</tr>
						
					</table>					
				</div>
				</div>
           
			</div>
	</div>
