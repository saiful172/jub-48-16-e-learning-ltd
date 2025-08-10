<!-- Edit Employee -->
    <div class="modal fade" id="edit_php<?php echo $eid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">এডিট  কর্মচারী</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="edit_employee.php<?php echo '?id='.$eid; ?>" enctype="multipart/form-data">
						<div class="container-fluid">
						<?php
							$eq=mysqli_query($con,"select * from employee left join `user` on user.userid=employee.userid left join emp_position on emp_position.positionid=employee.positionid where employee.userid='$eid'");
							$eqrow=mysqli_fetch_array($eq);
						?>
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">প্রথম নাম:</span>
                            <input type="text" style="width:275px; text-transform:capitalize;" class="form-control" name="firstname" value="<?php echo $eqrow['firstname']; ?>">
							
							<span style="width:120px;" class="input-group-addon">Middle I.:</span>
                            <input type="text" style="width:275px; text-transform:capitalize;" class="form-control" name="middle" maxlength="1" value="<?php echo $eqrow['middle_i']; ?>">
                        </div>
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">শেষ নাম:</span>
                            <input type="text" style="width:275px; text-transform:capitalize;" class="form-control" name="lastname" value="<?php echo $eqrow['lastname']; ?>">
							
							<span style="width:120px;" class="input-group-addon">লিঙ্গ:</span>
                            <select style="width:275px;" class="form-control" name="gender">
								<option value="<?php echo $eqrow['gender']; ?>"><?php echo $eqrow['gender']; ?></option>
								<?php
									if ($eqrow['gender']=="Male"){
										?>
										<option value="Female">মহিলা</option>
										<?php
									}
									else{
										?>
										<option value="Male">পুরুষ</option>
										<?php
									}
								?>
								
							</select>
                        </div>
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">ঠিকানা:</span>
                            <input type="text" style="width:670px; text-transform:capitalize;" class="form-control" name="address" value="<?php echo $eqrow['address']; ?>">
                        </div>
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">মোবাইল:</span>
                            <input type="text" style="width:275px;" class="form-control" name="contact" value="<?php echo $eqrow['contact_info']; ?>">
							
							<span style="width:120px;" class="input-group-addon">জন্ম তারিখ:</span>
                            <input type="date" style="width:275px;" class="form-control" name="birthdate" value="<?php echo $eqrow['birthdate']; ?>">
                        </div>
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Position:</span>
                            <select style="width:275px;" class="form-control" name="position" >
							<option value="<?php echo $eqrow['positionid']; ?>"><?php echo $eqrow['p_description']; ?></option>
								<?php
									$p=mysqli_query($con,"select * from emp_position");
									while($posrow=mysqli_fetch_array($p)){
										?>
											<option value="<?php echo $posrow['positionid']; ?>"><?php echo $posrow['p_description']; ?></option>
										<?php
									}
								?>
							</select>
							
							<span style="width:120px;" class="input-group-addon">Hired Date:</span>
                            <input type="date" style="width:275px;" class="form-control" name="hiredate" value="<?php echo $eqrow['hire_date']; ?>">
                        </div>
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Photo:</span>
                            <input type="file" style="width:670px;" class="form-control" name="image">
                        </div>
						<div style="height:10px;"></div>
						</div>
				</div>                
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Edit Employee -->
    <div class="modal fade" id="edit_php<?php echo $did; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Employee</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="adddealer.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Firstname:</span>
                            <input type="text" style="width:275px; text-transform:capitalize;" class="form-control" name="firstname" required>
							
							<span style="width:120px;" class="input-group-addon">Middle I.:</span>
                            <input type="text" style="width:275px; text-transform:capitalize;" class="form-control" name="middle" maxlength="1" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Lastname:</span>
                            <input type="text" style="width:275px; text-transform:capitalize;" class="form-control" name="lastname" required>
							
							<span style="width:120px;" class="input-group-addon">Gender:</span>
                            <select style="width:275px;" class="form-control" name="gender">
								<option>Male</option>
								<option>Female</option>
							</select>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Address:</span>
                            <input type="text" style="width:670px; text-transform:capitalize;" class="form-control" name="address" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contact Info:</span>
                            <input type="text" style="width:670px;" class="form-control" name="contact">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Birthdate:</span>
                            <input type="date" style="width:275px;" class="form-control" name="birthdate" required>
							
							<span style="width:120px;" class="input-group-addon">Joined Date:</span>
                            <input type="date" style="width:275px;" class="form-control" name="joindate" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Recruiter:</span>
                            <select style="width:670px;" class="form-control" name="recruiter">
								<option>None</option>
								<?php
									$uq=mysqli_query($con,"select * from dealer");
									while($uqrow=mysqli_fetch_array($uq)){
										?>
											<option><?php echo ucwords($uqrow['firstname']); ?> <?php echo ucwords($uqrow['middle_i']); ?>. <?php echo ucwords($uqrow['lastname']); ?></option>
										<?php
									}
								?>
							</select>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Username:</span>
                            <input type="text" style="width:275px;" class="form-control" name="username" required>
							
							<span style="width:120px;" class="input-group-addon">Password:</span>
                            <input type="password" style="width:275px;" class="form-control" name="password" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Photo:</span>
                            <input type="file" style="width:670px;" class="form-control" name="image">
                        </div>
						</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
