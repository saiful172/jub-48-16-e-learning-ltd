<?php include('session.php'); ?>
<?php include('header_link.php'); ?>
<link rel="stylesheet" href="css/table_data_center.css">

<center><h4> <?php include('name.php'); ?> <br>Customer List (  In-Active  )<br>


		<?php
				require_once 'php_action/db_connect.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from  `user`   where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			    User :  <?php echo $pqrow['username']; ?>
				  
				   <?php }?>
				   <br>
           
Present Date :</b> <?php echo date("M d,Y") ;?> |
Present Time : </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
		   </h4></center> 
<body>
    <div class="container-fluid">
		<br>
            <div class="container-fluid">
			
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered center" style="font-size:13px;">
						<thead>
                            <tr>
							<th colspan="1"><center>User</th>
							<th colspan="5"><center>Customer Information</center></th>
							<th colspan="1"><center>Join  Date</th>
							
                            </tr>
                            <tr>
								<th>Id</th>
                                <th>No</th>
                                <th>Id</th>
                                <th>Name</th>
								<th>Address</th>
								<th>Mobile</th>
								
                                <th>Date</th>
								
								                            </tr>
                        </thead>
                       <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"select * from customer  where  status=0 ORDER BY customer_id DESC  ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['member_id'];
									?>
										<tr>
											<td><?php echo $eqrow['member_id']; ?></td>
											<td><?php echo $eqrow['customer_no']; ?></td>
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
	<br>
	

	
</body>
</html>