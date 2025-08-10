<?php include('session.php'); ?>
<?php include('header_link.php'); ?>
<br>&nbsp; &nbsp; &nbsp;<button  onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Print</button>
<center><h4> <?php include('name.php'); ?> <br>All Dues Report<br>


		<?php
				require_once 'php_action/db_connect.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from  `user`   where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     Open By :  <?php echo $pqrow['username']; ?>
				  
				   <?php }?>
           </h4>
		   <b>Present Date :</b> <?php echo date("M d,Y") ;?>.................................
<b> Present Time: </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
		   </center> 
<body>
    <div class="container-fluid">
		<br>
            <div class="container-fluid">
			
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
							
                                <th>Order.Id</th>
                                <th>Cust.Id</th>
                                <th>Cust.Name</th>
								<th>Phone</th>
								
								<th>Pre.Dues</th>
								<th>Paid</th>
								<th>Recent Dues</th>
								<th>S.Date</th>
								<th>L.P.Date</th>
						</thead>
						<tbody>
							<?php
								$eq=mysqli_query($con,"select * from orders_dues where user_id='".$_SESSION['id']."' ");
								while($eqrow=mysqli_fetch_array($eq)){
								?>
								<tr>
									<td><?php echo $eqrow['order_id']; ?></td>
									<td><?php echo ucwords($eqrow['customer_id']); ?></td>
									<td><?php echo $eqrow['client_name']; ?></td>
								
									<td><?php echo ucwords($eqrow['client_contact']); ?></td>
									<td><?php echo $eqrow['grand_total']; ?></td>
									<td><?php echo $eqrow['paid']; ?></td>
									<td><?php echo $eqrow['recent_due']; ?></td>
									
									<td><?php echo date("m-d-Y", strtotime($eqrow['order_date'])); ?></td>
									<td><?php echo date("m-d-Y", strtotime($eqrow['last_update'])); ?></td>
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
	<br>
	
	<?php include('scripts.php'); ?>
	<?php include ('modal.php'); ?>
	
</body>
</html>