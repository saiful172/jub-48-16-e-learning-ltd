<!--
   <div class="modal fade" id="ClientEdit<?php echo $did; ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content"> 
                    <div class="modal-header">                     
                      <img src="../<?php if ($srow['photo']==""){echo "img/profile.jpg"; } else {echo $srow['photo'];} ?>" width="40px" class="rounded-circle">  &nbsp; Client Edit / Update  
					  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
            <div class="row g-0">               
              <div class="col-md-12">
                <div class="card-body"> 
				
				<form role="form" method="POST" action="client_edit.php<?php echo '?id='.$did; ?>" enctype="multipart/form-data">
			  
	

<div class="row">
<div class="col-lg-6">

              <div class="row mb-3">
                  <label for="customer_name" class="col-sm-3 col-form-label"> Name</label>
                  <div class="col-sm-9">
				  <input type="text"  class="form-control" name="StuffName" value="<?php echo $dqrow['stuff_name']; ?>">
                 </div>
                </div>
				
              <div class="row mb-3">
                  <label for="customer_name" class="col-sm-3 col-form-label"> Position</label>
                  <div class="col-sm-9">
				 <input type="text" class="form-control" name="Position" maxlength="50" value="<?php echo $dqrow['position']; ?>  ">
                 </div>
                </div>	

              <div class="row mb-3">
                  <label for="customer_name" class="col-sm-3 col-form-label"> Phone</label>
                  <div class="col-sm-9">
				 <input type="text"  class="form-control" name="contact" value="<?php echo $dqrow['contact_info']; ?>">
                 </div>
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
												
    <div class="col-lg-6">	

                    
						
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
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
                    </div>	
					
					</form>
							  
              
              </div>
            </div> 
		  
					</div>
                    
                  </div>
                </div>-->
				
				
		 
	 <div class="modal fade" id="ClientEdit<?php echo $did; ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content"> 
                    <div class="modal-header alert-success">                     
                      <img src="../<?php if ($srow['photo']==""){echo "img/user.jpg"; } else {echo $srow['photo'];} ?>" width="40px" class="rounded-circle">  &nbsp; Client Edit / Update 
					  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
            <div class="row g-0">               
              <div class="col-md-12">
                <div class="card-body"> 
				
				<form role="form" method="POST" action="client_edit.php<?php echo '?id='.$did; ?>" enctype="multipart/form-data">
				
			
	

<div class="row">
			   
		  <div class="col-lg-6">	
				
				<div class="row mb-3">
                  <label for="customer_name" class="col-sm-3 col-form-label"> Name</label>
                  <div class="col-sm-8">
				  <input type="text"  class="form-control" name="StuffName" value="<?php echo $dqrow['stuff_name']; ?>">
                 </div>
                </div>
				
				 <div class="row mb-3">
                  <label for="customer_name" class="col-sm-3 col-form-label"> Position</label>
                  <div class="col-sm-8">
				 <input type="text" class="form-control" name="Position" maxlength="50" value="<?php echo $dqrow['position']; ?>  ">
                 </div>
                </div>	

              <div class="row mb-3">
                  <label for="customer_name" class="col-sm-3 col-form-label"> Phone</label>
                  <div class="col-sm-8">
				 <input type="text"  class="form-control" name="contact" value="<?php echo $dqrow['contact_info']; ?>">
                 </div>
                </div>		
				
				<div class="row mb-3">
				<div class="col-sm-11">
                  <label for="BizName" class="col-sm-12 col-form-label text-center alert-success"> Business Information</label>
                </div>
                </div>
				
						<div class="row mb-3">
							<label for="customer_name" class="col-sm-3 col-form-label">  Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="BizName" value="<?php echo $dqrow['business_name']; ?>  ">
							</div>
						</div>

						<div class="row mb-3">
							<label for="customer_name" class="col-sm-3 col-form-label">  Details</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="BizDetail" value="<?php echo $dqrow['business_details']; ?>  ">
							</div>
						</div>
						
						
						<div class="row mb-3">
							<label for="customer_name" class="col-sm-3 col-form-label">  Phone</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="BizPhone" value="<?php echo $dqrow['business_phone']; ?>  ">
							</div>
						</div>
				
						
				
				<div class="row mb-3">
                  <label for="BizEmail" class="col-sm-3 col-form-label"> Email</label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="BizEmail" value="<?php echo $dqrow['business_email']; ?>">
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="BizWeb" class="col-sm-3 col-form-label"> Website </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="BizWeb" value="<?php echo $dqrow['biz_web']; ?>">
                 </div>
                </div>

				<div class="row mb-3">
                  <label for="BizAddress" class="col-sm-3 col-form-label"> Address </label>
                  <div class="col-sm-8">
				  <textarea name="BizAddress" id="BizAddress" class="form-control" ><?php echo $dqrow['business_address']; ?> </textarea>
				  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="ServCharg" class="col-sm-3 col-form-label"> Service Charge </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="ServCharg" value="<?php echo $dqrow['service_charge']; ?>" required>
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="InvName" class="col-sm-3 col-form-label"> Invoice Name </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="InvName" value="<?php echo $dqrow['inv_name']; ?>">
                 </div>
                </div>
				 
				
				  
			</div>
			
			
			
