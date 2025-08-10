<!-- Add Employee -->
    <div class="modal fade" id="addadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add New Admin</h4>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					
                    <form role="form" method="POST" action="addnewadmin.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Username:</span>
                            <input type="text" style="width:350px;" class="form-control" name="username" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Password:</span>
                            <input type="password" style="width:350px;" class="form-control" name="password" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Firstname:</span>
                            <input type="text" style="width:350px;" class="form-control" name="firstname" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Middlename:</span>
                            <input type="text" style="width:350px;" class="form-control" name="middlename">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Lastname:</span>
                            <input type="text" style="width:350px;" class="form-control" name="lastname" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Address:</span>
                            <input type="text" style="width:350px;" class="form-control" name="address" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contact Info:</span>
                            <input type="text" style="width:350px;" class="form-control" name="contact">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Birthdate:</span>
                            <input type="date" style="width:350px;" class="form-control" name="birthdate">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Gender:</span>
                            <select style="width:350px;" class="form-control" name="gender">
								<option>Male</option>
								<option>Female</option>
							</select>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Position:</span>
                            <select style="width:350px;" class="form-control" name="position">
								<?php
									$p=mysqli_query($con,"select * from emp_position");
									while($posrow=mysqli_fetch_array($p)){
										?>
											<option value="<?php echo $posrow['positionid']; ?>"><?php echo $posrow['p_description']; ?></option>
										<?php
									}
								?>
							</select>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Hired Date:</span>
                            <input type="date" style="width:350px;" class="form-control" name="memdate">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Photo:</span>
                            <input type="file" style="width:350px;" class="form-control" name="image">
                        </div>
						</div>
					</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->