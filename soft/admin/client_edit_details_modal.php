<!-- Edit Stuff -->
    <div class="modal fade" id="update<?php echo $did; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Stuff Edit</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="client_edit.php<?php echo '?id='.$did; ?>" enctype="multipart/form-data">
						<div class="container-fluid">
						
		<div class="col-md-6">		
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Name</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="StuffName" value="<?php echo $dqrow['stuff_name']; ?>">
						</div> 
						
						<div style="width:100%;" class="form-group input-group">	
							<span style="width:120px;" class="input-group-addon">Position</span>
                            <input type="text" style="width:100%; text-transform:capitalize;" class="form-control" name="Position" maxlength="50" value="<?php echo $dqrow['position']; ?>  ">
                        </div> 
						
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Phone</span>
                            <input type="text" style="width:100%;" class="form-control" name="contact" value="<?php echo $dqrow['contact_info']; ?>">
                        </div>
						
						<div style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Business Name</span>
                            <input type="text" style="width:100%;" class="form-control" name="BizName" value="<?php echo $dqrow['business_name']; ?>">
					     </div>
						 
						 <div style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Business Details</span>
                            <input type="text" style="width:100%;" class="form-control" name="BizDetail" value="<?php echo $dqrow['business_details']; ?>">
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
                            <span style="width:120px;" class="input-group-addon">Website</span>
                            <input type="text" style="width:100%;" class="form-control" name="BizWeb" value="<?php echo $dqrow['biz_web']; ?>">
                        </div>
						
						<div  style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Business Address</span>
                            <input type="text" style="width:100%;" class="form-control" name="BizAddress" value="<?php echo $dqrow['business_address']; ?>">
                        </div>
						
						<div  style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Service Charge</span>
                            <input type="text" style="width:100%;" class="form-control" name="ServCharg" value="<?php echo $dqrow['service_charge']; ?>" required>
                        </div>
						
						<div  style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Invoice Name</span>
                            <input type="text" style="width:100%;" class="form-control" name="InvName" value="<?php echo $dqrow['inv_name']; ?>">
                        </div>	
						
						 <div  style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Invoice Welcome</span>
                            <input type="text" style="width:100%;" class="form-control" name="InvWelcome" value="<?php echo $dqrow['invoice_welcome']; ?>">
                        </div>
		</div>
												
    <div class="col-md-6">	

                    
						
						<div style="width:100%;" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">Join Date</span>
                            <input type="date" style="width:100%;" class="form-control" name="joindate" value="<?php echo $dqrow['join_date']; ?>">
                        </div>
						
						<div style="width:100%" class="form-group input-group">	
							<span style="width:120px;" class="input-group-addon">ExpireDate :</span>
                            <input type="date" style="width:100%;" class="form-control" name="ExpireDate" value="<?php echo $dqrow['expire_date']; ?>" required >
                        </div>
						
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Division </span>
                            <select class="form-control" name="Division" id="DivName">
							<option value="<?php echo $dqrow['div_id']; ?>"><?php echo $dqrow['div_name']; ?></option> 
				      	<?php 
				      	$sql = "SELECT div_id,div_name FROM division";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?> 
							</select>
                        </div>
						
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">District </span>
                            <select class="form-control" name="District" id="DistName"> 
		                    <option value="<?php echo $dqrow['dist_id']; ?>"><?php echo $dqrow['dist_name']; ?></option> 
							<?php 
				      	$sql = "SELECT dist_id,dist_name FROM district";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?> 
							</select>
                        </div>
						
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Upazila/Area </span>
                            <select class="form-control" name="Upazila" id="UpaName"> 
		                     <option value="<?php echo $dqrow['id']; ?>"><?php echo $dqrow['thana_name']; ?></option> 
							<?php 
				      	$sql = "SELECT id,thana_name FROM thana";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?> 
							</select>
                        </div>
						
						<div  style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Comments:</span>
                            <input type="text"  class="form-control" name="Comments" value="<?php echo $dqrow['comments']; ?>">
                        </div>						
						
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Status:</span>
                            <select class="form-control" name="Status" >
								
								<option value="<?php echo $dqrow['status']; ?>"><?php echo $dqrow['status']; ?></option> 
								<option value="1">Active</option> 
		                        <option value="0">InActive</option>
		                        
							</select>
                        </div>
						
						<div style="width:100%" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">User Name</span>
                            <input type="text" style="width:100%;" class="form-control" name="username" value="<?php echo $dqrow['username']; ?>">
						</div>
		
						<div style="width:100%" class="form-group input-group">
							<span style="width:120px;" class="input-group-addon">Password</span>
                            <input type="password" style="width:100%;" class="form-control" name="password" value="<?php echo $passrow['original']; ?>">
                        </div>
						
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Software Type :</span>
                            <select class="form-control" name="Type">
								
								<option value="<?php echo $dqrow['software_status']; ?>"><?php echo $dqrow['software_status']; ?></option> 
								<option value="1">Paid</option> 
								<option value="0">Paid(InActive)</option> 
		                        <option value="2">Trial</option>
		                        <option value="3">Trial(InActive)</option>
		                        <option value="4">Paid (From Trial)</option>
							</select>
                        </div>
										
						 
						<div style="width:100%;" class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Logo</span>
                            <input type="file" style="width:100%;" class="form-control" name="image">
                        </div>
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