<div class="col-lg-6">	
             
			 
				
			 <div class="row mb-3">
                  <label for="InvWelcome" class="col-sm-4 col-form-label"> Invoice Welcome </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="InvWelcome" value="<?php echo $dqrow['invoice_welcome']; ?>">
                 </div>
                </div>

             <div class="row mb-3">
                  <label for="joindate" class="col-sm-4 col-form-label"> Join Date </label>
                  <div class="col-sm-8">
				  <input type="date" class="form-control" name="joindate" value="<?php echo $dqrow['join_date']; ?>">
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="ExpireDate" class="col-sm-4 col-form-label"> Expire Date </label>
                  <div class="col-sm-8">
				  <input type="date" class="form-control" name="ExpireDate" value="<?php echo $dqrow['expire_date']; ?>" required>
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="Division" class="col-sm-4 col-form-label"> Division </label>
                  <div class="col-sm-8">
				  <select class="form-select" name="Division" id="DivName">
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
                </div>
				 
				<div class="row mb-3">
                  <label for="District" class="col-sm-4 col-form-label"> District </label>
                  <div class="col-sm-8">
				 <select class="form-select" name="District" id="DistName"> 
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
                </div> 
				
				<div class="row mb-3">
                  <label for="Upazila" class="col-sm-4 col-form-label"> Upazila / Area </label>
                  <div class="col-sm-8">
				   <select class="form-select" name="Upazila" id="UpaName"> 
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
                </div> 
				
                <div class="row mb-3">
                  <label for="Comments" class="col-sm-4 col-form-label"> Comments </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="Comments" value="<?php echo $dqrow['comments']; ?>">
                 </div>
                </div>	

				<div class="row mb-3">
                  <label for="username" class="col-sm-4 col-form-label"> Status</label>
                  <div class="col-sm-8">
				   <select class="form-select" name="Status" >
								
								<option value="<?php echo $dqrow['status']; ?>"><?php echo $dqrow['status']; ?></option> 
								<option value="1">Active</option> 
		                        <option value="0">InActive</option>
		                        
							</select>
                 </div>
                </div>	
				
				
				<div class="row mb-3">
                  <label for="username" class="col-sm-4 col-form-label"> User Name </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="username" value="<?php echo $dqrow['username']; ?>">
                 </div>
                </div>	
				
				<div class="row mb-3">
                  <label for="password" class="col-sm-4 col-form-label"> Password </label>
                  <div class="col-sm-8">
				  <input type="password" class="form-control" name="password" value="<?php echo $passrow['original']; ?>" >
                 </div>
                </div>	
				
				<div class="row mb-3">
                  <label for="password" class="col-sm-4 col-form-label"> Software Type </label>
                  <div class="col-sm-8">
				   <select class="form-select" name="Type">
								
								<option value="<?php echo $dqrow['software_status']; ?>"><?php echo $dqrow['software_status']; ?></option> 
								<option value="1">Paid</option> 
								<option value="0">Paid(InActive)</option> 
		                        <option value="2">Trial</option>
		                        <option value="3">Trial(InActive)</option>
		                        <option value="4">Paid (From Trial)</option>
							</select>
                 </div>
                </div>

               <div class="row mb-3">
                  <label for="password" class="col-sm-4 col-form-label"> Logo </label>
                  <div class="col-sm-8">
				   <input type="file" class="form-control" name="image">
                 </div>
                </div>				
			 			
						
		</div>				
	 	 
				 
</div>				 
				 
				 
				</div>
				</div>
				
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
                    </div>
					
					</form>
							  
              
              </div>
            </div> 
		  
		  <div class="modal-footer alert-success">
               </div>
			   
					</div>
                    
                  </div>
                </div>
    