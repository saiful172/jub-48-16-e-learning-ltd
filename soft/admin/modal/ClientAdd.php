	 <div class="modal fade" id="ClientAdd" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content"> 
                    <div class="modal-header alert-success">                     
                      <img src="../<?php if ($srow['photo']==""){echo "img/user.jpg"; } else {echo $srow['photo'];} ?>" width="40px" class="rounded-circle">  &nbsp; Add New Client 
					  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
            <div class="row g-0">               
              <div class="col-md-12">
                <div class="card-body"> 
				
				<form method="POST" action="client_add.php"> 
				
				
				<div class="row d-none">
                  <label for="customer_name" class="col-sm-3 col-form-label"> User Id</label>
                  <div class="col-sm-8">
				  <?php
				
				   include('../includes/conn.php');
				   $pq=mysqli_query($con,"select max(userid) as userid from stuff ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="text" name="UserId"  value="<?php echo $pqrow['userid']+1; ?>" >
		
		<?php }?>
                 </div>
               </div>
	

<div class="row">
			   
		  <div class="col-lg-6">			
						
				<div class="row mb-3">
                  <label for="StuffName" class="col-sm-3 col-form-label"> Name</label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="StuffName" required>
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="Position" class="col-sm-3 col-form-label"> Position</label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="Position" required>
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="contact" class="col-sm-3 col-form-label"> Phone</label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="contact" required>
                 </div>
                </div>
				
				<div class="row mb-3">
				<div class="col-sm-11">
                  <label for="BizName" class="col-sm-12 col-form-label text-center alert-success"> Business Information</label>
                </div>
                </div>
				
				
				<div class="row mb-3">
                  <label for="BizName" class="col-sm-3 col-form-label">  Name</label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="BizName" required>
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="BizDetail" class="col-sm-3 col-form-label"> Details</label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="BizDetail" required>
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="BizPhone" class="col-sm-3 col-form-label"> Phone</label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="BizPhone" required>
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="BizEmail" class="col-sm-3 col-form-label"> Email</label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="BizEmail" required>
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="BizWeb" class="col-sm-3 col-form-label"> Website </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="BizWeb" required>
                 </div>
                </div>

				<div class="row mb-3">
                  <label for="BizAddress" class="col-sm-3 col-form-label"> Address </label>
                  <div class="col-sm-8">
				  <textarea class="form-control" name="BizAddress" id="BizAddress"></textarea>
				  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="ServCharg" class="col-sm-3 col-form-label"> Service Charge </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="ServCharg" required>
                 </div>
                </div>
				 
				
				  
			</div>
			
<div class="col-lg-6">	
             
			 <div class="row mb-3">
                  <label for="InvName" class="col-sm-4 col-form-label"> Invoice Name </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="InvName" required>
                 </div>
                </div>
				
			 <div class="row mb-3">
                  <label for="InvWelcome" class="col-sm-4 col-form-label"> Invoice Welcome </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="InvWelcome" value="Thanks For Shopping From Us" required>
                 </div>
                </div>

             <div class="row mb-3">
                  <label for="joindate" class="col-sm-4 col-form-label"> Join Date </label>
                  <div class="col-sm-8">
				  <input type="date" class="form-control" name="joindate" required>
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="ExpireDate" class="col-sm-4 col-form-label"> Expire Date </label>
                  <div class="col-sm-8">
				  <input type="date" class="form-control" name="ExpireDate" required>
                 </div>
                </div>
				
				<div class="row mb-3">
                  <label for="Division" class="col-sm-4 col-form-label"> Division </label>
                  <div class="col-sm-8">
				   <select class="form-select" name="Division" id="DivName">
							<option value="#">Select Division</option> 
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
							<option value="0">Select District</option>
		 
							</select>
                 </div>
                </div> 
				
				<div class="row mb-3">
                  <label for="Upazila" class="col-sm-4 col-form-label"> Upazila / Area </label>
                  <div class="col-sm-8">
				  <select class="form-select" name="Upazila" id="UpaName">
							<option value="0">Select Upazila / Area</option>
		 
							</select>
                 </div>
                </div> 
				
                <div class="row mb-3">
                  <label for="Comments" class="col-sm-4 col-form-label"> Comments </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="Comments" required>
                 </div>
                </div>	

				<div class="row mb-3">
                  <label for="username" class="col-sm-4 col-form-label"> User Name </label>
                  <div class="col-sm-8">
				  <input type="text" class="form-control" name="username" required>
                 </div>
                </div>	
				
				<div class="row mb-3">
                  <label for="password" class="col-sm-4 col-form-label"> Password </label>
                  <div class="col-sm-8">
				  <input type="password" class="form-control" name="password" required>
                 </div>
                </div>	
				
				<div class="row mb-3">
                  <label for="password" class="col-sm-4 col-form-label"> Software Type </label>
                  <div class="col-sm-8">
				   <select class="form-select" name="Type">								
							<option value="1">Paid</option> 
		                    <option value="2">Trial</option>
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
                      <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Add</button>
                    </div>	
					
					</form>
							  
              
              </div>
            </div> 
			
			<div class="modal-footer alert-success">
               </div>
		  
					</div>
                    
                  </div>
                </div>
     