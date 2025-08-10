<?php include('session.php'); ?>
<?php include('header_link.php'); ?>
<link rel="stylesheet" href="css/table_data_center.css">
<br>
<center><h4> <?php include('name.php'); ?> <br> Supplier লিস্ট ( Active )<br>


		<?php
				require_once 'php_action/db_connect.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from  `user`   where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     ইউজার:  <?php echo $pqrow['username']; ?>
				  
				   <?php }?>
           <br>
বর্তমান Date :<?php echo date("M d,Y") ;?>  |
বর্তমান সময় : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
		  </h4> </center> 

            <div class="container-fluid">
			
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
							<th> No</th>
							<th>Id</th>
							<th> Name</th>
							<th>Gender </th>
							<th> Address </th>
							<th> Mobile </th>
							<th> যোগদানের Date </th>
						</thead>
						<tbody>
							<?php
								$eq=mysqli_query($con,"select * from supplier where  supplier.status=1 order by supplier_id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><?php echo $eqrow['supplier_no']; ?></td>
									<td><?php echo $eqrow['supplier_id']; ?></td>
									<td><?php echo $eqrow['supplier_name']; ?></td>
									<td><?php echo $eqrow['gender']; ?></td>
									<td><?php echo $eqrow['address']; ?></td>
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