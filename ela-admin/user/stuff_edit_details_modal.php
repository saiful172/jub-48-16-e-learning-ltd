<!-- Edit Stuff -->
    <div class="modal fade" id="update<?php echo $did; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Settings Edit</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="edit_stuff.php<?php echo '?id='.$did; ?>" enctype="multipart/form-data">
						<div class="container-fluid">
						
						 
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Name:</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="StuffName" value="<?php echo $dqrow['stuff_name']; ?>">
						</div>
						
						 
						<div style="width:100%;" class="form-group input-group">	
							<span style="width:120px;" class="input-group-addon">Position</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="Position" maxlength="50" value="<?php echo $dqrow['position']; ?>  ">
                        </div>
						  
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Phone No</span>
                            <input type="text" style="width:100%;" class="form-control" name="contact" value="<?php echo $dqrow['contact_info']; ?>">
                        </div>
						
						<div style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Business Name</span>
                            <input type="text" style="width:100%;" class="form-control" name="BizName" value="<?php echo $dqrow['business_name']; ?>">
					     </div>
						 
						 <div  style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Business Phone</span>
                            <input type="text" style="width:100%;" class="form-control" name="BizPhone" value="<?php echo $dqrow['business_phone']; ?>">
                        </div>
						
						<div  style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Business Email</span>
                            <input type="text" style="width:100%;" class="form-control" name="BizEmail" value="<?php echo $dqrow['business_email']; ?>">
                        </div>
						
						<div  style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Business Address</span>
                            <input type="text" style="width:100%;" class="form-control" name="BizAddress" value="<?php echo $dqrow['business_address']; ?>">
                        </div>
						
						<div  style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Invoice Welcome</span>
                            <input type="text" style="width:100%;" class="form-control" name="InvWelcome" value="<?php echo $dqrow['invoice_welcome']; ?>">
                        </div>
						 
						<div style="width:100%;display:none;" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">Join Date</span>
                            <input type="date" style="width:100%;" class="form-control" name="joindate" value="<?php echo $dqrow['join_date']; ?>">
                        </div>
						
						<div style="width:100%;display:none;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Status:</span>
                            <select style="width:670px;" class="form-control" name="Status">
								
								<option value="1">Active</option> 
		                       <option value="0">In-Active</option>
							</select>
                        </div>
						
						<div style="width:100%;display:none;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">User Name:</span>
                            <input type="text" style="width:100%;" class="form-control" name="username" value="<?php echo $dqrow['username']; ?>">
						</div>
		
						<div style="width:100%;" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">Password:</span>
                            <input type="password" style="width:100%;" class="form-control" name="password" value="<?php echo $passrow['original']; ?>">
                        </div>
										
						<div style="height:15px;"></div>
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Logo ( Please Add 300 x 300px JPG or Png )</span>
                            <input type="file" style="width:100%;" class="form-control" name="image">
                        </div>
						</div>
				</div>                
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                   <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update </button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Delete Stuff -->
    <div class="modal fade" id="delemp_<?php echo $did; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel"> আপনি কি ডিলিট করতে চাচ্ছেন ?</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$emp=mysqli_query($con,"select * from stuff where userid='$did'");
						$empr=mysqli_fetch_array($emp);
						
					?>
					<h5><center>স্টাফের নাম : <strong><?php echo $empr['stuff_name']; ?></strong></center></h5> 
                    <form role="form" method="POST" action="delete_stuff.php<?php echo '?id='.$did; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> বাতিল </button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> ডিলিট করুন</button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

 <!-- Stuff Details -->
    <div class="modal fade" id="details_<?php echo $did; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><center>Stuff Details</center></h4>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form>
					<?php
						$emq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='$did'");
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
                            <span style="width:500px;" class="form-control"><?php echo $erow['stuff_name']; ?> </span>
                        </div>
						
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Position  </span>
                            <span style="width:500px;" class="form-control"><?php echo $erow['position']; ?></span>
                        </div>
												
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Phone No:</span>
                            <span style="width:500px;" class="form-control"><?php echo $erow['contact_info']; ?></span>
                        </div>
					
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Join Date:</span>
                            <span style="width:500px;" class="form-control"><?php echo date("M d, Y", strtotime($erow['join_date'])); ?></span>
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

