<!-- Add Employee -->
    <div class="modal fade" id="addemployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><center>Add New Employee</center></h4>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addemployee.php" enctype="multipart/form-data">
						<div class="container-fluid">
						
						<div style="height:15px;"></div>
						<div style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Name:</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="emp_name" required>
						</div>
						
						<div style="width:100%" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">Father Name:</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="father_name" maxlength="50">
                        </div>
						
						<div style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">National Id:</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="national_id" required>
							
						</div>
						
						<div style="width:100%" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">Gender:</span>
                            <select style="width:100%;" class="form-control" name="gender">
								<option>Male</option>
								<option>Female</option>
							</select>
                        </div>
						
						<div style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Address:</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="address" required>
                        </div>
						
						<div style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Phone No:</span>
                            <input type="text" style="width:100%;" class="form-control" name="contact">
							
						</div>
						
						<div style="width:100%"  class="form-group input-group">	
							<span style="width:120px;" class="input-group-addon">Birthdate:</span>
                            <input type="date" style="width:100%;" class="form-control" name="birthdate" required>
                        </div>
						
						<div style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Position:</span>
                            <input type="text" style="width:100%;" class="form-control" name="position">
							
						</div>
						
						

						
						<div style="width:100%"  class="form-group input-group">	
							<span style="width:120px;" class="input-group-addon">Join Date:</span>
                            <input type="date" style="width:100%;" class="form-control" name="memdate" required>
                        </div>
						
						<div style="width:100%" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">Salary Type:</span>
                            <select style="width:100%;" class="form-control" name="sal_type">
								<option>Monthly</option>
								<option>Daily</option>
							</select>
                        </div>
						
						<div style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">salary:</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="salary" required>
                        </div>
						

						
						
						
						
						<div style="width:100%"  class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Add Photo:</span>
                            <input type="file" style="width:100%;" class="form-control" name="image">
                        </div>
						

						
						
						
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Add Dealer -->
    <div class="modal fade" id="adddealer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><center>Add New Dealer</center></h4>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addemployee.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Firstname:</span>
                            <input type="text" style="width:275px; text-transform:capitalize;" class="form-control" name="emp_name" required>
							
							<span style="width:120px;" class="input-group-addon">Middle I.:</span>
                            <input type="text" style="width:275px; text-transform:capitalize;" class="form-control" name="middle" maxlength="1">
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
                            <input type="text" style="width:275px;" class="form-control" name="contact">
							
							<span style="width:120px;" class="input-group-addon">Birthdate:</span>
                            <input type="date" style="width:275px;" class="form-control" name="birthdate" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Position:</span>
                            <select style="width:275px;" class="form-control" name="position">
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
                            <input type="date" style="width:275px;" class="form-control" name="memdate" required>
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
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->