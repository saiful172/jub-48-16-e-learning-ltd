<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php $id=$_GET['id']; ?>
<body>

    <div id="wrapper">
		<?php include('navbar.php'); ?>
		<br><br>
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Employee Profile
						<span class="pull-right">
							<a href="admin_emp.php" class="btn btn-primary btn-sm noprint"><i class="fa fa-share"></i> Employee List</a>
							<a href="edit_admin.php<?php echo '?id='.$id; ?>" class="btn btn-success btn-sm noprint" <?php echo $disables; ?>><i class="fa fa-edit"></i> Edit</a>
							<a onclick="window.print()" class="btn btn-success btn-sm noprint"><i class="fa fa-print"></i> Print</a>
						</span>
						</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div style="height:20px;"></div>
					<?php
						$e=mysqli_query($con,"select * from employee left join emp_position on emp_position.positionid=employee.positionid where employeeid='$id'");
						$er=mysqli_fetch_array($e);
					?>
				<div class="row">
					<div class="col-lg-3">
						<div>
							<?php
							if($er['photo'] == ""){
								?>
								<img src="../img/profile.jpg" width="200px" height="200px" class="thumbnail">
								<?php
							}
							else{
								?>
								<img src="../<?php echo $er['photo']; ?>" width="200px" height="200px" class="thumbnail">
								<?php
							}
							?>
						</div>
					</div>
					<div class="col-lg-9 print_details">
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Full Name:</span>
							<p style="width:480px;" class="form-control"><?php echo ucwords($er['firstname']); ?> <?php echo ucwords($er['middlename']); ?> <?php echo ucwords($er['lastname']); ?></p>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Username:</span>
							<p style="width:480px;" class="form-control"><?php echo $er['username']; ?></p>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Address:</span>
							<p style="width:480px;" class="form-control"><?php echo ucwords($er['address']); ?></p>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Contact Info:</span>
							<p style="width:480px;" class="form-control"><?php echo $er['contact_info']; ?></p>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Birthdate:</span>
							<p style="width:480px;" class="form-control"><?php echo date("M d, Y", strtotime($er['birthdate'])); ?></p>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Age:</span>
							<p style="width:480px;" class="form-control">
								<?php
									echo date_diff(date_create($er['birthdate']),date_create('today'))->y;
								?>
							</p>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Gender:</span>
							<p style="width:480px;" class="form-control"><?php echo $er['gender']; ?></p>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Position:</span>
							<p style="width:480px;" class="form-control"><?php echo $er['p_description']; ?></p>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Hired Date:</span>
							<p style="width:480px;" class="form-control"><?php echo date("M d, Y", strtotime($er['member_date'])); ?></p>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Access Level:</span>
							<p style="width:480px;" class="form-control">
								<?php 
									if ($er['access_level']==1){
										echo "Admin";
									} 
									elseif ($er['access_level']==2){
										echo "Staff";
									}
									elseif ($er['access_level']==3){
										echo "Stock in-charge";
									}
									else{
										echo "Dealer";
									}
								?>
							</p>
						</div>
					</div>	
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
	</div>
	
	<?php include('scripts.php'); ?>
	<?php include ('modal.php'); ?>
	
</body>
</html>