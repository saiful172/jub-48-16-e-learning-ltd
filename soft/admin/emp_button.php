<!-- Edit Employee -->
    <div class="modal fade" id="update<?php echo $eid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
						
						<div style="height:15px;"></div>
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">নাম:</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="emp_name" value="<?php echo $eqrow['emp_name']; ?>">
						</div>	
						
						<div style="height:15px;"></div>
						<div style="width:100%;" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">বাবার নাম:</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="father_name" maxlength="50" value="<?php echo $eqrow['father_name']; ?>">
                        </div>
						
						<div style="height:15px;"></div>
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">ভোটার আইডি:</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="national_id" value="<?php echo $eqrow['national_id']; ?>">
						</div>	
						
						<div style="height:15px;"></div>
						<div style="width:100%;" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">লিঙ্গ:</span>
                            <select style="width:100%;" class="form-control" name="gender">
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
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">ঠিকানা:</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="address" value="<?php echo $eqrow['address']; ?>">
                        </div>
						
						<div style="height:15px;"></div>
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">মোবাইল:</span>
                            <input type="text" style="width:100%;" class="form-control" name="contact" value="<?php echo $eqrow['contact_info']; ?>">
						 </div>
						 
						<div style="height:15px;"></div> 
						<div style="width:100%;" class="form-group input-group">	
							<span style="width:120px;" class="input-group-addon">জন্ম তারিখ:</span>
                            <input type="date" style="width:100%;" class="form-control" name="birthdate" value="<?php echo $eqrow['birthdate']; ?>">
                        </div>
						
						<div style="height:15px;"></div>
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Position:</span>
                            <input type="text" style="width:100%;" class="form-control" name="position" value="<?php echo $eqrow['position']; ?>">
						 </div>
	
	
	
						
						<div style="height:15px;"></div>	
						<div style="width:100%;" class="form-group input-group">	
							<span style="width:120px;" class="input-group-addon">তারিখ হতে:</span>
                            <input type="date" style="width:100%;" class="form-control" name="hiredate" value="<?php echo $eqrow['hire_date']; ?>">
                        </div>
						
						<div style="height:15px;"></div>
						<div style="width:100%" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">বেতনের ধরন:</span>
                            <select style="width:100%;" class="form-control" name="sal_type">
								<option>মাসিক</option>
								<option>দৈনিক</option>
							</select>
                        </div>
						 
						 
						 
						 
						 
						 <div style="height:15px;"></div>
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">বেতন:</span>
                            <input type="text" style="width:100%;" class="form-control" name="salary" value="<?php echo $eqrow['salary']; ?>">
						 </div>
						
						
						
						
					<div style="height:15px;"></div>
						<div style="width:100%" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">স্টেটাস:</span>
                            <select style="width:100%;" class="form-control" name="status">
								<option value="1">একটিভ</option>
								<option value="0">ইন-একটিভ</option>
							</select>
                        </div>
						
						
						
						
						
						<div style="height:15px;"></div>
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">ছবি:</span>
                            <input type="file" style="width:100%;" class="form-control" name="image">
                        </div>
						<div style="height:10px;"></div>
						</div>
				</div>                
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> বতিল</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> অপডেট</button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Delete Employee -->
    <div class="modal fade" id="delemp_<?php echo $eid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">ডিলিট কর্মচারী</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$emp=mysqli_query($con,"select * from employee where id='$eid'");
						$empr=mysqli_fetch_array($emp);
						
					?>
					<h5><center>কর্মচারী নাম: <strong><?php echo ucwords($empr['national_id']); ?>, <?php echo ucwords($empr['emp_name']); ?> <?php echo ucwords($empr['father_name']); ?></strong></center></h5> 
                    <form role="form" method="POST" action="deleteemployee.php<?php echo '?id='.$eid; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> বাতিল</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> ডিলিট</button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Employee Details -->
    <div class="modal fade" id="details_<?php echo $eid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><center>Employee Details</center></h4>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form>
					<?php
						$emq=mysqli_query($con,"select * from employee  where id='$eid'");
						$erow=mysqli_fetch_array($emq);
					?>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-3">
							<img src="../<?php if($erow['photo']==""){echo "/img/profile.jpg";}else{echo $erow['photo'];} ?>" height="200px;" width="200px;" class="thumbnail">
						</div>
						<div class="col-lg-9">
						
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Name:</span>
                            <span style="width:500px;" class="form-control"><?php echo ucwords($erow['emp_name']); ?></span>
                        </div>
						
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Father Name:</span>
                            <span style="width:500px;" class="form-control"><?php echo $erow['father_name']; ?></span>
                        </div>
						
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">National Id:</span>
                            <span style="width:500px;" class="form-control"><?php echo $erow['national_id']; ?></span>
                        </div>
						

						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Address:</span>
                            <span style="width:500px;" class="form-control"><?php echo ucwords($erow['address']); ?></span>
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contact Info:</span>
                            <span style="width:500px;" class="form-control"><?php echo $erow['contact_info']; ?></span>
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Birthdate:</span>
                            <span style="width:500px;" class="form-control"><?php echo date("M d, Y", strtotime($erow['birthdate'])); ?></span>
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Age:</span>
                            <span style="width:500px;" class="form-control"><?php echo date_diff(date_create($erow['birthdate']),date_create('today'))->y; ?></span>
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Gender:</span>
                            <span style="width:500px;" class="form-control"><?php echo $erow['gender']; ?></span>
                        </div>
						
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Position:</span>
                            <span style="width:500px;" class="form-control"><?php echo $erow['position']; ?></span>
                        </div>
						
						<div style="width:100%" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">Salary Type:</span>
                            <select style="width:100%;" class="form-control" name="sal_type">
								<option>Monthly</option>
								<option>Daily</option>
							</select>
                        </div>
						
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Salary:</span>
                            <span style="width:500px;" class="form-control"><?php echo $erow['salary']; ?></span>
                        </div>
						
						
						
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Hire Date:</span>
                            <span style="width:500px;" class="form-control"><?php echo date("M d, Y", strtotime($erow['hire_date'])); ?></span>
                        </div>
						<div style="height:20px;"></div>
						</div>
					</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</form>
                </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

