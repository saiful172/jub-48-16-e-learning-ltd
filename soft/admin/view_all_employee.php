<?php include('session.php'); ?>
<?php include('header_link.php'); ?>


<body>
    <div class="container-fluid">
		<br>
            <div class="container-fluid">
				<div class="row">
                <div class="col-lg-12">
                    
						<center><img src="../img/user.jpg" width="50px"><br>
						<span style="font-size:20px;">Customer  List ( All ) <br><?php include('name.php'); ?></span>
							</center>	
									
				</div>
				</div>
				
				<br>
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
							<th>Phone</th>
							<th>Customer Name</th>
							<th>Address</th>
							<th>Mobile No</th>
							<th>Birth Date</th>
							<th>Gender</th>
							<th>Position</th>
							<th>Salary</th>
							<th>From Date</th>
						</thead>
						<tbody>
							<?php
								$eq=mysqli_query($con,"select * from employee order by id desc  ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><img src="../<?php echo ucwords($eqrow['photo']); ?>" width="50px" alt="" /></td>
									<td><?php echo ucwords($eqrow['emp_name']); ?></td>
									

									<td><?php echo $eqrow['address']; ?></td>
									<td><?php echo $eqrow['contact_info']; ?></td>
									<td><?php echo date("M d, Y", strtotime($eqrow['birthdate'])); ?></td>
									<td><?php echo $eqrow['gender']; ?></td>
									<td><?php echo $eqrow['position']; ?></td>
									<td><?php echo $eqrow['salary']; ?></td>
									
									<td><?php echo date("d,M,Y", strtotime($eqrow['hire_date'])); ?></td>
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