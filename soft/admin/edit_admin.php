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
                        <h1 class="page-header">Edit Employee
						<span class="pull-right">
							<a href="admin_emp.php" class="btn btn-primary btn-sm"><i class="fa fa-share"></i> Employee List</a>
							<a href="admin_profile.php<?php echo '?id='.$id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-user"></i> Employee Profile</a>
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
					<div class="col-lg-9">
						<form role="form" method="POST" action="save_admin.php<?php echo '?id='.$id; ?>" enctype="multipart/form-data">
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">First Name:</span>
							<input type="text" style="width:480px;" class="form-control" value="<?php echo $er['firstname']; ?>" name="firstname">
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Middle Name:</span>
							<input type="text" style="width:480px;" class="form-control" value="<?php echo $er['middlename']; ?>" name="middlename">
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Last Name:</span>
							<input type="text" style="width:480px;" class="form-control" value="<?php echo $er['lastname']; ?>" name="lastname">
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Address:</span>
							<input type="text" style="width:480px;" class="form-control" value="<?php echo $er['address']; ?>" name="address">
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Contact Info:</span>
							<input type="text" style="width:480px;" class="form-control" value="<?php echo $er['contact_info']; ?>" name="contact">
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Birthdate:</span>
							<input type="date" style="width:480px;" class="form-control" value="<?php echo $er['birthdate']; ?>" name="birthdate">
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Gender:</span>
							<select style="width:480px;" class="form-control" name="gender">
								<option value="<?php echo $er['gender']; ?>"><?php echo $er['gender']; ?></option>
								<option>
									<?php
										if ($er['gender']=="Male"){
											echo "Female";
										}
										else{
											echo "Male";
										}
									?>
								</option>
							</select>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Position:</span>
							<select style="width:480px;" class="form-control" name="position">
								<option value="<?php echo $er['positionid']; ?>"><?php echo $er['p_description']; ?></option>
								<?php
									$pq=mysqli_query($con,"select * from emp_position");
									while($pqrow=mysqli_fetch_array($pq)){
										?>
											<option value="<?php echo $pqrow['positionid']; ?>"><?php echo $pqrow['p_description']; ?></option>
										<?php
									}
								?>
							</select>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Hired Date:</span>
							<input type="date" style="width:480px;" class="form-control" value="<?php echo $er['member_date']; ?>" name="memdate">
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Access Level:</span>
							<select style="width:480px;" class="form-control" name="access">
								<option value="<?php echo $er['access_level']; ?>">
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
								</option>
								<?php
									if ($er['access_level']==1){
										?>
											<option value="2">Staff</option>
											<option value="3">Stock in-charge</option>
											<option value="4">Dealer</option>
										<?php
									}
									elseif ($er['access_level']==2){
										?>
											<option value="1">Admin</option>
											<option value="3">Stock in-charge</option>
											<option value="4">Dealer</option>
										<?php
									}
									elseif ($er['access_level']==3){
										?>
											<option value="1">Admin</option>
											<option value="2">Staff</option>
											<option value="4">Dealer</option>
										<?php
									} 
									else{
										?>
											<option value="1">Admin</option>
											<option value="2">Staff</option>
											<option value="3">Stock in-charge</option>
										<?php
									} 
									
								?>
								
							</select>
						</div>
						<div class="form-group input-group">
							<span style="width:110px;" class="input-group-addon">Photo:</span>
							<input type="file" style="width:480px;" class="form-control" name="image">
						</div>
						<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</button>
						</form>
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